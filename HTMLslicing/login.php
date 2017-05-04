<?php
include('connection.php');
session_start();
if(isset($_SESSION["userid"]))
{
	header("location:register.php");
}
if(isset($_REQUEST["login"]))
{
	if(isset($_REQUEST["check"]))
	{
	$email=$_REQUEST["email"];
	$pass=$_REQUEST["pass"];
	
	$sql="select * from login where email='$email' and password='$pass' ";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	
	    if($row)
	    {
	    	
	    setcookie("email",$row["email"],time()+3600); 
		setcookie("password",$row["password"],time()+3600);
	      
		  $_SESSION["userid"]=$row["id"];
		  header('location:register.php');
		  
		  exit();
	    }
   
     else
    {
          $msg=1;
          echo $msg;
   	 }
  }
  else
  {
  	$msg=2;
  }
}

include('header.php');
include('slider.php');
?>
<div class="registration">
<fieldset>
<legend>Login form</legend>
<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data">
	
	<label for="email"><span class="myspan">Email or User Name<span class="required">*</span></span>
			<input type="text" class="input-field" name="email" value="<?php if(isset($_COOKIE['email']))
			{
				echo $_COOKIE['email'];
			}


			?>"  required="" />
			<span id="email" class="required"></span>
			</label></br>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" name="pass" value="<?php if(isset($_COOKIE['password']))
			{
				echo $_COOKIE['password'];
			}


			?>"  required="" />
			<span id="pass" class="required"></span></br>
			</label>

			<label>
            <input type="checkbox" name="check" value="1"/>Terms and Conditions</br>
            </label>
			<input type="submit" class="input-field" name="login" value="login" />
			</form>

			<span class="required"><?php if(isset($msg))
										{
											if($msg==1)
											{
											echo "wrong user name or password";
										    }
										    if($msg==2)
										    {
										    	echo "please select Terms and Conditions";
										    }
										}

										
										?>
			</span> 
</fieldset>
</div>

<?php
include('footer.php');
?>