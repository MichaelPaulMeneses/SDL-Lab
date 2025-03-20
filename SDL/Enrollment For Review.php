<?php
// Start session for admin authentication
// session_start();

// // Check if admin is logged in, if not redirect to login page
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: login.php");
//     exit();
// }

// // Database connection
// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "enrollment_system";

// $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Get enrollment ID from URL parameter
$enrollment_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Get enrollment details
$student = [];
if ($enrollment_id > 0) {
    $stmt = $conn->prepare("SELECT e.*, s.lrn, s.first_name, s.middle_name, s.last_name, 
                          s.birthday, s.sex, s.nationality, s.address, s.email, 
                          s.guardian_name, s.guardian_relationship, s.guardian_contact,
                          s.last_school, s.last_school_address, s.profile_image
                          FROM enrollments e
                          JOIN students s ON e.student_id = s.id
                          WHERE e.id = ?");
    $stmt->bind_param("i", $enrollment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        // No student found with this ID
        header("Location: dashboard.php");
        exit();
    }
    $stmt->close();
}

// Handle approve/decline actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        
        if ($action == 'approve') {
            // Update enrollment status to approved
            $stmt = $conn->prepare("UPDATE enrollments SET status = 'approved' WHERE id = ?");
            $stmt->bind_param("i", $enrollment_id);
            $stmt->execute();
            $stmt->close();
            
            // Redirect to dashboard with success message
            $_SESSION['message'] = "Enrollment approved successfully";
            header("Location: dashboard.php");
            exit();
        } 
        elseif ($action == 'decline') {
            // Update enrollment status to declined
            $stmt = $conn->prepare("UPDATE enrollments SET status = 'declined' WHERE id = ?");
            $stmt->bind_param("i", $enrollment_id);
            $stmt->execute();
            $stmt->close();
            
            // Redirect to dashboard with declined message
            $_SESSION['message'] = "Enrollment declined";
            header("Location: dashboard.php");
            exit();
        }
    }
}

// Get document verification status
// $documents = [];
// $doc_types = ['report_card', 'birth_certificate', 'good_moral', 'development'];

// $stmt = $conn->prepare("SELECT document_type, is_verified FROM documents WHERE enrollment_id = ?");
// $stmt->bind_param("i", $enrollment_id);
// $stmt->execute();
// $result = $stmt->get_result();

// while ($row = $result->fetch_assoc()) {
//     $documents[$row['document_type']] = $row['is_verified'];
// }
// $stmt->close();

// // Close database connection
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0">
        <!-- Header -->
        <nav class="navbar navbar-expand navbar-primary bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                    WELCOME! ADMIN
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-white" href="Admin.php">dashboard</a>
                    <a class="nav-link text-white" href="Login Form.php">logout</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mt-3">
            <div class="card">
                <div class="card-header">
                    <h5>Enrollment For Review</h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($student)): ?>
                    <div class="row">
                        <!-- Student Profile Section -->
                        <div class="col-md-4 text-center">
                            <img src="<?php echo !empty($student['profile_image']) ? $student['profile_image'] : 'default_profile.jpg'; ?>" 
                                 alt="Student Profile" class="rounded-circle" width="120" height="120">
                            <div class="mt-3">
                                <p class="mb-1"><strong>LRN:</strong> <?php echo htmlspecialchars($student['lrn']); ?></p>
                                <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($student['last_name'] . ', ' . $student['first_name'] . ' ' . $student['middle_name']); ?></p>
                                <p class="mb-1"><strong>Current Grade Level:</strong> <?php echo htmlspecialchars($student['current_grade']); ?></p>
                                <p class="mb-1"><strong>Type of Enrollment:</strong> <?php echo htmlspecialchars($student['enrollment_type']); ?></p>
                                <p class="mb-1"><strong>Grade Level to Enroll:</strong> <?php echo htmlspecialchars($student['grade_to_enroll']); ?></p>
                                
                                <div class="d-flex justify-content-center mt-3">
                                    <form method="post" class="me-2">
                                        <input type="hidden" name="action" value="decline">
                                        <button type="submit" class="btn btn-danger">Decline</button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" name="action" value="approve">
                                        <button type="submit" class="btn btn-primary">Approve</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Student Details Section -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h6>Verify Documents:</h6>
                                <div class="mb-2">
                                    <?php foreach ($doc_types as $doc): ?>
                                    <a href="view_document.php?type=<?php echo $doc; ?>&id=<?php echo $enrollment_id; ?>" 
                                       class="btn <?php echo isset($documents[$doc]) && $documents[$doc] ? 'btn-success' : 'btn-outline-success'; ?> me-2">
                                        <?php echo ucwords(str_replace('_', ' ', $doc)); ?>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Birthday:</strong> <?php echo date('F j, Y', strtotime($student['birthday'])); ?></p>
                                    <p><strong>Sex:</strong> <?php echo htmlspecialchars($student['sex']); ?></p>
                                    <p><strong>Nationality:</strong> <?php echo htmlspecialchars($student['nationality']); ?></p>
                                    <p><strong>Home Address:</strong> <?php echo htmlspecialchars($student['address']); ?></p>
                                    <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Guardian's Name:</strong> <?php echo htmlspecialchars($student['guardian_name']); ?></p>
                                    <p><strong>Relationship with Guardian:</strong> <?php echo htmlspecialchars($student['guardian_relationship']); ?></p>
                                    <p><strong>Guardian's Contact:</strong> <?php echo htmlspecialchars($student['guardian_contact']); ?></p>
                                    <p><strong>Last School Attended:</strong> <?php echo htmlspecialchars($student['last_school']); ?></p>
                                    <p><strong>Last School Attended Address:</strong> <?php echo htmlspecialchars($student['last_school_address']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-warning">
                        No enrollment data found or invalid enrollment ID.
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>