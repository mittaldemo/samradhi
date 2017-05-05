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
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="js/jquery.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        </head>  
        <body>

        <div class="row">
                <header>
                    <div class="container"> 
                    <h1 id="heading">Welcome to Bidding System</h1>
                    </div>  
                </header>  
        </div>  