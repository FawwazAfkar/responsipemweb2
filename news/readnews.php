<?php
    session_start();
    include ("../koneksi.php");
    $id=$_GET['id'];
    $read = mysqli_query($conn, "SELECT * FROM news where id=$id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/news.css">
    <link rel="icon" href="../assets/mancity.ico">
    <title>BERITA TERKINI</title>
</head>
<body>
<div class="header">
            <img src="../assets/manchester.png" class="icon">
            <div class="nav">
                <a href="viewnews.php">HOME</a>
                <a href="viewnews.php">NEWS</a>
                
                <a href="../teamprofile.php">TEAM PROFILE</a>
                <a href="../myprofile.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="50" viewBox="0 0 45 50" fill="none">
                        <path d="M22.5 5C19.8478 5 17.3043 6.05357 15.4289 7.92893C13.5536 9.8043 12.5 12.3478 12.5 15C12.5 17.6522 13.5536 20.1957 15.4289 22.0711C17.3043 23.9464 19.8478 25 22.5 25C25.1522 25 27.6957 23.9464 29.5711 22.0711C31.4464 20.1957 32.5 17.6522 32.5 15C32.5 12.3478 31.4464 9.8043 29.5711 7.92893C27.6957 6.05357 25.1522 5 22.5 5ZM7.5 15C7.5 11.0218 9.08035 7.20644 11.8934 4.3934C14.7064 1.58035 18.5218 0 22.5 0C26.4782 0 30.2936 1.58035 33.1066 4.3934C35.9196 7.20644 37.5 11.0218 37.5 15C37.5 18.9782 35.9196 22.7936 33.1066 25.6066C30.2936 28.4196 26.4782 30 22.5 30C18.5218 30 14.7064 28.4196 11.8934 25.6066C9.08035 22.7936 7.5 18.9782 7.5 15ZM12.5 40C10.5109 40 8.60322 40.7902 7.1967 42.1967C5.79018 43.6032 5 45.5109 5 47.5C5 48.163 4.73661 48.7989 4.26777 49.2678C3.79893 49.7366 3.16304 50 2.5 50C1.83696 50 1.20107 49.7366 0.732233 49.2678C0.263392 48.7989 0 48.163 0 47.5C0 44.1848 1.31696 41.0054 3.66116 38.6612C6.00537 36.317 9.18479 35 12.5 35H32.5C35.8152 35 38.9946 36.317 41.3388 38.6612C43.683 41.0054 45 44.1848 45 47.5C45 48.163 44.7366 48.7989 44.2678 49.2678C43.7989 49.7366 43.163 50 42.5 50C41.837 50 41.2011 49.7366 40.7322 49.2678C40.2634 48.7989 40 48.163 40 47.5C40 45.5109 39.2098 43.6032 37.8033 42.1967C36.3968 40.7902 34.4891 40 32.5 40H12.5Z" fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="content">
            <?php if ($_SESSION['role'] === 'admin') : ?>
            <!-- Admin Only -->
            <center>
            <table>
                <?php
                while($berita = mysqli_fetch_array($read)){
                    echo '<tr><td><h2>'.$berita['title'].'</h2></td></tr>';
                    echo '<tr><td><img src="' . $berita['image'] . '" width="400px"></td></tr>';
                    echo "<tr><td style='white-space: pre-wrap;'>".$berita['content']."</td></tr>";
                    echo "<tr><td><a href='editnews.php?id=$berita[id]'>Edit</a> | <a href='deletenews.php?id=$berita[id]'>Delete</a></td></tr>";
                }
                ?>
            </table></center>
            <?php else : ?>
            <!-- Visitors Access -->
            <table>
                <?php
                while($berita = mysqli_fetch_array($read)){
                    echo '<tr><td><h2>'.$berita['title'].'</h2></td></tr>';
                    echo '<tr><td><img src="' . $berita['image'] . '" width="400px"></td></tr>';
                    echo "<tr><td style='white-space: pre-wrap;'>".$berita['content']."</td></tr>"; 
                }
                ?>
            </table>
            <?php endif; ?>
        </div>
<div class="footer"></div>
</body>
</html>
