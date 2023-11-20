<?php
    include ("koneksi.php");
    $read = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERITA TERKINI</title>
</head>
<body>
    <h1>Post News Ter-Update!</h1>
    <a href="create.php"><button>Tambah Post</button></a>
    <table>
        <?php
        while($berita = mysqli_fetch_array($read)){
            echo "<tr><td><h2>".$berita['id'].". ".$berita['judul']."</h2></td></tr>";
            echo "<tr><td><a href='update.php?id=$berita[id]'>Edit</a> | <a href='delete.php?id=$berita[id]'>Delete</a></td></tr>";
            echo "<tr><td style='white-space: pre-wrap;'>".$berita['isiberita']."</td></tr>";
        }
        ?>
    </table>
</body>
</html>