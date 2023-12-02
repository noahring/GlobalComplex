<?php
include 'navbar.php';
require_once './vendor/autoload.php';
require 'redirect.php';
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

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $query = "SELECT * FROM species";
    if ($search) {
        $query .= " WHERE speciesName LIKE '%$search%'";
    }

    $result = $conn->query($query);

    if (!$result) {
        echo "Error in query: " . $conn->error;
        exit();
    }

    $result_body = $result->fetch_all();
    $num_rows = $result->num_rows;
    $num_cols = $result->field_count;
    $fields = $result->fetch_fields();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Species Request Form</title>
    <link rel="stylesheet" type="text/css" href="./style/submitrequest.style.css">
</head>
<body>

<div class="container">
    <h1>Species Request Form</h1>

    <form action="processRequest.php" method="post">
        <label for="species">Species Name:</label>
        <input type="text" id="species" name="species" required>

        <div style="display: flex; justify-content: space-between; margin-top: 16px;">
            <input type="submit" value="Submit">
            <a href="index.php"><button type="button">Cancel</button></a>
        </div>
    </form>

    <form action="" method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter species name">
        <input type="submit" value="Search">
    </form>

    <h2>Available Species</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($fields as $index => $field): ?>
                    <th data-index="<?= $index ?>"><?php echo $field->name; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($result_body as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?php echo $cell; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>