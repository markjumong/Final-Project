<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: logout.php');
    exit;
}

// Database configuration
include('conn.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to insert the new user
    $stmt = $connection->prepare("INSERT INTO users (id, name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $name, $email, $password);
    $stmt->execute();

    // Check if the insert was successful
    if ($stmt->affected_rows > 0) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="dashboardstyle.css">
</head>
<body>
    <h1>Add User</h1>
    <form action="" method="post">
        <label for="ID">ID:</label>
        <input type="text" name="ID" required><br>
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Add User</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>