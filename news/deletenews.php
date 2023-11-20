<?php
    session_start();
    include('koneksi.php');
    $id=$_GET['id'];
    $stmt=mysqli_query($koneksi,"DELETE from berita WHERE id=$id");
    header("Location:index.php");
?>