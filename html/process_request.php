<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
session_start();


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include necessary files and establish a database connection
    // include 'redirect.php';

    require_once './vendor/autoload.php';
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

    // $fname = $_POST['fname'];
    // $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $species = $_POST['species'];
    
    // Query to get user_id based on email
    $getUserIdQuery = "SELECT clientID FROM clients WHERE clientEmail = ?";
    $stmtGetUserId = $conn->prepare($getUserIdQuery);
    $stmtGetUserId->bind_param("s", $email);
    $stmtGetUserId->execute();
    $stmtGetUserId->bind_result($clientID);
    $stmtGetUserId->fetch();
    $stmtGetUserId->close();
    
    // Prepare and execute the SQL query to insert data into Users_request table
    $insertQuery = "INSERT INTO requests (clientID,  requestPhone, requestAddress, requestCity, requestState, requestZip, speciesName) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    
// After preparing the statement
if (!$stmt) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    exit();
}

// After binding parameters
if (!$stmt->bind_param("issssss", $clientID, $phone, $street_address, $city, $state, $zip, $species)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit();
}

// After executing the statement
$executeResult = $stmt->execute();
if (!$executeResult) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit();
}


    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to a success page or do further processing
    header("Location: myrequest.php");
    exit();
} else {
    // If the form is not submitted, redirect to the home page or display an error
    header("Location: index.php");
    exit();
}
?>
