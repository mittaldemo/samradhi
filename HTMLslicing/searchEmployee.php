<?php
session_start();
if(!isset($_SESSION["userid"]))
{
  header("location:login.php");
}
else
{
include('header.php');
include('slider.php');
?>
<h1><a href="empList.php">Employee List</a></h1>
<h1 class="heading"><a href="logout.php">Log Out</a></h1>
<div class="registration">

<fieldset>
<legend>Search Employee</legend>
<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data">
	
			<label>
			<span class="myspan">Enter name<span class="required">*</span></span>
			<input type="text" class="input-field" name="name" value="<?php if(isset($name)){ echo $name; } ?>" />
			</label></br>

			<label for="department"><span class="myspan">Search by Department<span class="required">*</span></span>
			<select name="department"  class="select-field">

			<?php
			$sql="select * from department";
			$result=mysql_query($sql);
			while($row=mysql_fetch_assoc($result))
			{
			?>
			<option value="<?php echo $row['dep_id']; ?>"><?php echo $row['dep_name']; ?></option>
			<?php
		     }
			 ?>
			</select>
			</label>

			<input type="submit" class="input-field" name="login" value="search" />
			
			</form>

<?php
include('connection.php');
if(isset($_REQUEST["login"]))
{
	$name=$_REQUEST["name"];
	$department=$_REQUEST["department"];
  $sql="select e.emp_name,d.dep_name from emp_information as e inner join department as d on e.emp_depid=d.dep_id where e.emp_name='$name' and d.dep_id='$department' ";
   $result=mysql_query($sql);
   $row=mysql_fetch_assoc($result);
   ?>
   <table class="mytable" border="1">
   	
   	<tr><th>Employee Name</th>
   	<th>Employee Department</th>
   	<th>Employee Salary</th></tr>
   

   <?php
   if($row)
   {?>
   <tr>
   <td><?php echo $row['emp_name']; ?></td>
   <td><?php echo $row['dep_name']; ?></td>
 
  <?php
  }
  else
  {?>
    <tr><td>NO record found</td></tr>
  <?php
   }
   $sql="select e.emp_name,s.emp_salary from emp_information as e inner join salary as s on e.emp_id=s.emp_id where e.emp_name like '%$name%' ";
   $result=mysql_query($sql);
   $row=mysql_fetch_assoc($result);
   if($row)
   {?>
   	<td><?php echo $row['emp_salary']; ?></td>
   </tr>
  <?php
   }
   ?>
	</table>
<?php
}
?>

</fieldset>
</div>
<?php
include('footer.php');
}
?>