<?php
// news.php
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
    <title>School News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php echo renderNavbar(); ?>
    
    <div class="container py-5">
        <h2 class="text-center mb-4">Latest News</h2>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">School Event Coming Up</h5>
                        <h6 class="card-subtitle mb-2 text-muted">March 15, 2024</h6>
                        <p class="card-text">Annual school fair announcement and details...</p>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Academic Achievement</h5>
                        <h6 class="card-subtitle mb-2 text-muted">March 10, 2024</h6>
                        <p class="card-text">Students win regional mathematics competition...</p>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sports Update</h5>
                        <h6 class="card-subtitle mb-2 text-muted">March 5, 2024</h6>
                        <p class="card-text">School basketball team advances to finals...</p>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo renderFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>