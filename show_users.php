<?php
include 'database.php';

$db = new Database('users.db');
$conn = $db->getDB();

$query = "SELECT * FROM users";
$results = $conn->query($query);

echo "<h2>Users List</h2>";
echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>";
while ($row = $results->fetchArray()) {
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td>" . "<td>" . $row['password'] . "</td></tr>";
    echo "<td><form method='POST' action='delete_user.php'>
            <input type='hidden' name='id' value='" . $row['id'] . "'>
            <input type='submit' value='Delete User' onclick=\"return confirm('Are you sure you want to delete this user?');\">
          </form></td>";
}
echo "</table>";

echo "<a href = 'index.php'>Main Page</a>";s
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="authstyle.css">
</head>
<body>
    <h2>Users List</h2>
    <form method="POST" action="search_user.php">
        Username: <input type="text" name="username"><br>
       
