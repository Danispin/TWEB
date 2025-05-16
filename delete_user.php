<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    include 'database.php';

    $db = new Database('users.db');
    $conn = $db->getDB();

    $id = intval($_POST['id']);

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bindValue(1, $id, SQLITE3_INTEGER);

    $result = $stmt->execute();

}
?>
