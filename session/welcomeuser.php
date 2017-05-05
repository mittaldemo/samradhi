<?php
session_start();
if(isset($_SESSION["myname"]))
{?>
	<h1>Welcome   <?php echo $_SESSION["myname"]; ?></h1></br>
	<?php
}
	
?>

<a href="logout.php">Log out</a>
