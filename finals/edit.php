<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
    header('Location: logout.php'); exit;
}
if (isset($_GET['logout'])) { 
    header('Location: logout.php'); exit;
}

// Database configuration
include('conn.php'); // testing mo ulet

// SQL query to select all login data from the database
$sql = "SELECT * FROM users WHERE user_id = '" . $_GET['id'] . "'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE users SET `ID` = '$id', `name` = '$name', `email` = '$email', `password` = '$password' WHERE user_id = '$user_id'";
    $result = mysqli_query($connection, $sql);
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo "Dashboard";?></title>
    <link rel="stylesheet" type="text/css" href="dashboardstyle.css">
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>
<body>
    <h1><?php echo  "Dashboard";?></h1>
    <p><?php echo "User Management";?></p>
    <hr>
    <p id="clock"></p>
    <form action="logout.php" method="get">
        <button type="submit" name="logout">Logout</button>
    </form>

    <h2>Edit User</h2>
    <div class="container">
        <form action="" method="post">
            <label for="ID">ID Number:</label>
			<input type="text" id="ID" name="ID" value="<?=$row['ID']?>" required>
			<label for="Name">Name:</label>
			<input type="text" id="Name" name="name" value="<?=$row['name']?>" required>
            <label for="Email">Email:</label>
			<input type="email" id="Email" name="email" value="<?=$row['email']?>" required>
			<label for="password">Password:</label>
			<input type="password" id="Password" name="password" value="<?=$row['password']?>" required>
            <br><br>
            <input type="hidden" name="user_id" value="<?=$_GET['id']?>" required/>
			<input style="background: #45a049; color: white" type="submit" name="submit" value="Update"></button>
		</form>
	</div>

	<style>
		.container a {
			display: block;
			text-align: center;
			margin-top: 20px;
		}
	</style>

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
    </script>
</body>
</html>