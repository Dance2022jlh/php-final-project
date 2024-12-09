<?php
session_start();
include 'functions.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit_review'])) {
    $username = $_SESSION['username'];
    $campsite = htmlspecialchars($_POST['campsite']);
    $review = htmlspecialchars($_POST['review']);
    saveReview($username, $campsite, $review);
}

$reviews = loadReviews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CampConnect - Reviews</title>
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
    <h1>Campsite Reviews</h1>
    <p>Read reviews from fellow campers and share your experiences.</p>
    <p>Help others make informed decisions by rating and reviewing campsites.</p>
    <p>Your feedback is valuable to our community and helps enhance outdoor adventures for everyone.</p>

    <form method="post" action="reviews.php" class="form">
        <h2>Submit Your Review</h2>
        <label>Campsite Name:</label>
        <input type="text" name="campsite" required>
        <label>Your Review:</label>
        <textarea name="review" rows="4" required></textarea>
        <button type="submit" name="submit_review">Submit</button>
    </form>

    <h2>Recent Reviews</h2>
    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <p><strong><?php echo htmlspecialchars($review['username']); ?></strong> reviewed <strong><?php echo htmlspecialchars($review['campsite']); ?></strong>:</p>
            <p><?php echo htmlspecialchars($review['review']); ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
