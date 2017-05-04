<?php
session_start();
if(!isset($_SESSION["userid"]))
{
	header("location:login.php");
}
else
{
$mode="submit";
if(isset($_REQUEST["submit"]))
{
	
		$name=$_REQUEST["name"];
		$userName=$_REQUEST["userName"];
		$password=$_REQUEST["password"];
		$address=$_REQUEST["address"];
		$department=$_REQUEST["department"];
		$gender=$_REQUEST["gender"];
		$salary=$_REQUEST["salary"];
	
	if($_REQUEST["submit"]=="submit")
	{	
		$sql="insert into emp_information(emp_name,emp_userName,emp_password,emp_address,emp_depid,emp_gender) values('$name','$userName','$password','$address','$department','$gender')";
		echo $sql;
		$result=mysql_query($sql);

		// mysql_insert_id return last id of the inserted record
		
		$lastid=mysql_insert_id();
		if(isset($lastid))
		{
			$sql="insert into salary(emp_id,emp_salary) values('$lastid','$salary')";
			$result=mysql_query($sql);
			if(mysql_affected_rows()>0)
			{
				header("location:empList.php");
			}
		}
    }
    if($_REQUEST["submit"]=="update")
	{
		$empId=$_REQUEST["empId"];
		$sql="update emp_information e inner join salary s on(e.emp_id=s.emp_id) set e.emp_name='$name',e.emp_userName='$userName',e.emp_password='$password',e.emp_address='$address',e.emp_depid='$department',e.emp_gender='$gender',s.emp_salary='$salary' where e.emp_id='$empId' ";
		$result=mysql_query($sql);
		if(mysql_affected_rows()>0)
		{
			header("location:empList.php");
		}

	}
	    
}
?>
<?php
include('header.php');
include('slider.php');
if(isset($_REQUEST['updateId']))
{
	$mode="update";

	$updateId=$_REQUEST['updateId'];
	$sql="select e.*,d.dep_name,s.emp_salary from emp_information e inner join department d on (e.emp_depid=d.dep_id) inner join salary s on(e.emp_id=s.emp_id) where e.emp_id='$updateId'";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	if($row)
	{
		$empId=$row['emp_id'];
		$empName=$row['emp_name'];
		$empUserName=$row['emp_userName'];
		$empPassword=$row['emp_password'];
		$empAddress=$row['emp_address'];
		$empGender=$row['emp_gender'];
		$empdepId=$row['emp_depid'];
		$empSalary=$row['emp_salary'];
		
	}

}
?>
<h1 class="heading"><a href="searchEmployee.php">Search Employee</a></h1>
<h1 class="heading"><a href="empList.php">Employee List</a></h1>
<h1 class="heading"><a href="logout.php">Log Out</a></h1>
<div class="registration">
<fieldset>
<legend>Registration form</legend>
<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data" onsubmit="return validate()">
			
			<span class="required">* Require fields</span></br>

			<span class="required" id="message"></span>
			<label for="name"><span class="myspan">Name:</span>
			<input type="hidden" name="empId" id="empId" value="<?php if(isset($empId))
			    {
			    	echo $empId;
				}?>">
			<input type="text" class="input-field" id="name" name="name" value="<?php if(isset($empName)){
				echo $empName;
				} ?>"/>
            <span class="required"></span>
            </label>
            	
            <label for="userName"><span class="myspan">User Name<span class="required">*</span></span>
			<input type="text" class="input-field" id="userName" name="userName" value="<?php if(isset($empUserName)){
				echo $empUserName;
				} ?>" />
			<span id="userName" class="required"></span>
			</label>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" id="password" name="password" value="<?php if(isset($empPassword)){
				echo $empPassword;
				} ?>" />
			<span id="pass" class="required"></span>
			</label>

			<label for="address"><span class="myspan">Address<span class="required">*</span></span>
			<input type="text" class="input-field"  id="address" name="address" value="<?php if(isset($empAddress)){
				echo $empAddress;
				} ?>" />
			<span id="cpass" class="required"></span>
			</label>

			

			<label for="department"><span class="myspan">Department<span class="required">*</span></span>
			<select name="department" id="department" class="select-field">

			<?php
			$sql="select * from department";
			$result=mysql_query($sql);
			while($row=mysql_fetch_assoc($result))
			{
			?>
			<option value="<?php echo $row['dep_id']; ?>" <?php if(isset($empdepId))
			    {
			    	if($empdepId==$row['dep_id'])
			    	{
			    	
				    echo "selected";
				    }
				} ?> ><?php echo $row['dep_name'];  ?></option>
			<?php
		     }
			 ?>
			</select>
			</label>
          
            <span  class="required"></span>
            <label for="gender"><span class="myspan">Gender<span class="required">*</span></span>
			<input type="radio"  name="gender" id="gender" value="male" <?php if(isset($empGender))
			{
				if($empGender=="male")
				{
				echo "checked";
			    }
			} ?> >Male</input>
			<input type="radio"  name="gender" id="gender" value="female"  <?php if(isset($empGender))
			{
				if($empGender=="female")
				{
				echo "checked";
			    }
			} ?> >Female</input>
			</label>

			<span id="gender" class="required"></span>
			
			<label for="salary"><span class="myspan">Salary<span class="required">*</span></span>
			<input type="text" name="salary" id="salary" value="<?php if(isset($empSalary)){
				echo $empSalary;
				} ?>"/>
		    </label>
			<span id="salary" class="required"></span></br>
			
			<input type="submit" class="input-field" name="submit" value="<?php
			if(isset($mode))
			{
			echo $mode;
			}

			?>" />
          
          </form>
</fieldset>
</div>
<?php
include('footer.php');
}
?>