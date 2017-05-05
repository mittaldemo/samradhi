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
        if($email=='admin@gmail.com' && $password=='admin123')
        {
            return true;
        }
    	else
        {
            return false;
        }
    	
    }
    public function addProduct($prodName,$target_file)
    {
        $sql="insert into products(prod_name,prod_image) values('$prodName','$target_file')";
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