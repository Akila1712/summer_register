<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($result) > 0){
        $_SESSION['admin'] = $username;
        header("Location: view.php");
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<style>

body{
margin:0;
font-family:Arial;
background:#cfe8f6;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

/* LOGIN BOX */

.login-box{
background:white;
padding:30px;
width:300px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
text-align:center;
}

h2{
margin-bottom:20px;
}

/* INPUT */

input{
width:90%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:6px;
}

/* BUTTON */

button{
width:100%;
padding:10px;
background:#1a73e8;
color:white;
border:none;
border-radius:6px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#0b5ed7;
}

/* MOBILE */

@media(max-width:480px){
.login-box{
width:90%;
padding:20px;
}
}

</style>

</head>

<body>

<div class="login-box">

<h2>Admin Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

</div>

</body>
</html>