<?php
// Start session if not already started
// session_start();

// // Check if user is logged in as admin - connect this to your existing authentication
// if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
//     // Redirect to your login page
//     header("Location: login.php");
//     exit();

// Sample data for the dashboard (in a real app, this would come from a database)
$dashboardData = [
    'students_not_enrolled' => 24,
    'enrollments_review' => 6,
    'students_pre_enrolled' => 33,
    'new_students' => 35,
    'transferee_students' => 11,
    'students_enrolled' => 77
];

// Get current page from query parameter or set default to dashboard
$currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Sample student data (in a real app, this would come from a database)
$studentsNotEnrolled = [
    ['id' => 'SID-20250001', 'name' => 'Juwan Carlos Villegas', 'grade' => 'Grade 10', 'status' => 'Not Enrolled'],
    ['id' => 'SID-20250002', 'name' => 'Maria Santos', 'grade' => 'Grade 9', 'status' => 'Not Enrolled'],
    ['id' => 'SID-20250003', 'name' => 'Paulo Rivera', 'grade' => 'Grade 8', 'status' => 'Not Enrolled']
];

$studentsEnrolled = [
    ['id' => 'SID-20250004', 'name' => 'Samantha Cabrera', 'grade' => 'Grade 10', 'status' => 'Enrolled'],
    ['id' => 'SID-20250005', 'name' => 'Miguel Santos', 'grade' => 'Grade 9', 'status' => 'Enrolled'],
    ['id' => 'SID-20250006', 'name' => 'Regina Santos', 'grade' => 'Grade 8', 'status' => 'Enrolled']
];

