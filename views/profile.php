<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/profileController.php'; // Підключення контролера
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../assets/styles.css"> <!-- Link to external CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body
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
            <li><a href="index.php?page=dashboard" class="btn btn-light-chocolate">Dashboard</a></li>
            <li><a href="index.php?page=myroutes" class="btn btn-light-chocolate">My routes</a></li>
            <li><a href="index.php?page=profile" class="btn btn-light-chocolate active">My profile</a></li>
        </ul>
    </nav>

    <div class="auth-links">
        <a href="index.php?page=logout" class="btn btn-primary me-2">Logout</a>
    </div>
</header>

<main>
    <div class="profile-box">
        <H2>Name: <?= htmlspecialchars($_SESSION['user_name'] ?? 'Guest'); ?></H2>
        <h2>Email: <?= htmlspecialchars($_SESSION['user_email'] ?? 'N/A'); ?></h2>
        <div class="profile-actions">
            <button class="btn btn-primary" id="editProfileBtn">Edit</button>
            <button class="btn btn-danger" id="deleteProfileBtn">Delete</button>
        </div>
    </div>
</main>

<div id="editProfileModal" class="unique-profile-modal" style="display: none;">
    <div class="unique-profile-modal-content">
        <span id="closeEditProfileModal" class="close">&times;</span> <!-- Хрестик для закриття -->
        <h2>Edit Profile</h2>
        <form method="POST" action="?page=profilecontroller">
            <label for="newName">Name:</label>
            <input type="text" id="newName" name="name" value="<?= htmlspecialchars($_SESSION['user_name'] ?? ''); ?>" required>
            <label for="newEmail">Email:</label>
            <input type="email" id="newEmail" name="email" value="<?= htmlspecialchars($_SESSION['user_email'] ?? ''); ?>" required>
            <label for="newPassword">Password (optional):</label>
            <input type="password" id="newPassword" name="password">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>

<div id="deleteProfileModal" class="unique-profile-modal" style="display: none;">
    <div class="unique-profile-modal-content">
        <span id="closeDeleteProfileModal" class="close">&times;</span> <!-- Хрестик для закриття -->
        <h2>Are you sure you want to delete your profile?</h2>
        <form method="POST" action="/controllers/deleteProfileController.php">
            <button type="submit" class="btn btn-danger">Delete Profile</button>
        </form>
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

<script src="../assets/js/menu.js"></script>
<script src="../assets/js/profile.js"></script>
</body>
</html>
