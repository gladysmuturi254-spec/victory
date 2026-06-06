<?php
session_start();
include 'config.php';

if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
    exit();
}

$cid = $_SESSION['customer_id'];

$sql = "SELECT * FROM payments WHERE customer_id='$cid' ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Receipts</title>
<link rel="stylesheet" href="style.css">

<style>
table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
    background:white;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

th{
    background:green;
    color:white;
}

a{
    text-decoration:none;
    color:white;
    background:blue;
    padding:5px 10px;
    border-radius:5px;
}
</style>

</head>
<body>

<div class="box">

<h2>🧾 My Receipts</h2>

<table>

<tr>
<th>Amount</th>
<th>Method</th>
<th>M-Pesa Code</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['method']; ?></td>
<td><?php echo $row['mpesa_code']; ?></td>
<td><?php echo $row['created_at']; ?></td>

<td>
<a href="print_receipt.php?id=<?php echo $row['id']; ?>" target="_blank">
Print
</a>
</td>

</tr>

<?php } ?>

</table>

<br>

<a href="customer_dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>