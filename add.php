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

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tall = $_POST['tall'];
        $grande = $_POST['grande'];
        $venti = $_POST['venti'];

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));

        $gambar_baru = "$nama.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'Images/'.$gambar_baru)){
            $query = "INSERT INTO menu (nama_menu, tall, grande, venti, gambar) VALUES ('$nama','$tall','$grande','$venti','$gambar_baru')";
            $result = $db->query($query);

            if($result){
                header("Location:admin.php");
            }else{
                echo "gagal kirim";
            }
        }
    }
?>