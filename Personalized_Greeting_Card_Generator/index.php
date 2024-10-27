<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalized Greeting Card Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f7f7;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .container h1 {
            color: #333;
        }
        .container form {
            margin-top: 15px;
        }
        .container label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .container input[type="text"], .container select {
            padding: 10px;
            width: 100%;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .card {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Greeting Card Generator</h1>
        <form method="POST" action="">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="message">Greeting Message:</label>
            <input type="text" id="message" name="message" required>

            <label for="color">Choose Background Color:</label>
            <select id="color" name="color" required>
                <option value="#4CAF50">Green</option>
                <option value="#FF5733">Red</option>
                <option value="#33B5FF">Blue</option>
                <option value="#FFC300">Yellow</option>
                <option value="#9B59B6">Purple</option>
            </select>

            <button type="submit" name="generate">Generate Card</button>
        </form>

        <?php
        if (isset($_POST['generate'])) {
            // Retrieve user input
            $name = htmlspecialchars($_POST['name']);
            $message = htmlspecialchars($_POST['message']);
            $color = htmlspecialchars($_POST['color']);
            echo "<div class='card' style='background-color: $color;'>";
            echo "<p>Hello, $name!</p>";
            echo "<p>$message</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
