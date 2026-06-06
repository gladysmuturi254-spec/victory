<?php
session_start();
include 'config.php';

// Ensure customer is logged in
if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
}

$msg = "";
$customer_id = $_SESSION['customer_id'];

if(isset($_POST['book'])){

    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO appointments(customer_id,service,app_date,app_time)
            VALUES('$customer_id','$service','$date','$time')";

    if(mysqli_query($conn,$sql)){
        $msg = "Appointment Booked Successfully!";
    } else {
        $msg = "Failed to book appointment!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>
<link rel="stylesheet" href="style.css">

<style>
.box{
    width:400px;
    margin:50px auto;
    padding:20px;
    background:white;
    box-shadow:0px 0px 10px gray;
    text-align:center;
}

input, select{
    width:90%;
    padding:10px;
    margin:10px;
}

button{
    padding:10px;
    width:95%;
    background:green;
    color:white;
    border:none;
}

button:hover{
    background:darkgreen;
}
</style>

</head>
<body>

<div class="box">

<h2>Book Garage Appointment</h2>

<p><?php echo $msg; ?></p>

<form method="POST">

<select name="service" required>
    <option value="">Select Service</option>
    <option>Engine Repair</option>
    <option>Oil Change</option>
    <option>Wheel Alignment</option>
    <option>Car Wash</option>
    <option>Diagnostics</option>
</select>

<input type="date" name="date" required>

<input type="time" name="time" required>

<button name="book">Book Appointment</button>

</form>

<br>
<a href="customer_dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>