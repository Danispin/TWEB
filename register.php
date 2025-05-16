<?php
require 'database.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        echo json_encode(['success' => false, 'message' => 'Date incomplete.']);
        exit();
    }

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    $db = $database->getDB();
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bindValue(1, $username, SQLITE3_TEXT);
    $stmt->bindValue(2, $password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Utilizator inregistrat cu succes.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Eroare: Numele de utilizator exista deja.']);
    }
    exit();
}
echo json_encode(['success' => false, 'message' => 'Cerere invalida.']);
exit();
?>
