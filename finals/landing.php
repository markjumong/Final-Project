<?php
session_start();
include('conn.php');

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    

    $query = "SELECT * FROM users WHERE name = '$name' AND email = '$email' AND password = '$password'";
    $sql = mysqli_query($connection, $query);

    if (mysqli_num_rows($sql) > 0) {
        $user = mysqli_fetch_assoc($sql);
    
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['email'];
        $_SESSION['name'] = $user['name'];

        
        header('Location: authenticate.php');
        exit;
    } else {
        
        echo 'Invalid username or password';
    }
} else {
    
    echo 'Login form is not submitted';
}
?>