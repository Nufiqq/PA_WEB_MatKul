<?php 
    session_start();
    if(!isset($_SESSION['status'])){
        echo 
        "<script>
            alert('Harap login terlebih dahulu');
            document.location.href = 'loginuser.php'
        </script>";
    }
    include "config.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/styleCart.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cart</title>
</head>

<body>
    <header>
        <div class="judul">
            <img src="Images/logo.png" alt="Starbucks" width="90px">
            <h1>My Cart</h1>
        </div>
        <div class="home">
            <a href="landingpage.php">Home</a>
        </div>
    </header>

    <div class="content">
        <div class="tombol">
            <a href="menu.php"class="button">Add Product</a>
        </div>
        <div class="tabel">
            <?php
                if(!empty($_SESSION["cart"])){
            ?>
                    <table border="1">
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Cancel</th>
                        </tr>
                        <?php
                            $no=1;
                            $grandtotal = 0;
                            foreach($_SESSION["cart"] as $cart => $val){
                                $subtotal = $val["harga"] * $val["jumlah"];
                                ?>
                                <tr>
                                    <td><?=$no++;?>.</td>
                                    <td><?=$val["nama"];?></td>
                                    <td><?=$val["harga"];?></td>
                                    <td><?=$val["jumlah"];?> pcs</td>
                                    <td><?=$subtotal;?></td>
                                    <td>
                                        <a href="Proses/hapus_cart.php?id=<?=$cart?>"><i class="material-icons">&#xe872;</i></a>
                                    </td>
                                </tr>
                                <?php
                                $grandtotal+=$subtotal;
                            }
                        ?>
                        <tr>
                            <th colspan="4">Grand Total</th>
                            <th><?=$grandtotal?></th>
                            <th>&nbsp;</th>
                        </tr>
                    </table>
            <?php
                }else{
                    echo "Belum ada produk di shoping cart";
                }
            ?>
        </div>
        <div class="tombol">
            <a href="Proses/tambah_transaksi.php?id=<?=$cart?>"class="button">Checkout</a>
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