<?php
    session_start();
    
     if(!isset($_SESSION['status'])){
        echo 
        "<script>
            alert('Harap login terlebih dahulu');
            document.location.href = 'loginuser.php'
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="Style/styleHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header class="Heading">
        <nav>
            <div class="container-flex">
                <div class="brand">
                    <a><img class="Logo" width="64" height="64" alt="Starbucks Coffee Company" src="Images/logo.png"></a>
                    <a>STARBUCKS</a>
                </div>
                <div class="burger">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <div class="bg-sidebar"></div>
                <ul class="sidebar">
                    <li><a href="#home">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="transaksi.php">Transaksi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><input id="swbtn" class="toggle" type="checkbox" onclick="myFunction()"/></li>
                </ul>
            </div>
          </nav>
    </header>

    <!-------------------------- Main ------------------------------------->
    <main>
        <img class= "Banner" title="Banner" src="Images/Banner.jpg" alt="Load Unsuccessfull">

        <div class="img-responsive" id= "menu">
            <div>
                <h2>Official Store</h2>
            </div>
            
            <div class="contents">
                <div class="tabel">
                    <table>
                        <?php
                            require "config.php";
                            $query = mysqli_query($db,"SELECT * FROM menu");
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                                <div class="contents">
                                    <div class="contents-item">
                                        <img src="Images/<?=$row['gambar']?>" alt="" width="100px">
                                        <p><?=$row['nama_menu']?></p>
                                    </div>
                        <?php
                            $i++;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="Aboutus">
            <h1>About Us</h1>
            <div class="about">
                <table >
                    <tr>
                        <th colspan=2>Nama</th>
                        <th>Nim</th>
                    </tr>
                    <tr>
                        <td rowspan=3><img src="Images/icon.png"  alt="icon"></td>
                        <td>Wenny Melati Marpaung</td>
                        <td>2009105080</td>
                    </tr>
                    <tr>
                        <td>Rahmadani</td>
                        <td>2009105082</td>
                    </tr>
                    <tr>
                        <td>Nurulfiqri Istiqamah Tahir</td>
                        <td>2009105083</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>

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

    <script src="Javascript/javascript.js"></script>
    <script src="Javascript/jQuery.js"></script>

</body>

</html>