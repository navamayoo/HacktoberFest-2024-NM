<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>BMI Calculator</h1>
        <form action="" method="POST" class="bmi-form">
            <label for="weight">Weight (kg):</label>
            <input type="number" name="weight" id="weight" step="0.1" required>

            <label for="height">Height (cm):</label>
            <input type="number" name="height" id="height" step="0.1" required>

            <button type="submit" name="calculate">Calculate BMI</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $weight = $_POST['weight'];
            $height = $_POST['height'] / 100; // Convert cm to meters

            if ($height > 0 && $weight > 0) {
                $bmi = $weight / ($height * $height);
                $bmi = round($bmi, 2);

                echo "<div class='result'>";
                echo "<p>Your BMI: <strong>$bmi</strong></p>";

                // BMI category
                if ($bmi < 18.5) {
                    echo "<p class='underweight'>You are underweight.</p>";
                } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                    echo "<p class='normal'>You have a normal weight.</p>";
                } elseif ($bmi >= 25 && $bmi < 29.9) {
                    echo "<p class='overweight'>You are overweight.</p>";
                } else {
                    echo "<p class='obese'>You are obese.</p>";
                }

                echo "</div>";
            } else {
                echo "<p>Please enter valid values.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
