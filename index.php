<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Converter</title>
</head>
<body>
    <h1>Currency Calculator</h1>
    <form action="" method="get">
        <label for="amount">Enter Amount in Pounds (£):</label>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        <button type="submit">Convert to Euros</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["amount"])) {
        $exchangeRate = 0.87; 
        $amountInPounds = $_GET["amount"];

        if (is_numeric($amountInPounds) && $amountInPounds >= 0) {
            $amountInEuros = $amountInPounds * $exchangeRate;
            echo "<p>{$amountInPounds} pounds is equal to {$amountInEuros} euros.</p>";
        } else {
            echo "<p>Please enter a valid amount.</p>";
        }
    }
    ?>
</body>
</html>
