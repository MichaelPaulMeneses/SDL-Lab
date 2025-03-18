<?php
// Start session for user authentication
session_start();

// Database connection configuration - commented out but will be needed in production
/*
$db_host = "localhost";
$db_user = "username"; // Replace with your actual DB username
$db_pass = "password"; // Replace with your actual DB password
$db_name = "student_portal";

// Create database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/

// Initialize variables for login/signup
$username = $password = $name = $email = "";
$usernameErr = $passwordErr = $loginErr = $nameErr = $emailErr = "";
$login_successful = false;
$show_signup_form = false;
$show_enrollment_types = false;
$signup_success = false;
$enrollment_type = "";

// Check if user is already logged in - show portal instead of login
$is_logged_in = isset($_SESSION['student_id']);

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to get student information
function getStudentInfo($student_id) {
    // In a real implementation, this would query the database
    // For now, return mock data
    return [
        'student_id' => $student_id,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'year_level' => 'Grade 10',
        'section' => 'St. Francis',
        'profile_image' => null
    ];
}

// Function to get enrollment status
function getEnrollmentStatus($student_id) {
    // Mock data - in real implementation would query database
    return "PENDING";
}

// Function to get required documents
function getRequiredDocuments($student_id) {
    // Mock data - in real implementation would query database
    return [
        ['doc_type' => 'birth_cert', 'doc_name' => 'Birth Certificate', 'doc_description' => 'Original or certified true copy'],
        ['doc_type' => 'form137(Report Card)', 'doc_name' => 'Form 137 (Report Card)', 'doc_description' => 'From previous school year'],
        ['doc_type' => 'good_moral', 'doc_name' => 'Good Moral Certificate', 'doc_description' => 'From previous school']
    ];
}

// Function to upload a document
function uploadDocument($student_id, $doc_type, $file) {
    // Set upload directory
    $target_dir = "uploads/" . $student_id . "/";
    
    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // Generate a unique filename
    $filename = uniqid() . "_" . basename($file["name"]);
    $target_file = $target_dir . $filename;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file is a PDF
    if ($file_type != "pdf") {
        return array("success" => false, "message" => "Sorry, only PDF files are allowed.");
    }
    
    // Check file size (limit to 10MB)
    if ($file["size"] > 10000000) {
        return array("success" => false, "message" => "Sorry, your file is too large.");
    }
    
    // Upload file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        // In real implementation, would update database here
        return array("success" => true, "message" => "The file has been uploaded successfully.");
    } else {
        return array("success" => false, "message" => "Sorry, there was an error uploading your file.");
    }
}

// Check if user selected an enrollment type
if (isset($_GET['type']) && !$is_logged_in) {
    $enrollment_type = ucfirst($_GET['type']);
    $show_signup_form = true;
}

// Check if user wants to show enrollment options
if (isset($_GET['action']) && $_GET['action'] == 'enroll' && !$is_logged_in) {
    $show_enrollment_types = true;
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !$is_logged_in) {
    // Check which form was submitted
    if (isset($_POST['form_type'])) {
        // Handle signup form
        if ($_POST['form_type'] == 'signup') {
            $enrollment_type = $_POST['type'];
            
            // Validate name
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
            }
            
            // Validate email
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                // Check if email format is valid
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
            
            // Validate password
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);
            }
            
            // If no errors, proceed with signup
            if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
                // Here you would typically save to a database
                // For now, we'll just indicate success
                $signup_success = true;
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                // You would save $name, $email, $password_hash to database here
                
                // Generate a student ID for demo purposes
                $_SESSION['student_id'] = 'S' . date('Ymd') . rand(1000, 9999);
                $is_logged_in = true;
            }
        }
        // Handle login form
        else if ($_POST['form_type'] == 'login') {
            // Validate username
            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
            } else {
                $username = test_input($_POST["username"]);
            }
            
            // Validate password
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);
            }
            
            // If no errors, proceed with login verification
            if (empty($usernameErr) && empty($passwordErr)) {
                // Here you would typically verify against a database
                // Using correct username/password as specified
                if ($username == "student" && $password == "password123") {
                    $login_successful = true;
                    // Set session values
                    $_SESSION['student_id'] = 'S20250316001'; // Mock student ID
                    $is_logged_in = true;
                } else {
                    $loginErr = "Invalid username or password";
                }
            }
        }
    }
}

// Handle document upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && $is_logged_in && isset($_FILES["document"])) {
    $doc_type = $_POST["doc_type"];
    $result = uploadDocument($_SESSION['student_id'], $doc_type, $_FILES["document"]);
    
    // Store result for displaying success/error message
    $_SESSION['upload_result'] = $result;
    
    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// If user is logged in, get their info
if ($is_logged_in) {
    $student_id = $_SESSION['student_id'];
    $student_info = getStudentInfo($student_id);
    $enrollment_status = getEnrollmentStatus($student_id);
    $required_documents = getRequiredDocuments($student_id);
}

// Check for logout request
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. John the Baptist Parochial School</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-image: url('https://via.placeholder.com/1920x1080/f5f5f5/f5f5f5?text=');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            <?php if (!$is_logged_in): ?>
            justify-content: center;
            align-items: center;
            <?php endif; ?>
        }
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .school-footer {
            margin-top: 1rem;
            border: 1px solid #dee2e6;
            padding: 0.5rem;
            text-align: center;
            width: 100%;
        }
        /* Portal Styles */
        .profile-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
        }
        .main-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }
        .status-container {
            display: flex;
            padding: 20px;
            background-color: white;
            margin-top: 20px;
        }
        .profile-section {
            width: 130px;
        }
        .info-section {
            flex-grow: 1;
            padding-left: 20px;
        }
        .btn-primary {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <?php if ($is_logged_in): ?>
    <!-- STUDENT PORTAL VIEW -->
    <div class="header">
        <div>
        
            <strong>WELCOME! </strong><?php echo htmlspecialchars($student_info['first_name'] . ' ' . $student_info['last_name']); ?>
        </div>
        <div>
            <a href="?view=profile">profile</a>
            <a href="?view=email">email</a>
            <a href="?logout=1">logout</a>
        </div>
    </div>
    
    <div class="main-container">
        <div class="status-container border">
            <div class="profile-section">
                <img src="<?php echo $student_info['profile_image'] ?: 'https://via.placeholder.com/80?text=Profile'; ?>" alt="Profile Image" class="profile-img">
                <p>LRN: <?php echo htmlspecialchars($student_info['student_id']); ?></p>
                <p>Name: <?php echo htmlspecialchars($student_info['first_name'] . ' ' . $student_info['last_name']); ?></p>
                <p>Year Level: <?php echo htmlspecialchars($student_info['year_level']); ?></p>
            </div>
            
            <div class="info-section">
                <?php if ($enrollment_status == "NOT ENROLLED"): ?>
                    <p>You are currently <strong><?php echo htmlspecialchars($enrollment_status); ?></strong></p>
                    <p>Please enroll before August 14, 2025.</p>
                <?php elseif ($enrollment_status == "UNDER REVIEW"): ?>
                    <p>Your enrollment is <strong><?php echo htmlspecialchars($enrollment_status); ?></strong></p>
                <?php elseif ($enrollment_status == "PENDING"): ?>
                    <p>Your enrollment status is <strong><?php echo htmlspecialchars($enrollment_status); ?></strong></p>
                    <p>Please submit the following required documents:</p>
                    <ul>
                        <?php foreach ($required_documents as $doc): ?>
                            <li><?php echo htmlspecialchars($doc['doc_name']); ?> (<?php echo htmlspecialchars($doc['doc_description']); ?>)</li>
                        <?php endforeach; ?>
                    </ul>
                <?php elseif ($enrollment_status == "ENROLLED"): ?>
                    <p>You are currently <strong><?php echo htmlspecialchars($enrollment_status); ?></strong></p>
                    <p>Section: <?php echo htmlspecialchars($student_info['section']); ?></p>
                    <p>The School Year will start on August 19, 2025</p>
                <?php endif; ?>
                
                <div class="mt-3">
                    <?php if ($enrollment_status == "NOT ENROLLED"): ?>
                        <a href="?action=enroll" class="btn btn-primary">Enroll Now</a>
                    <?php elseif ($enrollment_status == "PENDING"): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
                            Upload Documents
                        </button>
                    <?php elseif ($enrollment_status == "ENROLLED"): ?>
                        <a href="?view=schedule" class="btn btn-primary">View Schedule</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <?php if (isset($_SESSION['upload_result'])): ?>
            <div class="alert <?php echo $_SESSION['upload_result']['success'] ? 'alert-success' : 'alert-danger'; ?> mt-3">
                <?php echo $_SESSION['upload_result']['message']; ?>
            </div>
            <?php unset($_SESSION['upload_result']); ?>
        <?php endif; ?>
    </div>
    
 <!-- Document Upload Modal -->
<div class="modal fade" id="uploadDocModal" tabindex="-1" aria-labelledby="uploadDocModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadDocModalLabel">Upload Required Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="doc_type" class="form-label">Document Type</label>
                        <select class="form-select" id="doc_type" name="doc_type" required>
                            <option value="">Select document type</option>
                            <?php foreach ($required_documents as $doc): ?>
                                <option value="<?php echo htmlspecialchars($doc['doc_type']); ?>"><?php echo htmlspecialchars($doc['doc_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="document" class="form-label">Document (PDF only)</label>
                        <input type="file" class="form-control" id="document" name="document" accept=".pdf" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    
    <?php else: ?>
    <!-- LOGIN/SIGNUP VIEW -->
    <?php if ($show_enrollment_types): ?>
        <div class="form-container">
            <h2 class="text-center mb-4">Select Enrollment Type</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Student</h5>
                            <p class="card-text">First time enrolling in our school</p>
                            <a href="?type=new" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Returning Student</h5>
                            <p class="card-text">Previously enrolled in our school</p>
                            <a href="?type=returning" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-link">Back to Login</a>
            </div>
        </div>
    <?php elseif ($signup_success): ?>
        <div class="form-container">
            <div class="alert alert-success">
                <h4 class="alert-heading">Registration Successful!</h4>
                <p>Thank you for registering as a <?php echo htmlspecialchars($enrollment_type); ?> Student.</p>
                <p>Your account has been created. You can now complete your enrollment by submitting the required documents.</p>
                <hr>
                <p class="mb-0">Please proceed to the student portal to continue.</p>
            </div>
            <div class="text-center">
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-primary">Go to Student Portal</a>
            </div>
        </div>
    <?php elseif ($show_signup_form): ?>
        <div class="form-container">
            <h2 class="text-center mb-4"><?php echo htmlspecialchars($enrollment_type); ?> Student Registration</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="form_type" value="signup">
                <input type="hidden" name="type" value="<?php echo htmlspecialchars($enrollment_type); ?>">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Complete Name</label>
                    <input type="text" class="form-control <?php echo (!empty($nameErr)) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo $name; ?>">
                    <div class="invalid-feedback"><?php echo $nameErr; ?></div>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control <?php echo (!empty($emailErr)) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>">
                    <div class="invalid-feedback"><?php echo $emailErr; ?></div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" id="password" name="password">
                    <div class="invalid-feedback"><?php echo $passwordErr; ?></div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <div class="text-center mt-3">
                <p>Already have an account? <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Login</a></p>
            </div>
        </div>
    <?php else: ?>
        <div class="form-container">
        <div style="text-align: center;">
    <img src="logo.jpg" alt="Logo" style="width: 50%; max-width: 300px;">
        </div>
            <h2 class="text-center mb-4">St. John the Baptist Parochial School</h2>
            <?php if ($login_successful): ?>
                <div class="alert alert-success">Login successful! Redirecting...</div>
            <?php endif; ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="form_type" value="login">
                
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?php echo (!empty($usernameErr)) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?php echo $username; ?>">
                    <div class="invalid-feedback"><?php echo $usernameErr; ?></div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" id="password" name="password">
                    <div class="invalid-feedback"><?php echo $passwordErr; ?></div>
                </div>
                
                <?php if (!empty($loginErr)): ?>
                    <div class="alert alert-danger"><?php echo $loginErr; ?></div>
                <?php endif; ?>
                
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
       
    <?php endif; ?>
    
    <div class="school-footer">
        <strong>St. John the Baptist Parochial School</strong><br>
        Sumulong Street, Brgy. San Isidro, Taytay, Rizal, Philippines<br>
        Phone: (123) 456-7890 | Email: sjbps_10@yahoo.com
    </div>
    <?php endif; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>