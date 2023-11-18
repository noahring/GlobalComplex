<!DOCTYPE html>
<html>
<head>
    <title>Global Complex</title>
    <style>
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

        form {
            margin: 20px;
        }

        /* Style form elements */
        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="street_address"],
        input[type="specimen_request"]
        textarea {
            width: 15%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="submitrequest.php">Submit Request</a></li>
    <li><a href="reviewRequest.php">Review Incoming Requests</a></li>
    <li><a href="about.php">About</a></li>
    <!-- <li><a href="contact.php">Contact</a></li> -->
</ul>

<?php
    // Check if a page is requested and include its content
    $page = isset($_GET['page']) ? $_GET['page'] : 'index';

    $allowedPages = ['index', 'submitrequest', 'reviewRequest', 'services', 'contact'];

    // if (in_array($page, $allowedPages)) {
    //     include $page . '.php';
    // } else {
    //     echo "<h2>Error 404: Page not found</h2>";
    // }
?>


<form action="process_request.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="street_address">Street Address:</label>
    <textarea id="street_address" name="street_address" required></textarea>

    <label for="city">City:</label>
    <input type="city" id="city" name="city" required>

    <label for="state">State:</label>
    <input type="state" id="state" name="state" required>

    <label for="zip">ZipCode:</label>
    <input type="zip" id="zip" name="zip" required>

    <label for="specimen_request">Request the Specimen: </label>
    <textarea type="specimen_request" id="specimen_request" name="specimen_request" required></textarea>

    <input type="submit" value="Submit Request">
</form>
</body>
</html>
