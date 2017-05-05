<?php

$conn=mysql_connect('localhost','root','root');

if(!$conn)
{
	mysql_error();
}
$db=mysql_select_db('cms_view',$conn);
if(!$db)
{
	mysql_error();
	
}
?>