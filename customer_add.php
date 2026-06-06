<?php
include 'config.php';

$msg = "";

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $vehicle = $_POST['vehicle'];

    mysqli_query($conn,"INSERT INTO customers(name,phone,vehicle)
    VALUES('$name','$phone','$vehicle')");

    $msg = "Customer Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Customer</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Add Customer</h2>
<p><?php echo $msg; ?></p>

<form method="POST">
<input type="text" name="name" placeholder="Customer Name"><br>
<input type="text" name="phone" placeholder="Phone"><br>
<input type="text" name="vehicle" placeholder="Vehicle"><br>
<button name="save">Save</button>
</form>

</div>

</body>
</html>