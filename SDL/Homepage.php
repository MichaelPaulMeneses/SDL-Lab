<?php
// index.php - School Homepage

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

function renderSection($id, $title, $content, $bg = "") {
    return "<section id='$id' class='py-5 $bg'><div class='container'><h2 class='text-center'>$title</h2><p class='text-center'>$content</p></div></section>";
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
    <title>School Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    echo renderNavbar();
    echo renderSection("home", "Welcome to Our School", "Providing quality education for a brighter future.", "bg-light text-center");
    echo renderFooter();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>