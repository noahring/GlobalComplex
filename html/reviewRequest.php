<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
Include 'navbar.php';   
include ('resultToReviewTable.php');
$config = parse_ini_file('/home/' . get_current_user() . '/mysqli.ini');
$conn = new mysqli(
    $config['mysqli.default_host'],
    $config['mysqli.default_user'],
    $config['mysqli.default_pw']);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    exit();
}

$conn->select_db('bugs');

$query = "SELECT requestID, speciesName FROM requests";

$result = $conn->query($query);
session_start();

// Assuming you have the user's email stored in $_SESSION['user_email']
$allowed_emails = ['subede.johnson@gmail.com'];

if (!isset($_SESSION['user_email']) || !in_array($_SESSION['user_email'], $allowed_emails)) {
    // Redirect the user or show an access denied message
    header("Location: accessdenied.php");
    exit();
}

resultToHTMLTable($result);
?>
<link rel="stylesheet" type="text/css" href="./style/processReview.style.css">
</html>