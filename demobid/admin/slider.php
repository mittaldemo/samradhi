<?php
include('header.php');
if(isset($_POST['slider_image']))
{
	
	$target_file = $_FILES["s_image"]["name"];
	$image=$_FILES["s_image"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES["s_image"]["tmp_name"], "../uploads/".$target_file))
    {
    	$sql="insert into slider(slider_image) values('$target_file')";
    	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$slidermsg="image uploaded";
    	}

    }

}
if(isset($_POST['updatesliderButton']))
{
    $updateId=$_POST['updateId'];
	$target_file = $_FILES["updateslider"]["name"];
	$image=$_FILES["updateslider"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES["updateslider"]["tmp_name"], "../uploads/".$target_file))
    {
	
    $sql="update slider set slider_image='$target_file' where slider_id=$updateId" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$slidermsg="slider image updated sucessfully";
    	}
    }
}
if(isset($_REQUEST['sliderDeleteId']))
{
								
$deleteId=$_REQUEST['sliderDeleteId'];
								
$sql="delete from slider where slider_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$slidermsg="slider deleted sucessfully";
	}
}

?>
<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="showSlider" value="Show Slider" class="sideMenu"></li>
			<li><input type="submit" name="addSlider" value="Add Slider" class="sideMenu"></li>
		 </ul>
  	  </div>


          <div class="col-lg-10 sidebar-content">

                  <div class="mainContent">
                  <h1>
                  <?php if(isset($slidermsg))
                  {
                  	echo $slidermsg;
                  }
                  ?>
                  
                  </h1>
						<?php if(isset($_POST['addSlider']))
						  		{?>

								<div>
								<label>Upload slider image</label>
								  <input type="file" name="s_image" value=""></br>
								  <input type="submit" name="slider_image" value="upload">
							    </div>
						 <?php } ?>

               
               <?php if(isset($_POST['showSlider']))
  				  {
  				        $sql="select * from slider";
			  		  	$result=mysql_query($sql);
			  	?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Slider Image</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  


			  		<?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><img src="../uploads/<?php echo $row['slider_image']; ?>" height="100px" width="300px"></td>
                          <td><a href="slider.php?sliderEditId=<?php echo $row['slider_id']; ?>" >Edit</td>
                          <td><a href="slider.php?sliderDeleteId=<?php echo $row['slider_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					  	   }

					?>
				    	</table> 
			<?php  
			  } 

			
              if(isset($_REQUEST['sliderEditId']))
				{
					$sliderEditId=$_REQUEST['sliderEditId'];
					
					$sql="select * from slider where slider_id=$sliderEditId ";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update menu</label>
					 <input type="hidden" name="updateId" value="<?php echo $row['slider_id']; ?>">
					 <img src="../uploads/<?php echo $row['slider_image']; ?>" height="100px" width="100px"/>
					 <input type="file" name="updateslider" value=""></br>
					 <input type="submit" name="updatesliderButton" value="Update slider">
					</div>
			<?php 
		         }
		     }

            ?>


                  </div>
          </div>
</form>