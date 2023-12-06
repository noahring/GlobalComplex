<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <h1>Access Denied</h1>
    <p>You do not have permission to access this page.</p>
    <?php
    require_once './vendor/autoload.php';
    require 'redirect.php';
    echo "<a href='" . $client->createAuthUrl() . "' id='loginButton'>Login as Admin</a>";
    ?>
</body>
</html>
