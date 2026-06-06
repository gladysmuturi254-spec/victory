<!DOCTYPE html>
<html>
<head>
<title>Victory Garage System</title>

<link rel="stylesheet" href="style.css">

<style>
body{
    margin:0;
    padding:0;
    font-family: Arial, sans-serif;

    /* BACKGROUND IMAGE */
    background-image: url('Garage.png');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
}

/* CENTER CONTENT */
.box{
    width: 500px;
    background: rgba(255,255,255,0.95);
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 0px 15px black;

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* LINKS */
a{
    display:block;
    margin:10px;
    padding:10px;
    background:green;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

a:hover{
    background:darkgreen;
}
</style>

</head>

<body>

<div class="box">

<h1>🚗 Victory Online Garage Management System</h1>
<h3>Uasin Gishu County</h3>

<p>Welcome to our online garage platform. Please select an option below to continue.</p>

<hr>

<h3>👥 Customers</h3>

<a href="customer_register.php">Register as Customer</a>
<a href="customer_login.php">Customer Login</a>

<hr>

<h3>👨‍💼 Garage Owners</h3>

<a href="login.php">Staff / Admin Login</a>

<hr>

<p>Fast, Reliable & Efficient Garage Services.</p>

</div>

</body>
</html>