<?php
session_start();

if (!isset($_SESSION['guests'])) {
    $_SESSION['guests'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_guest']) && !empty($_POST['new_guest'])) {
        $new_guest = $_POST['new_guest'];
        $_SESSION['guests'][] = $new_guest;
    } elseif (isset($_POST['update_guest']) && isset($_POST['guest_id']) && isset($_POST['updated_guest'])) {
        $guest_id = $_POST['guest_id'];
        $updated_guest = $_POST['updated_guest'];
        if (isset($_SESSION['guests'][$guest_id])) {
            $_SESSION['guests'][$guest_id] = $updated_guest;
        }
    } elseif (isset($_POST['delete_guest']) && isset($_POST['guest_id'])) {
        $guest_id = $_POST['guest_id'];
        if (isset($_SESSION['guests'][$guest_id])) {
            unset($_SESSION['guests'][$guest_id]);
            $_SESSION['guests'] = array_values($_SESSION['guests']); // Reset array keys
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest List</title>
</head>
<body>
    <h1>Guest List</h1>
    <form method="post" action="guest_list.php">
        <input type="text" name="new_guest" placeholder="Enter guest's name">
        <button type="submit" name="add_guest">Add Guest</button>
    </form>
    <ul>
        <?php foreach ($_SESSION['guests'] as $guest_id => $guest) { ?>
            <li>
                <?php echo $guest; ?>
                <form method="post" action="guest_list.php">
                    <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>">
                    <input type="text" name="updated_guest" placeholder="Update guest's name">
                    <button type="submit" name="update_guest">Update</button>
                    <button type="submit" name="delete_guest">Delete</button>
                </form>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
