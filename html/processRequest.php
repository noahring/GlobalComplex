<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $config = parse_ini_file('/home/noahring/mysql.ini');
    $conn = new mysqli(
        $config['mysqli.default_host'],
        $config['mysqli.default_user'],
        $config['mysqli.default_pw']);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
        exit();
    }

    $conn->select_db('bugs');

    $species = isset($_POST['species']) ? $_POST['species'] : '';

    if (empty($species)) {
        echo "Invalid input. Please provide a valid species name.";
        exit();
    }

    // Check if the species exists in the database

    $checkQuery = "SELECT * FROM species WHERE speciesName = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $species);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    $checkStmt->close();

    if ($checkResult->num_rows === 0) {
        echo "The specified species does not exist in the database. Please enter a valid species.";
        exit();
    }

    // Insert data into the database
    $date = date('Y-m-d');
    $insertQuery = "INSERT INTO requests (speciesName, requestDate) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    if (!$insertStmt) {
        echo "Error in query preparation: " . $conn->error;
        exit();
    }
    $insertStmt->bind_param("ss", $species, $date);

    if ($insertStmt->execute()) {
        echo "Species request submitted successfully!";
    } else {
        echo "Error: " . $insertStmt->error;
    }

    $insertStmt->close();
    $conn->close();
?>