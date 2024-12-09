<?php
session_start();
session_unset();
session_destroy();
setcookie("username", "", time() - 3600, "/"); // Delete the cookie
header("Location: index.php");
exit();
?>
