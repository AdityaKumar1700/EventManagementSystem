<?php
// Simulated order data (replace with actual database query)
$order_data = [
    '12345' => 'Processing',
    '67890' => 'Shipped',
    '54321' => 'Delivered',
    // Add more order data here
];

$status_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['check_status']) && !empty($_POST['order_id'])) {
        $order_id = $_POST['order_id'];
        if (isset($order_data[$order_id])) {
            $status_message = "Order ID $order_id: " . $order_data[$order_id];
        } else {
            $status_message = "Order ID $order_id not found";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
</head>
<body>
    <h1>Order Status</h1>
    <form method="post" action="order_status.php">
        <label for="order_id">Enter Order ID: </label>
        <input type="text" id="order_id" name="order_id" placeholder="Order ID">
        <button type="submit" name="check_status">Check Status</button>
    </form>
    <p><?php echo $status_message; ?></p>
</body>
</html>
