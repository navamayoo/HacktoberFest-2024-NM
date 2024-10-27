<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="date"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 8px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Age Calculator</h1>
        <form method="post" action="">
            <label for="birthdate">Enter your birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" required>
            <button type="submit" name="calculate">Calculate Age</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            // Retrieve birthdate from the form input
            $birthdate = $_POST['birthdate'];

            // Convert the birthdate to a DateTime object
            $birthDate = new DateTime($birthdate);
            $currentDate = new DateTime();

            // Calculate the age by subtracting the birthdate from the current date
            $age = $currentDate->diff($birthDate);

            echo "<div class='result'>";
            echo "<h2>Your Age</h2>";
            echo "<p>Years: " . $age->y . "</p>";
            echo "<p>Months: " . $age->m . "</p>";
            echo "<p>Days: " . $age->d . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
