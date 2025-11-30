<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Http;

use Barryvdh\DomPDF\Facade\Pdf;


use WasenderApi\WasenderApi;

use GuzzleHttp\Client;

use App\Models\User;

use Illuminate\Support\Facades\Log;





class DoctorControllerV3 extends Controller
{
    
   
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100|regex:/^[a-zA-Z\s]+$/',
            'age' => 'required|integer|min:5|max:120',
            'gender' => 'required|in:Male,Female,Other',
            'country' => 'required|string|max:100',
            'phone' => [
                'required',
                'regex:/^\+?[1-9]\d{6,14}$/',],
            'height_feet' => 'required|numeric|min:1|max:8',
            'height_inches' => 'required|numeric|min:0|max:11',
            'weight' => 'required|numeric|min:10|max:300',
            'diet' => 'required',
            'lifestyle' => 'required',
            // Health condition validation
            'health_condition' => 'nullable|array',
            'health_condition.*' => 'string',
            'other_health_condition' => 'nullable|string|max:100', // optional
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5 MB limit
        ], [
            'name.regex' => 'Name can only contain letters and spaces.',
            'phone.regex' => 'Please enter a valid 10-digit mobile number.',
            'image.max' => 'Image size must not exceed 5 MB.',
        ]);
        
        try{


        // Convert height to meters
        $heightInCm = ($request->height_feet * 30.48) + ($request->height_inches * 2.54);
        $heightInMeters = $heightInCm / 100;

        // BMI Calculation
        $bmi = round($request->weight / ($heightInMeters * $heightInMeters), 1);

        $category = '';

        // Determine category
        if ($bmi < 18.5) {
            $category = "Underweight";
        } elseif ($bmi < 24.9) {
            $category = "Normal weight";
        } elseif ($bmi < 29.9) {
            $category = "Overweight";
        } else {
            $category = "Obese";
        }

        $uploadedImagePath = null;
        $aiImagePath = null;
        $uploadedImageName=null;
        $aiImageName=null;
        if ($request->hasFile('image')) {

            // Store uploaded image
                $uploadedImage = $request->file('image');
                $uploadedImageName = uniqid('bmi_') . '.jpeg'; // filename only
                $uploadedImagePath = 'bmi_images/' . $uploadedImageName;
                $uploadedImageFullPath = storage_path('app/public/' . $uploadedImagePath);

                // Get original image info
                $imageInfo = getimagesize($uploadedImage->getRealPath());
                $width = $imageInfo[0];
                $height = $imageInfo[1];
                $mime = $imageInfo['mime'];

                // Create image resource based on type
                switch ($mime) {
                    case 'image/jpeg':
                        $img = imagecreatefromjpeg($uploadedImage->getRealPath());
                        break;
                    case 'image/png':
                        $img = imagecreatefrompng($uploadedImage->getRealPath());
                        break;
                    case 'image/gif':
                        $img = imagecreatefromgif($uploadedImage->getRealPath());
                        break;
                    default:
                        throw new \Exception('Unsupported image type');
                }

                // Create true color thumbnail
                $thumbWidth = 500;
                $thumbHeight =500;
                $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

                // Fill background with white (removes transparency)
                $white = imagecolorallocate($thumb, 255, 255, 255);
                imagefill($thumb, 0, 0, $white);

                // Resize
                imagecopyresampled($thumb, $img, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

                // Save as JPEG
                imagejpeg($thumb, $uploadedImageFullPath, 100);

                // Free memory
                imagedestroy($img);
                imagedestroy($thumb);
                
                if($thumb){
                    
                    $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    ])
                    ->attach('image', fopen($uploadedImageFullPath, 'r'), 'image.png')
                    ->timeout(120) // ⬅ Increase timeout to 120 seconds
                    ->post('https://api.openai.com/v1/images/edits', [
                        'model' => 'gpt-image-1',
                        'prompt' => "Transform the person in the image to appear visibly healthier and moderately fitter — as if they have followed a balanced 90-day wellness and diet plan. 
                                     Keep their overall identity, hairstyle, face, clothing, and pose the same. 
                                     Apply gentle, natural refinements such as improved posture, slightly toned body, clearer skin, and a confident, refreshed expression. 
                                     Preserve the same background and lighting for realism. The transformation should look achievable, inspiring, and authentic — representing steady lifestyle improvement through proper diet, hydration, and daily exercise, not drastic digital alteration.",
                        'size' => '1024x1024',
                        'quality' => 'medium',
                        'output_format'=> 'jpeg',           
                        ]);
        
                    if ($response->failed()) {
                        return response()->json([
                            'error' => 'Failed to generate AI image',
                            'details' => $response->body()
                        ], 500);
                    }
        
                    $data = $response->json();
                    
                    }
                    
                // Decode and save the image locally
                $base64Image = $data['data'][0]['b64_json'];
                $aiImageContents = base64_decode($base64Image);
                $aiImagePath = 'ai_images/ai_'.$request->phone.'_' . uniqid() . '.png';
                $ai_image_success = Storage::disk('public')->put($aiImagePath, $aiImageContents);
                $aiImageNameInitial = $aiImagePath ? basename($aiImagePath) : null;
                // Get only the image name
                $aiImageName = basename($aiImagePath);
                if ($request->hasFile('image')) {
            // Store uploaded image
                
                $ai_image_success = "Hello";
                $aiImageNameInitial = $aiImagePath ? basename($aiImagePath) : null;
                $healthConditions = $request->health_condition;
                
                if (is_array($healthConditions)) {
                    $healthConditions = implode(', ', $healthConditions);
                }
                
                $healthConditions = $healthConditions ?? '';

                if ($ai_image_success) {
                    $chatPrompt = "
                    Generate a very practical and easy-to-follow 90-day diet and exercise plan for:
                    Name: {$request->name}
                    Age: {$request->age}
                    Gender: {$request->gender}
                    BMI: {$bmi} ({$category})
                    Diet Type: {$request->diet}
                    Weight: {$request->weight}
                    Lifestyle: {$request->lifestyle}
                    Health Condition: {{ $healthConditions }}
                    Country: {$request->country}
                    
                    Goal:
                    Create a highly result-oriented plan that helps reduce BMI naturally in 90 days with clear, simple weekly steps.
                    The plan should feel intense and motivating, but still realistic for a person living in {$request->country}.
                    
                    Style:
                    Structure the plan by week (Week 1 to Week 12).
                    For each week, clearly include:
                    
                    **Week Title (e.g., Week 1 – Getting Started)**  
                    **Morning Routine:** (wake-up time, water, yoga, meditation, walk, etc.)  
                    **Daily Meal Plan:**  
                    - Breakfast  
                    - Mid-morning Snack  
                    - Lunch  
                    - Evening Snack  
                    - Dinner  
                    **Exercise Focus:** daily or weekly pattern with progressive intensity  
                    **Motivation Tip of the Week:** one short, inspiring line
                    
                     Additional instructions:
                    - Mention if the plan is suitable for someone with Lifestyle: {$request->lifestyle} - routine and whose current health condition is {$healthConditions}.
                    - Recommend intensity gradually (start easy → medium → more active by week 4 onward)
                    - Write in **clear, friendly, easy-to-understand tone**.
                    - weekly data and a summary note only no other data required.
                    - use html body all heading will be in h4 tag and section will end by hr tag compulsory including the summary section 
                    ";

 

                        $planResponse = Http::withHeaders([
                            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                            'Content-Type' => 'application/json',
                        ])
                        ->timeout(120) // ⬅ Increase timeout to 120 seconds
                        ->post('https://api.openai.com/v1/chat/completions', [
                            'model' => 'gpt-4o-mini',
                            'messages' => [
                                ['role' => 'system', 'content' => 'You are a certified nutrition and fitness expert.'],
                                ['role' => 'user', 'content' => $chatPrompt]
                            ],
                            'temperature' => 0.8,
                        ]);

                        if ($planResponse->successful()) {
                            $dietPlan = $planResponse['choices'][0]['message']['content'] ?? 'Plan not generated.';
                        }
                        
                        if ($planResponse->failed()) {
                            Log::error("Diet plan generation failed for user {$request->phone}", [
                                'response' => $planResponse->body()
                            ]);
                            return;
                        }
                        
                         $dietPlan = $planResponse['choices'][0]['message']['content'] ?? 'Plan not generated.';

                        // Step 5: Check if plan is valid before saving
                        if ($dietPlan === 'Plan not generated.' || empty(trim($dietPlan))) {
                            \Log::warning("Diet plan not generated for user ID: )");
                            return; // Stop further execution for this user
                        }
                        

                    // --- Convert Markdown-like AI text to HTML ---
                    
                            // 1. Convert "####" to <h4> BEFORE shorter heading matches
                            $dietPlan = preg_replace('/^####\s*(.+)$/m', '
                                        <div class="content-page">
                                            <div class="plan"><h4>$1</h4>', $dietPlan);
                                        
                                      // Replace each <h4> (start of a week) with your header wrapper
                                        $dietPlan = preg_replace(
                                            '/<h4>(.*?)<\/h4>/i',
                                            '<div class="content-page"><div class="plan"><h4>$1</h4>',
                                            $dietPlan
                                        );
                                        
                                        // Replace each <hr> (end of a week) with footer wrapper and closing divs
                                        $dietPlan = preg_replace(
                                            '/<hr\s*\/?>/i',
                                            '<hr></div><div class="footer-wave"></div></div>',
                                            $dietPlan
                                        );
                                    $dietPlan = preg_replace('/^```html\s*/i', '', $dietPlan);
                                    // Remove ```markdown
                                    $dietPlan = preg_replace('/^```markdown\s*/i', '', $dietPlan);
            
                                    $dietPlan = preg_replace('/```$/i', '', $dietPlan);
                                    $dietPlan = trim($dietPlan);

                        
                    
                        $pdfData = [
                            'name' => $request->name,
                            'age' => $request->age,
                            'gender' => $request->gender,
                            'state' => $request->country,
                            'phone' => $request->phone,
                            'height' => "{$request->height_feet}' {$request->height_inches}\"",
                            'weight' => "{$request->weight} kg",
                            'bmi' => $bmi,
                            'category' => $category,
                            'diet' => $request->diet,
                            'lifestyle' => $request->lifestyle,
                            'health_condition' => $request->health_condition 
                                                    ? implode(', ', $request->health_condition) 
                                                    : '',
                            'uploaded_image' => $uploadedImageName,
                            'ai_image' => $aiImageName,
                            'diet_plan' => $dietPlan,
                        ];
                
                        // Create and store PDF
                        $pdf = Pdf::loadView('pdf.bmi_report', $pdfData)->setPaper('a4', 'portrait');
                
                        // Save to storage
                        $pdfFileName = 'bmi_reports/'.$request->phone.'_'. uniqid('bmi_report_') . '.pdf';
                        Storage::disk('public')->put($pdfFileName, $pdf->output());
                        $pdfUrl = Storage::url($pdfFileName);
                
                        // Send WhatsApp message via WasenderAPI HTTP request
                        
                          
                            $client = new Client();
                            $apiKey = '2d5d5c0eebc8be3edfe405a6b47ef05c987ebf51742883fee2af2997dc7feb56'; // better to store in .env
                        
                        
                            $response = $client->post('https://wasenderapi.com/api/send-message', [
                                'headers' => [
                                    'Authorization' => 'Bearer ' . $apiKey,
                                    'Accept' => 'application/json',
                                ],
                                'json' => [
                                    'to' => $request->phone,
                                    'text' => "Hello,This is Rishabh Rajesh Jha.Your Health Report is ready — including your BMI, diet, exercise plan & transformation preview.\n\n🌟 Because real change starts with one scan.\n\nHere’s your personalized report attached:",                
                                    'documentUrl' => 'https://diabetesday.demotestsite.link/storage/' . $pdfFileName,
                                    'fileName' => 'Personalized BMI Report.pdf',
                                ],
                            ]);
                            
                        

                           // Decode response JSON
                            $responseBody = json_decode($response->getBody()->getContents(), true);
                            
                            // Extract msgId safely
                            $msgId = $responseBody['data']['msgId'] ?? null;
                            $msgResponse = $responseBody['data']['status'] ?? null;
                            
                            // Update user record
                                      
                            Log::info($response->getBody()->getContents());
                
                            Log::info("Diet plan successfully generated for user {$request->phone} having plan response as : $planResponse and with Diet Plan : $dietPlan");
                    
                }else{
                    return response()->json([
                                        'success' => false,
                                        'message' => 'Sorry, too many users are using our application, please try after some time..'
                                    ], 403);
                    Log::info("AI Image Diet plan successfully not generated for user {$user->phone}");
                }
                    
                
                return response()->json([
                    'bmi' => $bmi,
                    'category' => $category,
                    'uploaded_image' => $uploadedImagePath ? Storage::url($uploadedImagePath) : null,
                    'pdf_report' => $pdfUrl,
                ]);
        
            }else{
                    return response()->json([
                                        'success' => false,
                                        'message' => 'Sorry, too many users are using our application, please try after some time..'
                                    ], 403);
                    Log::info("AI Image Diet plan successfully not generated for user {$user->phone}having plan response as : $planResponse and with Diet Plan : $dietPlan");
                }
                    
                
                return response()->json([
                    'bmi' => $bmi,
                    'category' => $category,
                    'uploaded_image' => $uploadedImagePath ? Storage::url($uploadedImagePath) : null,
                    'pdf_report' => $pdfUrl,
                ]);
        
            }

        } //try block ends.
        catch (\Exception $e) {
            // Catch any unexpected exceptions
            Log::error('Fresh Store Operation error: ' . $e->getMessage());
            return response()->json([
                    'success' => false,
                    'message' => 'Sorry, too many users are using our application, please try after some time....'
                ], 403);
        }
    
    }
    
}
