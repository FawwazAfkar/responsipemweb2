<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'koneksi.php';
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    //check availability of username
    $checkuser = "SELECT * FROM user WHERE username = '$username' ";
    $result = mysqli_query($conn,$checkuser);
    if(mysqli_num_rows($result) > 0){
        ?>
        <script>alert("Username is registered, please try again");</script>
        <?php
    }else{
        //password check
        if ($password === $confpassword) {
            //add user to db
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO user (fullname, email, username, password, role) VALUES ('$fullname','$email','$username', '$hashed_password','user')";
            if (mysqli_query($conn, $query)) {?>
                <script>
                alert('Register success!, Continue to Login');
                window.location.href='Login.php';
                </script>
                <?php exit();
            } else {
                ?>
                <script>alert("Password doesn't match");</script>
                <?php
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            ?>
            <script>alert("Password doesn't match");</script>
            <?php
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/logres.css">
    <link rel="icon" href="assets/mancity.ico">
    <title>Sign Up</title>
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
            <h1>SIGN UP</h1>
            <form action="" method="post">
            <h6>Name</h6>
            <input type="text" name="fullname" placeholder="enter your name here" required>
            <h6>E-Mail</h6>
            <input type="email" name="email" placeholder="enter your e-mail here" required>
            <h6>Username</h6>
            <input type="text" name="username" placeholder="enter your username here" required>
            <h6>Password</h6>
            <input type="password" name="password" placeholder="enter your password here" required>
            <h6>Confirm Your Password</h6>
            <input type="password" name="confpassword" placeholder="re-enter your username here" required>
            <button class="tombol" type="submit" id="signup">SIGN UP</button>
            </form>
        </div>
        <div class="footer"></div>
</body>
</html>
