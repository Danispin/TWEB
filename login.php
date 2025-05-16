<?php
require 'database.php';
session_start();

if (isset($_SESSION['username'])) {
    echo "" . $_SESSION['username'] . " You are logged in.";
} else {
    echo "You are not logged in.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = $database->getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bindValue(1, $username, SQLITE3_TEXT);
    $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['username'] = $username; 
        header("Location: index.php"); 
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="authstyle.css">
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
    <h2> or would you prefer to register </h2>
    <a href = "register.php">Register</a>
    <h2> or would you prefer to go back to the main page </h2>
    <a href = "index.php">Main Page</a>
    <h2> or would you prefer to logout </h2>
    <a href = "logout.php">Logout</a>

    <h2> or would you prefer to see the users </h2>
    <a href = "show_users.php">Show Users</a>

</body>
</html>
