<?php
include 'navbar.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './vendor/autoload.php';
require 'redirect.php';
// session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Global Complex</title>
    <link rel="stylesheet" type="text/css" href="./style/index.style.css">
</head>
<body>

<?php


// Check if the user is already logged in
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
    echo "Welcome back, $user_name! (Email: $user_email)";
    // Continue with the rest of your index.php code
} else {
    // The user is not logged in, display the login link or redirect to the login page
    echo "<a href='redirect.php' id='loginButton'>Login</a>";
}


$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$allowedPages = ['index', 'submitrequest', 'reviewRequest', 'services', 'contact'];
?>
<br> 
<br>
<form action="process_request.php" method="post">
    <label for="name">First Name:</label>
    <input type="text" id="fname" name="fname" required>
    
    <label for="name">Last Name:</label>
    <input type="text" id="lname" name="lname" required>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" readonly> <!-- Prepopulated and read-only -->


    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="street_address">Street Address:</label>
    <textarea id="street_address" name="street_address" required></textarea>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required>

    <label for="state">State:</label>
    <input type="text" id="state" name="state" required>

    <label for="zip">ZipCode:</label>
    <input type="text" id="zip" name="zip" required>

    <input type="submit" value="Continue">
</form>
</body>
</html>
