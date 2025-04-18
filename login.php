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
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px;
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .links {
            margin-top: 30px;
            text-align: center;
        }

        .links a {
            display: block;
            margin: 8px 0;
            text-decoration: none;
            color: #007BFF;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .message {
            width: 90%;
            max-width: 400px;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 5px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
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
