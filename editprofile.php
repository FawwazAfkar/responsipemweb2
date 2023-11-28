<?php
session_start();
include 'koneksi.php';

$id = $_SESSION['id'];
$query = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){   
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['cancel'])){
    ?>
    <script>
                let text = "Discard your changes?";
                if (confirm(text) == true) {
                    window.location.replace('myprofile.php');
                } else {
                    alert("Thank you for your confirmation");
                }
    </script> 
    <?php
}
if (isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $query = "UPDATE user SET fullname='$fullname', email='$email', username='$username'";
    if(mysqli_query($conn,$query)){
        ?>
        <script>
                alert("Your data is updated");
                window.location.replace("myprofile.php");
        </script> 
        <?php
    }else{
        ?>
        <script>
                alert("an error occured while updating your data");
                window.location.replace("myprofile.php");
        </script> 
        <?php
    }

}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/editprofile.css">
        <title>My Profile</title>
    </head>
    <body>
        <div class="header">
            <img src="assets/manchester.png" class="icon">
            <div class="nav">
                <a href="news/viewnews.php">HOME</a>
                <a href="news/viewnews.php">NEWS</a>
                <a href="news/teamprofile.php">TEAM PROFILE</a>
            </div>
        </div>
        <div class="box">
            <div class="left">
                <h1>EDIT MY PROFILE</h1>
                <form method="post" enctype="multipart/form-data" class="left">
                    <label for="fullname" class="label1">Name</label><br>
                    <input type="text" name="fullname" class="input1" value="<?php echo $row['fullname']; ?>" ><br>
                    <label for="email" class="label2">E-mail</label><br>
                    <input type="text" name="email" class="input2" value="<?php echo $row['email']; ?>"><br>
                    <label for="username" class="label3">Username</label><br>
                    <input type="text" name="username" class="input3" value="<?php echo $row['username']; ?>">
                    <button id="change-profile" type="submit" name="submit" value="submit" class="change-profile">UPDATE MY PROFILE</button>
                    <button name="cancel" class="back" value="cancel">CANCEL</a></button>
                </form> 
                
            </div>
        </div>
        <div class="footer"></div>
</body>
</html>