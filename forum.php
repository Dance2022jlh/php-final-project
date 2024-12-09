<?php
session_start();
include 'functions.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit_post'])) {
    $username = $_SESSION['username'];
    $post_content = $_POST['post_content'];
    savePost($username, $post_content);
}

$posts = loadPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CampConnect - Community Forum</title>
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
    <h1>Community Forum</h1>
    <p>Welcome to the CampConnect Forum! Share your camping experiences, tips, and questions here.</p>
    <p>Our forum fosters a sense of community, allowing campers to connect and collaborate.</p>
    <p>Join discussions about campsite recommendations, gear reviews, and outdoor adventures!</p>
    
    <form method="post" action="forum.php" class="form">
        <h2>Share Your Experience</h2>
        <textarea name="post_content" rows="4" required placeholder="Write your post here..."></textarea>
        <button type="submit" name="submit_post">Post</button>
    </form>

    <h2>Recent Posts</h2>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <p><strong><?php echo htmlspecialchars($post['username']); ?>:</strong> <?php echo htmlspecialchars($post['content']); ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
