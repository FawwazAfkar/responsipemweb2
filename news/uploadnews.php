<?php
if(isset($_POST['Submit'])){
    $judul = $_POST['judul'];
    $isiberita = $_POST['isiberita'];
    include("koneksi.php");
    $result = mysqli_query($koneksi, "INSERT INTO berita(judul,isiberita) VALUES('$judul','$isiberita')");
    header("Location:index.php");
}
?>