<?php
    require 'koneksi.php';

    if(isset($_POST['regis'])) {
        $username =$_POST['username'];
        $password =$_POST['password'];
        $cpassword =$_POST['cpassword'];
        
        $result = mysqli_query($conn, 'SELECT * FROM user WHERE username = "$username"');

        if($result){
            echo "
                <script>
                    alert ('USERNAME TELAH DIGUNAKAN!');
                    document.location.href = 'regis.php';
                </script>
            ";

        } 
        else {
            if ($password === $cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);

                $result = mysqli_query($conn, "INSERT INTO `user`(`id`, `username`, `password`) VALUES ('','$username','$password'))");
                if(mysqli_affected_rows($conn) > 0){
                    echo "
                        <script>
                        alert ('REGISTRASI BERHASIL!');
                        document.location.href = 'login.php';
                        </script>
                    ";
            } 
            else {
                echo "
                    <script>
                        alert ('REGISTRASI GAGAL!');
                        document.location.href = 'regis.php';
                        </script>
                    ";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrasi</h1>
    <form action="" method="post">
        <label for="">Username</label> <br>
        <input type="text" name="username" id=""> <br>
        <label for="">Password</label> <br>
        <input type="password" name="password" id=""> <br>
        <label for="">Konfirmasi Password</label> <br>
        <input type="password" name="cpassword" id=""> <br>
        <button type="submit" name="regis">Registrasi</button>
    </form>
</body>
</html>