<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">

<style>
.box a{
    display:block;
    padding:10px;
    margin:8px 0;
    background:green;
    color:white;
    text-decoration:none;
    border-radius:5px;
    text-align:center;
}

.box a:hover{
    background:darkgreen;
}
</style>

</head>
<body>

<div class="box">

<h2>🚗 Victory Garage Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user']; ?></p>



<!-- APPOINTMENTS -->
<h3>Appointments</h3>
<a href="appointment.php">Book Appointment</a>
<a href="view_appointments.php">View Appointments</a>

<hr>

<!-- PAYMENTS & RECEIPTS -->
<h3>Payments & Receipts</h3>
<a href="payment.php">Payments</a>
<a href="generate_receipt.php">Generate Receipts</a>

<hr>

<!-- SYSTEM -->
<a href="logout.php" style="background:red;">Logout</a>

</div>

</body>
</html>