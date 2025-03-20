<?php
// Initialize sample data
$totalStudentsEnrolled = 77;
$enrollmentsForReview = 3;
$totalNotEnrolledStudents = 6;
$studentsUnassigned = 33;
$totalTeachers = 11;
$totalAccounts = 32;

// Sample enrollment data for the graph
$enrollmentByGrade = [
    'Grade 1' => 15,
    'Grade 2' => 12,
    'Grade 3' => 18,
    'Grade 4' => 14,
    'Grade 5' => 10,
    'Grade 6' => 8
];

// Set active section from URL parameter or default to dashboard
$activeSection = isset($_GET['section']) ? $_GET['section'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #1a1a1a;
            color: #333;
        }
        .header {
            background-color: #0099ff;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container {
            display: flex;
            align-items: center;
        }
        .logo {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo img {
            width: 30px;
            height: 30px;
        }
        .dashboard-container {
            background-color: #f0f0f0;
            padding: 20px;
        }
        .sidebar {
            background-color: white;
            padding: 20px;
            height: 100%;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar li {
            padding: 10px 0;
            cursor: pointer;
        }
        .sidebar li:hover {
            color: #0099ff;
        }
        .sidebar li.active {
            color: #0099ff;
            font-weight: bold;
        }
        .card {
            margin-bottom: 20px;
            border: none;
        }
        .card-header {
            font-weight: bold;
        }
        .stat-card {
            text-decoration: none;
            color: white;
            position: relative;
            padding: 15px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: white; /* Ensures text remains white on hover */
        }
        .blue-card {
            background-color: #0099ff;
        }
        .orange-card {
            background-color: #ff9900;
        }
        .red-card {
            background-color: #ff3333;
        }
        .green-card {
            background-color: #33cc33;
        }
        .gray-card {
            background-color: #999999;
        }
        .yellow-card {
            background-color: #ffcc00;
        }
        .stat-card .arrow {
            font-size: 24px;
        }
        .graph-container {
            background-color: white;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        .section-content {
            display: none;
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .section-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <div class="logo">
                <img src="logo.jpg" alt="School Logo">
            </div>
            <h4 class="m-0">WELCOME! ADMIN</h4>
        </div>
        <div class="nav-links">
            <a href="Admin.php">dashboard</a>
            <a href="Login Form.php">logout</a>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <ul>
                        <li class="<?php echo $activeSection == 'dashboard' ? 'active' : ''; ?>">
                            <a href="Admin.php" style="text-decoration: none; color: inherit;">Dashboard</a>
                        </li>
                        <li class="<?php echo $activeSection == 'enrollment-review' ? 'active' : ''; ?>">
                            <a href="Enrollment For Review.php" style="text-decoration: none; color: inherit;">Enrollment for Review</a>
                        </li>
                        <li class="<?php echo $activeSection == 'all-students' ? 'active' : ''; ?>">
                            <a href="all-students.php" style="text-decoration: none; color: inherit;">All Students</a>
                        </li>
                        <li class="<?php echo $activeSection == 'teachers' ? 'active' : ''; ?>">
                            <a href="teachers.php" style="text-decoration: none; color: inherit;">Teachers</a>
                        </li>
                        <li class="<?php echo $activeSection == 'grade-sections' ? 'active' : ''; ?>">
                            <a href="grade-sections.php" style="text-decoration: none; color: inherit;">Grade & Sections</a>
                        </li>
                        <li class="<?php echo $activeSection == 'pages-editor' ? 'active' : ''; ?>">
                            <a href="pages-editor.php" style="text-decoration: none; color: inherit;">Pages Editor</a>
                        </li>
                        <li class="<?php echo $activeSection == 'user-management' ? 'active' : ''; ?>">
                            <a href="user-management.php" style="text-decoration: none; color: inherit;">User Management</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Total Students Enrolled
                            </div>
                            <a href="all-students.php" class="stat-card blue-card">
                                <?php echo $totalStudentsEnrolled; ?>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Enrollments For Review
                            </div>
                            <a href="Enrollment For Review.php" class="stat-card orange-card">
                                <?php echo $enrollmentsForReview; ?>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Total Not Enrolled Students
                            </div>
                            <a href="not-enrolled.php" class="stat-card red-card">
                                <?php echo $totalNotEnrolledStudents; ?>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Students Unassigned in a Section
                            </div>
                            <a href="unassigned.php" class="stat-card green-card">
                                <?php echo $studentsUnassigned; ?>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Total Number of Teachers
                            </div>
                            <a href="teachers.php" class="stat-card gray-card">
                                <?php echo $totalTeachers; ?>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Total Number of Accounts
                            </div>
                            <a href="user-management.php" class="stat-card yellow-card">
                                <?php echo $totalAccounts; ?>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Dashboard content (only showing on admin.php) -->
                <div class="section-content active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="graph-container">
                                <h5>Graph that shows the number of enrollees for each grade level</h5>
                                <canvas id="enrollmentChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Create the chart when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('enrollmentChart');
            if (ctx) {
                const enrollmentChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode(array_keys($enrollmentByGrade)); ?>,
                        datasets: [{
                            label: 'Number of Enrollees',
                            data: <?php echo json_encode(array_values($enrollmentByGrade)); ?>,
                            backgroundColor: '#0099ff',
                            borderColor: '#0088ee',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>