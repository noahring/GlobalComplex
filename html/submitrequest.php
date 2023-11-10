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
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        button {
            background-color: #ccc;
            color: #333;
            padding: 8px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

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

</body>
</html>
