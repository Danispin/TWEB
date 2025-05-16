<?php
include 'database.php';

$db = new Database('users.db');
$conn = $db->getDB();

$query = "SELECT * FROM users";
$results = $conn->query($query);

echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Password</th><th>Actions</th></tr>";
while ($row = $results->fetchArray()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>
            <button onclick=\"deleteUser(" . $row['id'] . ")\">Delete</button>
          </td>";
    echo "</tr>";
}
echo "</table>";
?>
