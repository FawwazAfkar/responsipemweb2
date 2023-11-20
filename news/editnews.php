<?php
include("koneksi.php");
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isiberita = $_POST['isiberita'];
    $result = mysqli_query($koneksi,"UPDATE berita SET judul = '$judul', isiberita ='$isiberita' WHERE id=$id");
    header("Location: index.php");
}
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM berita WHERE id=$id");
while($data_berita = mysqli_fetch_array(($result))){
    $judul = $data_berita['judul'];
    $isiberita = $data_berita['isiberita'];
}
?>
