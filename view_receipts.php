<?php
session_start();
include 'config.php';

if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
    exit();
}

$id = $_SESSION['customer_id'];

$sql = "SELECT * FROM payments WHERE customer_id='$id'";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Receipts</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>My Payment Receipts</h2>

<table border="1" width="100%">
<tr>
<th>Amount</th>
<th>Method</th>
<th>Code</th>
<th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['method']; ?></td>
<td><?php echo $row['mpesa_code']; ?></td>
<td><?php echo $row['created_at']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
