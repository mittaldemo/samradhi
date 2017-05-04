<?php
include('header.php');
if(isset($_POST['heading1']))
{
	$headingName=$_POST['headingName'];
	$headingDesc=$_POST['headingDesc'];
	
	$sql="insert into heading(heading_name,heading_desc) values('$headingName','$headingDesc')";
	$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
    	{
    		$headingmsg="heading added";
    	}
}
if(isset($_POST['updateHeadingButton']))
{
	$headingName=$_POST['updateHeading'];
	$updateId=$_POST['updateId'];
	
	$sql="update heading set heading_name='$headingName' where heading_id=$updateId" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$headingmsg="Heading  updated sucessfully";
    	}
}
if(isset($_REQUEST['headingDeleteId']))
{
								
$deleteId=$_REQUEST['headingDeleteId'];
								
$sql="delete from heading where heading_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$headingmsg="heading deleted sucessfully";
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="addHeading" value="Add Heading" class="sideMenu"></li>
			<li><input type="submit" name="showHeading" value="Show Heading" class="sideMenu"></li>
		 </ul>
  	  </div>


          <div class="col-lg-10 sidebar-content">

                  <div class="mainContent">
                  <h1>
                  <?php
							  if(isset($headingmsg))
							  {
							  	echo $headingmsg;
							  }

							  ?>
                </h1>
                <?php if(isset($_POST['addHeading']))
			  		{?>
			    <div>
			    <label>Add heading1</label>
			    <input type="text" name="headingName" value=""></br>
			    <label>Add description</label>
			    <textarea cols="30" rows="4" name="headingDesc" value=""></textarea></br>
			    <input type="submit" name="heading1" value="add heading">
			    </div>
			    <?php } ?>
			
			<?php if(isset($_POST['showHeading']))
  				  {
  				        $sql="select * from heading";
			  		  	$result=mysql_query($sql);
			  	?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Heading</th>
			  	<th>Heading Description</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  <?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['heading_name']; ?></td>
                          <td><?php echo $row['heading_desc']; ?></td>
                          <td><a href="heading.php?headingEditId=<?php echo $row['heading_id']; ?>" >Edit</td>
                          <td><a href="heading.php?headingDeleteId=<?php echo $row['heading_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					  	   }

					?>
				    	</table> 
			<?php  
			  } 

			
              if(isset($_REQUEST['headingEditId']))
				{
					$headingEditId=$_REQUEST['headingEditId'];
					
					$sql="select * from heading where heading_id=$headingEditId ";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update heading</label>
					 <input type="hidden" name="updateId" value="<?php echo $row['heading_id']; ?>">
					 <input type="text" name="updateHeading" value="<?php echo $row['heading_name']; ?>"></br>
					 <textarea></textarea>
					 <input type="submit" name="updateHeadingButton" value="Update menu">
					</div>
			<?php 
		         }
		     }

            ?>
              </div>
          </div>
</form>