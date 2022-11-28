<?php
    session_start();

    include "../config.php";

    $id = $_GET["id"];

    $query = mysqli_query($db, "SELECT * FROM menu WHERE id=".$id);
    $hasil = mysqli_fetch_object($query);

    $_SESSION["cart"][$id]=[
        "nama"=>$hasil->nama_menu,
        "harga"=>$hasil->grande,
        "jumlah"=> 1
    ];
    header("location:../cart.php");
?>