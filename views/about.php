<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TravelMate</title>
    <link rel="stylesheet" href="../assets/styles.css"> <!-- Ваші власні стилі -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

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
            <li><a href="index.php?page=about" class="my-btn btn-light-chocolate active">About Us</a></li>
            <li><a href="index.php?page=contact" class="my-btn btn-light-chocolate">Contact Us</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=login" class="btn btn-primary me-2">Login</a>
        <a href="index.php?page=register" class="btn btn-secondary">Register</a>
    </div>
</header>



<!-- Main Content -->
<main class="container-fluid py-5">
    <div class="container">
        <h1 class="text-center mb-4 text-light-chocolate">About Us</h1>
        <p class="lead text-center">Welcome to <strong>TravelMate</strong>, your trusted companion for planning
            unforgettable journeys!</p>

        <div class="row mt-4">
            <div class="col-md-6 mx-auto text-center">
                <h2 class="text-light-chocolate">Our Mission</h2>
                <p>At TravelMate, we are passionate about helping travelers create personalized travel itineraries,
                    discover exciting destinations, and document their adventures with ease. Whether you are a solo
                    traveler, part of a group, or planning a family vacation, our platform is designed to inspire and
                    assist you every step of the way.</p>
            </div>
        </div>

        <div class="text-center mt-5">
            <p>Join us on this journey and let TravelMate be your guide to exploring the wonders of the world.</p>
            <a href="index.php?page=register" class="btn btn-primary">Join Us Right Now</a>
        </div>
    </div>

    <!-- Carousel Section for Testimonials -->
    <section class="testimonials mt-5 mb-5">
        <div class="container">
            <h2 class="text-center mb-4 text-light-chocolate">What Our Users Say</h2>
            <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <!-- First Testimonial -->
                    <div class="carousel-item active text-center">
                        <div class="testimonial-box">
                            <div class="testimonial-header">
                                <img src="../images/user1_1.jpg" class="testimonial-avatar" alt="User 1">
                            </div>
                            <div class="testimonial-body">
                                <h4>Michael Reynolds</h4>
                                <p>"Using TravelMate was a game-changer for me during my trip to Italy. It helped me map out my route and explore hidden gems, like the breathtaking Lake Como, which I might have missed otherwise. The platform is intuitive, fast, and super reliable!"</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="testimonial-images">
                                    <img src="../images/como1.jpg" alt="User 1" class="testimonial-image" onclick="openModal(this)">
                                    <img src="../images/como2.jpg" alt="User 1" class="testimonial-image" onclick="openModal(this)">
                                    <img src="../images/como3.jpg" alt="User 1" class="testimonial-image" onclick="openModal(this)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Testimonial -->
                    <div class="carousel-item text-center">
                        <div class="testimonial-box">
                            <div class="testimonial-header">
                                <img src="../images/user2_1.jpg" class="testimonial-avatar" alt="User 2">
                            </div>
                            <div class="testimonial-body">
                                <h4>Emma Collins</h4>
                                <p>"Using TravelMate was a game-changer for me during my trip to Alanya. I easily mapped out my route and discovered stunning beaches, historical sites, and cozy local cafes that I would have otherwise missed. It's intuitive, fast, and made my vacation unforgettable!"</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="testimonial-images">
                                    <img src="../images/alanya1.jpg" alt="User 2" class="testimonial-image" onclick="openModal(this)">
                                    <img src="../images/alanya2.jpg" alt="User 2" class="testimonial-image" onclick="openModal(this)">
                                    <img src="../images/alanya3.jpg" alt="User 2" class="testimonial-image" onclick="openModal(this)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Third Testimonial -->
                    <div class="carousel-item text-center">
                        <div class="testimonial-box">
                            <div class="testimonial-header">
                                <img src="../images/user3_1.jpg" class="testimonial-avatar" alt="User 3">
                            </div>
                            <div class="testimonial-body">
                                <h4>Sophia Mitchell</h4>
                                <p>"An incredible experience! TravelMate helped me organize my perfect itinerary for my trip to Bukovel. I discovered amazing ski trails, cozy mountain lodges, and local spots I hadn't even considered before. Five stars!"</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="testimonial-images">
                                    <img src="../images/buk1.jpg" alt="User 3" class="testimonial-image" onclick="openModal(this)">
                                    <img src="../images/buk2.jpg" alt="User 3" class="testimonial-image" onclick="openModal(this)">
                                    <img src="../images/buk3.jpg" alt="User 3" class="testimonial-image" onclick="openModal(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon custom-arrow" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon custom-arrow" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

<!-- Footer -->
    <footer class="text-center py-3">
        <div class="social-icons">
            <a href="https://www.youtube.com/@ptuxermann" target="_blank" class="btn btn-light-chocolate rounded-circle me-2">
                <i class="bi bi-youtube" style="font-size: 24px;"></i>
            </a>
            <a href="https://www.instagram.com/ptuxerman/" target="_blank" class="btn btn-light-chocolate rounded-circle me-2">
                <i class="bi bi-instagram" style="font-size: 24px;"></i>
            </a>
            <a href="https://x.com/drewbinsky?s=21" target="_blank" class="btn btn-light-chocolate rounded-circle me-2">
                <i class="bi bi-twitter" style="font-size: 24px;"></i>
            </a>
        </div>
        <p>&copy; 2024 TravelMate. All rights reserved.</p>
    </footer>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/menu.js"></script>
</body>
</html>
