<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            color: #333;
            padding: 20px;
        }
        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 4px;
            font-size: 14px;
        }
        .form-control, .form-select {
            height: 38px;
            padding: 6px 12px;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 20px;
            padding: 5px 20px;
            float: right;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-radius: 20px;
            padding: 5px 20px;
        }
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            position: relative;
        }
        .modal-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 20px;
            border: 2px solid #ccc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
        .success-icon {
            background-color: #fff;
            border: 2px solid #28a745;
        }
        .success-icon::before {
            content: "✓";
            color: #28a745;
            font-size: 24px;
        }
        .info-icon {
            background-color: #fff;
            border: 2px solid #0d6efd;
        }
        .info-icon::before {
            content: "i";
            color: #0d6efd;
            font-size: 24px;
            font-style: italic;
            font-weight: bold;
        }
        .row.g-3 {
            margin-bottom: 5px;
        }
        .col-md-3, .col-md-4, .col-md-6, .col-md-12 {
            padding-right: 10px;
            padding-left: 10px;
        }
        .d-flex.justify-content-between.align-items-center.mb-3 {
            margin-bottom: 15px !important;
        }
        /* Make asterisk red */
        .form-label .required, .required {
            color: red;
        }
    </style>
</head>
<body>
    <!-- Initial Privacy Notice Modal -->
    <div class="modal" id="privacyModal">
        <div class="modal-content">
            <div class="modal-icon info-icon"></div>
            <p>Notice: All data and information provided herein shall be treated with STRICT CONFIDENTIALITY in accordance with the Data Privacy Act.</p>
            <button onclick="closePrivacyModal()" class="btn btn-primary w-100">Okay</button>
        </div>
    </div>

    <!-- Success Modal (initially hidden) -->
    <div class="modal" id="successModal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeSuccessModal()">&times;</span>
            <div class="modal-icon success-icon"></div>
            <h5>Congratulations! You've Successfully Updated your Personal Information.</h5>
            <button onclick="closeSuccessModal()" class="btn btn-primary">Go back to profile</button>
        </div>
    </div>

    <div class="form-container">
        <?php if ($formSubmitted): ?>
            <script>
                document.getElementById('successModal').style.display = 'flex';
            </script>
        <?php else: ?>
            <!-- Error messages if any -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- Personal Information -->
                <div class="card" id="personal-section">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Personal Information</h4>
                            <img src="logo.jpg" alt="School Logo" width="30" height="30">
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="surname" class="form-label">Surname <span class="required">*</span></label>
                                <input type="text" class="form-control" id="surname" name="surname" required>
                            </div>
                            <div class="col-md-3">
                                <label for="firstName" class="form-label">First Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="col-md-3">
                                <label for="middleName" class="form-label">Middle Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="middleName" name="middleName" placeholder="N/A if none">
                            </div>
                            <div class="col-md-3">
                                <label for="suffix" class="form-label">Suffix</label>
                                <select class="form-select" id="suffix" name="suffix">
                                    <option value="N/A">N/A</option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label class="form-label">Date of Birth <span class="required">*</span></label>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <select class="form-select" name="dateOfBirthDay" required>
                                            <option value="">Day</option>
                                            <?php for ($i = 1; $i <= 31; $i++): ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" name="dateOfBirthMonth" required>
                                            <option value="">Month</option>
                                            <?php 
                                            $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                            foreach ($months as $index => $month): 
                                            ?>
                                                <option value="<?php echo $index + 1; ?>"><?php echo $month; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" name="dateOfBirthYear" required>
                                            <option value="">Year</option>
                                            <?php for ($i = date("Y") - 5; $i >= date("Y") - 30; $i--): ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="sex" class="form-label">Sex <span class="required">*</span></label>
                                <select class="form-select" id="sex" name="sex" required>
                                    <option value="">Select...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="nationality" class="form-label">Nationality <span class="required">*</span></label>
                                <select class="form-select" id="nationality" name="nationality" required>
                                    <option value="">Select...</option>
                                    <option value="Filipino">Filipino</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            
                     <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gradeLevel" class="form-label">Grade Level*</label>
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
                            </div>

                            <!-- Strand Selection (Hidden by default) -->
                            <div class="row mb-3 d-none" id="strandSelection">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="strand" class="form-label">Senior High School Strand*</label>
                                        <select class="form-select" id="strand" name="strand">
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
                
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="e.g. john.doe@gmail.com" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="lrn" class="form-label">Learner Reference Number (LRN) <span class="required">*</span></label>
                                <input type="text" class="form-control" id="lrn" name="lrn" required>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="homeAddress" class="form-label">Home Address <span class="required">*</span></label>
                                <input type="text" class="form-control" id="homeAddress" name="homeAddress" required>
                            </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update Info</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Show privacy modal on page load
        window.onload = function() {
            document.getElementById('privacyModal').style.display = 'flex';
        };
        
        function closePrivacyModal() {
            document.getElementById('privacyModal').style.display = 'none';
        }
        
        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            window.location.href = 'Student Portal.php'; // Redirect to login page
        }
        
        // Function to toggle SHS strand selection visibility
        function toggleStrandSelection() {
            const gradeLevel = document.getElementById('gradeLevel').value;
            const strandSelection = document.getElementById('strandSelection');
            const strandField = document.getElementById('strand');
            
            if (gradeLevel === '11' || gradeLevel === '12') {
                strandSelection.classList.remove('d-none');
                strandField.setAttribute('required', '');
            } else {
                strandSelection.classList.add('d-none');
                strandField.removeAttribute('required');
            }
        }
        
        // Initialize the form
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltip
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Check if grade level is SHS on page load
            toggleStrandSelection();
        });
    </script>
</body>
</html>