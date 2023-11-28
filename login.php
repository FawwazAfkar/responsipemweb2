<?php
session_start();
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) { 
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];?>
            <script>
            alert('Login success!, Welcome <?php echo $username; ?>');
            window.location.href='index.php';
            </script>
            <?php
            exit();
        } else {
            echo "<script>alert('Cannot login, please try again');</script>";
        }
    } else {
        echo "<script>alert('Cannot login, please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Login</title>
        <meta charset="utf-9">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/logres.css">
        <link rel="icon" href="assets/mancity.ico">
    </head>
<body>
    <div class="header">
            <img src="assets/manchester.png" class="icon">
            <div class="nav">
                <a href="news/viewnews.php">HOME</a>
                <a href="news/viewnews.php">NEWS</a>
                <a href="teamprofile.php">TEAM PROFILE</a>
            </div>
    </div>
    <div class="box">
            <h1>SIGN IN</h1>
            <form method="post">
                <h6>username</h6>
                <input class="input" type="text" name="username" placeholder="enter your username here">
                <h6>password</h6>
                <input class="input" type="password" name="password" placeholder="enter your password here"><br>
                <button class="tombol" type="submit" id="signin">SIGN IN</button>  
            
                <p>Don't have the account? <a href="register.php">Sign Up here</a></p>
            </form>
        </div>
    <div class="footer"></div>
</body>

</html>