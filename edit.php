<?php
    session_start();
    if(!isset($_SESSION['statusadmin'])){
        echo 
        "<script>
            alert('Harap login terlebih dahulu');
            document.location.href = 'loginadmin.php'
        </script>";
    }
if(isset($_GET['id'])){
    require "config.php";
    $query = mysqli_query($db,"SELECT * FROM menu WHERE id=$_GET[id]");
    $result = mysqli_fetch_assoc($query);
    $nama = $result['nama_menu'];
    $tall = $result['tall'];
    $grande = $result['grande'];
    $venti = $result['venti'];
    $gambar = $result['gambar'];
}

if(isset($_POST['submit'])){
    $query = mysqli_query($db,"UPDATE menu SET nama_menu='$_POST[nama]',tall='$_POST[tall]',grande='$_POST[grande]',venti='$_POST[venti]',gambar='$_POST[gambar]' WHERE id=$_GET[id]");
    if($query){
        header("Location:admin.php");
    } else {
        echo "Update Failed";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="Style/styleAdmin.css">
</head>
<body>
    <header>
        <div class="judul">
            <img src="images/logo.png" alt="Starbucks" width="90px">
            <h1>Edit Product</h1>
        </div>
    </header>
    
    <div class="form-class">
        <h3>Edit Menu</h3><br><br>
        <form action="" method="post">
            <label for="">Nama Menu</label><br>
            <input type="text" name="nama" class="form-text" value='<?=$nama?>'><br>
            
            <label for="">Tall</label><br>
            <input type="text" name="tall" class="form-text" value='<?=$tall?>'><br>
            
            <label for="">Grande</label><br>
            <input type="text" name="grande" class="form-text" value='<?=$grande?>'><br>

            <label for="">Venti</label><br>
            <input type="text" name="venti" class="form-text" value='<?=$venti?>'><br>

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