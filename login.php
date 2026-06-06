<?php
session_start();
include 'config.php';

$msg = "";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$u' AND password='$p'";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        $_SESSION['user'] = $u;
        header("Location: dashboard.php");
    }else{
        $msg = "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
<h2>Victory Garage Login</h2>

<p><?php echo $msg; ?></p>

<form method="POST">

<input type="text" name="username" placeholder="Username" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<button name="login">Login</button>

</form>

<!-- REGISTER LINK ADDED HERE -->
<br>
<p>
    Don't have an account?
    <a href="register.php">Register New User</a>
</p>

</div>

</body>
</html>