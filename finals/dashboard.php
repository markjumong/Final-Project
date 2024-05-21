<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: logout.php');
    exit;
}

if (isset($_GET['logout'])) {
    header('Location: logout.php');
    exit;
}


include('conn.php');


$stmt = $connection->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboardstyle.css">
</head>
<body>
    <h1>Dashboard</h1>
    <p>User Management</p>
    <hr>
    <p id="clock"></p>
    <form action="logout.php" method="get">
        <button type="submit" name="logout">Logout</button>    
    </form>
    <a id="button" href="add.php">Add New User</a>

    <h2>User List</h2>
    <br>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['ID']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['password']?></td>
                <td>
                    <a id="button" href="edit.php?id=<?= $row['user_id'] ?>">Edit</a>
                    <a id="button" onclick="deleteUser(<?= $row['user_id'] ?>)">Delete</a>
                </td>
            </tr>
        <?php } ?>

    </table>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, "0");
            var minutes = now.getMinutes().toString().padStart(2, "0");
            var seconds = now.getSeconds().toString().padStart(2, "0");
            var clock = document.getElementById("clock");
            clock.textContent = hours + ":" + minutes + ":" + seconds;
        }

        setInterval(updateClock, 1000);
        updateClock();

        function deleteUser(id) {
            var r = confirm("Are you sure you want to delete this user?");
            if (r == true) {
                var http = new XMLHttpRequest();
                var url = 'delete.php';
                var params = 'user_id=' + id;
                http.open('POST', url, true);

                
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                http.onreadystatechange = function() {
                    if(http.readyState == 4 && http.status == 200) {
                        alert("Delete success!");
                        location.reload();
                    }
                }
                http.send(params);
            }
        }
    </script>
</body>
</html>