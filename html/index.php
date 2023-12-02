<?php
include 'navbar.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './vendor/autoload.php';
require 'redirect.php';
// session_start();
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
<html>
<head>
    <title>Global Complex</title>
    <!-- <link rel="stylesheet" type="text/css" href="./style/newindex.style.css"> -->
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #333;
}

form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input,
textarea,
button {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
}

input[type="submit"],
button {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover,
button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

thead {
    background-color: #f2f2f2;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}
    </style>
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
?>

<div class="container">
    <h1>Species Request Form</h1>

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

    <!-- <input type="submit" value="Continue"> -->
        <!-- <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required> -->
        
        <!-- Add the rest of the user information fields -->

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
