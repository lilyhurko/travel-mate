<?php
$orders = include __DIR__ . '/../controllers/orderController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css"> <!-- Link to external CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
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
            <li><a href="index.php?page=dashboard" class="btn btn-light-chocolate">Dashboard</a></li>
            <li><a href="index.php?page=myroutes" class="btn btn-light-chocolate active">My routes</a></li>
            <li><a href="index.php?page=profile" class="btn btn-light-chocolate">My profile</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=logout" class="btn btn-primary me-2">Logout</a>
    </div>
</header>

<body>
<!-- Orders List -->
    <div class="orders-list">
        <h2>Your Ordered Tours</h2>
        <div class="orders-container"> <!-- Контейнер для сітки -->
            <?php
            if (!empty($orders)) {
                foreach ($orders as $order) {
                    echo "<div class='order-item'>
                        <div class='order-details'>
                            <span class='route-name'>Route: " . htmlspecialchars($order["route_name"]) . "</span>
                            <span class='order-user'>Ordered by: " . htmlspecialchars($order["user_name"]) . "</span>
                            <span class='order-date'>Order Date: " . htmlspecialchars($order["created_at"]) . "</span>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='no-orders'>No orders found.</div>";
            }
            ?>
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
<script src="../assets/js/menu.js"></script>
</body>
</html>
