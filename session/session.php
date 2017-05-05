<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type"/> 
<meta content="utf-8" http-equiv="encoding">

<title></title>
<link rel="stylesheet"  href="style.css">
<!--<script type="text/javascript" src="script.js"></script>-->
</head>
<body>

<form  mehod="post" name="myform" id="validate-form" enctype="multipart/form-data" onsubmit="return validate();">
	
	<label for="email"><span class="myspan">Email <span class="required">*</span></span>
			<input type="text" class="input-field" name="email" value="" />
			<span id="email" class="required"></span>
			</label></br>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" name="pass" value="" />
			<span id="pass" class="required"></span></br>
			</label>

			

			<input type="submit" class="input-field" name="login" value="login" />
			
			</form>
<?php
if(isset($_REQUEST["login"]))
{
	include('connection.php');
	
	$email=$_REQUEST["email"];
	
	$sql="select * from userinfo where email='$email'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
	    while($row=$result->fetch_assoc())
	    {
	    session_start();
		$_SESSION["myname"]=$row["name"];
		$id=$row["id"];
		echo $_SESSION["myname"];
		header("location:welcomeuser.php?id=$id");
	    }
   }
}
?>