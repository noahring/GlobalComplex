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

    $selectRequestsQuery = "SELECT * FROM requests WHERE clientID = 1";
    $selectRequestsStmt = $conn->prepare($selectRequestsQuery);

    if (!$selectRequestsStmt) {
        echo "Error in query preparation: " . $conn->error;
        exit();
    }

    $selectRequestsStmt->execute();
    $result = $selectRequestsStmt->get_result();
    $selectRequestsStmt->close();

    // Display user requests
    echo "<h2>Your Requests</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Request ID</th><th>Species Name</th><th>Request Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['requestID'] . "</td>";
        echo "<td>" . $row['speciesName'] . "</td>";
        echo "<td>" . $row['requestDate'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
?>
