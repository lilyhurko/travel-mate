<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_SESSION['success']);
        unset($_SESSION['success']); ?></p>
<?php endif; ?>

<h2>Register</h2>
<form method="POST" action="?page=registercontroller">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" required><br>

    <button type="submit">Register</button>
    <p>Already have an account? <a href="?page=login">Login here</a></p>

</form>

</body>
</html>
