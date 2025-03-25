<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .sidebar {
            background-color: #f8f9fa;
            min-height: 100vh;
            width: 250px;
            padding: 20px;
            float: left;
        }
        
        .sidebar a {
            display: block;
            text-decoration: none;
            padding: 10px 0;
            color: #333;
            border-bottom: 1px solid #eee;
        }
        
        .sidebar a.active {
            color: #0d6efd;
            font-weight: bold;
        }
        
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 10px 15px;
        }
        
        .header a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }
        
        .content-area {
            margin-left: 250px;
        }
        
        .grade-btn {
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-0">WELCOME! <?php echo strtoupper($userName); ?></h4>
        </div>
        <div>
            <a href="Admin.php">dashboard</a>
            <a href="Login Form.php">logout</a>
        </div>
    </div>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="Admin.php" class="active">Dashboard</a>
        <a href="Enrollment For Review.php">Enrollment for Review</a>
        <a href="All Students.php">All Students</a>
        <a href="Teachers.php">Teachers</a>
        <a href="Grade-Section.php">Grade & Sections</a>
        <a href="Pages Editor.php">Pages Editor</a>
        <a href="User Management.php">User Management</a>
    </div>
    
    <!-- Main Content -->
    <div class="content-area p-4">
        <h2 class="mb-4">Grade and Sections</h2>
        
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div></div>
                    <div class="d-flex align-items-center">
                        <label for="school-year" class="me-2">School Year</label>
                        <select id="school-year" class="form-select" style="width: 200px;" onchange="changeSchoolYear(this.value)">
                            <option value="2024-2025" <?php echo $schoolYear == '2024-2025' ? 'selected' : ''; ?>>2024-2025</option>
                            <option value="2025-2026" <?php echo $schoolYear == '2025-2026' ? 'selected' : ''; ?>>2025-2026</option>
                            <option value="2026-2027" <?php echo $schoolYear == '2026-2027' ? 'selected' : ''; ?>>2026-2027</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=kinder&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Kinder</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=preschool&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Preschool</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=1&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 1</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=2&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 2</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=3&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 3</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=4&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 4</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=5&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 5</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=6&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 6</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=7&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 7</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=8&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 8</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=9&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 9</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=10&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 10</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=11&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 11</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <a href="grade_details.php?grade=12&year=<?php echo $schoolYear; ?>" class="btn btn-primary w-100 grade-btn">Grade 12</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function changeSchoolYear(year) {
            window.location.href = 'grade_sections.php?school_year=' + year;
        }
    </script>
</body>
</html>