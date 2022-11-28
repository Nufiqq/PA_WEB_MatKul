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
    <title>List Menu</title>
</head>
<body>
    <header>
        <div class="judul">
            <img src="Images/logo.png" alt="Starbucks" width="90px">
            <h1>List Menu</h1>
        </div>
        <div class="home">
            <a href="landingpage.php">Home</a>
        </div>
    </header>

    <div class="content">
        <h1>List Menu</h1>
        <div class="searching">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Searching for.." class="search">
                <input type="submit" name="submit" value="Search" class="cari">
            </form>
        </div>

        <div class="tabel">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Menu</th>
                    <th>Tall</th>
                    <th>Grande</th>
                    <th>Venti</th>
                    <th>Image</th>
                </tr>
                <?php
                    require "config.php";
                    if(isset($_GET['submit'])){
                        $search = $_GET['search'];
                        $i = 1;
                        $query = mysqli_query($db, "SELECT * FROM menu WHERE nama_menu LIKE'%$search%'");
                        while ($row = mysqli_fetch_object($query)) {
                ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td nowrap><?=$row->nama_menu?></td>
                            <td>
                                <?=$row->tall?>
                                <a href="Proses/tall_tambah_cart.php?id=<?=$row->id?>">
                                    <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                                </a>
                            </td>
                            <td>
                                <?=$row->grande?>
                                <a href="Proses/grande_tambah_cart.php?id=<?=$row->id?>">
                                    <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                                </a>
                            </td>
                            <td>
                                <?=$row->venti?>
                                <a href="Proses/venti_tambah_cart.php?id=<?=$row->id?>">
                                    <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                                </a>
                            </td>
                            <td><img src="Images/<?=$row->gambar?>" alt="" width="100px"></td>
                        </tr>
                <?php
                        $i++;
                        }
                    } else{
                        $query = mysqli_query($db,"SELECT * FROM menu");
                        $i = 1;
                        while ($row = mysqli_fetch_object($query)) {
                ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td nowrap><?=$row->nama_menu?></td>
                            <td>
                                <?=$row->tall?>
                                <a href="Proses/tall_tambah_cart.php?id=<?=$row->id?>">
                                    <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                                </a>
                            </td>
                            <td>
                                <?=$row->grande?>
                                <a href="Proses/grande_tambah_cart.php?id=<?=$row->id?>">
                                    <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                                </a>
                            </td>
                            <td>
                                <?=$row->venti?>
                                <a href="Proses/venti_tambah_cart.php?id=<?=$row->id?>">
                                    <i class="fa fa-shopping-cart" style="font-size:20px"></i>
                                </a>
                            </td>
                            <td><img src="Images/<?=$row->gambar?>" alt="" width="100px"></td>
                        </tr>
                <?php
                        $i++;
                        }
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