<?php
    sesson_start();
    require 'koneksi.php';

    if(!isset($_SESSION['login'])) {
        header('Location: login.php');
        exit;
    }

    if(isset($_POST['login'])) {
        $username =$_POST['username'];
        $password =$_POST['password'];
        
        $result = mysqli_query($conn, 'SELECT * FROM user WHERE username = "$username"');

        if(mysqli_num_rows($result )=== 1){
            $row = mysqli_affected_rows($result);

            if(password_verify($password, $row['password'])){
                $_SESSION['login'] = true;
                $_SESSION['username'] = true;

                header('Location: index.php');
                exit;
            }
        } 
        $error = true;
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>LOGIN</h1>
    <?php
    if(isset($error)){
        echo "<p style='color: red;'> Username atau password salah! </p>";
    } else {
        echo "<p style='color: red;'> Username atau password salah! </p>";
    }
    ?>
    <form action="" method="post">\
        <label for="">Username :</label>
        <input type="text" name="username" id=""> <br>
        <label for="">Password :</label>
        <input type="password" name="password" id=""> <br>
        <button type="submit" name="login">Login</button>
    </form>

</body>
</html>