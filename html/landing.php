<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid-America Entomological Archive</title>
    <link rel="stylesheet" type="text/css" href="./style/landing.style.css">
</head>
<body>

<header>
        <img src="./img/logo.png" alt="Your Logo" id="logo">
        <h1>Welcome to Mid-America Entomological Archive</h1>
    </header>
    <section>
        <p>We are thrilled to partner with the Department of Entomology and the Mid-America Entomological Archive (MEA) for the design and implementation of their comprehensive database.</p>

        <h2>Project Overview</h2>
        <p>The MEA serves as a vital resource for researchers, farmers, homeowners, gardeners, and outdoor enthusiasts. Our mission is to provide a user-friendly platform that offers detailed information on each species, including taxonomic classification, photographs, and DNA barcodes.</p>

        <h3>What Sets Us Apart?</h3>
        <ul>
            <li><strong>Digital Specimen Collection:</strong> Excitingly, we are digitizing the MEA's extensive specimen collection, making it available online. This digital transition not only enhances accessibility but also significantly reduces the labor-intensive process of responding to research sample requests.</li>
            <br>
            <li><strong>Global Scientific Support:</strong> Annually, thousands of insects, spiders, and their counterparts from the MEA's collection are sent globally to support scientific research. With your support, we aim to expand and optimize this program.</li>
        </ul>

    </section>
    <?php
    require_once './vendor/autoload.php';
    // echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
    // require 'redirect.php'
    require 'redirect.php'
    ?>

    <footer>
        <p>Thank you for being a part of the Mid-America Entomological Archive Project!</p>
    </footer>

</body>
</html>
