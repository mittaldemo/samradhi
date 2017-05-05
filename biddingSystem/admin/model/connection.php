<?php
class DBconnect 
{
	 
	function __construct()
	{
		
	}
	public function connection($hostname,$username,$password)
	{
		
		$conn=mysql_connect($hostname,$username,$password);
		if($conn)
		{
			return true;
		}
		else
		{
			echo mysql_error();
		}

	}
	public function DB($DBname)
	{
		
		$db=mysql_select_db($DBname);
		if($db)
		{
			return true;
		}
		else
		{
			echo mysql_error();
		}
	}
}
    

?>