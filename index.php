<?php
session_start();

if (!isset($_SESSION['username'])&&!isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'] ;
$password = $_SESSION['password'] ;
$email = $_SESSION['email'] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>