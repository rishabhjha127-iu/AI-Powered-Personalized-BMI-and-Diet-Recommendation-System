@extends('layouts.guestapp')

@section('content')
<!-- Loading Modal -->
<!-- Fullscreen BMI Loading Modal -->
<div id="bmiLoadingModal" class="bmi-loading-modal justify-content-center align-items-center">
    <div class="bmi-loading-content text-center">
        <lottie-player 
            src="{{ asset('Images/animation/5BmzrKr7O7.json') }}"  
            background="transparent"  
            speed="1"  
            style="width: 200px; height: 200px;"  
            loop  
            autoplay>
        </lottie-player>
        <p class="bmi-pulse-text mt-3">Your BMI is getting calculated, please wait...</p>
        <p id="bmiFact" class="mt-2 fst-italic text-secondary"></p>

    </div>
</div>

<style>
/* Modal Overlay */
/* Make the modal cover the whole screen */
.bmi-loading-modal {
    display: none; /* ✅ Hide on page load */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1050;
}


/* Optional: style content */
.bmi-loading-content {
    background: #fff; /* optional white box */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.bmi-loading-content.text-center {
    text-align: -webkit-center !important;
}

/* Pulse text */
.bmi-pulse-text {
    animation: pulse 1.5s infinite;
    font-weight: bold;
    color: #0072ce;
}

@keyframes pulse {
    0% { opacity: 0.3; }
    50% { opacity: 1; }
    100% { opacity: 0.3; }
}

.bmi-countdown-text {
    color: #007bff;
    font-size: 1.1rem;
    animation: fadeInOut 0.8s ease-in-out infinite;
}

@keyframes fadeInOut {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 1; }
}

</style>

<!-- resources/views/partials/power-in-control.blade.php -->


