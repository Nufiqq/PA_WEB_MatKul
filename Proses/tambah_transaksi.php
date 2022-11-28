<?php
    session_start();
    
    include "../config.php";
    
    $query = "INSERT INTO header_transaksi (id_akun,tanggal_transaksi) VALUES ('".$_COOKIE["id_akun"]."','".date("Y-m-d")."')";
    $result = $db->query($query);
    $id_transaksi = mysqli_insert_id($db);
    
    foreach($_SESSION["cart"] as $cart => $val){

        $query = "INSERT INTO detail_transaksi (id_transaksi, id_menu, jumlah) VALUES (".$id_transaksi.",".$cart.",".$val["jumlah"].")";
        $result = $db->query($query);
    }

    unset($_SESSION["cart"]);

    header("location:../transaksi.php")
    
?>