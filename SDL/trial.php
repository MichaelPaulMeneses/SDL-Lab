<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Enrollment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .school-bg {
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), 
                        url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M50 0L100 50L50 100L0 50L50 0z' fill='%230d6efd' fill-opacity='0.1'/%3E%3C/svg%3E");
        }
        input[type="number"]::-webkit-inner-spin-button, 
        input[type="number"]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        .download-btn {
            cursor: pointer;
        }
        .modal-content {
            border-radius: 8px;
        }
        .modal-body {
            text-align: center;
            padding: 30px;
        }
        .circle-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #000;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* Increase the card size */
        .enrollment-card {
            max-width: 95%;
            margin: 0 auto;
        }
        /* Make form elements larger */
        .form-control, .form-select, .btn {
            padding: 10px 15px;
            font-size: 16px;
        }
        /* Increase spacing */
        .form-label {
            font-size: 16px;
            margin-bottom: 8px;
        }
        .section-header {
            font-size: 20px;
            margin-top: 25px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="school-bg">
    <!-- Privacy Notice Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="circle-icon">
                        <span>i</span>
                    </div>
                    <p class="mb-4">Notice: All data and information provided herein shall be treated with STRICT CONFIDENTIALITY in accordance to Data Privacy Act</p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <div class="mb-4">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="29" stroke="black" stroke-width="2"/>
                            <path d="M20 30L27 37L40 24" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h5 class="mb-3">Your application has been successfully submitted!</h5>
                    <p class="mb-3">We've sent a confirmation email to your registered address with a copy of your submission details. Our admissions team will review your application and contact you within 5-7 business days regarding next steps.</p>
                    <p class="mb-4">If you have any immediate questions, please contact our Admissions Office at <a href="mailto:registrar.sjbps@gmail.com">registrar.sjbps@gmail.com</a> or (02) 8296 5896 and 0920 122 5764. Thank you for choosing our school for your child's education journey!</p>
                    <button type="button" class="btn btn-primary px-4" id="goHomeBtn">Go Home</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card shadow enrollment-card">
                    <div class="card-header bg-white py-4">
                        <div class="text-center">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="m-0">St. John the Baptist Parochial School Admission Form</h4>
                                <img src="logo.jpg" alt="School Logo" class="rounded-circle" width="80" height="80">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form id="enrollmentForm" novalidate>
                            <!-- General Information Section -->
                            <h5 class="section-header fw-bold">General Information</h5>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="studentLastName" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="studentLastName" name="studentLastName" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="studentFirstName" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="studentFirstName" name="studentFirstName" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="studentMiddleName" class="form-label">Middle Name *</label>
                                        <input type="text" class="form-control" id="studentMiddleName" name="studentMiddleName" placeholder="N/A if none">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="suffix" class="form-label">Suffix</label>
                                        <select class="form-select" id="suffix" name="suffix">
                                            <option value="">None</option>
                                            <option value="Jr">Jr.</option>
                                            <option value="Sr">Sr.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="province" class="form-label">Province *</label>
                                        <select class="form-select" id="province" name="province" required>
                                            <option value="">Select Province</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="municipality" class="form-label">Municipality *</label>
                                        <select class="form-select" id="municipality" name="municipality" required>
                                            <option value="">Select Municipality</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="barangay" class="form-label">Barangay *</label>
                                        <select class="form-select" id="barangay" name="barangay" required>
                                            <option value="">Select Barangay</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="streetAddress" class="form-label">House Number, Street, Subdivision *</label>
                                        <input type="text" class="form-control" id="streetAddress" name="streetAddress" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="zipCode" class="form-label">ZIP Code *</label>
                                        <input type="tel" class="form-control" id="zipCode" name="zipCode" placeholder="Enter ZIP Code" required oninput="this.value = this.value.replace(/\D/g, '').slice(0, 5)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dateOfBirth" class="form-label">Date of Birth *</label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="placeOfBirth" class="form-label">Place of Birth *</label>
                                        <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender *</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nationality" class="form-label">Nationality *</label>
                                        <select class="form-select" id="nationality" name="nationality" required>
                                            <option value="">Select Nationality</option>
                                            <option value="Filipino">Filipino</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="religion" class="form-label">Religion *</label>
                                        <select class="form-select" id="religion" name="religion" required>
                                            <option value="">Select Religion</option>
                                            <option value="Roman Catholic">Roman Catholic</option>
                                            <option value="Protestant">Protestant</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gradeLevel" class="form-label">Previous Grade Level *</label>
                                        <select class="form-select" id="gradeLevel" name="gradeLevel" required onchange="toggleStrandSelection()">
                                            <option value="">Select Grade Level</option>
                                            <optgroup label="Early Education">
                                                <option value="preschool">Preschool</option>
                                                <option value="kindergarten">Kindergarten</option>
                                            </optgroup>
                                            <optgroup label="Elementary">
                                                <option value="1">Grade 1</option>
                                                <option value="2">Grade 2</option>
                                                <option value="3">Grade 3</option>
                                                <option value="4">Grade 4</option>
                                                <option value="5">Grade 5</option>
                                                <option value="6">Grade 6</option>
                                            </optgroup>
                                            <optgroup label="Junior High School">
                                                <option value="7">Grade 7</option>
                                                <option value="8">Grade 8</option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                            </optgroup>
                                            <optgroup label="Senior High School">
                                                <option value="11">Grade 11</option>
                                                <option value="12">Grade 12</option>
                                            </optgroup>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a grade level.
                                        </div>
                                    </div>
                                </div>

                                <!-- Strand Selection (Hidden by default) -->
                                <div class="row mb-4 d-none" id="strandSelection">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="strand" class="form-label">Senior High School Strand *</label>
                                            <select class="form-select" id="strand" name="strand" onchange="updateApplyingFor()">
                                                <option value="">Select Strand</option>
                                                <option value="STEM">Science, Technology, Engineering, and Mathematics (STEM)</option>
                                                <option value="ABM">Accountancy, Business, and Management (ABM)</option>
                                                <option value="HUMSS">Humanities and Social Sciences (HUMSS)</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a strand.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="e.g. john@gmail.com" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contactNumber" class="form-label">Contact Number *</label>
                                        <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="schoolLastAttended" class="form-label">School Last Attended *</label>
                                        <input type="text" class="form-control" id="schoolLastAttended" name="schoolLastAttended" required>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Family Background Section -->
                            <h5 class="section-header fw-bold">Family Background</h5>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fatherFullName" class="form-label">Father's Full Name *</label>
                                        <input type="text" class="form-control" id="fatherFullName" name="fatherFullName" placeholder="e.g. Juan J. Dela Cruz" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fatherOccupation" class="form-label">Father's Occupation</label>
                                        <input type="text" class="form-control" id="fatherOccupation" name="fatherOccupation" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fatherContactNumber" class="form-label">Father's Contact Number *</label>
                                        <input type="tel" class="form-control" id="fatherContactNumber" name="guardianContactNumber" placeholder="e.g. 09123456789" required oninput="this.value = this.value.replace(/\D/g, '')">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="motherFullName" class="form-label">Mother's Full Name *</label>
                                        <input type="text" class="form-control" id="motherFullName" name="motherFullName" placeholder="e.g. Maria M. Dela Cruz" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="motherOccupation" class="form-label">Mother's Occupation</label>
                                        <input type="text" class="form-control" id="motherOccupation" name="motherOccupation" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="motherContactNumber" class="form-label">Mother's Contact Number *</label>
                                        <input type="tel" class="form-control" id="motherContactNumber" name="guardianContactNumber" placeholder="e.g. 09123456789" required oninput="this.value = this.value.replace(/\D/g, '')">

                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="guardianFullName" class="form-label">Guardian Full Name *</label>
                                        <input type="text" class="form-control" id="guardianFullName" name="guardianFullName" placeholder="e.g. Juan J. Dela Cruz" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="relationshipToStudent" class="form-label">Relationship to Student *</label>
                                        <input type="text" class="form-control" id="relationshipToStudent" name="relationshipToStudent" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="guardianContactNumber" class="form-label">Guardian's Contact Number *</label>
                                        <input type="tel" class="form-control" id="guardianContactNumber" name="guardianContactNumber" placeholder="e.g. 09123456789" required oninput="this.value = this.value.replace(/\D/g, '')">

                                    </div>
                                </div>
                            </div>
                            
                            <!-- Requirements Section -->
                            <h5 class="section-header fw-bold">Requirements</h5>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="schoolYear" class="form-label">School Year *</label>
                                        <select class="form-select" id="schoolYear" name="schoolYear" required>
                                            <option value="">Select</option>
                                            <option value="2024-2025" selected>2025-2026</option>
                                            <option value="2025-2026">2026-2027</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentType" class="form-label">Type of Student *</label>
                                        <select class="form-select" id="studentType" name="studentType" required>
                                            <option value="">Select</option>
                                            <option value="New">New</option>
                                            <option value="Transferee">Transferee</option>
                                            <option value="Old">Old</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="applyingFor" class="form-label">Applying For *</label>
                                        <select class="form-select" id="applyingFor" name="applyingFor" required>
                                            <option value="">Select</option>
                                            <option value="Kindergarten">Kindergarten</option>
                                            <option value="Elementary">Elementary</option>
                                            <option value="Junior High School">Junior High School</option>
                                            <option value="Senior High School">Senior High School</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthCertificate" class="form-label">Birth Certificate *</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="birthCertificate" name="birthCertificate" required>
                                            <label class="input-group-text" for="birthCertificate">Upload</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reportCard" class="form-label">Copy of Latest Report Card *</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="reportCard" name="reportCard" required>
                                            <label class="input-group-text" for="reportCard">Upload</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idPicture" class="form-label">Recent 2X2 ID Picture *</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="idPicture" name="idPicture" required>
                                            <label class="input-group-text" for="idPicture">Upload</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Certification -->
                            <div class="mb-4 mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="certificationCheck" required>
                                    <label class="form-check-label" for="certificationCheck">
                                        I hereby certify that the information provided in this form is complete, true and correct. 
                                        Further, I give my consent to SJBPS administration to collect and process my personal information. 
                                        The data collected in this form will only be used for school purposes only and will not be disclosed to any external sources without your express consent.
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to get URL parameters
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        function updateApplyingFor() {
        const gradeLevelSelect = document.getElementById('gradeLevel');
        const applyingForSelect = document.getElementById('applyingFor');
        const selectedGradeLevel = gradeLevelSelect.value;
        const strandSelect = document.getElementById('strand');
        
        // Only proceed if a grade level is selected
        if (!selectedGradeLevel) {
            return;
        }
        
        // Clear existing options
        applyingForSelect.innerHTML = '<option value="">Select</option>';
        
        // Determine the appropriate grade level to apply for based on previous grade
        let levelToApplyFor = "";
        let gradeToApplyFor = "";
        
        if (selectedGradeLevel === "preschool") {
            levelToApplyFor = "Kindergarten";
            
            // Add the option
            const option = document.createElement('option');
            option.value = "Kindergarten";
            option.textContent = "Kindergarten";
            applyingForSelect.appendChild(option);
        } 
        else if (selectedGradeLevel === "kindergarten") {
            levelToApplyFor = "Elementary";
            gradeToApplyFor = "Grade 1";
            
            // Add the option
            const option = document.createElement('option');
            option.value = "Grade 1";
            option.textContent = "Elementary - Grade 1";
            applyingForSelect.appendChild(option);
        } 
        else if (selectedGradeLevel >= 1 && selectedGradeLevel <= 5) {
            levelToApplyFor = "Elementary";
            gradeToApplyFor = "Grade " + (parseInt(selectedGradeLevel) + 1);
            
            // Add the option
            const option = document.createElement('option');
            option.value = gradeToApplyFor;
            option.textContent = "Elementary - " + gradeToApplyFor;
            applyingForSelect.appendChild(option);
        } 
        else if (selectedGradeLevel == 6) {
            levelToApplyFor = "Junior High School";
            gradeToApplyFor = "Grade 7";
            
            // Add the option
            const option = document.createElement('option');
            option.value = gradeToApplyFor;
            option.textContent = "Junior High School - " + gradeToApplyFor;
            applyingForSelect.appendChild(option);
        } 
        else if (selectedGradeLevel >= 7 && selectedGradeLevel <= 9) {
            levelToApplyFor = "Junior High School";
            gradeToApplyFor = "Grade " + (parseInt(selectedGradeLevel) + 1);
            
            // Add the option
            const option = document.createElement('option');
            option.value = gradeToApplyFor;
            option.textContent = "Junior High School - " + gradeToApplyFor;
            applyingForSelect.appendChild(option);
        } 
        else if (selectedGradeLevel == 10) {
            levelToApplyFor = "Senior High School";
            gradeToApplyFor = "Grade 11";
            
            // For Grade 10 students going to Grade 11, we need to show strand info
            let strandInfo = "";
            if (strandSelect.value) {
                strandInfo = " - " + strandSelect.value;
            }
            
            // Add the option
            const option = document.createElement('option');
            option.value = gradeToApplyFor + (strandSelect.value ? "-" + strandSelect.value : "");
            option.textContent = "Senior High School - " + gradeToApplyFor + strandInfo;
            applyingForSelect.appendChild(option);
        } 
        else if (selectedGradeLevel == 11) {
            levelToApplyFor = "Senior High School";
            gradeToApplyFor = "Grade 12";
            
            // For Grade 11 students going to Grade 12, we need to show strand info
            let strandInfo = "";
            if (strandSelect.value) {
                strandInfo = " - " + strandSelect.value;
            }
            
            // Add the option
            const option = document.createElement('option');
            option.value = gradeToApplyFor + (strandSelect.value ? "-" + strandSelect.value : "");
            option.textContent = "Senior High School - " + gradeToApplyFor + strandInfo;
            applyingForSelect.appendChild(option);
        }
        
        // Select the first option by default
        if (applyingForSelect.options.length > 1) {
            applyingForSelect.selectedIndex = 1;
        }
    }

    // Add event listener for strand selection changes
    document.getElementById('strand').addEventListener('change', function() {
        // Update "Applying For" field when strand selection changes
        updateApplyingFor();
    });

     // Function to toggle strand selection visibility
        function toggleStrandSelection() {
            const gradeLevelSelect = document.getElementById('gradeLevel');
            const strandSelection = document.getElementById('strandSelection');
            const strandSelect = document.getElementById('strand');
            const selectedLevel = gradeLevelSelect.value;
            
            // Check if selected grade level is 10 or 11 
            // (since these students will be applying for Grade 11 or 12)
            if (selectedLevel === '10' || selectedLevel === '11') {
                strandSelection.classList.remove('d-none');
                strandSelect.setAttribute('required', '');
            } else {
                strandSelection.classList.add('d-none');
                strandSelect.removeAttribute('required');
                strandSelect.value = ''; // Reset the strand selection
            }
            
            // Update "Applying For" based on grade level
            updateApplyingFor();
        }
        // Show privacy notice modal on page load
        document.addEventListener('DOMContentLoaded', function() {
            const privacyModal = new bootstrap.Modal(document.getElementById('privacyModal'));
            privacyModal.show();
            
            // Set student type based on URL parameter
            const studentType = getUrlParameter('type');
            if (studentType) {
                const studentTypeSelect = document.getElementById('studentType');
                
                // Capitalize first letter for display
                const capitalizedType = studentType.charAt(0).toUpperCase() + studentType.slice(1);
                
                // Find the option with the matching value
                for (let i = 0; i < studentTypeSelect.options.length; i++) {
                    if (studentTypeSelect.options[i].value === capitalizedType) {
                        studentTypeSelect.selectedIndex = i;
                        break;
                    }
                }
            }
            
            // Initialize form validation
            const form = document.getElementById('enrollmentForm');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault(); // Prevent actual form submission for demo
                    
                    // Show success modal
                    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                }
                
                form.classList.add('was-validated');
            });
            
            // Setup file upload buttons
            const uploadButtons = document.querySelectorAll('.input-group-text');
            uploadButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const fileInput = this.parentElement.querySelector('input[type="file"]');
                    if (fileInput) {
                        fileInput.click();
                    }
                });
            });
            
            // Handle "Go Home" button click
            document.getElementById('goHomeBtn').addEventListener('click', function() {
                // Redirect to home page
                window.location.href = 'Enrollment Type.php'; // Changed to redirect to enrollment type page
            });
            
            // Add event listener to grade level select
            const gradeLevelSelect = document.getElementById('gradeLevel');
            gradeLevelSelect.addEventListener('change', toggleStrandSelection);
            
            // Check if grade level already has a value (e.g., from browser autofill)
            if (gradeLevelSelect.value) {
                toggleStrandSelection();
            }
        
        // Simulate Philippines location data
        // This would normally be loaded from an API
        const provinces = [
            "Metro Manila", "Cavite", "Laguna", "Batangas", "Rizal", "Bulacan"
        ];
        
        const municipalities = {
            "Metro Manila": ["Manila", "Quezon City", "Makati", "Pasig", "Taguig"],
            "Cavite": ["Bacoor", "Dasmariñas", "Imus", "Kawit", "General Trias"],
            "Laguna": ["Santa Rosa", "Calamba", "San Pedro", "Biñan", "Los Baños"],
            "Batangas": ["Batangas City", "Lipa", "Santo Tomas", "Tanauan", "Bauan"],
            "Rizal": ["Antipolo", "Cainta", "Taytay", "Binangonan", "Rodriguez"],
            "Bulacan": ["Malolos", "Meycauayan", "San Jose del Monte", "Obando", "Baliuag"]
        };
        
        const barangays = {
            "Manila": ["Binondo", "Intramuros", "Malate", "Ermita", "Tondo"],
            "Quezon City": ["Diliman", "Cubao", "Katipunan", "Commonwealth", "Batasan Hills"],
            "Makati": ["Poblacion", "Bel-Air", "San Lorenzo", "Urdaneta", "Dasmariñas"]
            // Add more as needed
        };
        
        // Populate province dropdown
        const provinceSelect = document.getElementById('province');
        provinces.forEach(province => {
            const option = document.createElement('option');
            option.value = province;
            option.textContent = province;
            provinceSelect.appendChild(option);
        });
        
        // Handle province change
        provinceSelect.addEventListener('change', function() {
            const selectedProvince = this.value;
            const municipalitySelect = document.getElementById('municipality');
            
            // Clear municipality and barangay dropdowns
            municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';
            document.getElementById('barangay').innerHTML = '<option value="">Select Barangay</option>';
            
            // Populate municipality dropdown
            if (selectedProvince && municipalities[selectedProvince]) {
                municipalities[selectedProvince].forEach(municipality => {
                    const option = document.createElement('option');
                    option.value = municipality;
                    option.textContent = municipality;
                    municipalitySelect.appendChild(option);
                });
            }
        });

        // Handle municipality change
        document.getElementById('municipality').addEventListener('change', function() {
            const selectedMunicipality = this.value;
            const barangaySelect = document.getElementById('barangay');
            
            // Clear barangay dropdown
            barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
            
            // Populate barangay dropdown
            if (selectedMunicipality && barangays[selectedMunicipality]) {
                barangays[selectedMunicipality].forEach(barangay => {
                    const option = document.createElement('option');
                    option.value = barangay;
                    option.textContent = barangay;
                    barangaySelect.appendChild(option);
                });
            }
        });
    });
    </script>
</body>
</html>