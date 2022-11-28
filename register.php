<?php
    require "config.php";
    if(isset($_POST['submit'])){
        $nama       = $_POST['nama'];
        $email      = $_POST['email'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level      = $_POST['level'];
        $query = mysqli_query($db, "SELECT *FROM akun WHERE username='$username'");
        if(mysqli_fetch_assoc($query)){
            echo" 
            <script>
                alert('Username already taken, please use another username');
            </script>
            ";
        }else{
            if($password == $konfirmasi){
                $password = password_hash($password,PASSWORD_DEFAULT);
                $query = mysqli_query($db, "INSERT INTO akun (nama, email, username, password, level) VALUES('$nama','$email','$username','$password','$level')");
                if($query){
                    echo" 
                    <script>
                        alert('Register Successfull');
                        document.location.href='loginUser.php';
                    </script>
                    ";
                }else{
                    echo" 
                    <script>
                        alert('Register Failed');
                    </script>
                    ";
                }
            }else{
                echo" 
                <script>
                    alert('The password didn't match');
                </script>
                ";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/styleLogin.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container regis">

        <div class="judul">
            <h2>Sign Up</h2>
        </div>
        
        <div class="form">
            <form action="" method="post">
                <label for="nama">Name</label><br>
                <input type="text" name="nama" class="input" placeholder="Full name"><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Email"><br>

                <label for="username">Username</label><br>
                <input type="text" name="username" class="input" placeholder="Username"><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" class="input" placeholder="Password"><br>

                <label for="konfirmasi">Confirm Password</label><br>
                <input type="password" name="konfirmasi" class="input" placeholder="Confirm password"><br>

                <input type="hidden" name="level" class="input" value="user"><br><br>
                <input type="submit" name="submit" class="submit" value="Sign Up"><br><br>
            </form>

            <p>Already have an account?
                <a href="loginUser.php"><u>Sign In</u></a>
            </p>
        
        </div>
    </div>
</body>
</html>