<?php
    session_start();
    if(!isset($_SESSION['status'])){
        echo 
        "<script>
            alert('Harap login terlebih dahulu');
            document.location.href = 'loginuser.php'
        </script>";
    }
    require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/styleMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Transaksi</title>
</head>
<body>
    <header>
        <div class="judul">
            <img src="Images/logo.png" alt="Starbucks" width="90px">
            <h1>Transaksi</h1>
        </div>
        <div class="home">
            <a href="landingpage.php">Home</a>
        </div>
    </header>

    <div class="content">
        <h1>List Transaksi</h1>
        
        <div class="tabel">
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Detail Transaksi</th>
                </tr>
                <?php
                    $id_akun = $_COOKIE['id_akun'];
                    $query = mysqli_query($db,"SELECT * FROM header_transaksi WHERE id_akun = '$id_akun'");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td nowrap><?=$row['id_transaksi']?></td>
                        <td><?=$row['tanggal_transaksi']?></td>
                        <td>
                            <a href="detailtransaksi_User.php?id_transaksi=<?=$row["id_transaksi"]?>">
                                <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                    $i++;
                    }
                ?>
            </table>
        </div>
    </div>

    <div class="footer-dark" id="contact">
        <footer>
            <h3 >Contact Us</h3>
            <div class="col item social">
                <a href="https://wa.me/+6285349501956"><i class="fab fa-whatsapp"></i></a>
                <a href="https://twitter.com/nupiqq"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/nupiqq/"><i class="fab fa-instagram"></i></i></a>
                <p class="copyright">Kelompok 6 WEB &copy; 2022</p>
            </div>
        </footer>
    </div>

</body>
</html>