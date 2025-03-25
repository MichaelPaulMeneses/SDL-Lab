<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #0099ff;
            color: white;
            padding: 8px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-size: 14px;
            text-transform: lowercase;
        }
        .main-container {
            max-width: 800px;
            margin: 30px auto;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .profile-card {
            background-color: white;
            padding: 20px;
            width: 70%;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .status-card {
            background-color: white;
            padding: 20px;
            width: 90%;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 15px;
        }
        .profile-info {
            font-size: 14px;
            margin-bottom: 5px;
        }
        .update-btn {
            background-color: #ffc107;
            color: black;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            display: block;
            width: 100%;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
        }
        .enroll-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .status-text {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <img src="logo.jpg" alt="Logo" class="logo-img">
            <strong>WELCOME! </strong><?php echo htmlspecialchars($student_info['name']); ?>
        </div>
        <div>
            <a href="Student Portal.php">profile</a>
            <a href="Enrollment Confirmation.php">enroll</a>
            <a href="Login Form.php">logout</a>
        </div>
    </div>
    
    <div class="main-container">
        <div class="profile-card">
            <img src="<?php echo $student_info['profile_image']; ?>" alt="Profile" class="profile-img">
            <p class="profile-info"><strong>LRN:</strong> <?php echo htmlspecialchars($student_info['lrn']); ?></p>
            <p class="profile-info"><strong>Name:</strong> <?php echo htmlspecialchars($student_info['name']); ?></p>
            <p class="profile-info"><strong>Grade Level:</strong> <?php echo htmlspecialchars($student_info['grade_level']); ?></p>
            <a href="Update Info.php" class="update-btn">Update Info</a>
        </div>
        
        <div class="status-card">
            <div class="status-text">
                <h5>You are currently <strong>NOT ENROLLED</strong></h5>
                <p>Please Enroll before August 14, 2025</p>
            </div>
            <div class="text-center">
                <a href="Enrollment Confirmation.php" class="enroll-btn">Enroll Now</a>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>