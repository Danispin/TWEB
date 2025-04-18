<?php
include 'database.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    if ($username) {
        $db = new Database('users.db');
        $conn = $db->getDb();

        $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $result = $stmt->execute();

        echo "<h2>Search Results</h2>";
        echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
        while ($row = $result->fetchArray()) {
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Please enter a username to search!";
    }
}
?>

<form method="POST" action="search_user.php">
<link rel="stylesheet" href="authstyle.css">
    Username: <input type="text" name="username"><br>
    <input type="submit" value="Search User">
</form>
