<?php
class connection
{
	private $host="";
	private $userName="";
	private $password="";
	private $database="";
	public function connect($host,$userName,$password)
	{
		$this->host=$host;
		$this->userName=$userName;
		$this->password=$password;
		$conn=mysql_connect($host,$userName,$password);
		
		if(!$conn)
		{
			echo mysql_error();
		}

	}
	public function selectDB($database)
	{
		$this->database=$database;
		$db=mysql_select_db($database);

		if(!$db)
		{
			echo mysql_error();
		}
	}
}
$connect=new connection();
$connect->connect('localhost','root','root');
$connect->selectDB('samradhi');

?>