<?php
include('header.php');
$funObj=new myFunction();
if(isset($_SESSION['id']))
{
    if(isset($_REQUEST['userid']))
    {
        $userid=base64_decode($_REQUEST['userid']);
        $select=$funObj->display($userid);
        if($select)
        {
          
           $username=$_SESSION['name'];
           $email=$_SESSION['email'];
           $password=$_SESSION['password'];
           $confirm_password=$_SESSION['confirm_password'];
        }

    }
?>
<div class="container">
        
        <div class="row">
        <h1 id="action">Live Auctions</h1>
        </div>
      
      <div class="row">
              <div class="wrapper">
              <div class="col-lg-4">
              <div id="login" class="animate form">  
                               <form name="login" method="post" action="">  
                                    <h1>Log in</h1> 
                                    <p><?php echo $msg; ?></p> 
                                    <p>   
                                        <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>  
                                        <input id="emailsignup" name="emailid" type="text" placeholder="mysupermail@mail.com" />   
                                    </p>  
                                    <p>   
                                        <label for="password" class="youpasswd" data-icon="p"> Your password </label>  
                                        <input id="password" name="password" type="password" placeholder="eg. X8df!90EO"  />   
                                    </p>  
                                    <p class="keeplogin">   
                                        <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />   
                                        <label for="loginkeeping">Keep me logged in</label>  
                                    </p>  
                                    <p class="login button">   
                                        <input type="submit" name="login" value="Login" />   
                                    </p>  
                                    <p class="change_link">  
                                        Not a member yet ?  
                                        <a href="#toregister" class="to_register">Join us</a>  
                                    </p>  
                                </form>  
                            </div>  
              </div>
              </div>
              <div class="col-lg-4">
              fgjhj
              </div>
              <div class="col-lg-4">
              ghjjhj
              </div>
              </div>
     </div>
       
<?php
}
else
{
header("location:index.php");
}
        ?>