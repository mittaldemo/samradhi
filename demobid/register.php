<?php
include('header.php');
if(isset($_REQUEST['register']))
{

	$firstName=$_REQUEST['firstName'];
	$lastName=$_REQUEST['lastName'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$regSql="select * from create_account where user_email='$email'";
	$result=mysql_query($regSql);
	$row=mysql_fetch_assoc($result);
	if($row)
	{
		$msg="email already exist";
	}
	else
	{
		$sql="insert into create_account(user_fname,user_lname,user_email,user_password) values('$firstName','$lastName','$email','$password')";
		$result=mysql_query($sql);
		if(mysql_affected_rows()>0)
		{
			$msg="Account Created";
		}
		else
		{
			echo mysql_error();
		}
    }

}
?>
<div class="row">
<div class="container">
<form name="myform" method="post" id="registration" onsubmit="return validation();">
<?php
if(isset($msg))
{?>
<h3 class="error"><?php echo $msg; ?></h3>
<?php }
?>
<h1>Create Account</h1>
<input type="text" name="firstName" placeholder="Enter  First Name" class="input">
<span class="error" id="fname"></span></br>
<input type="text" name="lastName" placeholder="Enter last Name" class="input">
<span class="error" id="lname"></span></br>
<input type="text" name="email" placeholder="Enter name" class="input">
<span class="error" id="e"></span></br>
<input type="password" name="password" placeholder="Enter password" class="input">
<span class="error" id="p"></span></br>
<input type="submit" name="register" value="Create" class="cart">
</form>
</div>
<?php
include('footer.php');
?>