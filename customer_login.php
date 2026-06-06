<?php
session_start();
include 'config.php';

$msg = "";

if(isset($_POST['login'])){

    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers 
            WHERE phone='$phone' AND password='$password'";

    $res = mysqli_query($conn,$sql);

    // ✅ CHECK IF QUERY FAILED
    if(!$res){
        die("Query Failed: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($res) > 0){

        $row = mysqli_fetch_assoc($res);

        $_SESSION['customer_id'] = $row['id'];
        $_SESSION['customer_name'] = $row['name'];

        header("Location: customer_dashboard.php");

    } else {
        $msg = "Invalid login details!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h2>Customer Login</h2>

<p><?php echo $msg; ?></p>

<form method="POST">

<input type="text" name="phone" placeholder="Phone Number" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<button name="login">Login</button>

</form>

</div>

</body>
</html>