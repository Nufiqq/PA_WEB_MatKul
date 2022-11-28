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
    <title>Admin</title>
    <link rel="stylesheet" href="Style/styleAdmin.css">
</head>
<body>
    <header>
        <div class="judul">
            <img src="images/logo.png" alt="Starbucks" width="90px">
            <h1>Add Product</h1>
        </div>
    </header>
    <div class="form-class">
        <h3>Add Menu</h3><br>
        <p>Tanggal input : <?=date("d-m-Y")?></p><br>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <label for="">Nama Menu</label><br>
            <input type="text" name="nama" class="form-text"><br>

            <label for="">Tall</label><br>
            <input type="text" name="tall" class="form-text"><br>

            <label for="">Grande</label><br>
            <input type="text" name="grande" class="form-text"><br>

            <label for="">Venti</label><br>
            <input type="text" name="venti" class="form-text"><br>

            <label for="">Gambar</label><br>
            <input type="file" name="gambar"><br><br>

            <div class="tombol">
                <input type="hidden" name="input" value=<?= date("d-m-Y")?>>
                <input type="submit" name="submit" value="Submit" class="button">
            </div>
        </form>
    </div>
</body>
</html>