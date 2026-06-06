<?php
include 'config.php';

$msg = "";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($check) > 0){
        $msg = "Username already exists!";
    } else {
        mysqli_query($conn,"INSERT INTO users(username,password,role)
        VALUES('$username','$password','$role')");

        $msg = "User Registered Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register User</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Register System User</h2>
<p><?php echo $msg; ?></p>

<form method="POST">

<input type="text" name="username" placeholder="Username" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<select name="role" required>
    <option value="admin">Admin</option>
    <option value="staff">Staff</option>
</select><br><br>

<button name="register">Register</button>

</form>

<br>
<a href="login.php">Back to Login</a>

</div>

</body>
</html>