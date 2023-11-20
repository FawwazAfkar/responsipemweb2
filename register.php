<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'koneksi.php';

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    if ($password === $confpassword) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO user (nickname, email, username, password, role) VALUES ('$nickname','$email','$username', '$hashed_password','user')";

        if (mysqli_query($koneksi, $query)) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Kata sandi dan konfirmasi ulang kata sandi tidak cocok.";
    }
}

?>
