<?php
    if(isset($_SESSION['statusadmin'])){
        session_start();
        echo "<script>
                document.location.href = 'admin.php'
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
    <title>Login Admin</title>
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="Images/logo.png" alt="logo starbucks" width="70%">
        </div>
        <div class="form-login">
            <h3>Login Admin</h3>
            <form action="" method="post">
                <input type="text" name="user" placeholder="email or username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="submit" value="Login" class="submit"><br><br>
            </form>
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
                if($result["level"] =="admin"){
                    if(password_verify($password,$result['password'])){
                        $_SESSION["admin"] = $username;
                        $_SESSION["statusadmin"] = "login";
                        echo" 
                        <script>
                            alert('Welcome $username');
                            document.location.href='admin.php';
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