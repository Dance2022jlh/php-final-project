<?php
session_start();
include 'functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (loginUser($username, $password)) {
        setcookie("username", $username, time() + (86400 * 30), "/"); // 30 days
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CampConnect - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="reviews.php">Reviews</a>
    <a href="forum.php">Forum</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="container">
    <h1>Welcome to CampConnect</h1>
    <p>Welcome to the heart of the camping community! Log in to access campsite details, forums, reviews, and more.</p>
    <p>Our platform connects campers, offering resources for planning the perfect outdoor adventure.</p>
    <p>We aim to inspire outdoor enthusiasts by providing access to a growing database of campsites and community support.</p>
    
    <form method="post" action="index.php" class="form">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Login</button>
        <p>Not a member? <a href="register.php">Register here</a></p>
    </form>
</div>
</body>
</html>
