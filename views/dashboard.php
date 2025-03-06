<?php
include __DIR__ . '/../config/getRouteDetails.php'; // Підключаємо файл для отримання даних маршрутів
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
            <li><a href="index.php?page=dashboard" class="btn btn-light-chocolate active">Dashboard</a></li>
            <li><a href="index.php?page=myroutes" class="btn btn-light-chocolate">My routes</a></li>
            <li><a href="index.php?page=profile" class="btn btn-light-chocolate">My profile</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=logout" class="btn btn-primary me-2">Logout</a>
    </div>
</header>

<!-- Main Section -->
<section>
    <h2>Recommended Routes</h2>

    <!-- Filter Section -->
    <div class="filter-container">
        <form method="GET" action="" class="filter-form">
            <input type="hidden" name="page" value="dashboard">

            <label for="filter" class="filter-label">Filter by Category:</label>
            <select name="category" id="filter" class="filter-select">
                <option value="">All</option>
                <option value="sea" <?= isset($selectedCategory) && $selectedCategory == 'sea' ? 'selected' : '' ?>>
                    Sea
                </option>
                <option value="mountain" <?= isset($selectedCategory) && $selectedCategory == 'mountain' ? 'selected' : '' ?>>
                    Mountain
                </option>
                <option value="cultural" <?= isset($selectedCategory) && $selectedCategory == 'cultural' ? 'selected' : '' ?>>
                    Cultural
                </option>
                <option value="adventure" <?= isset($selectedCategory) && $selectedCategory == 'adventure' ? 'selected' : '' ?>>
                    Adventure
                </option>
                <option value="ski_resort" <?= isset($selectedCategory) && $selectedCategory == 'ski_resort' ? 'selected' : '' ?>>
                    Ski Resort
                </option>
            </select>
            <button type="submit" class="filter-button">Apply Filter</button>
        </form>
    </div>

    <div class="routes-list">
        <?php if (!empty($dashboardRoutes)): ?>
            <?php foreach ($dashboardRoutes as $route): ?>
                <?php if (empty($selectedCategory) || $route['route_type'] === $selectedCategory): ?>
                    <div class="route-item">
                        <h3><?= htmlspecialchars($route['name']); ?></h3>
                        <p><?= htmlspecialchars($route['description']); ?></p>
                        <button class="filter-button"
                                onclick="openRouteDetails(<?= htmlspecialchars($route['id']); ?>)">
                            View Details
                        </button>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No routes found for the selected filter.</p>
        <?php endif; ?>

    </div>


</section>
<!-- Modal for Route Details -->

<div id="routeModal" class="modal">
    <div class="modal-content">
        <span id="closeRouteModal" class="close">&times;</span>
        <h2 id="modalRouteName"></h2>
        <p id="modalRouteDescription"></p>
        <div id="modalRouteImages" class="carousel">
            <!-- Images will be populated dynamically via JS -->
        </div>
        <div class="modal-buttons">
            <form id="orderRouteForm" action="/index.php?page=dashboard" method="POST">
                <input type="hidden" name="route_id" id="routeId"/>
                <button type="submit" class="btn btn-success order-route-btn" id="orderRouteBtn">Order Route</button>
            </form>
        </div>
        <div id="orderSuccessMessage" class="alert alert-success">
            Thank you for your order! Our team will contact you shortly.
        </div>

    </div>
</div>
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
<script>
    const routeData = <?php echo json_encode($dashboardRoutes); ?>;
</script>


<script src="/assets/js/menu.js"></script>
<script src="/assets/js/poproutes.js"></script>
</body>
</html>

