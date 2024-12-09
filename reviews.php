<?php
session_start();
include 'functions.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit_review'])) {
    $campsite = $_POST['campsite'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    saveReview($campsite, $rating, $review);
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
        <h1>User Reviews and Ratings</h1>
        <div class="image-gallery">
            <img src="images/campsite1.jpeg" alt="Campsite 1">
            <img src="images/campsite2.jpeg" alt="Campsite 2">
            <img src="images/campsite3.jpeg" alt="Campsite 3">
        </div>
        
        <form method="post" action="reviews.php" class="form">
            <h2>Leave a Review</h2>
            <label>Campsite:</label>
            <input type="text" name="campsite" required>
            <label>Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" required>
            <label>Review:</label>
            <textarea name="review" rows="4" required></textarea>
            <button type="submit" name="submit_review">Submit Review</button>
        </form>

        <h2>All Reviews</h2>
        <?php
        foreach ($reviews as $review) {
            echo "<div class='review'>";
            echo "<h3>Campsite: " . htmlspecialchars($review['campsite']) . "</h3>";
            echo "<p>Rating: " . htmlspecialchars($review['rating']) . "/5</p>";
            echo "<p>Review: " . htmlspecialchars($review['review']) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
