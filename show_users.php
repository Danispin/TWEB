<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
    <link rel="stylesheet" href="authstyle.css">
</head>
<body>
    <h2>Users List</h2>

    <div id="usersTable">
        <?php include 'get_users_table.php'; ?>
    </div>

    <h2>Adaugă utilizator</h2>
    <form id="ajaxRegisterForm">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Înregistrează</button>
    </form>

    <div id="ajaxResponse"></div>

    <h2>Main page </h2>
    <a href = "index.php">Main Page</a>
    <script>
    // Formular AJAX pentru adăugare utilizator
    document.getElementById('ajaxRegisterForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const msgDiv = document.getElementById('ajaxResponse');
            if (data.success) {
                msgDiv.innerHTML = "<span style='color:green'>" + data.message + "</span>";
                form.reset();
                reloadUsersTable();
            } else {
                msgDiv.innerHTML = "<span style='color:red'>" + data.message + "</span>";
            }
        })
        .catch(() => {
            document.getElementById('ajaxResponse').innerHTML = "<span style='color:red'>Eroare AJAX.</span>";
        });
    });

    // ajax pentru stergera unui utilizator
    function deleteUser(userId) {
        if (!confirm("Are you sure you want to delete this user?")) {
            return;
        }

        fetch('delete_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + encodeURIComponent(userId)
        })
        .then(response => response.text())
        .then(result => {
            reloadUsersTable();
        })
        .catch(() => {
            alert("Eroare la stergere.");
        });
    }

    // functie pentru reincarcarea tabelului utilizatorilor
    function reloadUsersTable() {
        fetch('get_users_table.php')
            .then(response => response.text())
            .then(html => {
                document.getElementById('usersTable').innerHTML = html;
            });
    }
    </script>
</body>
</html>
