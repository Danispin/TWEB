<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    $db = $database->getDB();
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bindValue(1, $username, SQLITE3_TEXT);
    $stmt->bindValue(2, $password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: Username already exists.";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="authstyle.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Register</button>
    </form>
    <h2> or would you prefer to go back to the main page </h2>
    <a href = "index.php">Main Page</a>
    <h2> or would you prefer to logout </h2>
    <a href = "dashboard.php">Dashboard</a>

</body>
</html>

