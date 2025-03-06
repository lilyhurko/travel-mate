<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<header>
    <div class="logo">
        <!-- Вставляємо логотип -->
        <a href="/?page=home">
            <img src="../images/logo2.png" alt="TravelMate Logo" />
        </a>
    </div>

</header>
<body>
<h2>Login</h2>
<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="POST" action="?page=logincontroller">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
    <p>Don't have an account? <a href="index.php?page=register">Register here</a></p>

</form>
</body>
</html>
