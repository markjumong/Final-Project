<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			background-image: url('uni.gif');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="container">
		<h2>Login</h2>

		<form action="landing.php" method="post">
			<label for="Name">Name:</label>
			<input type="text" id="Name" name="name" required>
            <label for="Email">Email:</label>
			<input type="email" id="Email" name="email" required>
			<label for="password">Password:</label>
			<input type="password" id="Password" name="password" required>
			<button type="submit">Login</button>
			<div class="signup-cta">
  <p>Don't have an account?</p>
  <a href="register.php">
    <button type="button">Sign Up</button>
  </a>
</div>
		</form>
	</div>
</body>
</html>