<style>
.power-bar {
    background: linear-gradient(90deg, #0072ce, #4da6ff);
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    position: relative;
    overflow: hidden;
}

/* Text pulse animation */
.pulse-text {
    display: inline-block;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 30%, 60%, 100% {
        transform: scale(1);
        text-shadow: 0 0 0px rgba(255, 255, 255, 0.7);
    }
    15%, 45% {
        transform: scale(1.1);
        text-shadow: 0 0 20px rgba(255, 255, 255, 1);
    }
}

</style>


<section class="diabetes-banner text-center mt-2">
    <div class="container py-4">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h2 class="fw-bold text-uppercase text-primary mb-1">AI-Powered Personalized BMI and Diet Recommendation System</h2>
            <h3 class="banner-text">By Rishabh Rajesh Jha</h3>
        </div>
    </div>
</section>

<style>
.diabetes-banner {
    background-color: #e6f2ff; /* soft blue background */
    border-top: 8px solid #0072ce; /* WHO blue */
    border-bottom: 8px solid #0072ce;
}

.diabetes-banner .banner-text {
    font-family: 'Segoe Script', cursive;
    color: #0072ce;
    font-size: 1.8rem;
}
</style>
    
    
<div class="container mt-5">
   
    <section class="bmi-section py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="bmi-title">💪 Calculate Your BMI</h2>
            <p class="bmi-subtitle">Take control of your health — stay aware, stay in control.</p>
        </div>

        <form id="bmiForm" method="post" action="{{ route('calculate.bmi') }}" enctype="multipart/form-data" class="bmi-form shadow-lg p-4 rounded">
            @csrf
            <div class="container mt-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h4 class="mb-4 text-primary fw-semibold border-bottom pb-2">
                            Personal Information
                        </h4>
            
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                            </div>
            
                            <!-- Age -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Age</label>
                                <input type="number" class="form-control" name="age" placeholder="Enter age" required>
                            </div>
            
                            <!-- Gender -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            
                            <!-- State -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Country</label>
                                <select class="form-select" name="country" id="country" required>
                                    <option value="">Select Country</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                    <option>Andorra</option>
                                    <option>Angola</option>
                                    <option>Antigua and Barbuda</option>
                                    <option>Argentina</option>
                                    <option>Armenia</option>
                                    <option>Australia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Bahamas</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Barbados</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bhutan</option>
                                    <option>Bolivia</option>
                                    <option>Bosnia and Herzegovina</option>
                                    <option>Botswana</option>
                                    <option>Brazil</option>
                                    <option>Brunei</option>
                                    <option>Bulgaria</option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi</option>
                                    <option>Cabo Verde</option>
                                    <option>Cambodia</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                    <option>Central African Republic</option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>Colombia</option>
                                    <option>Comoros</option>
                                    <option>Congo (Congo-Brazzaville)</option>
                                    <option>Costa Rica</option>
                                    <option>Croatia</option>
                                    <option>Cuba</option>
                                    <option>Cyprus</option>
                                    <option>Czechia (Czech Republic)</option>
                                    <option>Democratic Republic of the Congo</option>
                                    <option>Denmark</option>
                                    <option>Djibouti</option>
                                    <option>Dominica</option>
                                    <option>Dominican Republic</option>
                                    <option>Ecuador</option>
                                    <option>Egypt</option>
                                    <option>El Salvador</option>
                                    <option>Equatorial Guinea</option>
                                    <option>Eritrea</option>
                                    <option>Estonia</option>
                                    <option>Eswatini (fmr. "Swaziland")</option>
                                    <option>Ethiopia</option>
                                    <option>Fiji</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Ghana</option>
                                    <option>Greece</option>
                                    <option>Grenada</option>
                                    <option>Guatemala</option>
                                    <option>Guinea</option>
                                    <option>Guinea-Bissau</option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Holy See</option>
                                    <option>Honduras</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Ireland</option>
                                    <option>Israel</option>
                                    <option>Italy</option>
                                    <option>Jamaica</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Kenya</option>
                                    <option>Kiribati</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Laos</option>
                                    <option>Latvia</option>
                                    <option>Lebanon</option>
                                    <option>Lesotho</option>
                                    <option>Liberia</option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Madagascar</option>
                                    <option>Malawi</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands</option>
                                    <option>Mauritania</option>
                                    <option>Mauritius</option>
                                    <option>Mexico</option>
                                    <option>Micronesia</option>
                                    <option>Moldova</option>
                                    <option>Monaco</option>
                                    <option>Mongolia</option>
                                    <option>Montenegro</option>
                                    <option>Morocco</option>
                                    <option>Mozambique</option>
                                    <option>Myanmar (Burma)</option>
                                    <option>Namibia</option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands</option>
                                    <option>New Zealand</option>
                                    <option>Nicaragua</option>
                                    <option>Niger</option>
                                    <option>Nigeria</option>
                                    <option>North Korea</option>
                                    <option>North Macedonia</option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>Palau</option>
                                    <option>Palestine State</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea</option>
                                    <option>Paraguay</option>
                                    <option>Peru</option>
                                    <option>Philippines</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Qatar</option>
                                    <option>Romania</option>
                                    <option>Russia</option>
                                    <option>Rwanda</option>
                                    <option>Saint Kitts and Nevis</option>
                                    <option>Saint Lucia</option>
                                    <option>Saint Vincent and the Grenadines</option>
                                    <option>Samoa</option>
                                    <option>San Marino</option>
                                    <option>Sao Tome and Principe</option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal</option>
                                    <option>Serbia</option>
                                    <option>Seychelles</option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore</option>
                                    <option>Slovakia</option>
                                    <option>Slovenia</option>
                                    <option>Solomon Islands</option>
                                    <option>Somalia</option>
                                    <option>South Africa</option>
                                    <option>South Korea</option>
                                    <option>South Sudan</option>
                                    <option>Spain</option>
                                    <option>Sri Lanka</option>
                                    <option>Sudan</option>
                                    <option>Suriname</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Syria</option>
                                    <option>Tajikistan</option>
                                    <option>Tanzania</option>
                                    <option>Thailand</option>
                                    <option>Timor-Leste</option>
                                    <option>Togo</option>
                                    <option>Tonga</option>
                                    <option>Trinidad and Tobago</option>
                                    <option>Tunisia</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>Tuvalu</option>
                                    <option>Uganda</option>
                                    <option>Ukraine</option>
                                    <option>United Arab Emirates</option>
                                    <option>United Kingdom</option>
                                    <option>United States</option>
                                    <option>Uruguay</option>
                                    <option>Uzbekistan</option>
                                    <option>Vanuatu</option>
                                    <option>Venezuela</option>
                                    <option>Vietnam</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe</option>
                                </select>

                            </div>
                        </div>
            
                        <hr class="my-4">
            
                        <h5 class="mb-3 text-primary fw-semibold">Contact Details</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="WhatsApp number" required>
                                <small class="text-muted">Enter your active WhatsApp number</small>
                            </div>
                        </div>
            
                        <hr class="my-4">
            
                        <h5 class="mb-3 text-primary fw-semibold">Body Measurements</h5>
                        <div class="row g-3">
                            <!-- Height (feet) -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Height (Feet)</label>
                                <select class="form-select" name="height_feet" required>
                                    <option value="">Select feet</option>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">{{ $i }} ft</option>
                                    @endfor
                                </select>
                            </div>
            
                            <!-- Height (inches) -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Height (Inches)</label>
                                <select class="form-select" name="height_inches" required>
                                    <option value="">Select inches</option>
                                    @for ($i = 0; $i <= 11; $i++)
                                        <option value="{{ $i }}">{{ $i }} in</option>
                                    @endfor
                                </select>
                            </div>
            
                            <!-- Weight -->
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Weight (kg)</label>
                                <input type="number" class="form-control" name="weight" placeholder="Enter weight" required>
                            </div>
                        </div>
                        
                        <hr class="my-4">

                            <h5 class="mb-3 text-primary fw-semibold">Health Condition</h5>
                            <p class="text-muted mb-2">Select all that apply</p>
                            <div class="row">
                                @php
                                    $conditions = [
                                        'None',
                                        'Diabetes',
                                        'High BP',
                                        'Low BP',
                                        'Cholesterol',
                                        'Thyroid',
                                        'PCOD / PCOS',
                                        'Obesity / Overweight',
                                        'Heart Disease',
                                        'Kidney Issue',
                                        'Liver Issue',
                                        'Anemia',
                                        'Digestive Issue',
                                        'Joint Pain / Arthritis',
                                        'Asthma / Breathing Problem',
                                        'Other',
                                    ];
                                @endphp
                            
                                @foreach ($conditions as $condition)
                                    <div class="col-md-3 col-6 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="health_condition[]" 
                                                   value="{{ $condition }}" id="{{ Str::slug($condition) }}">
                                            <label class="form-check-label" for="{{ Str::slug($condition) }}">
                                                {{ $condition }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            
                                <div class="col-md-6 mt-2">
                                    <input type="text" class="form-control" name="other_health_condition" 
                                           placeholder="If Other, please specify">
                                </div>
                            </div>

            
                        <hr class="my-4">
            
                        <h5 class="mb-3 text-primary fw-semibold">Lifestyle & Diet</h5>
                        <div class="row g-3">
                            <!-- Diet -->
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Food Diet</label>
                                <select class="form-select" name="diet" required>
                                    <option value="">Select Diet</option>
                                    <option value="Veg">Veg</option>
                                    <option value="Nonveg">Nonveg</option>
                                    <option value="Veg and Nonveg">Both</option>
                                </select>
                            </div>
            
                            <!-- Lifestyle -->
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Current Lifestyle</label>
                                <select class="form-select" name="lifestyle" required>
                                    <option value="">Select Lifestyle / Occupation</option>
                                    <option value="Office Job">Office Job / Desk Job</option>
                                    <option value="Remote Work">Remote Work / Work from Home</option>
                                    <option value="Student">Student</option>
                                    <option value="Retired">Retired</option>
                                    <option value="Healthcare Worker">Healthcare Worker</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Delivery Worker">Delivery / Field Worker</option>
                                    <option value="Construction">Construction / Labor</option>
                                    <option value="Sportsman">Sportsman / Athlete</option>
                                    <option value="Gym Trainer">Gym Trainer / Fitness Coach</option>
                                    <option value="Business Owner">Business Owner / Entrepreneur</option>
                                    <option value="Freelancer">Freelancer / Consultant</option>
                                    <option value="Homemaker">Homemaker / Stay-at-Home</option>
                                    <option value="Military">Military / Defense Personnel</option>
                                    <option value="Driver">Driver / Transport Worker</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                       <hr class="my-4">
            
                        <h5 class="mb-3 text-primary fw-semibold">Upload & Consent</h5>
                <!-- Image Upload -->
                
                <div class="col-md-6">
                    <label class="form-label d-block">Upload Your Current Photo</label>
                    <small class="text-danger d-block mb-2">(Ensure your face and body are clearly visible)</small>
                    <div class="upload-wrapper position-relative d-inline-block mb-2">
                        <img id="imagePreview"
                             src="{{ asset('Images/dummy-avatar.jpg') }}"
                             class="img-thumbnail"
                             style="width:120px; height:120px; border-radius:10px; cursor:pointer;">
                        <span id="removeImage" class="remove-icon">×</span>
                    </div>
                    <input type="file" class="d-none" name="image" id="image" accept="image/*">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary btn-sm" id="cameraBtn">📸 Take a Picture</button>
                        <button type="button" class="btn btn-outline-primary btn-sm" id="galleryBtn">🖼️ Upload from Gallery</button>
                    </div>
                </div>

                <!-- Terms -->
                <div class="col-12 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tncCheckbox" checked onclick="return false;">
                        <label class="form-check-label">
                            I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#tncModal"><u>Terms & Conditions</u></a>
                        </label>
                    </div>
                </div>
                    
                    
                </div>
            </div>



                     

                <!-- Submit -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2">Submit BMI</button>
                </div>
            </div>
        </form>

        <!-- BMI Result -->
        <div class="mt-4 text-center" id="bmiResultContainer" style="display:none;">
            <h5 class="fw-bold">Your BMI Result:</h5>
            <div id="bmiResult" class="alert text-center fw-bold" role="alert"></div>
        </div>
    </div>
</section>

<!-- Image Editor Modal -->
<div class="modal fade" id="imageEditorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adjust Your Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img id="imageEditorPreview" style="max-width:100%; max-height:400px;">
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-outline-secondary btn-sm" id="rotateLeft">⟲ Rotate Left</button>
          <button type="button" class="btn btn-outline-secondary btn-sm" id="rotateRight">⟳ Rotate Right</button>
          <button type="button" class="btn btn-outline-secondary btn-sm" id="resetCrop">🔁 Reset</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm" id="saveCropped">Save</button>
      </div>
    </div>
  </div>
</div>

<style>
/* Section Base */
.bmi-section {
    background-color: #f0f8ff;
}

/* Headings */
.bmi-title {
    color: #0072ce;
    font-weight: 700;
}

.bmi-subtitle {
    color: #333;
    font-size: 1rem;
}

/* Form Card */
.bmi-form {
    background-color: #fff;
    border-left: 6px solid #0072ce;
    transition: all 0.3s ease;
}

.bmi-form:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 15px rgba(0, 114, 206, 0.2);
}

/* Upload Image */
.upload-wrapper img {
    border: 2px solid #0072ce;
    transition: transform 0.3s ease;
}

.upload-wrapper img:hover {
    transform: scale(1.05);
}

.remove-icon {
    position: absolute;
    top: -5px;
    right: -5px;
    background: red;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    cursor: pointer;
    font-weight: bold;
    display: none;
}

.btn-primary {
    background-color: #0072ce;
    border-color: #0072ce;
}

.btn-primary:hover {
    background-color: #005bb5;
}

/* BMI Result */
#bmiResult {
    font-size: 1.2rem;
    padding: 15px;
}
</style>

