<?php
session_start(); // Start the session

require_once './vendor/autoload.php';

// init configuration
$clientID = '1034909127004-gp57n4su0vkr0pj03enddmtfe533i2lf.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://globalcomplex.johnson.com.np/GlobalComplex/html/';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if 'access_token' index is set before trying to access it
    if (isset($token['access_token'])) {
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        // Insert user data into the database
        $config = parse_ini_file('/home/' . get_current_user() . '/mysqli.ini');
        $conn = new mysqli(
            $config['mysqli.default_host'],
            $config['mysqli.default_user'],
            $config['mysqli.default_pw']
        );

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
            exit();
        }

        $conn->select_db('users');
        // Check if the user already exists in the database using a prepared statement
        $checkUserQuery = "SELECT * FROM _users WHERE email = ?";
        $stmt = $conn->prepare($checkUserQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // User doesn't exist, insert into the database using a prepared statement
            $insertUserQuery = "INSERT INTO _users (name, email) VALUES (?, ?)";
            $stmt = $conn->prepare($insertUserQuery);
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("ss", $name, $email);

            if ($stmt->execute()) {
                echo $name . ", Your account is successfully created.";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            // User already exists, you may choose to update the record
            echo $name . ", Welcome back!";
        }

        // Store user information in session
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;

        $stmt->close();
        $conn->close();

        // Continue with the rest of your code, such as redirecting the user
        header('Location: index.php');
        exit();
    } else {
        // Handle the case where 'access_token' is not set
        echo "Error: Access token not found.";
    }
} else {
    echo "<a href='" . $client->createAuthUrl() . "' id='loginButton'>Login</a>";
}
?>
