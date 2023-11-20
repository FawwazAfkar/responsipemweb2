<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Login</title>
        <meta charset="utf-9">
        <link rel="stylesheet" href="stylelogin.css">
    </head>

<body>
    <div class="login-box">
        <h1>Login</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username">
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password">
        </div>
        <input type="button" class="btn" value="Sign in">
        <header>
        <nav class="navigation">
            <a href="#">News</a>
            <a href="#">Team Profil</a>
        </nav>
    </header>

    <script src="script.js"></script>
</body>

</html>