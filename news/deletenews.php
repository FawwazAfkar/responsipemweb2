<?php
    session_start();
    include('../koneksi.php');
    $id=$_GET['id'];
    $stmt=mysqli_query($conn,"DELETE from news WHERE id=$id");
    header("Location:viewnews.php");
?>