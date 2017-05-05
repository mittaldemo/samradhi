<?php
session_start();
/*if(!isset($_REQUEST['id']))
{
    header("Location: index.php");
}*/
if(isset($_REQUEST['payment']))
{
	echo "payment done successfully";
	?>
	<a href="logOut.php" class='btn btn-primary w-100-pct'>Log Out</a>
	<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success</title>
    <meta charset="utf-8">
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<form>
<div class="container">
<?php
if(isset($_REQUEST['id']))
{
?>
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
    <input type="submit" name="payment" value="Continue to payment method" class='btn btn-primary w-100-pct'/></br>
<?php
}
?>
</div>

</form>
</body>
</html>