<?php
include 'navbar.php';
require_once './vendor/autoload.php';
session_start();

// Establish database connection (Replace with your actual database credentials)
$config = parse_ini_file('/home/' . get_current_user() . '/mysqli.ini');
$conn = new mysqli(
    $config['mysqli.default_host'],
    $config['mysqli.default_user'],
    $config['mysqli.default_pw']
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->select_db('users');

// Get form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$street_address = $_POST['street_address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

// Check if the user already exists in _users table
$user_check_query = "SELECT * FROM _users WHERE email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    // If user doesn't exist, insert their information into _users and user_details tables
    $insert_user_query = "INSERT INTO _users (name, email) VALUES ('$fname $lname', '$email')";

    if (mysqli_query($conn, $insert_user_query)) {
        $user_id = mysqli_insert_id($conn); // Get the auto-generated user ID

        // Insert user details into user_details table
        $insert_details_query = "INSERT INTO user_details (user_id, fname, lname, phone, street_address, city, state, zip) VALUES ($user_id, '$fname', '$lname', '$phone', '$street_address', '$city', '$state', '$zip')";

        if (mysqli_query($conn, $insert_details_query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_details_query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $insert_user_query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "User with email '$email' already exists. Cannot create a duplicate record.";
}

mysqli_close($conn);
?>