</div>
@endsection

@section('scripts')
<!-- Make sure jQuery is loaded -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
let cropper;
const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('imagePreview');
const removeImage = document.getElementById('removeImage');
const cameraBtn = document.getElementById('cameraBtn');
const galleryBtn = document.getElementById('galleryBtn');
const defaultImage = "{{ asset('Images/dummy-avatar.jpg') }}";
const imageEditorModal = new bootstrap.Modal(document.getElementById('imageEditorModal'));
const imageEditorPreview = document.getElementById('imageEditorPreview');

// --- Camera button
cameraBtn.addEventListener('click', () => {
    imageInput.setAttribute('capture', 'environment');
    imageInput.click();
});

// --- Gallery button
galleryBtn.addEventListener('click', () => {
    imageInput.removeAttribute('capture');
    imageInput.click();
});

// --- When user selects image
imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        imageEditorPreview.src = e.target.result;
        imageEditorModal.show();

        setTimeout(() => {
            if (cropper) cropper.destroy();
            cropper = new Cropper(imageEditorPreview, {
                aspectRatio: 3 / 4, // vertical portrait
                viewMode: 1,
                autoCropArea: 1,
                movable: true,
                zoomable: true,
                rotatable: true,
                responsive: true,
            });
        }, 200);
    };
    reader.readAsDataURL(file);
});

