<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<style>
		body {
			background-image: url('ls.gif');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="container">
	<img src="min.gif" alt="login image">
		<h1>Hello there,<?php echo $_SESSION['name']; ?>!</h1>
		<p></p>
		<button onclick="location.href='dashboard.php'">Dashboard</button>
	</div>

	<style>
		.container a {
			display: block;
			text-align: center;
			margin-top: 20px;
		}
	</style>
	
</body>
</html>