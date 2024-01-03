<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculator</title>
</head>

<body>
    <h1>Currency Calculator</h1>
    <form action="" method="get">
        <label for="amount">Enter Amount:</label>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        <label for="from">From:</label>
        <select id="from" name="from" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="JPY">JPY</option>
            <option value="AUD">AUD</option>
        </select><br><br>
        <label for="to">To:</label>
        <select id="to" name="to" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="JPY">JPY</option>
            <option value="AUD">AUD</option>
        </select><br><br>
        <button type="submit">Convert</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["amount"], $_GET["from"], $_GET["to"])) {
        $exchangeRates = [
            'USD' => ['EUR' => 0.87, 'GBP' => 0.75, 'JPY' => 113.62, 'AUD' => 1.30],
            'EUR' => ['USD' => 1.15, 'GBP' => 0.88, 'JPY' => 129.97, 'AUD' => 1.48],
            'GBP' => ['USD' => 1.33, 'EUR' => 1.14, 'JPY' => 151.88, 'AUD' => 1.72],
            'JPY' => ['USD' => 0.0088, 'EUR' => 0.0077, 'GBP' => 0.0066, 'AUD' => 0.011],
            'AUD' => ['USD' => 0.77, 'EUR' => 0.68, 'GBP' => 0.58, 'JPY' => 88.73],
        ];

        $amount = $_GET["amount"];
        $from = $_GET["from"];
        $to = $_GET["to"];

        if (isset($exchangeRates[$from]) && isset($exchangeRates[$from][$to])) {
            $rate = $exchangeRates[$from][$to];
            $convertedAmount = $amount * $rate;
            echo "<p>{$amount} {$from} is equal to {$convertedAmount} {$to}.</p>";
        } else {
            echo "<p>Error: Unsupported conversion.</p>";
        }
    }
    ?>
</body>
</html>
