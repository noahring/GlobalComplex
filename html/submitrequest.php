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

    $query = "SELECT * FROM species";
    $result = $conn->query($query);

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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="process_request.php" method="post">
        <label for="species">Species Name:</label>
        <input type="text" id="species" name="species" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <div style="display: flex; justify-content: space-between; margin-top: 16px;">
            <input type="submit" value="Submit">
            <a href="index.php"><button type="button">Cancel</button></a>
        </div>
    </form>
    <h2>Available Species</h2>
    <table>
    <thead>
        <tr>
            <?php foreach ($fields as $field): ?>
                <th><?php echo $field->name; ?></th>
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

