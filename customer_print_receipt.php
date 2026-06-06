<?php
session_start();
include 'config.php';

if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
    exit();
}

$id = $_GET['id'];
$cid = $_SESSION['customer_id'];

// Security: ensure customer only sees their own receipt
$sql = "SELECT p.*, c.name, c.phone, c.vehicle
        FROM payments p
        JOIN customers c ON p.customer_id = c.id
        WHERE p.id='$id' AND p.customer_id='$cid'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Invalid Receipt Access");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Print Receipt</title>

<style>
body{
    font-family: Arial;
}

.receipt{
    width:60%;
    margin:auto;
    border:2px solid black;
    padding:20px;
    text-align:center;
}

table{
    width:100%;
    margin-top:20px;
}

td{
    padding:8px;
    text-align:left;
}

button{
    margin-top:20px;
    padding:10px;
    background:green;
    color:white;
    border:none;
}

@media print{
    button{
        display:none;
    }
}
</style>

</head>
<body>

<div class="receipt">

<h2>🚗 Victory Garage System</h2>
<h4>Uasin Gishu County</h4>

<hr>

<h3>PAYMENT RECEIPT</h3>

<table>

<tr><td>Name:</td><td><?php echo $row['name']; ?></td></tr>
<tr><td>Phone:</td><td><?php echo $row['phone']; ?></td></tr>
<tr><td>Vehicle:</td><td><?php echo $row['vehicle']; ?></td></tr>
<tr><td>Amount:</td><td>KES <?php echo $row['amount']; ?></td></tr>
<tr><td>Method:</td><td><?php echo $row['method']; ?></td></tr>
<tr><td>M-Pesa Code:</td><td><?php echo $row['mpesa_code']; ?></td></tr>
<tr><td>Date:</td><td><?php echo $row['created_at']; ?></td></tr>

</table>

<button onclick="window.print()">🖨️ Print Receipt</button>

</div>

</body>
</html>