// --- Wait until modal is shown before binding rotate events
document.getElementById('imageEditorModal').addEventListener('shown.bs.modal', function () {
    // Rotate Left
    document.getElementById('rotateLeft').onclick = () => {
        if (cropper) cropper.rotate(-90);
    };

    // Rotate Right
    document.getElementById('rotateRight').onclick = () => {
        if (cropper) cropper.rotate(90);
    };

    // Reset Crop
    document.getElementById('resetCrop').onclick = () => {
        if (cropper) cropper.reset();
    };
});

// --- Save Cropped Image
document.getElementById('saveCropped').onclick = function () {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({
        width: 600,
        height: 800,
        imageSmoothingQuality: 'high'
    });

    canvas.toBlob(function (blob) {
        const croppedFile = new File([blob], "cropped-image.jpg", { type: 'image/jpeg' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(croppedFile);
        imageInput.files = dataTransfer.files;

        // Trigger input change so form can submit later
        const event = new Event('change', { bubbles: true });
        imageInput.dispatchEvent(event);

        imagePreview.src = canvas.toDataURL();
        removeImage.style.display = 'flex';
        imageEditorModal.hide();

        // Destroy cropper after saving
        cropper.destroy();
        cropper = null;
    }, 'image/jpeg', 0.9);
};

// --- Remove image
removeImage.addEventListener('click', () => {
    imagePreview.src = defaultImage;
    imageInput.value = '';
    removeImage.style.display = 'none';
});
</script>



<script>
    $(document).ready(function() {

    $('#bmiForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        // Show loading modal
        $('#bmiLoadingModal').addClass('d-flex').fadeIn();
         // Array of fun BMI/health facts
        const facts = [
            "Did you know? A healthy BMI can reduce the risk of heart disease.",
            "Fun fact: Walking 30 minutes a day helps maintain a healthy BMI!",
            "Tip: BMI is just one measure, muscle mass also matters.",
            "Interesting: BMI was invented in the 1800s by Adolphe Quetelet.",
            "Health fact: Even a 5% weight loss can improve your BMI health score.",
            "Did you know? BMI is used worldwide as a quick health indicator.",
            "Tip: Eating more fiber can help you maintain a healthy BMI.",
            "Fun fact: BMI doesn’t differentiate between muscle and fat!"
        ];
        
        // Show random fact every 2 seconds
        let factInterval = setInterval(() => {
            let randomFact = facts[Math.floor(Math.random() * facts.length)];
            $('#bmiFact').fadeOut(300, function() {
                $(this).text(randomFact).fadeIn(300);
            });
        }, 4000);


        $.ajax({
            url: "{{ route('calculate.bmi') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                // --- Countdown animation before hiding modal ---
                let countdown = 3;
                let messageEl = $('<p class="bmi-countdown-text mt-2 fw-bold"></p>').appendTo('.bmi-loading-content');

                function updateCountdown() {
                    messageEl.text(`Calculation complete in ${countdown}...`);
                    countdown--;

                    if (countdown >= 0) {
                        setTimeout(updateCountdown, 800);
                    } else {
                        // Fade out modal smoothly
                        $('#bmiLoadingModal').fadeOut(800, function() {
                            $('#bmiLoadingModal').removeClass('d-flex');
                            messageEl.remove(); // clean up
                        });

                        // Now show results
                        showBMIResult(response);
                    }
                }

                updateCountdown(); // Start countdown
            },
            //error: function(xhr) {
              //  $('#bmiLoadingModal').fadeOut(500).removeClass('d-flex');
              //  alert("Something went wrong! Please try again.");
            //}
            error: function(xhr) {
                $('#bmiLoadingModal').fadeOut(500).removeClass('d-flex');

                if (xhr.status === 422) { // Validation error
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = [];

                    $.each(errors, function(key, messages) {
                        // messages is an array for each field
                        errorMessages.push(messages[0]); // Show only first message per field
                    });

                    // Show errors (you can customize how to display)
                    alert(errorMessages.join("\n"));
                } 
                else if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert(xhr.responseJSON.message); // Handles custom error messages
                } 
                else {
                            alert("Something went wrong! Please try again.");
                        }
                }
        });
    });

    // Function to show BMI result (to keep code clean)
    function showBMIResult(response) {
        let resultContainer = $('#bmiResultContainer');
        let resultBox = $('#bmiResult');

        resultContainer.show();

        let alertClass = '';
        if (response.category === 'Underweight') {
            alertClass = 'alert-warning';
        } else if (response.category === 'Normal weight') {
            alertClass = 'alert-success';
        } else if (response.category === 'Overweight') {
            alertClass = 'alert-info';
        } else if (response.category === 'Obese') {
            alertClass = 'alert-danger';
        }

        resultBox
            .removeClass('alert-warning alert-success alert-info alert-danger')
            .addClass(alertClass)
            .text(`Your BMI is ${response.bmi} (${response.category})`);

        if (response.image) {
            $('#bmiResult').append(
                `<div class="mt-3 text-center">
                    <img src="{{ asset('storage/') }}/${response.image}" 
                         class="img-fluid mt-3 rounded shadow-sm" 
                         width="500" alt="Uploaded Image">
                </div>`
            );
        }
        
        // Append the Diet Plan message
        // $('#bmiResult').append(
        //     `<div class="mt-3 alert alert-info text-center">
        //         <small>Your next step is ready: diet, exercise & PowerlnControl plan will be sent to WhatsApp.</small>
        //         <br><br>
        
        //     </div>`
        // );
        
        $('#bmiResult').append(
            `<div class="mt-3 alert alert-info text-center">
                <small>Your next step is ready: diet, exercise & PowerlnControl plan will be sent to WhatsApp.</small>
                <br><br>
            <button id="downloadBtn" class="btn btn-primary px-5 py-2">
                Click here to download your report now
            </button>
            </div>`
        );
        
         // Attach click handler dynamically
        $('#downloadBtn').on('click', function() {
            if (response.pdf_report) {
                window.open(response.pdf_report, '_blank'); // open in new tab
                // OR force download:
                // const a = document.createElement('a');
                // a.href = response.pdf_report;
                // a.download = '#PowerInControl Personalized BMI Report.pdf';
                // document.body.appendChild(a);
                // a.click();
                // document.body.removeChild(a);
            } else {
                alert('PDF not available.');
            }
        });

        $('#bmiResultContainer').slideDown(800, function() {
            $('html, body').animate({
                scrollTop: $('#bmiResultContainer').offset().top
            }, 800);
        });
    }
});

