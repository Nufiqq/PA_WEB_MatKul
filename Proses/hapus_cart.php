<?php
    session_start();

    include "../config.php";
    $id = $_GET["id"];

    unset($_SESSION["cart"][$id]);

    header("location:../cart.php");
?>