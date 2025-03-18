<?php
// Start session for user authentication
session_start();

// Database connection configuration
$db_host = "localhost";
$db_user = "username"; // Replace with your actual DB username
$db_pass = "password"; // Replace with your actual DB password
$db_name = "student_portal";

// Create database connection
// Commented out for now, but you should uncomment this when you have a database set up
/*
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/

// Function to get student information
function getStudentInfo($student_id) {
    // Since we don't have a database connection, we'll use dummy data
    // In a real application, you'd query the database
    
    // Dummy student data
    $student_info = [
        'S12345' => [
            'student_id' => 'S12345',
            'first_name' => 'John',
            'last_name' => 'Smith',
            'year_level' => 'Grade 9',
            'section' => 'Faith',
            'profile_image' => 'img/default-profile.jpg'
        ]
    ];
    
    return isset($student_info[$student_id]) ? $student_info[$student_id] : false;
}

// Function to get enrollment status
function getEnrollmentStatus($student_id) {
    // Dummy enrollment status
    $enrollment_status = [
        'S12345' => 'ENROLLED'
    ];
    
    return isset($enrollment_status[$student_id]) ? $enrollment_status[$student_id] : 'NOT ENROLLED';
}

// Function to get required documents
function getRequiredDocuments($student_id) {
    // Dummy required documents
    $documents = [
        'S12345' => [
            [
                'doc_type' => 'birth_cert',
                'doc_name' => 'Birth Certificate',
                'doc_description' => 'Original or certified true copy'
            ],
            [
                'doc_type' => 'form_137',
                'doc_name' => 'Form 137',
                'doc_description' => 'Academic records from previous school'
            ],
            [
                'doc_type' => 'id_photo',
                'doc_name' => 'ID Photos',
                'doc_description' => '2x2 photos (4 copies)'
            ]
        ]
    ];
    
    return isset($documents[$student_id]) ? $documents[$student_id] : [];
}

// Function to upload a document
function uploadDocument($student_id, $doc_type, $file) {
    // This is a placeholder function
    // In a real application, you would save the file and update the database
    
    return array("success" => true, "message" => "The file has been uploaded successfully (demo).");
}

// Check if user is logged in
if (!isset($_SESSION['student_id']) && !isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: Login Form.php");
    exit();
}

// If we only have username but not student_id (from login form)
if (isset($_SESSION['username']) && !isset($_SESSION['student_id'])) {
    // In a real application, you would query the database to get the student_id
    // For now, we'll use a dummy student_id if the username is 'student'
    if ($_SESSION['username'] == 'student') {
        $_SESSION['student_id'] = 'S12345';
    }
}

// Get student information
$student_id = $_SESSION['student_id'];
$student_info = getStudentInfo($student_id);
$enrollment_status = getEnrollmentStatus($student_id);
$required_documents = getRequiredDocuments($student_id);

// Handle document upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $doc_type = $_POST["doc_type"];
    $result = uploadDocument($student_id, $doc_type, $_FILES["document"]);
    
    // Store result for displaying success/error message
    $_SESSION['upload_result'] = $result;
    
    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// If student info is not found, redirect to login
if (!$student_info) {
    $_SESSION['loginErr'] = "Invalid student account";
    header("Location: Login Form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    <div class="header">
        <div>
            <img src="logo.jpg" alt="Logo" style="width: 20%; max-width: 100px;">
            <strong>WELCOME! </strong><?php echo htmlspecialchars($student_info['first_name'] . ' ' . $student_info['last_name']); ?>
        </div>
        <div>
            <a href="profile.php">profile</a>
            <a href="email.php">email</a>
            <a href="Login Form.php">logout</a>
        </div>
    </div>
    
    <div class="main-container">
        <div class="status-container border">
            <div class="profile-section">
                <img src="<?php echo $student_info['profile_image'] ?: 'img/default-profile.jpg'; ?>" alt="Profile Image" class="profile-img">
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
                        <a href="enrollment.php" class="btn btn-primary">Enroll Now</a>
                    <?php elseif ($enrollment_status == "PENDING"): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
                            Upload Documents
                        </button>
                    <?php elseif ($enrollment_status == "ENROLLED"): ?>
                        <a href="schedule.php" class="btn btn-primary">View Schedule</a>
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="doc_type" class="form-label">Document Type</label>
                            <select class="form-select" id="doc_type" name="doc_type" required>
                                <option value="">Select document type</option>
                                <?php foreach ($required_documents as $doc): ?>
                                    <option value="<?php echo htmlspecialchars($doc['doc_type']); ?>">
                                        <?php echo htmlspecialchars($doc['doc_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="document" class="form-label">Select PDF file</label>
                            <input class="form-control" type="file" id="document" name="document" accept=".pdf" required>
                            <div class="form-text">Only PDF files are accepted (max 10MB)</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>