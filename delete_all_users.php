<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database('users.db');
    $conn = $db->getDb();

    $query = "DELETE FROM users";
    if ($conn->exec($query)) {
        echo "All users have been deleted!";
    } else {
        echo "Failed to delete users!";
    }
}
?>

<form method="POST" action="delete_all_users.php">
    <input type="submit" value="Delete All Users" onclick="return confirm('Are you sure you want to delete all users?');">
</form>
