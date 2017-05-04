<?php
include('connection.php');
$userid=base64_decode($_REQUEST['deleteid']);
$sql="delete from userinfo where id=$userid";
$result=mysql_query($sql);
if(mysql_affected_rows()>0)
{
	
	header("location:showuser.php?deleteid=$msg ");
}


?>