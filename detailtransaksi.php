<?php
    session_start();
    if(!isset($_SESSION['statusadmin'])){
        echo 
        "<script>
            alert('Harap login terlebih dahulu');
            document.location.href = 'loginadmin.php'
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="Style/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <div class="judul">
            <img src="images/logo.png" alt="Starbucks" width="90px">
            <h1>Detail Transaksi</h1>
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
                        <h3 class="center">Detail Transaksi</h3>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th nowrap>Menu</th>
                    <th>Jumlah</th>
                    <th>Gambar</th>
                </tr>
                <?php
                    if(isset($_GET['id_transaksi'])){
                        require "config.php";
                        $query = mysqli_query($db,"SELECT jumlah, nama_menu, gambar FROM detail_transaksi JOIN menu on (detail_transaksi.id_menu=menu.id) WHERE id_transaksi= $_GET[id_transaksi]");
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?=$i ?></td>
                            <td><?=$row['nama_menu']?></td>
                            <td><?=$row['jumlah']?></td>
                            <td><img src="Images/<?=$row['gambar']?>" alt="" width="100px"></td>
                        </tr>
                    <?php
                        $i++;
                        }
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>