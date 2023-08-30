<?php
// Simulated vendor data (replace with actual database query)
$vendors = [
    ['id' => 1, 'name' => 'Vendor One', 'description' => 'Providing quality products'],
    ['id' => 2, 'name' => 'Vendor Two', 'description' => 'Specializing in electronics'],
    // Add more vendors here
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors</title>
</head>
<body>
    <h1>List of Vendors</h1>
    <ul>
        <?php foreach ($vendors as $vendor) { ?>
            <li><a href="vendor_details.php?id=<?php echo $vendor['id']; ?>"><?php echo $vendor['name']; ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>

