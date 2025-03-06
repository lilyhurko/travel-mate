<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelMate</title>

</head>
<body>

<!-- Header -->
<!-- Header -->
<header>
    <div class="logo">
        <a href="/?page=home">
            <img src="../images/logo2.png" alt="TravelMate Logo"/>
        </a>
    </div>

    <button class="menu-toggle" aria-label="Toggle navigation">
        &#9776; <!-- значок гамбургера -->
    </button>

    <nav>
        <ul>
            <li><a href="index.php?page=home" class="btn btn-light-chocolate active">Home</a></li>
            <li><a href="index.php?page=about" class="btn btn-light-chocolate">About Us</a></li>
            <li><a href="index.php?page=contact" class="btn btn-light-chocolate">Contact Us</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=login" class="btn btn-primary me-2">Login</a>
        <a href="index.php?page=register" class="btn btn-secondary">Register</a>
    </div>
</header>



<!-- Основний контент -->
<main>
    <div class="welcome-container">
        <h1>Welcome to TravelMate!</h1>
        <p>Create and share your travel routes with others.</p>
        <div class="auth-links">
            <a href="/public/login.php" class="button">Login</a>
            <a href="/public/register.php" class="button">Register</a>
        </div>
    </div>
</main>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <p>&copy; 2024 TravelMate. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
