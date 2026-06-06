<?php
include 'config.php';

$msg = "";

$customers = mysqli_query($conn,"SELECT * FROM customers");

if(isset($_POST['pay'])){
    $cid = $_POST['customer'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    $code = $_POST['mpesa'];

    mysqli_query($conn,"INSERT INTO payments(customer_id,amount,method,mpesa_code)
    VALUES('$cid','$amount','$method','$code')");

    $pid = mysqli_insert_id($conn);

    $receipt = "RCP".rand(1000,9999);

    mysqli_query($conn,"INSERT INTO receipts(payment_id,receipt_no)
    VALUES('$pid','$receipt')");

    $msg = "Payment Successful. Receipt: $receipt";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Make Payment</h2>
<p><?php echo $msg; ?></p>

<form method="POST">

<select name="customer">
<?php while($c=mysqli_fetch_assoc($customers)){ ?>
<option value="<?php echo $c['id']; ?>">
<?php echo $c['name']; ?>
</option>
<?php } ?>
</select><br>

<input type="number" name="amount" placeholder="Amount"><br>

<select name="method">
<option>Cash</option>
<option>M-Pesa</option>
</select><br>

<input type="text" name="mpesa" placeholder="Mpesa Code (if any)"><br>

<button name="pay">Pay</button>

</form>

</div>

</body>
</html>