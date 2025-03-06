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
            <li><a href="index.php?page=home" class="my-btn btn-light-chocolate active">Home</a></li>
            <li><a href="index.php?page=about" class="my-btn btn-light-chocolate">About Us</a></li>
            <li><a href="index.php?page=contact" class="my-btn btn-light-chocolate">Contact Us</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=login" class="btn btn-primary me-2">Login</a>
        <a href="index.php?page=register" class="btn btn-secondary">Register</a>
    </div>
</header>


<!-- Main Content -->
<main>
    <!-- Carousel Section -->
    <section class="features mt-5 mb-5">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose TravelMate?</h2>
            <div id="whyChooseCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <i class="bi bi-map d-block mx-auto mb-3" style="font-size: 100px;"></i>
                        <h3>Create Your Routes</h3>
                        <p class="carousel-text">Plan your trips and add stops to an interactive map for a seamless
                            experience, allowing you to visualize your entire journey with ease and flexibility.</p>
                    </div>
                    <div class="carousel-item text-center">
                        <i class="bi bi-geo-alt d-block mx-auto mb-3" style="font-size: 100px;"></i>
                        <h3>Discover New Places</h3>
                        <p class="carousel-text">Find exciting locations by categories such as nature, culture, food,
                            adventure, and relaxation, making it easier to discover new destinations tailored to your
                            interests.
                        </p>
                    </div>
                    <div class="carousel-item text-center">
                        <i class="bi bi-upload d-block mx-auto mb-3" style="font-size: 100px;"></i>
                        <h3>Share Your Adventures</h3>
                        <p class="carousel-text">Save your travel notes, photos, and memories, keeping all your
                            experiences organized in one place, so you can revisit them anytime and share with friends
                            and family.</p>
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#whyChooseCarousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#whyChooseCarousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <div class="route-buttons mb-5 text-center">
        <h1 class="text-light-chocolate">There are the most popular routes</h1>
        <button id="vikingRoute" class="btn btn-primary mb-3">Viking Route: History of Scandinavia</button>
        <button id="castleRoute" class="btn btn-primary mb-3">Castle Tour Through France</button>
        <button id="italyRoute" class="btn btn-primary mb-3">Tourist Wonders of Italy</button>
    </div>

    <div id="routeDetails" style="display: none;">
        <h2 id="routeName"></h2>
        <div id="routeDescription"></div>
        <div id="routeImages"></div>
        <div id="routeReviews"></div>
    </div>

    <div id="map"></div>

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
<script src="../assets/js/home_car.js"></script>
<script src="../assets/js/routes.js"></script>
<script src="../assets/js/menu.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
