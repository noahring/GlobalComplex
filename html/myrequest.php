<?php
include 'navbar.php';
include 'resultToPlainTable.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './vendor/autoload.php';
// require 'redirect.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
//var_dump($_SESSION);
$email = $_SESSION['user_email'];

// Query to get user_id based on email
$getUserIdQuery = "SELECT clientID FROM clients WHERE clientEmail = ?";
$stmtGetUserId = $conn->prepare($getUserIdQuery);
$stmtGetUserId->bind_param("s", $email);
$stmtGetUserId->execute();
$stmtGetUserId->bind_result($clientID);
$stmtGetUserId->fetch();
$stmtGetUserId->close();

$query = "SELECT speciesName, requestCreated_at FROM requests WHERE requests.clientID = {$clientID}";
$result = $conn->query($query);
?><h1>Unapproved</h1><?php
    resultToPlainHTMLTable($result);
$query = "SELECT dateOut, speciesName FROM transactions 
    INNER JOIN specimens ON transactions.specimenID = specimens.specimenID
    WHERE transactions.clientID = {$clientID}";
$result = $conn->query($query);
?><br>
<h1>Approved</h1>
<?php
    resultToPlainHTMLTable($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Requests</title>
    <link rel="stylesheet" type="text/css" href="./style/processReview.style.css">
</head>
<body>
    
</body>
</html>