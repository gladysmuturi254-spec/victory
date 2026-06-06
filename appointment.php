<?php
include 'config.php';

$msg = "";

$customers = mysqli_query($conn,"SELECT * FROM customers");

if(isset($_POST['book'])){
    $cid = $_POST['customer'];
    $service = $_POST['service'];
    $date = $_POST['date'];

    mysqli_query($conn,"INSERT INTO appointments(customer_id,service,app_date)
    VALUES('$cid','$service','$date')");

    $msg = "Appointment Booked!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Appointment</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Book Your Appointment</h2>
<p><?php echo $msg; ?></p>

<form method="POST">

<select name="customer">
<?php while($c=mysqli_fetch_assoc($customers)){ ?>
<option value="<?php echo $c['id']; ?>">
<?php echo $c['name']; ?>
</option>
<?php } ?>
</select><br>

<input type="text" name="service" placeholder="Service Type"><br>
<input type="date" name="date"><br>

<button name="book">Book</button>

</form>

</div>

</body>
</html>