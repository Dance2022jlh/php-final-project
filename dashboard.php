<?php
session_start();
include 'functions.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$membershipTypes = ["Standard", "Premium", "Elite"];
$welcomeMessages = [
    "Welcome to your dashboard!",
    "Explore our exciting features.",
    "Find campsites and connect with others."
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CampConnect - Dashboard</title>
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
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Your gateway to the best camping experiences awaits!</p>
    <p>Use this dashboard to manage your profile, book campsites, and explore features.</p>
    <p>We’re committed to enhancing your outdoor adventures.</p>
    
    <h3>Daily Messages:</h3>
    <ul>
        <?php foreach ($welcomeMessages as $message) echo "<li>$message</li>"; ?>
    </ul>

    <h3>Membership Types Available:</h3>
    <ul>
        <?php foreach ($membershipTypes as $type) echo "<li>$type Membership - Access exclusive benefits and campsites.</li>"; ?>
    </ul>
</div>
</body>
</html>
