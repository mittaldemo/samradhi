<?php
/*=============================================================*/
#### How to Validate Form with PHP - Server Side Validation ####
#### Author	: 	Arpan Das						####
#### site	: 	http://w3epic.com/							####
#### email	:	admin@w3epic.com					####
/*=============================================================*/
 
include('connection.php');

$nameerror='';
$emailerror='';
$passerror='';
$cpasserror='';
$hobbyerror='';
$gendererror='';
$languageerror='';
$imageerror='';
$gender='';
$hobby='';
$language='';
if (isset($_POST['submit']) || isset($_POST['update']))
{ 

    $username 			= trim($_POST['username']);
	
	$password 			= $_POST['password'];
	$confirm_password 	= $_POST['confirm_password'];
	$email 				= $_POST['email'];

    $emailsql="select email from userinfo";
    $result=mysql_query($emailsql);
    //$row=mysql_fetch_row($result);
    while ($row=mysql_fetch_assoc($result)) 
    {
    	echo $row['email'];
    	if($row['email']==$email)
    	{
    		$emailerror .="email already exist";
    	}
    }
    
 

	
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
    
	#### start validating input data ####
	#####################################
 
	# Validate Username #
		// if its not alpha numeric, throw error $target_fil
   
   $target_file = $_FILES["profilepic"]["name"];
   $image=$_FILES["profilepic"]["name"];
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
	if($username=='')
	{
		$nameerror .= 'Name field is required';
	}
	
	else
	{
		// if username is not 3-20 characters long, throw error
		if (strlen($username) < 3 OR strlen($username) > 20)
		 {
			$nameerror .= 'Name should be within 3-20 characters long.';
		 }
	}
  

	
 
	# Validate Password #
		// if first_name is not 3-20 characters long, throw error
		 if($password=='')
		 {
		 	$passerror .= 'Password is required';

		 }
		else
		{
			if (strlen($password) < 3 OR strlen($password) > 20) 
			{
				$passerror .= 'password should be within 3-20 characters long.';
			}
       }
	# Validate Confirm Password #
		// if first_name is not 3-20 characters long, throw error
		if ($confirm_password != $password) 
		{
			$cpasserror .= 'Confirm password mismatch.';
		}
 
	# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{ // you can also use regex to do same
			$emailerror .= 'Enter a valid email address.';
		}
 
	
 
	# Validate Gender #
		// if gender is not selected or invalid, throw error
		if ($gender != 'male' && $gender != 'female')
		 {
			$gendererror .= 'Please select your gender.';
		}

		if($hobby=='')
		{
			$hobbyerror .= 'Please select atleast one hobby';


		}
		if($language=='')
		{
			$languageerror .= 'Please select atleast one language';


		}
		if($image=='')
		{
			$imageerror .='please select image';
		}
		else
		{
   
		    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		    {
		       $imageerror .='Please enter valide image extension';
		    }
        }
		
		if($nameerror=='' && $emailerror=='' && $passerror=='' && $cpasserror=='' && $languageerror=='' && $hobbyerror=='' && $gendererror=='' && $imageerror=='' && isset($_POST['submit']))
		{
           if(move_uploaded_file($_FILES["profilepic"]["tmp_name"], "uploads/".$target_file))
           {
			
   $sql="insert into userinfo(name,email,password,confirm_password,hobbies,gender,language,image) values('$username','$email','$password','$confirm_password','$hobby','$gender','$language','$target_file')";

            $result=mysql_query($sql);

			if(mysql_affected_rows()>0)
			{
	               header("location:login.php");
			}

			mysql_error();
		   }
		}
		 
		 if($nameerror=='' && $emailerror=='' && $passerror=='' && $cpasserror=='' && $languageerror=='' && $hobbyerror=='' && $gendererror=='' && $imageerror=='' && isset($_POST['update']))
		  {

					
					if(move_uploaded_file($_FILES["profilepic"]["tmp_name"], "uploads/".$target_file))
                    { 
					$updatesql ="update userinfo set name='$username', password='$password', confirm_password='$confirm_password', email='$email', gender='$gender', hobbies='$hobby', language='$language',image='$target_file' where id=$userid ";
				
				   mysql_query($updatesql);
				    
				    $updatemsg="";
				    if(mysql_affected_rows()>0)
				    {
				    	$updatemsg .='Record Updated Successfully';
				    }
				  
                  }
        }
        
        if($nameerror=='' && $emailerror=='' && $passerror=='' && $cpasserror=='' && $languageerror=='' && $hobbyerror=='' && $gendererror=='' && $imageerror=='' && isset($_POST['Update']))
		  {
		  	
					
					if(move_uploaded_file($_FILES["profilepic"]["tmp_name"], "../uploads/".$target_file))
                    { 
					$updatesql ="update userinfo set name='$username', password='$password', confirm_password='$confirm_password', email='$email', gender='$gender', hobbies='$hobby', language='$language',image='$target_file' where id=$userid ";
				
				   mysql_query($updatesql);
				    
				    $updatemsg="";
				    if(mysql_affected_rows()>0)
				    {
				    	$updatemsg .='Record Updated Successfully';
				    }
				  
                  }
        }




}
 
	#### end validating input data ####
	######