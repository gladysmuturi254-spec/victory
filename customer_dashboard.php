<?php
session_start();

if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Welcome <?php echo $_SESSION['customer_name']; ?></h2>

<a href="book_appointment.php">Book Service</a><br><br>
<a href="customer_receipts.php">🧾 My Receipts</a>
<a href="logout.php">Logout</a>

</div>

</body>
</html>