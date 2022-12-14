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
    <title>Admin</title>
    <link rel="stylesheet" href="Style/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" alt="Starbucks" width="90px">
                <b>Admin</b> 
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="laporantransaksi.php">Laporan transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <div class="tombol">
            <a href="formulir.php"class="button">Add Product</a>
        </div>
        <div class="tabel">
            <table border="1">
                <tr>
                    <th colspan="8" class="thead">
                        <h3 class="center">List Menu</h3>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th nowrap>Nama Menu</th>
                    <th>Tall</th>
                    <th>Grande</th>
                    <th>Venti</th>
                    <th>Gambar</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    require "config.php";
                    $batas = 5;
                    $halaman = $_GET['halaman'];
                    if(empty($halaman)){
                        $posisi     = 0;
                        $halaman    = 1;
                    }
                    else{
                        $posisi = ($halaman-1) * $batas;
                    }
                        $i = $posisi+1;
                        $query = mysqli_query($db, "SELECT * FROM menu order by id desc limit $posisi,$batas");
                        while ($row = mysqli_fetch_array($query)) {
                ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td nowrap><?=$row["nama_menu"];?></td>
                                <td><?=$row["tall"];?></td>
                                <td><?=$row["grande"];?></td>
                                <td><?=$row["venti"];?></td>
                                <td><img src="Images/<?=$row["gambar"];?>" alt="" width="100px"></td>
                                <td class="edit">
                                    <a href="edit.php?id=<?=$row["id"];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="hapus">
                                    <a href="delete.php?id=<?=$row["id"];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                <?php
                        }
                ?>
            </table>
        </div>
            <?php
                $query2 = mysqli_query($db, "select * from menu");
                $jumlahdata = mysqli_num_rows($query2);
                $jumlahhalaman = ceil($jumlahdata/$batas);
            ?>
            
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                        for($i=1;$i<=$jumlahhalaman;$i++) {
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' href='admin.php?halaman=$i'>$i</a></li>";
                            } 
                            else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                            }
                        }
                    ?>
                </ul>
            </nav>
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