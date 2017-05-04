<?php
include('header.php');
if(isset($_POST['socialIconButton']))
{

	$target_file = $_FILES["socialIcon"]["name"];
	$image=$_FILES["socialIcon"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES["socialIcon"]["tmp_name"], "../uploads/".$target_file))
    {
	$sql="insert into social_icon(icon_image) values('$target_file')";
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$socialmsg="social icon added";
    	}
    }


}
if(isset($_POST['updateLinkButton']))
{
	
	$updateId=$_POST['updateId'];
	$target_file = $_FILES["updateIcon"]["name"];
	$image=$_FILES["updateIcon"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES["updateIcon"]["tmp_name"], "../uploads/".$target_file))
    {
	$sql="update social_icon set icon_image='$target_file' where icon_id=$updateId" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$socialmsg="icon updated sucessfully";
    	}
    }
}
if(isset($_REQUEST['linkDeleteId']))
{
								
$deleteId=$_REQUEST['linkDeleteId'];
								
$sql="delete from social_icon where icon_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$socialmsg="icon deleted sucessfully";
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="addSocialIcon" value="Add Social icon" class="sideMenu"></li>
			<li><input type="submit" name="showSocialIcon" value="Show Social icon" class="sideMenu"></li>
		 </ul>
  	  </div>


          <div class="col-lg-10 sidebar-content">

                  <div class="mainContent">
                  <h1>
                  <?php
							  if(isset($socialmsg))
							  {
							  	echo $socialmsg;
							  }

							  ?>
                 </h1>
                  <?php if(isset($_POST['addSocialIcon']))
				  	{?>

						<div>
						 <label>Add social icon</label>
						 <input type="file" name="socialIcon" value=""></br>
						 <input type="submit" name="socialIconButton" value="Add menu">
						</div>
					<?php } ?>


			<?php if(isset($_POST['showSocialIcon']))
  				  {
  				        $sql="select * from social_icon";
			  		  	$result=mysql_query($sql);
			  	?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Icon</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  


			  		<?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                         <td><img src="../uploads/<?php echo $row['icon_image']; ?>" height="50px" width="50px"></td>
                          <td><a href="footer2.php?linkEditId=<?php echo $row['icon_id']; ?>" >Edit</td>
                          <td><a href="footer2.php?linkDeleteId=<?php echo $row['icon_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					  	   }

					?>
				    	</table> 
			<?php  
			  } 

			
              if(isset($_REQUEST['linkEditId']))
				{
					$linkEditId=$_REQUEST['linkEditId'];
					
					$sql="select * from social_icon where icon_id=$linkEditId ";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update icon menu</label>
					 <input type="hidden" name="updateId" value="<?php echo $row['icon_id']; ?>">
					 <img src="../uploads/<?php echo $row['icon_image']; ?>" height="100px" width="100px"></br>
					 <input type="file" name="updateIcon" value=""></br>
					 <input type="submit" name="updateLinkButton" value="Update link menu">
					</div>
			<?php 
		         }
		     }

            ?>
              </div>
          </div>
</form>