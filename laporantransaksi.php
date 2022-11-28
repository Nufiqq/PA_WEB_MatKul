<?php
    session_start();
    if(!isset($_SESSION['statusadmin'])){
        echo 
        "<script>
            alert('Harap login terlebih dahulu');
            document.location.href = 'loginadmin.php'
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
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="Style/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header>
        <div class="judul">
            <img src="images/logo.png" alt="Starbucks" width="90px">
            <h1>Laporan Transaksi</h1>
        </div>
        <div class="nav">
            <a class="produk" href="admin.php">Produk</a>
            <a class="produk" href="laporantransaksi.php">Laporan transaksi</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div class="content">
        <div class="tabel">
            <table border="1">
                <tr>
                    <th colspan="4" class="thead">
                        <h3 class="center">laporan Transaksi</h3>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th nowrap>User</th>
                    <th>Tanggal Transaksi</th>
                    <th>Detail Transaksi</th>
                </tr>
                <?php
                    require "config.php";
                    $query = mysqli_query($db, "SELECT * FROM header_transaksi JOIN akun on (header_transaksi.id_akun=akun.id_akun)");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['tanggal_transaksi']?></td>
                        <td>
                            <a href="detailtransaksi.php?id_transaksi=<?=$row["id_transaksi"]?>">
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

    <!-------------------------- Footer ----------------------------------->
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