<?php
include('connection.php');
$sql="select * from userinfo";

$result=mysql_query($sql);

           
?>
<!DOCTYPE html>
<head>

<meta charset="utf-8">
<title></title>
<link rel="stylesheet"  href="../style.css">
<!--<script type="text/javascript" src="script.js"></script>-->
</head>
<span style="color:white"><?php
if(isset($_REQUEST["deleteid"]))
{
	echo "Record deleted";
}
if(isset($_REQUEST["updateid"]))
{
	echo "Record Updated";
}
?>
</span>
<table class="mytable" border="1">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Gender</th>
		<th>Hobbies</th>
		<th>Language</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>

	</tr>

	<?php
    while($row=mysql_fetch_assoc($result))
    {
    	
	?>
    <tr>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['password']; ?></td>
         <td><?php echo $row['gender']; ?></td>
         <td><?php echo $row['hobbies']; ?></td>
         <td><?php echo $row['language']; ?></td>
         <?php
         	$var = base64_encode($row['id']);
         ?>
         <td><img src="../uploads/<?php echo $row['image']?>" height="50px" width="50px"/></td>
         <td><a class="edit" href="admin_edit.php?editid=<?php echo $var; ?>">Edit</td>
         <td><a class="delete" href="admin_delete.php?deleteid=<?php echo $var; ?>" onclick="return confirm('sure to delete')">Delete</td>


    </tr>
	<?php
    }
	?>
</table>