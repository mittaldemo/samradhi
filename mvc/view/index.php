 <?php  

    include_once('../model/functions.php');  
    $funObj = new myFunction();
    $msg="";  
    if(isset($_POST['login']))
    {  
        $email=$_POST['emailid'];
        $password=$_POST['password'];
        $login=$funObj->login($email,$password);
        if($login)
        {
            $id=base64_encode($_SESSION['id']);
            header("location:dashboard.php?userid=$id");
        }
        else
        {
            $msg="wrong email or password";
        }
        
    }  
    if(isset($_POST['register']))
    {  
        $username=$_POST['username'];
        $emailid=$_POST['emailid'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        $checkmail=$funObj->checkemail($emailid);
        if($checkmail)
        {
            $reg=$funObj->register($username,$emailid,$password,$confirm_password);
            if($reg)
            {
                header("location:dashboard.php");
            }
            else
            {
                $msg="can not register";
            }
        }
        else
        {
            $msg="email id Already exist";
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
            <script src="js/jquery.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        </head>  
        <body>  



            <div class="container">  
                  
                  
                <header>  
                    <h1>Login and Registration</h1>  
                </header>  
                <section>               
                    
                    <div id="container_demo" >  
                         
                        <a class="hiddenanchor" id="toregister"></a>  
                        <a class="hiddenanchor" id="tologin"></a>  
                        <div id="wrapper">  
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
      
                            <div id="register" class="animate form">  
                                <form name="login" method="post" action="" onsubmit="return myScript()">  
                                    <h1> Sign up </h1> 
                                    <p><?php echo $msg; ?></p>   
                                    <p>   
                                        <label for="usernamesignup" class="uname" >Your username</label>  
                                        <input id="usernamesignup" name="username"  type="text" placeholder="" />
                                        <span id="username"></span>  
                                    </p>  
                                    <p>   
                                        <label for="emailsignup" class="youmail" > Your email</label>  
                                        <input id="emailsignup" name="emailid"  type="text" placeholder=""  />   
                                    </p>  
                                    <p>   
                                        <label for="passwordsignup" class="youpasswd" >Your password </label>  
                                        <input id="passwordsignup" name="password"  type="password" placeholder=""  />  
                                    </p>  
                                    <p>   
                                    
                                    <label for="passwordsignup_confirm" class="youpasswd">Please confirm your password </label>  
                                        <input id="passwordsignup_confirm" name="confirm_password"  type="password" placeholder="" />  
                                    </p>  
                                    <p class="signin button">   
                                        <input type="submit" name="register" value="Sign up"/>   
                                    </p>  
                                    <p class="change_link">    
                                        Already a member ?  
                                    <a href="#tologin" class="to_register"> Go and log in </a>  
                                    </p>  
                                </form>  
                            </div>  
                              
                        </div>  
                    </div>    
                </section>  
            </div>  
        </body> 
</html>  