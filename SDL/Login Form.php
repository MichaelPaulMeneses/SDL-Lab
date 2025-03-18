<?php
// Start session
session_start();

// Initialize variables
$username = $password = $email = "";
$usernameErr = $passwordErr = $emailErr = $loginErr = "";
$login_successful = false;

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form
    if (isset($_POST['form_type']) && $_POST['form_type'] == 'login') {
        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }
        
        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
        }
        
        // If no errors, proceed with login verification
        if (empty($emailErr) && empty($passwordErr)) {
            // Check for admin login
            if ($email == "admin@example.com" && $password == "admin123") {
                // Set admin session
                $_SESSION['user_role'] = 'admin';
                $_SESSION['email'] = $email;
                $login_successful = true;
                
                // Redirect to admin page
                header("Location: admin.php");
                exit;
            }
            // Check for student login
            else if ($email == "student@example.com" && $password == "password123") {
                // Set student session
                $_SESSION['user_role'] = 'student';
                $_SESSION['email'] = $email;
                $_SESSION['student_id'] = 'S12345'; // Setting a dummy student ID for demo
                $login_successful = true;
                
                // Redirect to Student Portal
                header("Location: Student Portal.php");
                exit;
            } else {
                $loginErr = "Invalid email or password";
            }
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if (isset($_GET['register'])): ?>
                    <!-- Redirect to the separate signup form page instead of showing signup form here -->
                    <?php
                    header("Location: signup.php");
                    exit;
                    ?>
                <?php else: ?>
                    <!-- Default display: Two-column layout with school info and login form -->
                    <div class="card shadow border-0 overflow-hidden">
                        <div class="row g-0">
                            <!-- Left side - School Information -->
                            <div class="col-md-6 bg-primary text-white p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 40px;">
                                    <img src="logo.jpg" alt="Logo" style="width: 70%; max-width: 1000px;">
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="fw-bold mb-0">St. John the Baptist</h2>
                                        <h4>Parochial School</h4>
                                    </div>
                                </div>
                                
                                <div class="bg-white text-dark p-3 rounded mt-4">
                                    <h5 class="mb-1">Schedule of Enrollment</h5>
                                    <p class="small text-end mb-2">S.Y. 2025-2026</p>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-sm mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Grade Level</th>
                                                    <th>Period</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Kinder</td>
                                                    <td>Aug 1 - 10</td>
                                                    <td>Closed</td>
                                                </tr>
                                                <tr>
                                                    <td>Elementary</td>
                                                    <td>Aug 11 - 20</td>
                                                    <td>Open</td>
                                                </tr>
                                                <tr>
                                                    <td>Junior High</td>
                                                    <td>Aug 21 - 30</td>
                                                    <td>Closed</td>
                                                </tr>
                                                <tr>
                                                    <td>Senior High</td>
                                                    <td>Aug 21 - 30</td>
                                                    <td>Closed</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right side - Login Form -->
                            <div class="col-md-6">
                                <div class="p-4 p-md-5">
                                    <h3 class="text-center mb-4">Online Enrollment System</h3>
                                    
                                    <!-- Show login form -->
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <input type="hidden" name="form_type" value="login">
                                        
                                        <div class="mb-3">
                                            <label for="loginEmail" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="loginEmail" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                            <?php if (!empty($emailErr)): ?>
                                                <div class="text-danger small"><?php echo $emailErr; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="loginPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="loginPassword" name="password">
                                            <?php if (!empty($passwordErr)): ?>
                                                <div class="text-danger small"><?php echo $passwordErr; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="border rounded p-3 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="robotCheck">
                                                <label class="form-check-label" for="robotCheck">
                                                    I am not a Robot
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <?php if (!empty($loginErr)): ?>
                                            <div class="alert alert-danger py-2 small text-center" role="alert">
                                                <?php echo $loginErr; ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($login_successful): ?>
                                            <div class="alert alert-success py-2 small text-center" role="alert">
                                                Login successful! Redirecting...
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="d-grid mb-3">
                                            <button type="submit" class="btn btn-primary">Log In</button>
                                        </div>
                                        
                                        <div class="text-center">
                                            <p class="small mb-0">
                                                Don't have an account?
                                                <a href="signup.php" class="text-decoration-none">Sign Up</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>