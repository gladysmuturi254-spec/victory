<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

// Get payment + customer details
$sql = "SELECT p.*, c.name, c.phone, c.vehicle
        FROM payments p
        JOIN customers c ON p.customer_id = c.id
        WHERE p.id='$id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
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
    width: 60%;
    margin: auto;
    border: 2px solid #000;
    padding: 20px;
    text-align: center;
}

h2{
    margin-bottom: 5px;
}

table{
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

td{
    padding: 8px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

.print-btn{
    margin-top: 20px;
    padding: 10px;
    background: green;
    color: white;
    border: none;
    cursor: pointer;
}

@media print {
    .print-btn{
        display: none;
    }
}
</style>

</head>

<body>

<div class="receipt">

<h2>🚗 Victory Online Garage</h2>
<p>Uasin Gishu County</p>

<hr>

<h3>PAYMENT RECEIPT</h3>

<table>

<tr>
<td><b>Customer Name:</b></td>
<td><?php echo $row['name']; ?></td>
</tr>

<tr>
<td><b>Phone:</b></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<tr>
<td><b>Vehicle:</b></td>
<td><?php echo $row['vehicle']; ?></td>
</tr>

<tr>
<td><b>Amount:</b></td>
<td>KES <?php echo $row['amount']; ?></td>
</tr>

<tr>
<td><b>Payment Method:</b></td>
<td><?php echo $row['method']; ?></td>
</tr>

<tr>
<td><b>M-Pesa Code:</b></td>
<td><?php echo $row['mpesa_code']; ?></td>
</tr>

<tr>
<td><b>Date:</b></td>
<td><?php echo $row['created_at']; ?></td>
</tr>

</table>

<br>

<button class="print-btn" onclick="window.print()">🖨️ Print Receipt</button>

</div>

</body>
</html>