<?php
// Check if form was submitted successfully
$showSuccessModal = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // In a real application, you would save to database here
    
    // Show success modal
    $showSuccessModal = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f6f6f6;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .card-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        .card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 40px;
            background-color: white;
        }
        .form-control {
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 8px;
            border: 1px solid #dc3545;
            height: 46px;
        }
        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }
        .btn-primary {
            background-color: #0095ff;
            border: none;
            border-radius: 50px;
            padding: 14px 0;
            font-weight: 500;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }
        h2 {
            font-weight: bold;
            margin-bottom: 30px;
            color: #212529;
            font-size: 28px;
            text-align: center;
        }
        .login-link {
            margin-top: 20px;
            text-align: center;
            color: #333;
            font-size: 14px;
        }
        .login-link a {
            color: #0095ff;
            text-decoration: none;
            font-weight: 500;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .error-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #dc3545;
            font-size: 20px;
            z-index: 5;
        }
        
        /* Success Modal Styles */
        .success-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .success-modal-content {
            background-color: white;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
        .success-icon {
            width: 60px;
            height: 60px;
            border: 2px solid #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .success-icon svg {
            width: 30px;
            height: 30px;
        }
        .success-message {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .continue-btn {
            background-color: #0095ff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 25px;
            font-size: 16px;
            cursor: pointer;
            float: right;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <h2>Registration</h2>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="signupForm">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" required>
                        <div class="error-icon">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" required>
                        <div class="error-icon">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Repeat Password</label>
                    <div class="input-group">
                        <input type="password" name="confirm_password" class="form-control" required>
                        <div class="error-icon">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Sign Up</button>
                
                <div class="login-link">
                    Already have an account? <a href="Login Form.php">Log In</a>
                </div>
            </form>
        </div>
    </div>

    <?php if ($showSuccessModal): ?>
    <!-- Success Modal -->
    <div class="success-modal">
        <div class="success-modal-content">
            <button class="close-btn">&times;</button>
            <div class="success-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <div class="success-message">
                Congratulations! You've Successfully created an Account. Please your Fill Up the Personal Information.
            </div>
            <a href="Personal Info.php" class="continue-btn">Continue</a>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        const form = document.getElementById('signupForm');
        const inputs = form.querySelectorAll('input');
        
        // Initially hide error icons
        const errorIcons = document.querySelectorAll('.error-icon');
        errorIcons.forEach(icon => {
            icon.style.display = 'none';
        });
        
        // Show error icon on invalid input
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const errorIcon = this.parentElement.querySelector('.error-icon');
                if (!this.validity.valid) {
                    errorIcon.style.display = 'block';
                    this.style.borderColor = '#dc3545';
                } else {
                    errorIcon.style.display = 'none';
                    this.style.borderColor = '#ced4da';
                }
            });
        });
        
        if(form) {
            form.addEventListener('submit', function(event) {
                let hasError = false;
                
                // Check each input
                inputs.forEach(input => {
                    const errorIcon = input.parentElement.querySelector('.error-icon');
                    if (!input.validity.valid) {
                        errorIcon.style.display = 'block';
                        input.style.borderColor = '#dc3545';
                        hasError = true;
                    }
                });
                
                // Check if passwords match
                const password = form.querySelector('input[name="password"]');
                const confirmPassword = form.querySelector('input[name="confirm_password"]');
                if(password && confirmPassword && password.value !== confirmPassword.value) {
                    const errorIcon = confirmPassword.parentElement.querySelector('.error-icon');
                    errorIcon.style.display = 'block';
                    confirmPassword.style.borderColor = '#dc3545';
                    hasError = true;
                }
                
                if (hasError) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });
        }
        
        // Success modal close functionality
        const closeBtn = document.querySelector('.close-btn');
        if(closeBtn) {
            closeBtn.addEventListener('click', function() {
                document.querySelector('.success-modal').style.display = 'none';
            });
        }
    });
    </script>
</body>
</html>