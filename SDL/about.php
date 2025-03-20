<?php
// about.php
function renderNavbar() {
    return '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">St. John the Baptist Parochial School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="news.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="Login Form.php">Registration/Login</a></li>
                </ul>
            </div>
        </div>
    </nav>';
}

function renderFooter() {
    return '<footer class="bg-primary text-white text-center py-3">
        <p>&copy; ' . date('Y') . ' St. John the Baptist Parochial School. All Rights Reserved.</p>
    </footer>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php echo renderNavbar(); ?>
    
    <div class="container py-5">
        <h2 class="text-center mb-4">About Us</h2>
        
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p class="lead text-center mb-5">
                    Our school is committed to excellence in education, fostering a supportive learning environment.
                </p>
                
                <h3 class="text-center mt-4">Mission</h3>
                <p class="text-center mb-5">
                    To provide quality education that develops the potential of each student through our comprehensive academic programs.
                </p>

                <h3 class="text-center mt-4">Vision</h3>
                <p class="text-center mb-5">
                    To provide quality education that develops the potential of each student through our comprehensive academic programs.
                </p>

                <h3 class="text-center">Contact Us</h3>
                <form action="contact.php" method="POST" class="w-75 mx-auto">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php echo renderFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>