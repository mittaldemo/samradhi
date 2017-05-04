<?php
include('header.php');
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$sql="select * from create_account where user_email='$email' and user_password='$password'";
	$result=mysql_query($sql);
	if($row=mysql_fetch_assoc($result))
	{
	     $_SESSION['email']=$row['user_email'];
	     $_SESSION['firstName']=$row['user_fname'];
	     $_SESSION['lastName']=$row['user_lname'];

	     if(isset($_REQUEST['id']))
	     {
	    ?>

		<script>window.location = 'checkOut.php';</script>
	  <?php
       }
       else
       {
       	?>
       	<script>window.location = 'userOrder.php';</script>
       	<?php
       }
    }
	else
	{
		$msg="Wrong email or password";
	}
}
?>
<div class="row">
<div class="container">
<form name="myform" method="post" onsubmit="return validation();">
<?php
if(isset($msg))
{?>
<h3 class="error"><?php echo $msg; ?></h3>
<?php }
?>
<h1>Login</h1>
<input type="text" name="email" placeholder="Enter name" class="input">
<span class="error" id="e"></span></br>
<input type="password" name="password" placeholder="Enter password" class="input">
<span class="error" id="p"></span></br>
<input type="submit" name="login" value="login" class="cart">
</form>
</div>
<?php
include('footer.php');
?>