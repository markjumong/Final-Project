<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta http-equiv="refresh" content="3; url=index.php">
    <style> 
    body { background-image: url('jb4.gif'); 
        background-repeat: no-repeat; 
        background-size: cover; 
    } 
    </style>

</head>
<body>
    <div class="container">
        <?php
        include('conn.php');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID = $_POST['ID'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO users (ID, name, email, password) VALUES ('$ID','$name', '$email', '$password')";

            if (mysqli_query($connection, $query)) {
                echo "<div class='success-message'>Congratulations you have Sign Up successfully!</div>";
                echo "<form action='index.php' method='get'>";
                echo "<button class='back-button' type='submit'>Login here</button>";
                echo "</form>";
                
            } else {
                echo "Error: Sign Up failed. Please try again.";
            }
        } else {
            echo "Error: Invalid request.";
        }

        
        mysqli_close($connection);
        ?>
    </div>
    
</body>
</html>