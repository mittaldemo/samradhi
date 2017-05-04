<?php
include('../model/functions.php');
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
<!DOCTYPE html>  
     <html lang="en" class="no-js">  
     <head>  
            <meta charset="UTF-8" />  
            <title>Login and Registration Form with HTML5 and CSS3</title>  
            <meta name="viewport" content="width=device-width, initial-scale=1.0">   
            <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />  
            <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />  
            <meta name="author" content="Codrops" />  
            <link rel="shortcut icon" href="../favicon.ico">   
            <link rel="stylesheet" type="text/css" href="css/demo.css" />  
            <link rel="stylesheet" type="text/css" href="css/style2.css" />  
            <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />  
        </head>  
        <body>
        <div class="container">  
                  
                  
                <header>  
                    <h1>Welcome</h1>
                    <h1 style="float: right;"><a href="logout.php">Log Out</a></h1>    
                </header> 

 
                <section>               
                    
                    <div id="container_demo" >  
                         
                        <a class="hiddenanchor" id="toregister"></a>  
                        <a class="hiddenanchor" id="tologin"></a>  
                        <div id="wrapper">  
                            
                               <form name="login" method="post" action=""> 
                               <table class="mytab" border="1">
                                   <tr>
                                   <th>User name</th>
                                   <th>Email</th>
                                   <th>Password</th>
                                   <th>Confirm Password</th>
                                   </tr>
                                   <tr>
                                   <td><?=$username?></td>
                                   <td><?=$email?></td>
                                   <td><?=$password?></td>
                                   <td><?=$confirm_password?></td>
                                   </tr>
                               </table> 
                                  
                                  
                                </form>  
                              
                             
      
                            
                              
                        </div>  


                    </div>    
                </section>  
            </div> 
        </body>
        </html> 
<?php
}
else
{
header("location:index.php");
}
        ?>