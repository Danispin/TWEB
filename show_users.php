<?php
include 'database.php';

$db = new Database('users.db');
$conn = $db->getDB();

$query = "SELECT * FROM users";
$results = $conn->query($query);

echo "<h2>Users List</h2>";
echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
while ($row = $results->fetchArray()) {
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td></tr>";
}
echo "</table>";

echo "<a href = 'index.php'>Main Page</a>";s
?>
