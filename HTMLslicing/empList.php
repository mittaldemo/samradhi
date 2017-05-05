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
if(isset($_REQUEST['deleteEmp']))
{
  
  $deleteIds=$_REQUEST['deleteAll'];
  foreach ($deleteIds as $di)
  {
   $sql="delete emp_information,salary from emp_information inner join salary  where emp_information.emp_id=salary.emp_id and  emp_information.emp_id='$di' ";
  $result=mysql_query($sql);
   }
  if(mysql_affected_rows()>0)
  {
    $msg=1;
  }
}
  
$sql="select e.emp_id,e.emp_name,d.dep_name,s.emp_salary from emp_information e inner join department d on (e.emp_depid=d.dep_id) inner join salary s on(e.emp_id=s.emp_id)";
   $result=mysql_query($sql);
?>
   <h1><a href="searchEmployee.php"/>Search Employee</a></h1>
   <h1 class="heading"><a href="logout.php">Log Out</a></h1>
   <div class="registration">
   <span id=""><?php if(isset($msg)){ echo "record deleted"; }?></span>
   <h1>Employee List</h1>
   <form method="post">
   <table border="1" class="listtable">
   <tr><th>Employee Name</th>
   	<th>Employee Department</th>
   	<th>Employee Salary</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
<?php
  if($row=mysql_fetch_assoc($result))
  {
     while($row=mysql_fetch_assoc($result))
     {
      ?>
     <tr>
     <td><?php echo $row['emp_name']; ?></td>
     <td><?php echo $row['dep_name']; ?></td>
     <td><?php echo $row['emp_salary']; ?></td>
     <td><a class="anchor" href="register.php?updateId=<?php echo $row['emp_id'];?>">Edit</td>
     <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['emp_id'];?>"></td>
     </tr>
    <?php
      }
  }
    else
    {?>
      <tr><td><?php echo "no record"; ?></td></tr>
    <?php 
    }
?>
</table> 
<input type="submit" name="deleteEmp" value="Delete All" onclick="return confirm('sure to Delete');">
</form>
</div>
<?php
include('footer.php');
}
?>