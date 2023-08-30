<?php
session_start();

// Initialize cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Sample products
$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 10.99],
    ['id' => 2, 'name' => 'Product 2', 'price' => 20.49],
    ['id' => 3, 'name' => 'Product 3', 'price' => 15.00],
    // Add more products here
];

// Handle actions (add or remove from cart)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 0;
        }
        $_SESSION['cart'][$product_id]++;
    } elseif (isset($_POST['remove_from_cart']) && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        if (isset($_SESSION['cart'][$product_id])) {
            if ($_SESSION['cart'][$product_id] > 0) {
                $_SESSION['cart'][$product_id]--;
            }
            if ($_SESSION['cart'][$product_id] == 0) {
                unset($_SESSION['cart'][$product_id]);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $total_price = 0;
        foreach ($products as $product) {
            $product_id = $product['id'];
            $quantity = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id] : 0;
            $total = $product['price'] * $quantity;
            $total_price += $total;
            ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td><?php echo $quantity; ?></td>
                <td>$<?php echo $total; ?></td>
                <td>
                    <form method="post" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <button type="submit" name="add_to_cart">Add</button>
                        <button type="submit" name="remove_from_cart">Remove</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="3"><strong>Total Price:</strong></td>
            <td colspan="2"><strong>$<?php echo $total_price; ?></strong></td>
        </tr>
    </table>
</body>
</html>
