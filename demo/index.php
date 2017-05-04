<?php

include('connection.php');
?>
<?php
/*if(isset($_REQUEST['deleteId']))
{
  $deleteId=$_REQUEST['deleteId'];
  
  $sql="delete emp_information,salary from emp_information inner join salary  where emp_information.emp_id=salary.emp_id and  emp_information.emp_id='$deleteId' ";
  $result=mysql_query($sql);
  if(mysql_affected_rows()>0)
  {
    echo "record deleted";
  }
}*/
$sql="select e.emp_id,e.emp_name,d.dep_name,s.emp_salary from emp_information e inner join department d on (e.emp_depid=d.dep_id) inner join salary s on(e.emp_id=s.emp_id)";
   $result=mysql_query($sql);
?>
   <h1><a href="searchEmployee.php"/>Search Employee</a></h1>
   <div class="registration">
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
   <td><a class="anchor" href="register.php?updateId=<?php echo $row['emp_id'];?>"/>Edit</td>
   <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['emp_id'];?>"/></td>
   </tr>
  <?php
    }
    ?>
     
</table> 

 <?php }
    else
    {?>
      <tr><td><?php echo "no record"; ?></td></tr>
    <?php 
    }
?>
<input type="submit" class="input-field" name="submit" value="delete all"/>
</form>
<?php
if(isset($_REQUEST["submit"]))
{
echo "hiii";
$deleteIds=$_REQUEST['deleteAll'];
print_r($deleteIds);
}
?>
</div>
<?php
if(isset($_REQUEST['deleteEmp']))
{
  echo "hiii";
  echo $_REQUEST['deleteEmp'];
  //$deleteIds=$_REQUEST['deleteAll'];
  //print_r($deleteIds);

  $sql="delete emp_information,salary from emp_information inner join salary  where emp_information.emp_id=salary.emp_id and  emp_information.emp_id='$deleteId' ";
  $result=mysql_query($sql);
  if(mysql_affected_rows()>0)
  {
    echo "record deleted";
  }
}
  
   ?>
   

