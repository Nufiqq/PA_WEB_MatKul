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
    if(isset($_GET['id'])){
        $query = mysqli_query($db,"DELETE FROM menu WHERE id=$_GET[id]");
        if($query){
            header("Location:admin.php");
        } else {
            echo "Delete Failed";
        }
    }
?>