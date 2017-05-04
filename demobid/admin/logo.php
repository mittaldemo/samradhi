<?php
include('header.php');
?>
                                <?php
									if(isset($_POST['logo_image']))
									{
										
										$target_file = $_FILES["logo"]["name"];
										$image=$_FILES["logo"]["name"];
										$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
										if(move_uploaded_file($_FILES["logo"]["tmp_name"], "../uploads/".$target_file))
										{
										$sql="insert into logo(logo_image) values('$target_file')";
										$result=mysql_query($sql);
										if(mysql_affected_rows()>0)
										{
										  $uploadmsg="image uploaded";
										}

									   }

									}
							   ?>
							   <?php
									if(isset($_POST['update_logo']))
									{
										
										$target_file = $_FILES["logo"]["name"];
										$image=$_FILES["logo"]["name"];
										$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
										if(move_uploaded_file($_FILES["logo"]["tmp_name"], "../uploads/".$target_file))
										{
										$sql="update logo set logo_image='$target_file' where logo_id=1";
										$result=mysql_query($sql);
										if(mysql_affected_rows()>0)
										{
										  $uploadmsg="logo updated successfully";
										}

									   }

									}
							   ?>
	

	<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="uploadLogo" value="Upload logo" class="sideMenu"></li>
			<li><input type="submit" name="viewLogo" value="View logo" class="sideMenu"></li>
			<li><input type="submit" name="updateLogo" value="Update Logo" class="sideMenu"></li>
		  </ul>
  		  </div>


          <div class="col-lg-10 sidebar-content">

                  <div class="mainContent">
                  <h1>
                 <?php
							  if(isset($uploadmsg))
							  {
							  	echo $uploadmsg;
							  }

							  ?>
                 </h1>
  		  <?php if(isset($_POST['uploadLogo']) || isset($_POST['updateLogo']))
  		      {?>
          
                              <div class="mainContentForm">
							  <label>Upload logo</label>
							  <input type="file" name="logo" value=""></br>
							  <input type="submit" name="<?php if(isset($_POST['uploadLogo']))
							    {
							    	echo "logo_image";

							  	}
							  	if(isset($_POST['updateLogo']))
							    {
							    	echo "update_logo";

							  	}  ?>" value="upload">
							  
							  <div>

				  
		  <?php } ?>
			           <?php if(isset($_POST['viewLogo']))
			  		  {

			  		  	$sql="select * from logo where logo_id=1";
			  		  	$result=mysql_query($sql);
			  		  	while($row=mysql_fetch_assoc($result))
			  		  	{?>
                          <img src="../uploads/<?php echo $row['logo_image']; ?>" height="100px" width="100px"/>

			  		   <?php }

					  }
			  		  ?>

			  		</div>
		        </div>  
		  </form>