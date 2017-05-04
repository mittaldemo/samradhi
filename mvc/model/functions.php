<?php
include('connection.php');
session_start();
class myFunction
{
	function __construct()
	{
		
    }
    public function register($username,$email,$password,$confirm_password)
    {

    	$sql="insert into login(username,email,password,confirm_password) values('$username','$email','$password','$confirm_password')";
    	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function login($email,$password)
    {
    	
    	$sql="select * from login where email='$email' and password='$password' ";
    	
    	$result=mysql_query($sql);
    	$row=mysql_fetch_assoc($result);

    	if($row)
    	{
    		$_SESSION['id']=$row['id'];

    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function checkemail($email)
    {
    	$sql="select * from login where email='$email'";
    	$result=mysql_query($sql);
    	$row=mysql_fetch_assoc($result);
    	if($row)
    	{
    			return false;
    	}
    	else
    	{
    			return true;
    	}
    	 
    }
    public function display($userid)
    {
    	$sql="select * from login where id='$userid'";
    	$result=mysql_query($sql);
    	$row=mysql_fetch_assoc($result);
    	if($row)
    	{
    		$_SESSION['userid']=$row['id'];
    		$_SESSION['name']=$row['username'];
    		$_SESSION['email']=$row['email'];
    		$_SESSION['password']=$row['password'];
    		$_SESSION['confirm_password']=$row['confirm_password'];
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
}
		$connect=new DBconnect();
		$connect->connection('localhost','root','root');
		$boolean=$connect->DB('samradhi');
?>