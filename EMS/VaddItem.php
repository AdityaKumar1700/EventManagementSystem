<?php
session_start();

// Simulated product data (replace with actual database query)
$products = [];

// Add product to the list
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        $new_product = [
            'name' => $_POST['product_name'],
            'status' => 'Available',
            'request' => '',
        ];
        $products[] = $new_product;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <h1>Product Management</h1>
    <h2>Add New Product</h2>
    <form method="post" action="index.php">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <h2>Product List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Request</th>
        </tr>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['status']; ?></td>
                <td><?php echo $product['request']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