</script>

<script>
$(document).ready(function() {
    // Country calling codes map
    const countryCodes = {
  "Afghanistan": "+93",
  "Albania": "+355",
  "Algeria": "+213",
  "Andorra": "+376",
  "Angola": "+244",
  "Antigua and Barbuda": "+1-268",
  "Argentina": "+54",
  "Armenia": "+374",
  "Australia": "+61",
  "Austria": "+43",
  "Azerbaijan": "+994",
  "Bahamas": "+1-242",
  "Bahrain": "+973",
  "Bangladesh": "+880",
  "Barbados": "+1-246",
  "Belarus": "+375",
  "Belgium": "+32",
  "Belize": "+501",
  "Benin": "+229",
  "Bhutan": "+975",
  "Bolivia": "+591",
  "Bosnia and Herzegovina": "+387",
  "Botswana": "+267",
  "Brazil": "+55",
  "Brunei": "+673",
  "Bulgaria": "+359",
  "Burkina Faso": "+226",
  "Burundi": "+257",
  "Cabo Verde": "+238",
  "Cambodia": "+855",
  "Cameroon": "+237",
  "Canada": "+1",
  "Central African Republic": "+236",
  "Chad": "+235",
  "Chile": "+56",
  "China": "+86",
  "Colombia": "+57",
  "Comoros": "+269",
  "Congo (Brazzaville)": "+242",
  "Democratic Republic of the Congo": "+243",
  "Costa Rica": "+506",
  "Croatia": "+385",
  "Cuba": "+53",
  "Cyprus": "+357",
  "Czechia": "+420",
  "Denmark": "+45",
  "Djibouti": "+253",
  "Dominica": "+1-767",
  "Dominican Republic": "+1-809",
  "Ecuador": "+593",
  "Egypt": "+20",
  "El Salvador": "+503",
  "Equatorial Guinea": "+240",
  "Eritrea": "+291",
  "Estonia": "+372",
  "Eswatini": "+268",
  "Ethiopia": "+251",
  "Fiji": "+679",
  "Finland": "+358",
  "France": "+33",
  "Gabon": "+241",
  "Gambia": "+220",
  "Georgia": "+995",
  "Germany": "+49",
  "Ghana": "+233",
  "Greece": "+30",
  "Grenada": "+1-473",
  "Guatemala": "+502",
  "Guinea": "+224",
  "Guinea-Bissau": "+245",
  "Guyana": "+592",
  "Haiti": "+509",
  "Holy See": "+379",
  "Honduras": "+504",
  "Hungary": "+36",
  "Iceland": "+354",
  "India": "+91",
  "Indonesia": "+62",
  "Iran": "+98",
  "Iraq": "+964",
  "Ireland": "+353",
  "Israel": "+972",
  "Italy": "+39",
  "Jamaica": "+1-876",
  "Japan": "+81",
  "Jordan": "+962",
  "Kazakhstan": "+7",
  "Kenya": "+254",
  "Kiribati": "+686",
  "Kuwait": "+965",
  "Kyrgyzstan": "+996",
  "Laos": "+856",
  "Latvia": "+371",
  "Lebanon": "+961",
  "Lesotho": "+266",
  "Liberia": "+231",
  "Libya": "+218",
  "Liechtenstein": "+423",
  "Lithuania": "+370",
  "Luxembourg": "+352",
  "Madagascar": "+261",
  "Malawi": "+265",
  "Malaysia": "+60",
  "Maldives": "+960",
  "Mali": "+223",
  "Malta": "+356",
  "Marshall Islands": "+692",
  "Mauritania": "+222",
  "Mauritius": "+230",
  "Mexico": "+52",
  "Micronesia": "+691",
  "Moldova": "+373",
  "Monaco": "+377",
  "Mongolia": "+976",
  "Montenegro": "+382",
  "Morocco": "+212",
  "Mozambique": "+258",
  "Myanmar": "+95",
  "Namibia": "+264",
  "Nauru": "+674",
  "Nepal": "+977",
  "Netherlands": "+31",
  "New Zealand": "+64",
  "Nicaragua": "+505",
  "Niger": "+227",
  "Nigeria": "+234",
  "North Korea": "+850",
  "North Macedonia": "+389",
  "Norway": "+47",
  "Oman": "+968",
  "Pakistan": "+92",
  "Palau": "+680",
  "Palestine": "+970",
  "Panama": "+507",
  "Papua New Guinea": "+675",
  "Paraguay": "+595",
  "Peru": "+51",
  "Philippines": "+63",
  "Poland": "+48",
  "Portugal": "+351",
  "Qatar": "+974",
  "Romania": "+40",
  "Russia": "+7",
  "Rwanda": "+250",
  "Saint Kitts and Nevis": "+1-869",
  "Saint Lucia": "+1-758",
  "Saint Vincent and the Grenadines": "+1-784",
  "Samoa": "+685",
  "San Marino": "+378",
  "Sao Tome and Principe": "+239",
  "Saudi Arabia": "+966",
  "Senegal": "+221",
  "Serbia": "+381",
  "Seychelles": "+248",
  "Sierra Leone": "+232",
  "Singapore": "+65",
  "Slovakia": "+421",
  "Slovenia": "+386",
  "Solomon Islands": "+677",
  "Somalia": "+252",
  "South Africa": "+27",
  "South Korea": "+82",
  "South Sudan": "+211",
  "Spain": "+34",
  "Sri Lanka": "+94",
  "Sudan": "+249",
  "Suriname": "+597",
  "Sweden": "+46",
  "Switzerland": "+41",
  "Syria": "+963",
  "Tajikistan": "+992",
  "Tanzania": "+255",
  "Thailand": "+66",
  "Timor-Leste": "+670",
  "Togo": "+228",
  "Tonga": "+676",
  "Trinidad and Tobago": "+1-868",
  "Tunisia": "+216",
  "Turkey": "+90",
  "Turkmenistan": "+993",
  "Tuvalu": "+688",
  "Uganda": "+256",
  "Ukraine": "+380",
  "United Arab Emirates": "+971",
  "United Kingdom": "+44",
  "United States": "+1",
  "Uruguay": "+598",
  "Uzbekistan": "+998",
  "Vanuatu": "+678",
  "Venezuela": "+58",
  "Vietnam": "+84",
  "Yemen": "+967",
  "Zambia": "+260",
  "Zimbabwe": "+263"
};


    // Update phone input when country changes
    $('#country').change(function() {
        const selectedCountry = $(this).val();
        const code = countryCodes[selectedCountry] || "";
        const phoneInput = $('#phone');

        // Remove any previous code
        let currentVal = phoneInput.val();
        currentVal = currentVal.replace(/^\+\d+[- ]?/, ''); // Remove old phone code

        // Prepend new code
        if(code) {
            phoneInput.val(code + " " + currentVal);
        } else {
            phoneInput.val(currentVal);
        }
    });
    const countrySelect = document.getElementById("country");
    const phoneInput = document.getElementById("phone");

    countrySelect.addEventListener("change", function () {
        let country = this.value;

        if (countryCodes[country]) {
            let code = countryCodes[country].replace(/\s+/g, ""); // REMOVE ALL SPACES
            phoneInput.value = code; 
        }
    });
});
</script>


@endsection