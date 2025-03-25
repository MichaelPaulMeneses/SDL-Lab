<?php
// Database connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Initialize variables
// $student = null;
// $sections = [];
// $gradeLevel = '';
// $message = '';

// // Handle search student
// if (isset($_POST['search_student'])) {
//     $lrn = $_POST['lrn'];
    
//     $sql = "SELECT * FROM students WHERE lrn = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("s", $lrn);
//     $stmt->execute();
//     $result = $stmt->get_result();
    
//     if ($result->num_rows > 0) {
//         $student = $result->fetch_assoc();
//         $gradeLevel = $student['grade_level_to_enroll'];
        
//         // Get available sections for the grade level
//         $sectionSql = "SELECT * FROM sections WHERE grade_level = ?";
//         $sectionStmt = $conn->prepare($sectionSql);
//         $sectionStmt->bind_param("s", $gradeLevel);
//         $sectionStmt->execute();
//         $sectionResult = $sectionStmt->get_result();
        
//         while ($section = $sectionResult->fetch_assoc()) {
//             $sections[] = $section;
//         }
//     } else {
//         $message = "Student with LRN " . $lrn . " not found.";
//     }
// }

// // Handle section assignment
// if (isset($_POST['assign_section'])) {
//     $lrn = $_POST['lrn'];
//     $sectionId = $_POST['section_id'];
    
//     $sql = "UPDATE students SET section_id = ? WHERE lrn = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("is", $sectionId, $lrn);
    
//     if ($stmt->execute()) {
//         $message = "Student successfully assigned to section.";
//     } else {
//         $message = "Error assigning student to section: " . $conn->error;
//     }
// }

// // Handle new section creation
// if (isset($_POST['add_section'])) {
//     $sectionName = $_POST['section_name'];
//     $gradeLevel = $_POST['grade_level'];
//     $capacity = $_POST['capacity'];
    
//     $sql = "INSERT INTO sections (section_name, grade_level, capacity) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ssi", $sectionName, $gradeLevel, $capacity);
    
//     if ($stmt->execute()) {
//         $message = "New section added successfully.";
        
//         // Refresh sections
//         $sectionSql = "SELECT * FROM sections WHERE grade_level = ?";
//         $sectionStmt = $conn->prepare($sectionSql);
//         $sectionStmt->bind_param("s", $gradeLevel);
//         $sectionStmt->execute();
//         $sectionResult = $sectionStmt->get_result();
        
//         $sections = [];
//         while ($section = $sectionResult->fetch_assoc()) {
//             $sections[] = $section;
//         }
//     } else {
//         $message = "Error adding new section: " . $conn->error;
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .logo {
            width: 40px;
            height: 40px;
        }
        .student-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }
        .section-card {
            transition: all 0.3s;
        }
        .section-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .main-content {
            background-color: #f5f5f5;
            min-height: calc(100vh - 60px);
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/40" alt="Logo" class="logo me-2">
                WELCOME! ADMIN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-tachometer-alt me-1"></i> dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-1"></i> logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <?php if ($message): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo $message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Assign Student to a Section</h3>
                    <hr>
                    
                    <!-- Student Search Form -->
                    <form method="POST" action="" class="mb-4">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="lrn" class="col-form-label">Enter LRN:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="lrn" id="lrn" class="form-control" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="search_student" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <?php if ($student): ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="https://via.placeholder.com/120" alt="Student Avatar" class="student-avatar my-3">
                                    <h5 class="card-title">LRN: <?php echo $student['lrn']; ?></h5>
                                    <p class="card-text"><strong>Name:</strong> <?php echo $student['first_name'].' '.$student['middle_name'].' '.$student['last_name']; ?></p>
                                    <p class="card-text"><strong>Current Grade Level:</strong> Grade <?php echo $student['current_grade_level']; ?></p>
                                    <p class="card-text"><strong>Type of Enrollment:</strong> <?php echo $student['enrollment_type']; ?></p>
                                    <p class="card-text"><strong>Grade Level to Enroll:</strong> Grade <?php echo $student['grade_level_to_enroll']; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5>Sections for Grade <?php echo $gradeLevel; ?></h5>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSectionModal">
                                    <i class="fas fa-plus me-1"></i> Add Section
                                </button>
                            </div>
                            
                            <div class="row">
                                <?php foreach ($sections as $section): ?>
                                <?php 
                                    // Get current enrollment count
                                    $countSql = "SELECT COUNT(*) as count FROM students WHERE section_id = ?";
                                    $countStmt = $conn->prepare($countSql);
                                    $countStmt->bind_param("i", $section['id']);
                                    $countStmt->execute();
                                    $countResult = $countStmt->get_result();
                                    $count = $countResult->fetch_assoc()['count'];
                                ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card section-card h-100">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Section <?php echo $section['section_name']; ?></h5>
                                            <p class="card-text"><?php echo $count; ?>/<?php echo $section['capacity']; ?></p>
                                            <form method="POST" action="">
                                                <input type="hidden" name="lrn" value="<?php echo $student['lrn']; ?>">
                                                <input type="hidden" name="section_id" value="<?php echo $section['id']; ?>">
                                                <button type="submit" name="assign_section" class="btn btn-primary">Assign</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                                <?php if (empty($sections)): ?>
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        No sections available for Grade <?php echo $gradeLevel; ?>.
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Section Modal -->
    <div class="modal fade" id="addSectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="section_name" class="form-label">Section Name</label>
                            <input type="text" class="form-control" id="section_name" name="section_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="grade_level" class="form-label">Grade Level</label>
                            <input type="text" class="form-control" id="grade_level" name="grade_level" value="<?php echo $gradeLevel; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" value="30" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_section" class="btn btn-primary">Add Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>