$enrollmentsReview = [
    ['id' => 'SID-20250007', 'name' => 'Alexander Santos Villegas', 'grade' => 'Grade 10', 'status' => 'For Review'],
    ['id' => 'SID-20250008', 'name' => 'John Gomez', 'grade' => 'Grade 9', 'status' => 'For Review'],
    ['id' => 'SID-20250009', 'name' => 'Regina Reyes', 'grade' => 'Grade 8', 'status' => 'For Review']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .header {
            background-color: #0D6EFD;
            color: white;
            padding: 10px 20px;
        }
        .header a {
            text-decoration: none;
            color: white;
            text-transform: lowercase;
        }
        .sidebar {
            background-color: white;
            min-height: calc(100vh - 56px);
            border-right: 1px solid #dee2e6;
        }
        .sidebar .nav-link {
            color: #333;
            padding: 10px 15px;
            border-bottom: 1px solid #dee2e6;
        }
        .sidebar .nav-link.active {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .stat-card {
            height: 80px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            margin-bottom: 20px;
        }
        .yellow-bg {
            background-color: #FFC107;
        }
        .red-bg {
            background-color: #DC3545;
        }
        .green-bg {
            background-color: #28A745;
        }
        .gray-bg {
            background-color: #6C757D;
        }
        .blue-bg {
            background-color: #0D6EFD;
        }
        .main-content {
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .filter-bar {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .filter-btn {
            margin-right: 5px;
            padding: 2px 10px;
            font-size: 0.8rem;
        }
        .student-table {
            width: 100%;
        }
        .student-table th {
            font-size: 0.9rem;
            font-weight: normal;
            color: #6c757d;
        }
        .student-table td {
            vertical-align: middle;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
        <img src="logo.jpg" alt="Logo" style="width: 20%; max-width: 100px;">
            <h5 class="mb-0">WELCOME! ADMIN</h5>
        </div>
        <div>
            <a href="?page=dashboard" class="me-3">dashboard</a>
            <a href="Login Form.php">logout</a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="list-group list-group-flush">
                    <a href="?page=dashboard" class="nav-link <?php echo $currentPage == 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
                    <a href="?page=all_students" class="nav-link <?php echo $currentPage == 'all_students' ? 'active' : ''; ?>">All Students</a>
                    <a href="?page=new_students" class="nav-link <?php echo $currentPage == 'new_students' ? 'active' : ''; ?>">All New Students</a>
                    <a href="?page=old_students" class="nav-link <?php echo $currentPage == 'old_students' ? 'active' : ''; ?>">All Old Students</a>
                    <a href="?page=transferee" class="nav-link <?php echo $currentPage == 'transferee' ? 'active' : ''; ?>">All Transferee</a>
                    <a href="?page=user_management" class="nav-link <?php echo $currentPage == 'user_management' ? 'active' : ''; ?>">User Management</a>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 p-3">
                <?php if ($currentPage == 'dashboard'): ?>
                    <!-- Dashboard View -->
                    <div class="row">
                        <div class="col-md-2">
                            <div class="stat-card yellow-bg">
                                <strong>Students Not Yet Enrolled</strong>
                                <span><?php echo $dashboardData['students_not_enrolled']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="stat-card red-bg">
                                <strong>Enrollments Under Review</strong>
                                <span><?php echo $dashboardData['enrollments_review']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="stat-card green-bg">
                                <strong>Students Pre-Enrolled</strong>
                                <span><?php echo $dashboardData['students_pre_enrolled']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="stat-card gray-bg">
                                <strong>New Students</strong>
                                <span><?php echo $dashboardData['new_students']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="stat-card gray-bg">
                                <strong>Transferee Students</strong>
                                <span><?php echo $dashboardData['transferee_students']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="stat-card blue-bg">
                                <strong>Students Enrolled</strong>
                                <span><?php echo $dashboardData['students_enrolled']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php elseif ($currentPage == 'students_not_enrolled'): ?>
                    <!-- Students Not Yet Enrolled View -->
                    <div class="main-content">
                        <div class="table-header">
                            <h5>Students Not Yet Enrolled</h5>
                            <div>
                                <button class="btn btn-warning btn-sm filter-btn">Export</button>
                                <button class="btn btn-danger btn-sm filter-btn">PDF</button>
                                <button class="btn btn-sm filter-btn">—</button>
                            </div>
                        </div>
                        <div class="filter-bar">
                            <input type="text" class="form-control form-control-sm me-2" placeholder="Search..." style="width: 200px;">
                        </div>
                        <table class="table student-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Complete Name</th>
                                    <th>Grade Level</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($studentsNotEnrolled as $student): ?>
                                <tr>
                                    <td><?php echo $student['id']; ?></td>
                                    <td><?php echo $student['name']; ?></td>
                                    <td><?php echo $student['grade']; ?></td>
                                    <td><?php echo $student['status']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php elseif ($currentPage == 'students_enrolled'): ?>
                    <!-- Students Enrolled View -->
                    <div class="main-content">
                        <div class="table-header">
                            <h5>Students Enrolled</h5>
                            <div>
                                <button class="btn btn-warning btn-sm filter-btn">Export</button>
                                <button class="btn btn-danger btn-sm filter-btn">PDF</button>
                                <button class="btn btn-sm filter-btn">—</button>
                            </div>
                        </div>
                        <div class="filter-bar">
                            <input type="text" class="form-control form-control-sm me-2" placeholder="Search..." style="width: 200px;">
                        </div>
                        <table class="table student-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Complete Name</th>
                                    <th>Grade Level</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($studentsEnrolled as $student): ?>
                                <tr>
                                    <td><?php echo $student['id']; ?></td>
                                    <td><?php echo $student['name']; ?></td>
                                    <td><?php echo $student['grade']; ?></td>
                                    <td><?php echo $student['status']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php elseif ($currentPage == 'enrollments_review'): ?>
                    <!-- Enrollments Under Review View -->
                    <div class="main-content">
                        <div class="table-header">
                            <h5>Enrollment Under Review</h5>
                            <div>
                                <button class="btn btn-success btn-sm filter-btn">Accept</button>
                                <button class="btn btn-warning btn-sm filter-btn">Pending</button>
                                <button class="btn btn-danger btn-sm filter-btn">Reject</button>
                                <button class="btn btn-sm filter-btn">—</button>
                            </div>
                        </div>
                        <div class="filter-bar">
                            <input type="text" class="form-control form-control-sm me-2" placeholder="Search..." style="width: 200px;">
                        </div>
                        <table class="table student-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Complete Name</th>
                                    <th>Grade Level</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($enrollmentsReview as $student): ?>
                                <tr>
                                    <td><?php echo $student['id']; ?></td>
                                    <td><?php echo $student['name']; ?></td>
                                    <td><?php echo $student['grade']; ?></td>
                                    <td><?php echo $student['status']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- Dashboard Links to category pages -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><?php echo ucwords(str_replace('_', ' ', $currentPage)); ?></h5>
                                </div>
                                <div class="card-body">
                                    <p>This section is currently under development.</p>
                                    <p>Please check back later or navigate to another section.</p>
                                </div>
                            </div>
                        </div><div class="row mt-3">
                            <div class="col-md-3">
                                <a href="?page=students_not_enrolled" class="card bg-light border-0 mb-4 text-center p-3 text-decoration-none text-dark">
                                    <div class="card-body">
                                        <h6>Students Not Yet Enrolled</h6>
                                        <div class="fs-4 fw-bold text-warning"><?php echo $dashboardData['students_not_enrolled']; ?></div>
                                        <small class="text-muted">Click to view details</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="?page=enrollments_review" class="card bg-light border-0 mb-4 text-center p-3 text-decoration-none text-dark">
                                    <div class="card-body">
                                        <h6>Enrollments Under Review</h6>
                                        <div class="fs-4 fw-bold text-danger"><?php echo $dashboardData['enrollments_review']; ?></div>
                                        <small class="text-muted">Click to view details</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="?page=pre_enrolled" class="card bg-light border-0 mb-4 text-center p-3 text-decoration-none text-dark">
                                    <div class="card-body">
                                        <h6>Students Pre-Enrolled</h6>
                                        <div class="fs-4 fw-bold text-success"><?php echo $dashboardData['students_pre_enrolled']; ?></div>
                                        <small class="text-muted">Click to view details</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="?page=students_enrolled" class="card bg-light border-0 mb-4 text-center p-3 text-decoration-none text-dark">
                                    <div class="card-body">
                                        <h6>Students Enrolled</h6>
                                        <div class="fs-4 fw-bold text-primary"><?php echo $dashboardData['students_enrolled']; ?></div>
                                        <small class="text-muted">Click to view details</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- JavaScript for functionality -->
    <script>
        // Function to handle card clicks in dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event listeners to dashboard cards
            const dashboardCards = document.querySelectorAll('.stat-card');
            dashboardCards.forEach(card => {
                card.addEventListener('click', function() {
                    const cardText = this.querySelector('strong').textContent.trim().toLowerCase();
                    
                    // Determine which page to navigate to based on the card text
                    let targetPage = '';
                    if (cardText.includes('not yet enrolled')) {
                        targetPage = 'students_not_enrolled';
                    } else if (cardText.includes('under review')) {
                        targetPage = 'enrollments_review';
                    } else if (cardText.includes('pre-enrolled')) {
                        targetPage = 'pre_enrolled';
                    } else if (cardText.includes('enrolled')) {
                        targetPage = 'students_enrolled';
                    } else if (cardText.includes('new')) {
                        targetPage = 'new_students';
                    } else if (cardText.includes('transferee')) {
                        targetPage = 'transferee';
                    }
                    
                    if (targetPage) {
                        window.location.href = `?page=${targetPage}`;
                    }
                });
            });

            // Make the cards clickable with a pointer cursor
            dashboardCards.forEach(card => {
                card.style.cursor = 'pointer';
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>