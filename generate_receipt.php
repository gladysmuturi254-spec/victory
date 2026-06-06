<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$sql = "SELECT p.*, c.name, c.phone, c.vehicle
        FROM payments p
        JOIN customers c ON p.customer_id = c.id
        ORDER BY p.id DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Receipts</title>
<link rel="stylesheet" href="style.css">

<style>
table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
    background:white;
}

th, td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

th{
    background:darkblue;
    color:white;
}

.box{
    text-align:center;
}
</style>

</head>
<body>

<div class="box">

<h2>🧾 Payment Receipts</h2>

<table>

<tr>
<th>ID</th>
<th>Customer</th>
<th>Phone</th>
<th>Vehicle</th>
<th>Amount</th>
<th>Method</th>
<th>M-Pesa Code</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['vehicle']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['method']; ?></td>
<td><?php echo $row['mpesa_code']; ?></td>
<td><?php echo $row['created_at']; ?></td>
<td>
<a href="print_receipt.php?id=<?php echo $row['id']; ?>" target="_blank">
Print Receipt
</a>
</td>
</tr>

<?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>