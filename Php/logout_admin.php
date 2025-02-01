<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['client_id'])) {
    header("Location: login.php");
    exit();
}
// Destroy all sessions
session_unset();
session_destroy();

// Redirect to the home page
header("Location: index.php");
exit();
?>
