<?php
    if(isset($_SESSION['status'])){
        echo "<script>
                document.location.href = 'landingpage.php'
            </script>";
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/styleLogin.css">
    <title>Login User</title>
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="Images/logo.png" alt="logo starbucks" width="70%">
        </div>
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="user" placeholder="email or username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="submit" value="Login" class="submit"><br><br>
            </form>

            <p>Don't have an account?
                <a href="register.php"><u>Sign Up</u></a>
            </p>
        </div>
    </div>
</body>
</html>

<?php
    session_start();
    require "config.php";

    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = mysqli_query($db, "SELECT * FROM akun WHERE username='$user' OR email ='$user'");

            if (mysqli_num_rows($query) > 0) {
                $result = mysqli_fetch_assoc($query);
                $username = $result['username'];
                if($result["level"] =="user"){
                    if(password_verify($password,$result['password'])){
                        $iduser = $result['id_akun'];
                        $_SESSION["user"] = $username;
                        $_SESSION["status"] = "login";
                        echo" 
                        <script>
                            document.cookie='id_akun=$iduser';
                            alert('Welcome $username');
                            document.location.href='landingpage.php';
                        </script>
                        ";
                    } else{
                        echo" 
                        <script>
                            alert('Wrong Password');
                        </script>
                        ";
                    }
                } else{
                    echo" 
                    <script>
                        alert('Wrong Username and Password');
                    </script>
                    ";
                }
        }
    }
?>