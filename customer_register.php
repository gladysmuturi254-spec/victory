<?php
include 'config.php';

$msg = "";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $vehicle = $_POST['vehicle'];
    $password = $_POST['password'];

    mysqli_query($conn,"INSERT INTO customers(name,phone,vehicle,password)
    VALUES('$name','$phone','$vehicle','$password')");

    $msg = "Customer Registered Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Customer Registration</h2>
<p><?php echo $msg; ?></p>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required><br>

<input type="text" name="phone" placeholder="Phone Number" required><br>

<input type="text" name="vehicle" placeholder="Vehicle Number" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<button name="register">Register</button>

</form>

<br>
<a href="customer_login.php">Customer Login</a>

</div>

</body>
</html>