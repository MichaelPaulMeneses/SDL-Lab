<?php

// session_start();


// $servername = "localhost"; 
// $username = "root";    
// $password = "";      
// $dbname = ""; 

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Close connection
// $conn->close();
?>


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
    </style>
</head>
<body class="school-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <!-- School Information -->
                <div class="text-center mb-4">
                    <h2 class="text-primary">ST. JOHN THE BAPTIST PAROCHIAL SCHOOL</h2>
                    <p class="text-muted">Faith, Charity, Humility</p>
                    <!-- <p class="small text-muted mb-4">Accredited by the Department of Education | ISO 9001:2015 Certified</p> -->
                </div>
            </div>
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">School Enrollment Form</h3>
                    </div>
                    <div class="card-body">
                        <form id="enrollmentForm" novalidate>
                            <!-- Student Information Section -->
                            <h5 class="mb-3">Student Information</h5>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="studentLastName" class="form-label">Last Name*</label>
                                        <input type="text" class="form-control" id="studentLastName" name="studentLastName" required>
                                        <div class="invalid-feedback">
                                            Please provide student's last name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="studentFirstName" class="form-label">First Name*</label>
                                        <input type="text" class="form-control" id="studentFirstName" name="studentFirstName" required>
                                        <div class="invalid-feedback">
                                            Please provide student's first name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="studentMiddleName" class="form-label">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="studentMiddleName" name="studentMiddleName">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="suffix" class="form-label">Suffix (Optional)</label>
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
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dateOfBirth" class="form-label">Date of Birth*</label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                                        <div class="invalid-feedback">
                                            Please provide date of birth.
                                        </div>
                                    </div>
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

                            <!-- Required Documents Section -->
                            <h5 class="mb-3 mt-4">Required Documents</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form137" class="form-label">Form 137 (Report Card)*</label>
                                        <input type="file" class="form-control" id="form137" name="form137" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <div class="form-text">Accepted formats: PDF, JPG, PNG. Maximum file size: 5MB</div>
                                        <div class="invalid-feedback">
                                            Please upload Form 137.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="goodMoral" class="form-label">Good Moral Certificate*</label>
                                        <input type="file" class="form-control" id="goodMoral" name="goodMoral" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <div class="form-text">Accepted formats: PDF, JPG, PNG. Maximum file size: 5MB</div>
                                        <div class="invalid-feedback">
                                            Please upload Good Moral Certificate.
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h5 class="mb-3 mt-4">Required Documents</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form137" class="form-label">Form 137 (Report Card)*</label>
                                        <input type="file" class="form-control" id="form137" name="form137" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <div class="form-text">Accepted formats: PDF, JPG, PNG. Maximum file size: 5MB</div>
                                        <div class="invalid-feedback">
                                            Please upload Form 137.
                                        </div>
                                    </div>
                                </div>

                            <!-- Parent/Guardian Information Section -->
                            <h5 class="mb-3 mt-4">Parent/Guardian Information</h5>
                            <div class="mb-3">
                                <label for="parentName" class="form-label">Parent/Guardian Name*</label>
                                <input type="text" class="form-control" id="parentName" name="parentName" required>
                                <div class="invalid-feedback">
                                    Please provide parent/guardian name.
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>
                                </div>
                                <div class="container mt-5">
                                    <form class="needs-validation" novalidate>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="phone" class="form-label">Phone Number*</label>
                                                            <input type="number" class="form-control" id="phone" name="phone" required>
                                                            <div class="invalid-feedback">
                                                                Please provide a phone number.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            <!-- Address Section -->
                            <div class="mb-4">
                                <h6 class="mb-3">Address*</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="region" class="form-label">Region*</label>
                                            <select class="form-select" id="region" name="region" required>
                                                <option value="">Select Region</option>
                                                <option value="NCR">National Capital Region (NCR)</option>
                                                <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                                <option value="Region1">Region I (Ilocos Region)</option>
                                                <option value="Region2">Region II (Cagayan Valley)</option>
                                                <option value="Region3">Region III (Central Luzon)</option>
                                                <option value="Region4A">Region IV-A (CALABARZON)</option>
                                                <option value="Region4B">Region IV-B (MIMAROPA)</option>
                                                <option value="Region5">Region V (Bicol Region)</option>
                                                <option value="Region6">Region VI (Western Visayas)</option>
                                                <option value="Region7">Region VII (Central Visayas)</option>
                                                <option value="Region8">Region VIII (Eastern Visayas)</option>
                                                <option value="Region9">Region IX (Zamboanga Peninsula)</option>
                                                <option value="Region10">Region X (Northern Mindanao)</option>
                                                <option value="Region11">Region XI (Davao Region)</option>
                                                <option value="Region12">Region XII (SOCCSKSARGEN)</option>
                                                <option value="Region13">Region XIII (Caraga)</option>
                                                <option value="BARMM">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a region.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province" class="form-label">Province*</label>
                                            <select class="form-select" id="province" name="province" required>
                                                <option value="">Select Province</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a province.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city" class="form-label">City/Municipality*</label>
                                            <select class="form-select" id="city" name="city" required>
                                                <option value="">Select City/Municipality</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a city/municipality.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="barangay" class="form-label">Barangay*</label>
                                            <select class="form-select" id="barangay" name="barangay" required>
                                                <option value="">Select Barangay</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a barangay.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="streetAddress" class="form-label">Street Address*</label>
                                            <input type="text" class="form-control" id="streetAddress" name="streetAddress" required>
                                            <div class="invalid-feedback">
                                                Please enter your street address.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postalCode" class="form-label">Postal Code*</label>
                                            <input type="number" class="form-control" id="postalCode" name="postalCode" pattern="[0-9]*" inputmode="numeric" required>
                                            <div class="invalid-feedback">
                                                Please enter your postal code (numbers only).
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Emergency Contact Section -->
                            <h5 class="mb-3 mt-4">Emergency Contact Information</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emergencyContact" class="form-label">Emergency Contact Name*</label>
                                        <input type="text" class="form-control" id="emergencyContact" name="emergencyContact" required>
                                        <div class="invalid-feedback">
                                            Please provide emergency contact name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emergencyPhone" class="form-label">Emergency Contact Phone*</label>
                                        <input type="number" class="form-control" id="emergencyPhone" name="emergencyPhone" required>
                                        <div class="invalid-feedback">
                                            Please provide emergency contact phone.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Enrollment</button>
                            </div>
                        </form>
                    </div>
                </div>
                    <!-- Mission and Vision Boxes
        <div class="row justify-content-center mt-4">
            <div class="col-md-5">
                <div class="card shadow-sm border-primary">
                    <div class="card-body text-center">
                        <h6 class="text-primary">Mission</h6>
                        <p class="small text-muted">The St. John the Baptist Parochial School commits itself as a living witness of Christ and as an agent of quality Catholic education in response to the mission of the Church by proclaiming the Gospel Values and provoding 21st century competencies to the Johannine community through the spirit of St. John</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow-sm border-primary">
                    <div class="card-body text-center">
                        <h6 class="text-primary">Vision</h6>
                        <p class="small text-muted">The St. John the Baptist Parochial School envisions itself as globally academic competent community that embodies Christ's Teachings.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
                        <!-- Success Alert (Hidden by default) -->
                        <div class="alert alert-success mt-3 d-none" id="successAlert" role="alert">
                            <h4 class="alert-heading">Enrollment Submitted!</h4>
                            <p>Thank you for submitting the enrollment form. We will contact you shortly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Address data structure with complete Philippines regions
    const addressData = {
        'NCR': {
            'Metro Manila': {
                'Manila': [
                    'Binondo', 'Ermita', 'Intramuros', 'Malate', 'Paco', 'Pandacan', 'Port Area', 'Quiapo', 
                    'Sampaloc', 'San Andres', 'San Miguel', 'San Nicolas', 'Santa Ana', 'Santa Cruz', 
                    'Santa Mesa', 'Tondo'
                ],
                'Quezon City': [
                    'Alicia', 'Bagong Silangan', 'Balong Bato', 'Batasan Hills', 'Commonwealth', 'Culiat',
                    'Diliman', 'Eastwood', 'Fairview', 'Galas', 'Kaligayahan', 'Kamuning', 'Katipunan',
                    'Loyola Heights', 'New Manila', 'Novaliches', 'Project 2', 'Project 3', 'Project 4',
                    'Project 6', 'Project 7', 'Project 8', 'San Francisco Del Monte', 'Teachers Village',
                    'UP Campus'
                ],
                'Makati': [
                    'Bangkal', 'Bel-Air', 'Carmona', 'Cembo', 'Comembo', 'Dasmariñas', 'East Rembo',
                    'Forbes Park', 'Guadalupe Nuevo', 'Guadalupe Viejo', 'Kasilawan', 'La Paz', 'Magallanes',
                    'Olympia', 'Palanan', 'Pembo', 'Pinagkaisahan', 'Pio del Pilar', 'Pitogo', 'Poblacion',
                    'Post Proper Northside', 'Post Proper Southside', 'Rizal', 'San Antonio', 'San Isidro',
                    'San Lorenzo', 'Santa Cruz', 'Singkamas', 'South Cembo', 'Tejeros', 'Urdaneta',
                    'Valenzuela', 'West Rembo'
                ],
                'Pasay': [
                    'Barangay 1', 'Barangay 2', 'Barangay 3', 'Barangay 4', 'Barangay 5', 'Barangay 6',
                    'Barangay 7', 'Barangay 8', 'Barangay 9', 'Barangay 10', 'Barangay 11', 'Barangay 12',
                    'Barangay 13', 'Barangay 14', 'Barangay 15', 'Barangay 16', 'Barangay 17', 'Barangay 18',
                    'Barangay 19', 'Barangay 20'
                ],
                'Pasig': [
                    'Bagong Ilog', 'Bagong Katipunan', 'Bambang', 'Buting', 'Caniogan', 'Dela Paz',
                    'Kalawaan', 'Kapasigan', 'Kapitolyo', 'Malinao', 'Manggahan', 'Maybunga', 'Oranbo',
                    'Palatiw', 'Pinagbuhatan', 'Pineda', 'Rosario', 'Sagad', 'San Antonio', 'San Joaquin',
                    'San Jose', 'San Miguel', 'San Nicolas', 'Santa Cruz', 'Santa Lucia', 'Santa Rosa',
                    'Santo Tomas', 'Santolan', 'Sumilang', 'Ugong'
                ],
                'Paranaque': [
                    'Baclaran', 'BF Homes', 'Don Bosco', 'Don Galo', 'La Huerta', 'Marcelo Green',
                    'Merville', 'Moonwalk', 'San Antonio', 'San Dionisio', 'San Isidro', 'San Martin de Porres',
                    'Santo Niño', 'Sun Valley', 'Tambo', 'Vitalez'
                ],
                'Muntinlupa': [
                    'Alabang', 'Bayanan', 'Buli', 'Cupang', 'Putatan', 'Poblacion', 'Sucat', 'Tunasan',
                    'New Alabang Village'
                ],
                'Las Piñas': [
                    'Almanza Uno', 'Almanza Dos', 'B.F. International Village', 'Daniel Fajardo',
                    'Elias Aldana', 'Ilaya', 'Manuyo Uno', 'Manuyo Dos', 'Pamplona Uno', 'Pamplona Dos',
                    'Pamplona Tres', 'Pilar', 'Pulang Lupa Uno', 'Pulang Lupa Dos', 'Talon Uno',
                    'Talon Dos', 'Talon Tres', 'Talon Kuatro', 'Zapote'
                ],
                'Marikina': [
                    'Barangka', 'Calumpang', 'Concepcion Uno', 'Concepcion Dos', 'Fortune', 'Industrial Valley',
                    'Jesus De La Peña', 'Malanday', 'Nangka', 'Parang', 'San Roque', 'Santa Elena',
                    'Santo Niño', 'Tañong', 'Tumana'
                ],
                'Taguig': [
                    'Bagumbayan', 'Bambang', 'Calzada', 'Central Bicutan', 'Central Signal Village',
                    'Fort Bonifacio', 'Hagonoy', 'Ibayo-Tipas', 'Katuparan', 'Ligid-Tipas', 'Lower Bicutan',
                    'Maharlika Village', 'Napindan', 'New Lower Bicutan', 'North Daang Hari', 'North Signal Village',
                    'Palingon', 'Pinagsama', 'San Miguel', 'Santa Ana', 'South Daang Hari', 'South Signal Village',
                    'Tanyag', 'Tuktukan', 'Upper Bicutan', 'Ususan', 'Wawa', 'Western Bicutan'
                ],
                'Mandaluyong': [
                    'Addition Hills', 'Barangka Drive', 'Barangka Ibaba', 'Barangka Ilaya', 'Barangka Itaas',
                    'Buayang Bato', 'Burol', 'Daang Bakal', 'Hagdang Bato Itaas', 'Hagdang Bato Libis',
                    'Harapan', 'Highway Hills', 'Hulo', 'Mabini-J. Rizal', 'Malamig', 'Mauway',
                    'Namayan', 'New Zañiga', 'Old Zañiga', 'Pag-asa', 'Plainview', 'Pleasant Hills',
                    'Poblacion', 'San Jose', 'Vergara', 'Wack-Wack Greenhills'
                ],
                'San Juan': [
                    'Addition Hills', 'Balong-Bato', 'Batis', 'Corazon de Jesus', 'Ermitaño', 'Greenhills',
                    'Isabelita', 'Kabayanan', 'Little Baguio', 'Maytunas', 'Onse', 'Pasadena', 'Pedro Cruz',
                    'Progreso', 'Rivera', 'Salapan', 'San Perfecto', 'Santa Lucia', 'Tibagan', 'West Crame'
                ],
                'Caloocan': [
                    'Bagong Barrio', 'Bagong Silang', 'Barrio San Jose', 'Battle Hills', 'Capitol Park',
                    'Dona Imelda', 'Dr. M. De Jesus Heights', 'Grace Park East', 'Grace Park West',
                    'Industrial Valley', 'Kaybiga', 'Lourdes Heights', 'Maypajo', 'Morning Breeze',
                    'North Caloocan', 'Novaliches North', 'Novaliches South', 'Project 7', 'Sangandaan',
                    'South Caloocan', 'Tala', 'University Hills', 'Victory Heights'
                ],
                'Malabon': [
                    'Acacia', 'Baritan', 'Bayan-Bayanan', 'Catmon', 'Concepcion', 'Dampalit', 'Flores',
                    'Hulong Duhat', 'Ibaba', 'Longos', 'Maysilo', 'Muzon', 'Niugan', 'Panghulo',
                    'Potrero', 'San Agustin', 'Santolan', 'Tañong', 'Tinajeros', 'Tonsuya'
                ],
                'Navotas': [
                    'Bagumbayan North', 'Bagumbayan South', 'Bangculasi', 'Daanghari', 'North Bay Boulevard North',
                    'North Bay Boulevard South', 'San Jose', 'San Rafael Village', 'San Roque', 'Sipac-Almacen',
                    'Tangos North', 'Tangos South', 'Tanza 1', 'Tanza 2'
                ],
                'Valenzuela': [
                    'Arkong Bato', 'Balangkas', 'Bignay', 'Bisig', 'Canumay East', 'Canumay West',
                    'Coloong', 'Dalandanan', 'Gen. T. de Leon', 'Karuhatan', 'Lawang Bato', 'Lingunan',
                    'Mabolo', 'Malanday', 'Malinta', 'Mapulang Lupa', 'Marulas', 'Maysan', 'Palasan',
                    'Parada', 'Pariancillo Villa', 'Paso de Blas', 'Pasolo', 'Poblacion', 'Pulo',
                    'Punturin', 'Rincon', 'Tagalag', 'Ugong', 'Viente Reales', 'Wawang Pulo'
                ]
            }
        },
        'CAR': {
            'Abra': {
                'Bangued': ['Poblacion', 'Angad', 'Calaba', 'Dangdangla'],
                'Bucay': ['Abang', 'Bugbog', 'Dugong', 'Labon'],
                'Dolores': ['Poblacion', 'Kimmalaba', 'Cardona', 'Bayaan']
            },
            'Apayao': {
                'Kabugao': ['Poblacion', 'Badduat', 'Dibagat', 'Laco'],
                'Luna': ['Poblacion', 'Calabigan', 'Dagupan', 'San Isidro'],
                'Pudtol': ['Poblacion', 'Aurora', 'Emilia', 'Imelda']
            },
            'Benguet': {
                'Baguio City': ['Asin Road', 'Aurora Hill', 'Camp 7', 'City Camp', 'Engineers Hill'],
                'La Trinidad': ['Poblacion', 'Balili', 'Betag', 'Lubas', 'Pico'],
                'Tuba': ['Poblacion', 'Camp 1', 'Camp 3', 'Nangalisan', 'Tadiangan']
            },
            'Ifugao': {
                'Banaue': ['Poblacion', 'Batad', 'Bocos', 'Poitan'],
                'Hungduan': ['Poblacion', 'Abatan', 'Hapao', 'Nungulunan'],
                'Lagawe': ['Poblacion', 'Burnay', 'Cudog', 'Olilicon']
            },
            'Kalinga': {
                'Tabuk City': ['Poblacion', 'Appas', 'Bulanao', 'Dagupan'],
                'Lubuagan': ['Poblacion', 'Mabilong', 'Tanglag', 'Uma'],
                'Tinglayan': ['Poblacion', 'Ambato', 'Butbut', 'Loccong']
            },
            'Mountain Province': {
                'Bontoc': ['Poblacion', 'Alab Proper', 'Balili', 'Samoki'],
                'Sagada': ['Poblacion', 'Ambasing', 'Dagdag', 'Suyo'],
                'Paracelis': ['Poblacion', 'Anonat', 'Bantay', 'Butigue']
            }
        },
        'Region1': {
            'Ilocos Norte': {
    'Laoag City': ['Barangay 1', 'Barangay 2', 'Barangay 3', 'Barangay 4', 'Barangay 5', 'San Lorenzo', 'San Miguel'],
    'Batac': ['Baay', 'Bungon', 'Cangrunaan', 'Colo', 'Pimentel', 'Quiling Norte', 'Quiling Sur'],
    'Pagudpud': ['Balaoi', 'Baduang', 'Burayoc', 'Caparispisan', 'Pasaleng', 'Poblacion 1', 'Poblacion 2', 'Saguigui']
},
'Ilocos Sur': {
    'Vigan City': ['Ayusan Norte', 'Ayusan Sur', 'Bagani Campo', 'Barangay I', 'Barangay II', 'Barangay III', 'Barangay IV'],
    'Candon City': ['Allangigan', 'Amguid', 'Ayusan', 'Bagani', 'Balingaoan', 'Bugnay', 'Calaoaan'],
    'Santa Maria': ['Ampuagan', 'Bantay', 'Bekalen', 'Cabaritan', 'Maynganay', 'Nagtupacan', 'Poblacion Norte']
},
'La Union': {
    'San Fernando City': ['Barangay I', 'Barangay II', 'Biday', 'Carlatan', 'Ilocanos Norte', 'Ilocanos Sur', 'Lingsat'],
    'Bauang': ['Baccuit Norte', 'Baccuit Sur', 'Bagbag', 'Bangon', 'Bilis', 'Central West', 'Central East'],
    'Agoo': ['Ambitacay', 'Capas', 'Consolacion', 'Macalva', 'Nazareno', 'San Antonio', 'San Julian']
},
'Pangasinan': {
    'Dagupan City': ['Bacayao Norte', 'Bacayao Sur', 'Barangay I', 'Barangay II', 'Barangay IV', 'Bolosan', 'Bonuan Binloc'],
    'Lingayen': ['Aliwekwek', 'Baay', 'Balangobong', 'Bantayan', 'Basing', 'Capandanan', 'Domalandan Center'],
    'Alaminos City': ['Alos', 'Amandiego', 'Amangbangan', 'Balangobong', 'Balayang', 'Baleyadaan', 'Bisocol']
}
},
'Region2': {
'Batanes': {
    'Basco': ['Chanarian', 'Kaychanarianan', 'San Antonio', 'San Joaquin', 'Kayvaluganan', 'Kayhuvokan'],
    'Itbayat': ['San Rafael', 'Santa Lucia', 'Santa Maria', 'Santa Rosa', 'Raele', 'Yawran'],
    'Sabtang': ['Chavayan', 'Malakdang', 'Nakanmuan', 'Savidug', 'Sinakan', 'Sumnanga']
},
'Cagayan': {
    'Tuguegarao City': ['Annafunan East', 'Annafunan West', 'Atulayan Norte', 'Atulayan Sur', 'Bagay', 'Buntun', 'Caggay'],
    'Aparri': ['Bisagu', 'Bulala Norte', 'Bulala Sur', 'Caagaman', 'Centro 1', 'Centro 2', 'Centro 3'],
    'Lal-lo': ['Bangag', 'Binag', 'Cabayabasan', 'Cagoran', 'Camosi', 'Catayauan', 'Centro']
},
'Isabela': {
    'Ilagan City': ['Alinguigan 1st', 'Alinguigan 2nd', 'Alinguigan 3rd', 'Baculud', 'Baligatan', 'Bliss Village', 'Calamagui'],
    'Cauayan City': ['Alicaocao', 'Alinam', 'Amobocan', 'Baringin', 'Cabaruan', 'Cabatuan', 'Caggauan'],
    'Santiago City': ['Abra', 'Ambabaay', 'Balintocatoc', 'Baluarte', 'Bannawag', 'Batal', 'Buenavista']
},
'Nueva Vizcaya': {
    'Bayombong': ['Almaguer North', 'Almaguer South', 'Bonfal East', 'Bonfal Proper', 'Bonfal West', 'Buag', 'Buenavista'],
    'Bambang': ['Alupogan', 'Banggot', 'Calaocan', 'Domang', 'Homestead I', 'Homestead II', 'Manamtam'],
    'Solano': ['Aggub', 'Bagahabag', 'Bangaan', 'Bascaran', 'Concepcion', 'Curifang', 'Dadap']
},
'Quirino': {
    'Cabarroguis': ['Banuar', 'Calimaturong', 'Del Pilar', 'Diffun', 'Dingasan', 'Gundaway', 'Villamor'],
    'Diffun': ['Bonifacio', 'Brgys. 1-8', 'Bugaring', 'Cajel', 'Cardenas', 'Doña Imelda', 'Dumanisi'],
    'Aglipay': ['Aurora', 'Baguio Village', 'Dagupan', 'Diodol', 'Dumabel', 'Gayong', 'Guimba']
}
},
'Region3': {
'Aurora': {
    'Baler': ['Barangay I', 'Barangay II', 'Barangay III', 'Barangay IV', 'Barangay V', 'Buhangin', 'Calabuanan'],
    'Casiguran': ['Barangay I', 'Barangay II', 'Barangay III', 'Barangay IV', 'Barangay V', 'Calabgan', 'Culat'],
    'Maria Aurora': ['Bazal', 'Buhangin', 'Decoliat', 'Diaat', 'Dimasalang', 'Diteki', 'Kabayunan']
},
'Bataan': {
    'Balanga City': ['Bagong Silang', 'Cabog-Cabog', 'Cataning', 'Central', 'Cupang North', 'Cupang West', 'Dangcol'],
    'Mariveles': ['Alasasin', 'Alas-asin Poblacion', 'Batangas II', 'Biaan', 'Cabcaben', 'Camaya', 'Ipag'],
    'Limay': ['Alangan', 'Duale', 'Kitang 2 & 3', 'Lamao', 'Poblacion', 'Reformista', 'St. Francis II']
},
'Bulacan': {
    'Malolos City': ['Anilao', 'Atlag', 'Babatnin', 'Bagna', 'Bagong Bayan', 'Balayong', 'Balite'],
    'Meycauayan City': ['Bagbaguin', 'Bahay Pare', 'Bancal', 'Banga', 'Bayugo', 'Caingin', 'Calvario'],
    'San Jose del Monte City': ['Bagong Buhay I', 'Bagong Buhay II', 'Bagong Buhay III', 'Citrus', 'Ciudad Real', 'Dulong Bayan', 'Fatima I']
},
'Nueva Ecija': {
    'Cabanatuan City': ['Aduas Centro', 'Aduas Norte', 'Aduas Sur', 'Bagong Buhay', 'Bagong Sikat', 'Bakero', 'Bakod Bayan'],
    'Palayan City': ['Atate', 'Aulo', 'Bagong Buhay', 'Caballero', 'Ganaderia', 'Imelda Valley', 'Langka'],
    'San Jose City': ['A. Pascual', 'Abar 1st', 'Abar 2nd', 'Bagong Sikat', 'Calaocan', 'Canuto', 'Crispin']
},
'Pampanga': {
    'San Fernando City': ['Alasas', 'Baliti', 'Bulaon', 'Calulut', 'Del Carmen', 'Del Pilar', 'Del Rosario'],
    'Angeles City': ['Agapito del Rosario', 'Amsic', 'Anunas', 'Balibago', 'Capaya', 'Claro M. Recto', 'Cuayan'],
    'Mabalacat City': ['Atlu Bola', 'Bical', 'Bundagul', 'Cacutud', 'Calumpang', 'Camachiles', 'Dapdap']
},
'Tarlac': {
    'Tarlac City': ['Aguso', 'Alvindia', 'Amucao', 'Armenia', 'Asturias', 'Atioc', 'Balanti'],
    'Paniqui': ['Apulid', 'Ballesteros', 'Barang', 'Canan', 'Cayanga', 'Coral', 'Estrada'],
    'Capas': ['Aranguren', 'Bueno', 'Cubcub', 'Cutcut 1st', 'Cutcut 2nd', 'Dolores', 'Estrada']
},
'Zambales': {
    'Olongapo City': ['Barretto', 'East Bajac-Bajac', 'East Tapinac', 'Gordon Heights', 'Kalaklan', 'Mabayuan', 'New Asinan'],
    'Iba': ['Amungan', 'Bangantalinga', 'Dirita-Baloguen', 'Lipay-Dingin-Panibuatan', 'Palanginan', 'San Agustin', 'Santa Barbara'],
    'Subic': ['Aningway Sacatihan', 'Asinan Poblacion', 'Asinan Proper', 'Baraca-Camachile', 'Batiawan', 'Calapacuan', 'Calapandayan']
}
},
'Region4A': {
'Batangas': {
    'Batangas City': ['Alangilan', 'Balagtas', 'Balete', 'Banaba Center', 'Banaba East', 'Banaba West', 'Barangay 1'],
    'Lipa City': ['Adya', 'Anilao', 'Anilao-Labac', 'Antipolo Del Norte', 'Antipolo Del Sur', 'Bagong Pook', 'Balintawak'],
    'Tanauan City': ['Altura Bata', 'Altura Matanda', 'Altura South', 'Ambulong', 'Bagbag', 'Bagumbayan', 'Baletilla']
},
'Cavite': {
    'Trece Martires City': ['Aguado', 'Cabezas', 'Cabuco', 'Conchu', 'De Ocampo', 'Gregorio', 'Inocencio'],
    'Dasmariñas City': ['Burol Main', 'Burol I', 'Burol II', 'Burol III', 'Datu Esmael', 'Langkaan I', 'Langkaan II'],
    'Tagaytay City': ['Asisan', 'Bagong Tubig', 'Calabuso', 'Dapdap East', 'Dapdap West', 'Francisco', 'Iruhin East']
},
'Laguna': {
    'Santa Rosa City': ['Aplaya', 'Balibago', 'Caingin', 'Dila', 'Dita', 'Don Jose', 'Ibaba'],
    'Calamba City': ['Bagong Kalsada', 'Banadero', 'Banlic', 'Barandal', 'Batino', 'Bubuyan', 'Bucal'],
    'San Pablo City': ['Atisan', 'Bagong Bayan', 'Barangay I-A', 'Barangay I-B', 'Barangay II-A', 'Barangay II-B', 'Barangay III-A'],

},
'Quezon': {
    'Lucena City': ['Barangay 1', 'Barangay 2', 'Barangay 3', 'Barangay 4', 'Barangay 5', 'Barangay 6', 'Barangay 7'],
    'Tayabas City': ['Alitao', 'Angeles', 'Ayusan I', 'Ayusan II', 'Baguio', 'Banilad', 'Bukal'],
    'Pagbilao': ['Alupaye', 'Añato', 'Antipolo', 'Bagumbayan', 'Binahaan', 'Bukal', 'Ilayang Polo'],
    
},
'Rizal': {
    'Antipolo City': ['Bagong Nayon', 'Beverly Hills', 'Calawis', 'Cupang', 'Dalig', 'Dela Paz', 'Inarawan'],
    'Rodriguez': ['Burgos', 'Geronimo', 'Manggahan', 'Poblacion', 'Rosario', 'San Isidro', 'San Jose'],
    'Cainta': ['San Andres', 'San Isidro', 'San Juan', 'San Roque', 'Santa Rosa', 'Santo Domingo', 'Santo Niño'],
    'Taytay': ['Dolores', 'Muzon', 'San Isidro', 'San Juan', 'Santa Ana', 'San Lorenzo', 'Lupang Arenda'],
    'Angono': ['Bagumbayan', 'Balanti', 'Col. Guido', 'Kalayaan', 'Mahabang Parang', 'Muzon', 'Poblacion'],
    'Baras': ['San Juan', 'San Jose', 'San Juan', 'San Roque', 'Santa Rosa', 'Santo Domingo', 'Santo Niño'],
    'Binangonan': ['Batingan', 'Bilibiran', 'Bombong', 'Calumpang', 'Habagatan', 'Janosa', 'Lunsad'],
    'Morong': ['Bagong Silang', 'Balite', 'Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Barangay III (Poblacion)', 'Barangay IV (Poblacion)', 'Barangay V (Poblacion)'],
    'Pililla': ['Bagumbayan', 'Balanti', 'Col. Guido', 'Kalayaan', 'Mahabang Parang', 'Muzon', 'Poblacion'],
    'Tanay': ['Cayabu', 'Cuyambay', 'Daraitan', 'Katipunan', 'Kaybuto', 'Laiban', 'Mag-Ampon'],
    'Teresa': ['Bagumbayan', 'Balanti', 'Col. Guido', 'Kalayaan', 'Mahabang Parang', 'Muzon', 'Poblacion'],
    'Jalajala': ['Bagumbong', 'Bayugo', 'Lubo', 'Paalaman', 'Pagkaliwanan', 'Palaypalay', 'Punta', 'Second District', 'Sipsipin', 'Special District', 'Third District'],
    'Cardona': ['Balibago', 'Boor', 'Calahan', 'Dalig', 'Del Remedio', 'Iglesia', 'Lambac', 'Looc', 'Malanggam-Calubacan', 'Nagsulo', 'Navotas', 'Patunhay', 'Real', 'Sampad', 'San Isidro', 'Subay','Ticulio', 'Tuna', 'Tala'],
    'San Mateo': ['Ampid I', 'Ampid II', 'Banaba', 'Dulong Bayan 1', 'Dulong Bayan 2', 'Guitnang Bayan I', 'Guitnang Bayan II', 'Guinayang', 'Gulod', 'Malanday', 'Maly', 'Pintong Bocawe', 'Santa Ana', 'Santo Niño', 'Silangan'],
},
    },
    'Region4B': {
        'Marinduque': {
            'Boac': ['Agot', 'Agumaymayan', 'Amoingon', 'Apitong', 'Balagasan', 'Balaring', 'Balimbing'],
            'Mogpog': ['Anapog-Sibucao', 'Argao', 'Balanacan', 'Bintakay', 'Bocboc', 'Butansapa', 'Candahon'],
            'Santa Cruz': ['Alobo', 'Bagong Silang', 'Baguidbirin', 'Baliis', 'Bamban', 'Banogbog', 'Barangay I (Poblacion)']
        },
        'Occidental Mindoro': {
            'San Jose': ['Bagong Sikat', 'Batasan', 'Burgos', 'Caminawit', 'Catayungan', 'Central', 'Labangan'],
            'Mamburao': ['Balansay', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Fatima', 'Payompon'],
            'Santa Cruz': ['Alacaak', 'Barahan', 'Casague', 'Dayap', 'Lumangbayan', 'Mulawin', 'Pinagturilan']
        },
        'Oriental Mindoro': {
            'Calapan City': ['Balingayan', 'Balite', 'Baruyan', 'Bayanan I', 'Bayanan II', 'Bicalaan', 'Bulusan'],
            'Puerto Galera': ['Aninuan', 'Balatero', 'Dulangan', 'Palangan', 'Sabang', 'San Antonio', 'San Isidro'],
            'Naujan': ['Adrialuna', 'Andres Ilagan', 'Antipolo', 'Apitong', 'Aurora', 'Bacungan', 'Bagong Buhay']
        },
        'Palawan': {
            'Puerto Princesa City': ['Bagong Bayan', 'Bagong Sikat', 'Bagong Silang', 'Bancao-Bancao', 'Barangay Model', 'Bucana', 'Cabayugan'],
            'Coron': ['Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Barangay III (Poblacion)', 'Barangay IV (Poblacion)', 'Barangay V (Poblacion)', 'Barangay VI (Poblacion)', 'Bintuan'],
            'El Nido': ['Barotuan', 'Bebeladan', 'Buena Suerte', 'Corong-Corong', 'Masagana', 'New Ibajay', 'Pasadena']
        },
        'Romblon': {
            'Odiongan': ['Amatong', 'Bangon', 'Batiano', 'Budiong', 'Canduyong', 'Dapawan', 'Gabawan'],
            'Romblon': ['Agbaluto', 'Agpanabat', 'Agnaga', 'Agnay', 'Agnipa', 'Agtongo', 'Bagacay'],
            'San Jose': ['Agbudia', 'Busay', 'Combot', 'Lanas', 'Pinamihagan', 'Poblacion', 'Tangca']
        }
    },
    'Region5': {
        'Albay': {
            'Legazpi City': ['Bagong Abre', 'Bagumbayan', 'Banquerohan', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)'],
            'Tabaco City': ['Agnas', 'Bacolod', 'Bantayan', 'Baranghawon', 'Basud', 'Bogñabong', 'Bonot'],
            'Ligao City': ['Abella', 'Allang', 'Bacong', 'Bagumbayan', 'Balading', 'Baligang', 'Binatagan']
        },
        'Camarines Norte': {
            'Daet': ['Alawihao', 'Bagasbas', 'Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Barangay III (Poblacion)', 'Barangay IV (Poblacion)', 'Barangay V (Poblacion)'],
            'Jose Panganiban': ['Bagong Bayan', 'Dahican', 'Larap', 'Luklukan Norte', 'Luklukan Sur', 'Nakalaya', 'Osmeña'],
            'Labo': ['Anameam', 'Awitan', 'Bagacay', 'Bagong Silang I', 'Bagong Silang II', 'Banguerohan', 'Barangay I (Poblacion)']
        },
        'Camarines Sur': {
            'Naga City': ['Abella', 'Bagumbayan Norte', 'Bagumbayan Sur', 'Balatas', 'Calauag', 'Cararayan', 'Carolina'],
            'Iriga City': ['Antipolo', 'Cristo Rey', 'Del Rosario', 'Francia', 'La Anunciacion', 'La Medalla', 'La Purisima'],
            'Pili': ['Anayan', 'Bagong Sirang', 'Binanuaanan', 'Buenavista', 'Cadlan', 'Curry', 'Del Rosario']
        },
        'Catanduanes': {
            'Virac': ['Balite', 'Bigaa', 'Buyo', 'Calatagan Proper', 'Calatagan Tibang', 'Capilihan', 'Casoocan'],
            'Baras': ['Abihao', 'Agban', 'Bagumbayan', 'Benticayan', 'Danao', 'Ginitligan', 'Guinsaanan'],
            'San Andres': ['Asgad', 'Bagong Sirang', 'Barihay', 'Batong Paloway', 'Belmonte', 'Bislig', 'Cabcab']
        },
        'Masbate': {
            'Masbate City': ['Anas', 'Asid', 'Bagacay', 'Bagumbayan', 'Bancal', 'Bantigue', 'Bapor'],
            'Aroroy': ['Ambolong', 'Amoroy', 'Antipolo', 'Bagaag', 'Balawing', 'Balete', 'Bangon'],
            'Cataingan': ['Aguada', 'Badiang', 'Bagacay', 'Basud', 'Bautista', 'Bugsayon', 'Buracan']
        },
        'Sorsogon': {
            'Sorsogon City': ['Abuyog', 'Almendras-Cogon', 'Balogo', 'Barayong', 'Basud', 'Batan', 'Batohan'],
            'Bulan': ['Aguinaldo', 'Abad Santos (Aripdip)', 'Bagacay', 'Bacolod', 'Beguin', 'Bical', 'Bonga'],
            'Gubat': ['Ariman', 'Bagacay', 'Balud Del Norte', 'Balud Del Sur', 'Bagatao', 'Bentuco', 'Beriran']
        }
    },
    'Region6': {
        'Aklan': {
            'Kalibo': ['Andagao', 'Bachaw Norte', 'Bachaw Sur', 'Briones', 'Buswang New', 'Buswang Old', 'Caano'],
            'Boracay Island': ['Balabag', 'Manoc-Manoc', 'Yapak'],
            'Malay': ['Argao', 'Balusbos', 'Caticlan', 'Cubay Norte', 'Cubay Sur', 'Dumlog', 'Kabulihan']
        },
        'Antique': {
            'San Jose de Buenavista': ['Badiang', 'Bagumbayan', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Barangay 5 (Poblacion)'],
            'Sibalom': ['Alangan', 'Calo-oy', 'Catungan I', 'Catungan II', 'Catungan III', 'Catungan IV', 'Cubay-Sermon'],
            'Culasi': ['Alojipan', 'Bagacay', 'Balala', 'Batonan Norte', 'Batonan Sur', 'Batbatan Island', 'Bita-ogan']
        },
        'Capiz': {
            'Roxas City': ['Adlawan', 'Balijuagan', 'Banica', 'Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Barangay III (Poblacion)', 'Barangay IV (Poblacion)'],
            'Dao': ['Aganan', 'Agtambo', 'Agtanguay', 'Balucuan', 'Centro', 'Daplas', 'Duyoc'],
            'Panay': ['Agbalo', 'Agojo', 'Anhawon', 'Bantique', 'Bato', 'Binantuan', 'Binantuan Pequeño']
        },
        'Guimaras': {
            'Jordan': ['Alaguisoc', 'Balcon Maravilla', 'Balcon Melliza', 'Bugnay', 'Buluangan', 'Espinosa', 'Hoskyn'],
            'Buenavista': ['Avila', 'Bacjao', 'Bangbang', 'Daragan', 'East Valencia', 'Getulio', 'Mabini'],
            'Nueva Valencia': ['Cabalagnan', 'Cabulihan', 'Calaya', 'Dolores', 'Guiwanon', 'Igang', 'La Paz']
        },
        'Iloilo': {
            'Iloilo City': ['Aguinaldo', 'Arguellas', 'Baldoza', 'Barangay I (City Proper)', 'Barangay II (City Proper)', 'Barangay III (City Proper)', 'Barangay IV (City Proper)'],
            'Passi City': ['Aglalana', 'Agdahon', 'Agtambo', 'Agtabo', 'Arac', 'Ayaman', 'Bacan'],
            'Oton': ['Alegre', 'Atimonan', 'Batuan Ilaud', 'Batuan Ilaya', 'Bita', 'Botong', 'Cabanbanan']
        },
        'Negros Occidental': {
            'Bacolod City': ['Alangilan', 'Alijis', 'Banago', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)'],
            'Kabankalan City': ['Binicuil', 'Camansi', 'Camingawan', 'Carol-An', 'Carmona', 'Cubay', 'Hilamonan'],
            'Silay City': ['Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Barangay III (Poblacion)', 'Barangay IV (Poblacion)', 'Barangay V (Poblacion)', 'Barangay VI (Poblacion)', 'Bagtic']
        }
    },
    'Region7': {
        'Bohol': {
            'Tagbilaran City': ['Bool', 'Booy', 'Cogon', 'Dampas', 'Dao', 'Mansasa', 'Poblacion I'],
            'Tubigon': ['Bilangbilangan', 'Bohol', 'Buenos Aires', 'Bunacan', 'Cahayag', 'Cabulijan', 'Cabul-An'],
            'Jagna': ['Alejawan', 'Balili', 'Boctol', 'Bunga Ilaya', 'Bunga Mar', 'Buyog', 'Cabunga-an']
        },
        'Cebu': {
            'Cebu City': ['Adlaon', 'Agsungot', 'Apas', 'Babag', 'Bacayan', 'Banilad', 'Basak San Nicolas'],
            'Mandaue City': ['Alang-Alang', 'Bakilid', 'Banilad', 'Basak', 'Cabancalan', 'Cambaro', 'Canduman'],
            'Lapu-Lapu City': ['Agus', 'Babag', 'Bankal', 'Basak', 'Buaya', 'Calawisan', 'Canjulao']
        },
        'Negros Oriental': {
            'Dumaguete City': ['Bagacay', 'Bajumpandan', 'Balugo', 'Banilad', 'Bantayan', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)'],
            'Bais City': ['Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Biernes', 'Bonifacio', 'Cabanlutan', 'Cambagda', 'Cambaguio'],
            'Bayawan City': ['Ali-is', 'Banga', 'Buntod', 'Caranoche', 'Dawis', 'Kalamtukan', 'Kalumboyan']
        },
        'Siquijor': {
            'Siquijor': ['Bandilaan', 'Bolos', 'Cabelotan', 'Cabulihan', 'Caitican', 'Calalinan', 'Campalanas'],
            'Larena': ['Bontod', 'Canlambo', 'Canlabian', 'Helen', 'Nonoc', 'Poblacion', 'Sabang'],
            'Lazi': ['Campalanas', 'Canlasog', 'Cawitan', 'Dadalutan', 'Kimba', 'Nangka', 'Poblacion']
        }
    },
    'Region8': {
        'Biliran': {
            'Naval': ['Acasia', 'Agpangi', 'Anislagan', 'Atipolo', 'Borac', 'Calumpang', 'Capiñahan'],
            'Biliran': ['Bato', 'Burabod', 'Busali', 'Canila', 'Hugpa', 'Julita', 'Lamak'],
            'Cabucgayan': ['Balaquid', 'Balingasag', 'Bunga', 'Caanibongan', 'Casiawan', 'Langgao', 'Libertad']
        },
        'Eastern Samar': {
            'Borongan City': ['Alang-alang', 'Amantacop', 'Balacdas', 'Balangkayan', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)'],
            'Guiuan': ['Alingarog', 'Banahao', 'Baras', 'Barbo', 'Banaag', 'Bagongon', 'Bitaugan'],
            'Oras': ['Agsam', 'Bagacay', 'Baguis', 'Bantayan', 'Batang', 'Baybay', 'Binogawan']
        },
        'Leyte': {
            'Tacloban City': ['Abucay', 'Anibong', 'Apitong', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)'],
            'Ormoc City': ['Alegria', 'Alta Vista', 'Bagong Buhay', 'Bantigue', 'Barangay District 1 (Poblacion)', 'Barangay District 2 (Poblacion)', 'Barangay District 3 (Poblacion)'],
            'Baybay City': ['Altavista', 'Amguhan', 'Ampihanon', 'Banahao', 'Barangay District 1 (Poblacion)', 'Barangay District 2 (Poblacion)', 'Barangay District 3 (Poblacion)']
        },
        'Northern Samar': {
            'Catarman': ['Baybay', 'Cag-abaca', 'Caglanipao', 'Calachuchi', 'Calendar', 'Cervantes', 'Clemencia'],
            'Laoang': ['Abaton', 'Asum', 'Atipolo', 'Bagacay', 'Bawang', 'Binatiklan', 'Bongliw'],
            'Catubig': ['Anongo', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Barangay 5 (Poblacion)', 'Barangay 6 (Poblacion)']
        },
        'Samar': {
            'Catbalogan City': ['Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Barangay 5 (Poblacion)', 'Barangay 6 (Poblacion)', 'Barangay 7 (Poblacion)'],
            'Calbayog City': ['Acedillo', 'Aguit-itan', 'Alibaba', 'Amampacang', 'Anislag', 'Balud', 'Bayo'],
            'Basey': ['Arado', 'Bacubac', 'Baloog', 'Basiao', 'Baybay', 'Binongto-an', 'Buscada']
        },
        'Southern Leyte': {
            'Maasin City': ['Abgao', 'Asuncion', 'Bactul I', 'Bactul II', 'Badiang', 'Bagtican', 'Baguinbin'],
            'Sogod': ['Benit', 'Buac', 'Cabadbaran', 'Concepcion', 'Consolacion', 'Dagsa', 'Hibod-hibod'],
            'Silago': ['Balagawan', 'Catmon', 'Catalina', 'Hingatungan', 'Imelda', 'Katipunan', 'Laguma']
        }
    },
    'Region9': {
        'Zamboanga del Norte': {
            'Dipolog City': ['Barangay Central (Poblacion)', 'Barangay Turno (Poblacion)', 'Barra', 'Biasong', 'Cogon', 'Dicayas', 'Diwan'],
            'Dapitan City': ['Aliguay', 'Antipolo', 'Aseniero', 'Bagting', 'Banbanan', 'Barcelona', 'Barangay Central (Poblacion)'],
            'Sindangan': ['Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Bobonan', 'Binara', 'Binuangan']
        },
        'Zamboanga del Sur': {
            'Pagadian City': ['Balangasan', 'Balintawak', 'Baloyboan', 'Banale', 'Bangkal', 'Bogo', 'Bomba'],
            'Zamboanga City': ['Ayala', 'Baliwasan', 'Baluno', 'Barangay Zone I', 'Barangay Zone II', 'Barangay Zone III', 'Barangay Zone IV'],
            'Ipil': ['Balingasan', 'Bangkerohan', 'Caparan', 'Don Andres', 'Ipil Heights', 'Ipil Proper', 'Logan']
        },
        'Zamboanga Sibugay': {
            'Kabasalan': ['Balangao', 'Banker', 'Boli', 'Buayan', 'Cainglet', 'Calapan', 'Calades'],
            'Alicia': ['Alegria', 'Bagong Buhay', 'Dawa', 'Dalapang', 'Gulayon', 'Ilisan', 'La Paz'],
            'Buug': ['Bacalan', 'Balas', 'Bulaan', 'Datu Panas', 'Del Monte', 'Del Pilar', 'Guintularcan']
        }
    },
    'Region10': {
        'Bukidnon': {
            'Malaybalay City': ['Aglayan', 'Bangcud', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Barangay 5 (Poblacion)'],
            'Valencia City': ['Bagontapay', 'Barobo', 'Batangan', 'Catumbalon', 'Colonia', 'Concepcion', 'Guinoyoran'],
            'Maramag': ['Anahawon', 'Base Camp', 'Bayog', 'Camp 1', 'Colambugan', 'Colambugon', 'Collaborate']
        },
        'Camiguin': {
            'Mambajao': ['Agoho', 'Anito', 'Balbagon', 'Baylao', 'Benhaan', 'Binaliwan', 'Bug-ong'],
            'Mahinog': ['Benoni', 'Binaliwan', 'Catohugan', 'Hubangon', 'Owakan', 'Poblacion', 'Puntod'],
            'Sagay': ['Alangilan', 'Bacnit', 'Balite', 'Balintad', 'Camba-ay', 'Manuyog', 'Poblacion']
        },
        'Lanao del Norte': {
            'Iligan City': ['Abuno', 'Acmac', 'Bagong Silang', 'Bonbonon', 'Buruun', 'Bunawan', 'Dalipuga'],
            'Tubod': ['Bacolod', 'Berens', 'Buntong', 'Caniogan', 'Dalama', 'Kakai', 'Licapao'],
            'Bacolod': ['Babalaya', 'Babalayan', 'Bagong Buhay', 'Batoganon', 'Binuni', 'Esperanza', 'Maliwanag']
        },
        'Misamis Occidental': {
            'Oroquieta City': ['Adorable', 'Aguilar', 'Apil', 'Bagong Sikat', 'Banbanan', 'Binuangan', 'Bolibol'],
            'Ozamiz City': ['Aguada', 'Bacolod', 'Bagakay', 'Banadero', 'Baybay Triunfo', 'Bongbong', 'Calabayan'],
            'Tangub City': ['Aquino', 'Balatacan', 'Barangay I (Poblacion)', 'Barangay II (Poblacion)', 'Barangay III (Poblacion)', 'Barangay IV (Poblacion)', 'Barangay V (Poblacion)']
        },
        'Misamis Oriental': {
            'Cagayan de Oro City': ['Agusan', 'Balulang', 'Bayabas', 'Bayanga', 'Bonbon', 'Bugo', 'Bulua'],
            'El Salvador City': ['Amoros', 'Cogon', 'Himaya', 'Hinigdaan', 'Kalabaylabay', 'Kibonbon', 'Molugan'],
            'Gingoog City': ['Agay-ayan', 'Alagatan', 'Anakan', 'Bagubad', 'Bal-ason', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)']
        }
    },
    'Region11': {
        'Davao de Oro': {
            'Nabunturan': ['Anislagan', 'Antequera', 'Basak', 'Bayabas', 'Bukal', 'Cabidianan', 'Cabinuangan'],
            'Mawab': ['Andili', 'Bawani', 'Concepcion', 'Malinawon', 'Nueva Visayas', 'Nuevo Iloco', 'Poblacion'],
            'Maco': ['Anibongan', 'Anislagan', 'Binuangan', 'Bucana', 'Calabcab', 'Concepcion', 'Dumlan']
        },
        'Davao del Norte': {
            'Tagum City': ['Apokon', 'Bincungan', 'Busaon', 'Canocotan', 'La Filipina', 'Liboganon', 'Madaum'],
            'Panabo City': ['A. O. Floirendo', 'Buenavista', 'Cagangohan', 'Datu Abdul Dadia', 'Gredu', 'J.P. Laurel', 'Kasilak'],
            'Samal Island': ['Adecor', 'Aumbay', 'Aundanao', 'Balet', 'Bandera', 'Camudmud', 'Cogon']
        },
        'Davao del Sur': {
            'Digos City': ['Aplaya', 'Balabag', 'Binaton', 'Cogon', 'Colorado', 'Dawis', 'Dulangan'],
            'Bansalan': ['Alegre', 'Alta Vista', 'Anonang', 'Bitaug', 'Bonifacio', 'Buenavista', 'Darapuay'],
            'Sta. Cruz': ['Astorga', 'Bato', 'Coronon', 'Darong', 'Inawayan', 'Jose Rizal', 'Melilia']
        },
        'Davao Occidental': {
            'Malita': ['Bito', 'Buhangin', 'Culaman', 'Datu Danwata', 'Demloc', 'Felis', 'Fishing Village'],
            'Sta. Maria': ['Badiangon', 'Buca', 'Cadaatan', 'Kidadan', 'Kisulad', 'Lawa', 'Malalag Tubig'],
            'Don Marcelino': ['Balian', 'Calian', 'Dalupan', 'Kinanga', 'Lais', 'Linadasan', 'New Katipunan']
        },
        'Davao Oriental': {
            'Mati City': ['Badas', 'Banaybanay', 'Bobon', 'Buso', 'Central (Poblacion)', 'Dahican', 'Danao'],
            'Baganga': ['Baculin', 'Bahangin', 'Banao', 'Banghal', 'Batawan', 'Batiano', 'Binondo'],
            'Cateel': ['Abijod', 'Alegria', 'Aliwagwag', 'Aragon', 'Baogo', 'Banayal', 'Boston']
        }
    },
    'Region12': {
        'Cotabato': {
            'Kidapawan City': ['Amas', 'Balabag', 'Balindog', 'Bangkal', 'Basak', 'Binoligan', 'Birada'],
            'Midsayap': ['Anonang', 'Baguer', 'Bai Inged', 'Central Baranangay', 'Baliki', 'Batiocan', 'Binanggaan'],
            'Kabacan': ['Aringay', 'Bannawag', 'Buluan', 'Cuyapon', 'Dagupan', 'Kayaga', 'Kilagasan']
        },
        'Sarangani': {
            'Alabel': ['Alegria', 'Bagacay', 'Baluntay', 'Datal Anggas', 'Domolok', 'Kawas', 'Maribulan'],
            'Glan': ['Bagtikan', 'Baluntaya', 'Batulaki', 'Big Margus', 'Burios', 'Cablalan', 'Calabanit'],
            'Malungon': ['Alkikan', 'Atlae', 'Barayong', 'Blaan', 'Datal Batong', 'Datal Tampal', 'Kibala']
        },
        'South Cotabato': {
            'General Santos City': ['Apopong', 'Baluan', 'Batomelong', 'Buayan', 'Calumpang', 'City Heights', 'Conel'],
            'Koronadal City': ['Assumption', 'Avancena', 'Caloocan', 'Carpenter Hill', 'Concepcion', 'Esperanza', 'General Paulino Santos'],
            'Polomolok': ['Bentong', 'Cannery Site', 'Crossing Palkan', 'Glamang', 'Klinan 6', 'Koronadal Proper', 'Lamcaliaf']
        },
        'Sultan Kudarat': {
            'Tacurong City': ['Baras', 'Buenaflor', 'Calean', 'Carmen', 'Graciano', 'Kalandagan', 'Lancheta'],
            'Isulan': ['Bambad', 'Bual', 'D. Lotilla', 'Impao', 'Kalawag I', 'Kalawag II', 'Kalawag III'],
            'Lebak': ['Balatakan', 'Barurao', 'Basak', 'Tibpuan', 'Capilan', 'Sakaluran', 'Salaman']
        }
    },
    'Region13': {
        'Agusan del Norte': {
            'Butuan City': ['Agao', 'Agusan Pequeño', 'Ambago', 'Amparo', 'Ampayon', 'Anticala', 'Antongalon'],
            'Cabadbaran City': ['Antonio Luna', 'Calibunan', 'Comagascas', 'Del Pilar', 'Katugasan', 'Mabini', 'Poblacion 1'],
            'Buenavista': ['Abilan', 'Alubijid', 'Baan', 'Banza', 'Colorado', 'Guinabsan', 'La Paz']
        },
        'Agusan del Sur': {
            'San Francisco': ['Alegria', 'Bayugan III', 'Bitan-agan', 'Borbon', 'Das-agan', 'Karaos', 'Lapinigan'],
            'Bayugan City': ['Bayan', 'Caguyao', 'Canayugan', 'Charito', 'Del Monte', 'Don Mateo', 'Fili'],
            'Prosperidad': ['Awa', 'Azpetia', 'Bahbah', 'Boyoan', 'Concordia', 'La Caridad', 'La Paz']
        },
        'Dinagat Islands': {
            'San Jose': ['Aurelio', 'Cuarinta', 'Jacquez', 'Luna', 'Mahayahay', 'Melgar', 'Navarro'],
            'Basilisa': ['Benglen', 'Cabugao', 'Catadman', 'Doña Helen', 'Edera', 'Ferdinand', 'Geotina'],
            'Dinagat': ['Bagumbayan', 'Cab-ilan', 'Cagdiano', 'Cayetano', 'Concepcion', 'Cruz', 'Del Pilar']
        },
        'Surigao del Norte': {
            'Surigao City': ['Anomar', 'Balibayon', 'Balibuaya', 'Baybay', 'Bining', 'Bilang-bilang', 'Bitaugan'],
            'Dapa': ['Bagakay', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Barangay 5 (Poblacion)', 'Barangay 6 (Poblacion)'],
            'Del Carmen': ['Bagacay', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Cancohoy', 'Cabugao']
        },
        'Surigao del Sur': {
            'Tandag City': ['Awasian', 'Bag-ong Lungsod', 'Balibadon', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)'],
            'Bislig City': ['Bucto', 'Burboanan', 'Caguyao', 'Maharlika', 'Mangagoy', 'Pamanlinan', 'Pamaypayan'],
            'Tagbina': ['Batucan', 'Bugdang', 'Carpenito', 'Del Monte', 'Hinagdanan', 'Kahayagan', 'Maglambing']
        }
    },
    'BARMM': {
        'Basilan': {
            'Isabela City': ['Aguada', 'Balatanay', 'Baluno', 'Begang', 'Carbon', 'Isabela Proper', 'Kapayawan'],
            'Lamitan City': ['Arco', 'Baimbing', 'Balagtasan', 'Balas', 'Bato', 'Bohe-lhot', 'Bohe Pahu'],
            'Maluso': ['Abong-abong', 'Balobo', 'Calang-canas', 'Guicam', 'Lower Mahayahay', 'Mahayahay', 'Manaul']
        },
        'Lanao del Sur': {
            'Marawi City': ['Ambolong', 'Bangco', 'Banggolo Poblacion', 'Barionaga', 'Basak Malutlut', 'Biaba Damag', 'Bito Buadi Itowa'],
            'Malabang': ['Bacayawan', 'Banday', 'Brawong', 'Cabasaran', 'Calang', 'Camp Pinantao', 'Lalabuan'],
            'Wao': ['Balatin', 'Buntongan', 'Kahayagan', 'Katutungan', 'Kilikili', 'Malaigang', 'Park Area']
        },
        'Maguindanao': {
            'Cotabato City': ['Bagua', 'Kalanganan I', 'Kalanganan II', 'Poblacion I', 'Poblacion II', 'Poblacion III', 'Poblacion IV'],
            'Datu Odin Sinsuat': ['Ambolodto', 'Badak', 'Bagoenged', 'Bongued', 'Bugawas', 'Capiton', 'Dadtumeg'],
            'Sultan Kudarat': ['Alamada', 'Kakar', 'Katidtuan', 'Limbo', 'Ladia', 'Matiompong', 'Pinaring']
        },
        'Sulu': {
            'Jolo': ['Alat', 'Asturias', 'Bus-bus', 'Candatal', 'Chinese Pier', 'Marina', 'Pakitul'],
            'Indanan': ['Adjid', 'Bato-bato', 'Buanza', 'Kajatian', 'Karawan', 'Kuppong', 'Lambayong'],
            'Parang': ['Bagsak', 'Bawisan', 'Bugasan', 'Duyan Kaddatu', 'Igasan', 'Kahawa', 'Kutah']
        },
        'Tawi-Tawi': {
            'Bongao': ['Karungdong', 'Lamion', 'Lakit-Lakit', 'Luuk Pandan', 'Mandulan', 'Pagatpat', 'Pahut'],
            'Languyan': ['Bakong', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Barangay 4 (Poblacion)', 'Dalao', 'Darussalam'],
            'Sapa-Sapa': ['Banaran', 'Barangay 1 (Poblacion)', 'Barangay 2 (Poblacion)', 'Barangay 3 (Poblacion)', 'Latuan', 'Look Duhol', 'Tongbangkaw']
        }
    }
};
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

    // Populate province dropdown when region is selected
    document.getElementById('region').addEventListener('change', function() {
        const region = this.value;
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        const barangaySelect = document.getElementById('barangay');
        
        // Clear existing options
        provinceSelect.innerHTML = '<option value="">Select Province</option>';
        citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
        barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
        
        if (region && addressData[region]) {
            for (const province in addressData[region]) {
                const option = document.createElement('option');
                option.value = province;
                option.textContent = province;
                provinceSelect.appendChild(option);
            }
        }
    });

    // Populate city dropdown when province is selected
    document.getElementById('province').addEventListener('change', function() {
        const region = document.getElementById('region').value;
        const province = this.value;
        const citySelect = document.getElementById('city');
        const barangaySelect = document.getElementById('barangay');
        
        // Clear existing options
        citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
        barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
        
        if (region && province && addressData[region][province]) {
            for (const city in addressData[region][province]) {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            }
        }
    });

    // Populate barangay dropdown when city is selected
    document.getElementById('city').addEventListener('change', function() {
        const region = document.getElementById('region').value;
        const province = document.getElementById('province').value;
        const city = this.value;
        const barangaySelect = document.getElementById('barangay');
        
        // Clear existing options
        barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
        
        if (region && province && city && addressData[region][province][city]) {
            for (const barangay of addressData[region][province][city]) {
                const option = document.createElement('option');
                option.value = barangay;
                option.textContent = barangay;
                barangaySelect.appendChild(option);
            }
        }
    });

    // Form validation and submission
    document.getElementById('enrollmentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Get the form
        const form = event.currentTarget;
        
        // Check if the form is valid
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }
        
        // If form is valid, show success message
        document.getElementById('successAlert').classList.remove('d-none');
        form.classList.remove('was-validated');
        form.reset();
        
        // Scroll to success message
        document.getElementById('successAlert').scrollIntoView({ behavior: 'smooth' });
        
        // Hide success message after 5 seconds
        setTimeout(function() {
            document.getElementById('successAlert').classList.add('d-none');
        }, 5000);
    });

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

    document.addEventListener('DOMContentLoaded', function() {
    const maxSize = 5 * 1024 * 1024; // 5MB in bytes
    
    // Validate Form 137 file
    document.getElementById('form137').addEventListener('change', function(e) {
        validateFileSize(this, maxSize);
    });
    
    // Validate Good Moral Certificate file
    document.getElementById('goodMoral').addEventListener('change', function(e) {
        validateFileSize(this, maxSize);
    });
    
    // Function to validate file size
    function validateFileSize(input, maxSize) {
        if (input.files && input.files[0]) {
            const fileSize = input.files[0].size;
            
            if (fileSize > maxSize) {
                alert('File size exceeds the 5MB limit. Please select a smaller file.');
                input.value = ''; // Clear the input
            }
        }
    }
});
    </script>
</body>
</html>