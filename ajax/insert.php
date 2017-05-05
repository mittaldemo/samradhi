<?php
include('../connection.php');
    $username 			= trim($_POST['username']);
	
	$password 			= $_POST['password'];
	$confirm_password 	= $_POST['confirm_password'];
	$email 				= $_POST['email'];
    
    if(isset($_POST['gender']))
	{
	$gender				= $_POST['gender'];
    }
    if(isset($_POST['hobby']))
	{
	$hobby=implode(',',$_REQUEST['hobby']);
    }
    if(isset($_POST['lang']))
	{
    $language=implode(',',$_REQUEST['lang']);
    }
   
$sql="insert into userinfo(name,email,password,confirm_password,gender,hobbies,language) values('$username','$email','$password','$confirm_password','$gender','$hobby','$language')";

            $result=mysql_query($sql);

			if(mysql_affected_rows()>0)
			{
	              echo "form submitted successfully";
			}
		

			
		   
		
		 
        
