<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
		body {
			background-image: url('uni.gif');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
<div class="container">
		<h1>Sign up</h1>
    <form action="savedata.php" method="post">
        <label for="name">ID Number:</label>
        <input type="text" id="ID" name="ID" required><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Sign Up</button>

        <a href="index.php">
			<button type="button">Login</button></a>
    </form>
    </div>
</body>
</html>