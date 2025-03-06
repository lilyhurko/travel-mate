<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelMate</title>
    <link rel="stylesheet" href="../assets/styles.css"> <!-- Link to external CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
</head>
<body>

<!-- Header -->
<header>
    <div class="logo">
        <a href="/?page=home">
            <img src="../images/logo2.png" alt="TravelMate Logo"/>
        </a>
    </div>

    <button class="menu-toggle" aria-label="Toggle navigation">
        &#9776;
    </button>

    <nav>
        <ul>
            <li><a href="index.php?page=home" class="my-btn btn-light-chocolate">Home</a></li>
            <li><a href="index.php?page=about" class="my-btn btn-light-chocolate">About Us</a></li>
            <li><a href="index.php?page=contact" class="my-btn btn-light-chocolate  active">Contact Us</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=login" class="btn btn-primary me-2">Login</a>
        <a href="index.php?page=register" class="btn btn-secondary">Register</a>
    </div>
</header>


<!-- Main Content -->
<main>
    <section id="contact" class="container py-5">
        <h2 class="text-center mb-4 contact-heading">Contact Us</h2>
        <p class="text-center text-muted mb-4">We would love to hear from you! Please fill out the form below to get in
            touch with us.</p>
        <!-- Contact Form -->
        <form id="contact-form" action="https://formspree.io/f/xbljenkq" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
        <div id="success-message">
            Your message has been sent! A manager will contact you shortly.
        </div>

        <div id="error-message">
            An error occurred while sending the message. Please try again later.
        </div>

        <section id="map" class="container py-5">
            <h2 class="text-center mb-4 location-heading">Our Location</h2>
            <div id="mapid" style="height: 400px;"></div>
        </section>
    </section>
</main>

<!-- Footer -->
<footer class="text-center py-3">
    <div class="social-icons">
        <a href="https://www.youtube.com/@ptuxermann" target="_blank"
           class="btn btn-light-chocolate rounded-circle me-2">
            <i class="bi bi-youtube" style="font-size: 24px;"></i>
        </a>
        <a href="https://www.instagram.com/ptuxerman/" target="_blank"
           class="btn btn-light-chocolate rounded-circle me-2">
            <i class="bi bi-instagram" style="font-size: 24px;"></i>
        </a>
        <a href="https://x.com/drewbinsky?s=21" target="_blank" class="btn btn-light-chocolate rounded-circle me-2">
            <i class="bi bi-twitter" style="font-size: 24px;"></i>
        </a>
    </div>
    <p>&copy; 2024 TravelMate. All rights reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/menu.js"></script>
</body>
</html>
