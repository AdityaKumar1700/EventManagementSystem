<?php
session_start();

// Simulated transaction data (replace with actual database query)
$transactions = [];

// Add a new transaction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['make_transaction']) && !empty($_POST['amount'])) {
        $amount = $_POST['amount'];
        $timestamp = date('Y-m-d H:i:s');
        $transactions[] = ['amount' => $amount, 'timestamp' => $timestamp];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Page</title>
</head>
<body>
    <h1>Transaction Page</h1>
    <h2>Make a Transaction</h2>
    <form method="post" action="transaction.php">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>
        <button type="submit" name="make_transaction">Make Transaction</button>
    </form>

    <h2>Transaction History</h2>
    <table>
        <tr>
            <th>Amount</th>
            <th>Timestamp</th>
        </tr>
        <?php foreach ($transactions as $transaction) { ?>
            <tr>
                <td><?php echo $transaction['amount']; ?></td>
                <td><?php echo $transaction['timestamp']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
