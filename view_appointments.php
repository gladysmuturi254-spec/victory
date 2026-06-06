<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$sql = "SELECT a.*, c.name, c.phone, c.vehicle
        FROM appointments a
        JOIN customers c ON a.customer_id = c.id
        ORDER BY a.app_date DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Appointments</title>
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
    background:green;
    color:white;
}

.box{
    text-align:center;
}
</style>

</head>
<body>

<div class="box">

<h2>📅 All Appointments</h2>

<table>

<tr>
<th>ID</th>
<th>Customer</th>
<th>Phone</th>
<th>Vehicle</th>
<th>Service</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['vehicle']; ?></td>
<td><?php echo $row['service']; ?></td>
<td><?php echo $row['app_date']; ?></td>
<td><?php echo $row['app_time']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>

<?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>