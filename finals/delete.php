<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
    header('Location: logout.php'); exit;
}
// Database configuration
include('conn.php');

$user_id = $_POST['user_id'];
$sql = "DELETE FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $sql);
?>