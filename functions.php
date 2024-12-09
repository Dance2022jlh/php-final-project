<?php
function loginUser($username, $password) {
    $users = loadUsers();
    return isset($users[$username]) && password_verify($password, $users[$username]);
}

function registerUser($username, $password) {
    $users = loadUsers();
    if (isset($users[$username])) return false;

    $users[$username] = $password;
    saveUsers($users);
    return true;
}

function saveUsers($users) {
    file_put_contents('data/users.json', json_encode($users));
}

function loadUsers() {
    if (!file_exists('data/users.json')) return [];
    return json_decode(file_get_contents('data/users.json'), true);
}

function saveReview($username, $campsite, $review) {
    $reviews = loadReviews();
    $reviews[] = ['username' => $username, 'campsite' => $campsite, 'review' => $review];
    file_put_contents('data/reviews.json', json_encode($reviews));
}

function loadReviews() {
    if (!file_exists('data/reviews.json')) return [];
    return json_decode(file_get_contents('data/reviews.json'), true);
}

function savePost($username, $content) {
    $posts = loadPosts();
    $posts[] = ['username' => $username, 'content' => $content];
    file_put_contents('data/posts.json', json_encode($posts));
}

function loadPosts() {
    if (!file_exists('data/posts.json')) return [];
    return json_decode(file_get_contents('data/posts.json'), true);
}
?>
