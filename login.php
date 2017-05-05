<?php
session_start();
if($_SESSION['userid'])
{
	header("location:welcomeuser.php");
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type"/> 
<meta content="utf-8" http-equiv="encoding">

<title></title>
<link rel="stylesheet"  href="style.css">
<!--<script type="text/javascript" src="script.js"></script>-->
</head>
<body>
<div class="registration">
<fieldset>
<legend>Login form</legend>
<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data">
	
	<label for="email"><span class="myspan">Email <span class="required">*</span></span>
			<input type="text" class="input-field" name="email" value="<?php
			 if(isset($_COOKIE["email"]))
	      {
			    echo $_COOKIE["email"];
	      } ?>"  required="" />
			<span id="email" class="required"></span>
			</label></br>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" name="pass" value="<?php
			 if(isset($_COOKIE["password"]))
	      {
			    echo $_COOKIE["password"];
	      }?>"  required="" />
			<span id="pass" class="required"></span></br>
			</label>

			
            <input type="checkbox" name="check" value="1"/>Remember Me</br>
			<input type="submit" class="input-field" name="login" value="login" />
			
			</form>


<?php
include('connection.php');
if(isset($_REQUEST["login"]))
{
	$email=$_REQUEST["email"];
	$pass=$_REQUEST["pass"];
	
	$sql="select * from userinfo where email='$email' and password='$pass' ";
	$result=mysql_query($sql);
	
	
	    while($row=mysql_fetch_assoc($result))
	    {
	    	// echo $row;die;
	      if(isset($_POST["check"]))
	      {
			    setcookie("email",$row["email"],time()+3600); 
			    setcookie("password",$row["password"],time()+3600);
	      }
		$_SESSION["userid"]=$row["id"];
		
		
		header("location:welcomeuser.php");
	    }
   // die;
   // else
   // {?>
  
   	    <!-- <span class="required"><?php echo"wrong user name or password";?></span> -->
<?php
   // }
}
?>

</fieldset>
</div>
</body>
</html>