<!DOCTYPE html>
<html>
<head>
    <title>Global Complex</title>
    <style>
        /* Basic CSS for Navbar */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="submitrequest.php">Submit Request</a></li>
    <li><a href="about.php">About</a></li>
    <!-- <li><a href="contact.php">Contact</a></li> -->
</ul>

<?php
    // Check if a page is requested and include its content
    $page = isset($_GET['page']) ? $_GET['page'] : 'index';

    $allowedPages = ['index', 'submitrequest', 'services', 'contact'];

    // if (in_array($page, $allowedPages)) {
    //     include $page . '.php';
    // } else {
    //     echo "<h2>Error 404: Page not found</h2>";
    // }
?>

</body>
</html>
