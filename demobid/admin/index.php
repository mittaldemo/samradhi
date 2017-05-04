<?php
include("../connection.php");
if(isset($_REQUEST['login']))
{
  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];
  $sql="select login_id from admin_login where login_email='$email' and login_password='$password'";
  $result=mysql_query($sql);
  if($row=mysql_fetch_assoc($result))
  {
    header('location:header.php');
  }
  else
  {
    $msg="Wrong email or password";
  }
}
?>
<!DOCTYPE html>  
     <html lang="en" class="no-js">  
     <head>  
            <meta charset="UTF-8" />  
            <title>Minimal-fashion.myshopifier.com</title>  
            <meta name="viewport" content="width=device-width, initial-scale=1.0">   
            <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />  
            <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />  
            <meta name="author" content="Codrops" />  
            <link rel="shortcut icon" href="../favicon.ico">   
            
            <link rel="stylesheet" type="text/css" href="../css/style.css" />  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="js/validate.js"></script>
            
        </head>  
        
        <body>
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
</div>
</body>
</html>

        