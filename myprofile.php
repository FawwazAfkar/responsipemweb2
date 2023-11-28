<?php
session_start();
include 'koneksi.php';
$id = $_SESSION['id'];
if(isset($_SESSION['id'])){
    $query = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/myprofile.css">
        <link rel="icon" href="assets/mancity.ico">
        <title>My Profile</title>
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
            <div class="left">
                <h1>MY PROFILE</h1>
                <label for="name" class="label1">Name</label><br>
                <input type="text" class="input1" value="<?php echo $row['fullname']; ?>" readonly ><br>
                <label for="email" class="label2">E-mail</label><br>
                <input type="email" class="input2" value="<?php echo $row['email']; ?>" readonly><br>
                <label for="" class="label3">Username</label><br>
                <input type="text" class="input3" value="<?php echo $row['username']; ?>" readonly>
                <button class="change-profile" onclick="editprofile()">CHANGE MY PROFILE</button>
                <button class="signout" onclick="confLogout()">SIGN OUT</a></button>
            </div>
        </div>
        <div class="footer"></div>
        <script>
            function editprofile(){window.location.replace('editprofile.php');}
            function confLogout() {
                let text = "Are you sure you want to Logout?.";
                if (confirm(text) == true) {
                    window.location.replace('logout.php');
                } else {
                    alert("Logout Canceled");
                }
            }

        </script>
</body>
</html>