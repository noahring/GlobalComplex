<?php
include 'navbar.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './vendor/autoload.php';
require 'redirect.php';
// session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Complex</title>
    <link rel="stylesheet" type="text/css" href="./style/index.style.css">
    <!-- <link rel="stylesheet" type="text/css" href="./style/submitrequest.style.css"> -->
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
    // echo "<a href='redirect.php' id='loginButton'>Login</a>";
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
