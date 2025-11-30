<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BMI Report - {{ $name }}</title>

<style> 
        .images {
            text-align: center;
            margin-top: 20px;
        }
        .images img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            margin: 10px;
            border-radius: 10px;
        }

        .section {
            width: 80%;
            margin: 0 auto 40px;
            text-align: left;
            font-family: Arial, sans-serif;
        }
        
        .section-title {
            text-align: center;
            color: #2b74bb;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }
        
        .info-table td {
            padding: 8px 4px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
        }
        
        .info-table .label {
            font-weight: bold;
            color: #333;
            width: 40%;
        }
        
        .info-table tr:last-child td {
            border-bottom: 2px solid #2b74bb;
        }
        
         .plan {
            white-space: pre-wrap;
            line-height: 1;
            margin-top: 10px;
        }

    </style>
    
    <style>
            @page {
                margin: 0;
                size: A4;
            }
            body {
                margin: 0;
                padding: 0;
                font-family: 'DejaVu Sans', sans-serif;
            }
    
            /* Full-page blue cover */
            .cover-page {
                position: absolute;
                top: 0;
                left: 0;
                width: 210mm;
                height: 297mm;
                background-color: #2b74bb; /* Blue shade similar to your image */
                color: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
    
            /* White border frame */
            .cover-frame {
                border: 1.5pt solid #ffffff;
                width: 75%;
                height: 70%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
    
             /* Centered content within the frame */
            .tagline {
                font-size: 14pt;
                font-weight: bold;
                margin-top: 120px;
                margin-bottom: 80px;
                letter-spacing: 0.6px;
            }
    
           .title {
                font-size: 30pt;
                font-weight: 900;
                line-height: 1.3;
                margin-top: 280px;
                margin-bottom: 100px;
            }
    
            .name {
                font-size: 15pt;
                font-weight: normal;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }
    
            .name::before,
            .name::after {
                content: "";
                display: inline-block;
                width: 15mm;
                height: 1px;
                margin:5px 15px;
                background-color: #ffffff;
            }
    
            
        /*second page onwards*/
        
        /* ---------- CONTENT PAGE STYLES ---------- */
        .content-page {
            page-break-before: always;
            position: relative;
            min-height: 297mm;
            padding: 120px 40px 100px 40px; /* Leave space for header/footer */
            background-color: #ffffff;
            color: #000;
        }
    
        /* ---------- HEADER STYLE LIKE IMAGE ---------- */
        .header-banner div {
            position: relative;
            display: inline-block;
            color: #2b74bb;
            font-weight: 800;
            font-size: 20pt;
            background: #fff; /* ensures text isn't overlapped */
            z-index: 1; /* above the lines */
            padding: 0 20px;
        }
        
        .header-banner  {
            color: #2b74bb;
            font-weight: 800;
            font-size: 20pt;
            left:0;
            margin: 0;
            padding: 0 20px;
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            z-index:1111;
        }
    
         .header-banner::before,
        .header-banner::after {
            content: "";
            position: absolute;
            top: 15px;
            left:0px;
            width: 100%;
            height: 6px;
            border-top: 3px solid #2b74bb;   /* top blue line */
            border-bottom: 3px solid #ccc;   /* bottom grey line */
            z-index: 0; /* behind text but visible */
            transform: translateY(-50%);
        }
    
     .footer-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px;
        background: #2b74bb;   /* bottom blue layer */
        overflow: hidden;
    }
    
    /* middle grey layer */
    .footer-wave::before {
        content: "";
        position: absolute;
        top: -25px;
        left: 0;
        width: 100%;
        height: 80px;
        background: #bbb;
        transform: skewY(-3deg);
        transform-origin: bottom left;
    }
    
    /* top light grey layer */
    .footer-wave::after {
        content: "";
        position: absolute;
        top: -45px;
        left: 0;
        width: 100%;
        height: 80px;
        background: #e6e6e6;
        transform: skewY(-2deg);
        transform-origin: bottom left;
    }
    
    </style>
</head>
<body>
    <!-- Power in Control Banner -->
    <div class="cover-page">
        <div class="cover-frame">
            <div class="tagline">By RIshabh Rajesh Jha</div>
            <div class="title">PERSONALIZED<br>BMI REPORT</div>
            <div class="name">{{ $name }}</div>
        </div>
    </div>
    
    <!-- CONTENT PAGE WITH WAVE HEADER & FOOTER -->
   <div class="content-page">
    
    <div class="section">
        <h3 class="section-title">Basic Information</h3>
    
        <table class="info-table">
            <tr>
                <td class="label">Age:</td>
                <td>{{ $age }}</td>
            </tr>
            <tr>
                <td class="label">Gender:</td>
                <td>{{ $gender }}</td>
            </tr>
            <tr>
                <td class="label">Phone:</td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td class="label">State:</td>
                <td>{{ $state }}</td>
            </tr>
            <tr>
                <td class="label">Height:</td>
                <td>{{ $height }}</td>
            </tr>
            <tr>
                <td class="label">Weight:</td>
                <td>{{ $weight }}</td>
            </tr>
            <tr>
                <td class="label">Diet Type:</td>
                <td>{{ $diet }}</td>
            </tr>
            <tr>
                <td class="label">Lifestyle:</td>
                <td>{{ $lifestyle }}</td>
            </tr>
            <tr>
                <td class="label">Health Condition:</td>
                <td>
                    @php
                        $conditions = $health_condition;
                
                        if (!is_array($conditions)) {
                            $conditions = $conditions ? [$conditions] : [];
                        }
                
                        if (!empty($other_health_condition)) {
                            $conditions[] = $other_health_condition;
                        }
                    @endphp

                    {{ !empty($conditions) ? implode(', ', $conditions) : 'None' }}
                </td>
            </tr>
        </table>
    </div>


     <div class="section">
        <h3 class="section-title">BMI Result</h3>
        
        <p><strong>BMI:</strong> {{ $bmi }}</p>
        <p><strong>Category:</strong> {{ $category }}</p>
     </div>    
        
    
    <div class="footer-wave"></div>

    </div>
    
    
    <div class="content-page">
     <div class="section">
        <h3 class="section-title"> Personalized Plan</h3>
        <strong> 90-Day Indian Diet and Exercise Plan for {{ $name }}</strong>
        <p><strong>Overview</strong></p>
        <p>This 90-day diet and exercise plan is designed specifically for you, {{ $name }}, to
help you reach a healthier BMI naturally. The plan is suitable for a {{ $lifestyle }}
lifestyle in {{ $state }}, is easy to follow, and builds intensity gradually to keep
you motivated.</p>
     </div>    
        
    
    <div class="footer-wave"></div>

    </div>
    
   
   
       
    @if($uploaded_image)
         <div class="content-page">
              <div class="section">
                    <h3 class="section-title">
                        Before & After — If You Follow the Plan
                    </h3>
                    <div class="section images">
                        <div style="display: flex; justify-content: center; align-items: center; gap: 40px; margin-top: 20px;">
                            @if($uploaded_image)
                            <div style="text-align: center;">
                                <h4 style="margin-bottom: 8px; font-size: 16px; color: #555;">Before</h4>
                                <img src="{{ public_path('storage/bmi_images/' . $uploaded_image) }}" alt="Uploaded Image" style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px; border: 2px solid #ccc;">
                            </div>
                            @endif
            
                            @if($ai_image)
                            <div style="text-align: center;">
                                <h4 style="margin-bottom: 8px; font-size: 16px; color: #555;">After</h4>
                                <img src="{{ public_path('storage/ai_images/' . $ai_image) }}"  alt="AI Generated Image" style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px; border: 2px solid #ccc;">
                            </div>
                            @endif
                        </div>
                    </div>
              </div>
            <div class="footer-wave"></div>
        </div>
    @endif
    
      

{!! $diet_plan !!}

<div class="content-page">
    
          <p>
            <strong>
                Disclaimer: This report contains AI-generated insights based on the information provided. It is intended for informational purposes only and should not replace professional medical or nutritional advice. Please consult a qualified healthcare provider before making any changes to your diet, exercise, or treatment plan.
            </strong> 
          </p>
    
        <div class="footer-wave"></div>

    </div>
    

    
   


</body> 
</html>

