<?php
include('header.php');
if(isset($_POST['linkMenuButton']))
{
	$linkMenu=$_POST['linkMenu'];
	$sql="insert into footer1(link_name) values('$linkMenu')";
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$linkmsg=" link menu added";
    	}
}
if(isset($_POST['updateLinkButton']))
{
	$linkName=$_POST['updateLink'];
	$updateId=$_POST['updateId'];
	
	$sql="update footer1 set link_name='$linkName' where link_id=$updateId" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$linkmsg=" link menu updated sucessfully";
    	}
}
if(isset($_REQUEST['linkDeleteId']))
{
								
$deleteId=$_REQUEST['linkDeleteId'];
								
$sql="delete from footer1 where link_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$linkmsg=" link menu deleted sucessfully";
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="addLinkMenu" value="Add link Menu" class="sideMenu"></li>
			<li><input type="submit" name="showLinkMenu" value="Show link Menu" class="sideMenu"></li>
		 </ul>
  	  </div>


          <div class="col-lg-10 sidebar-content">

                  <div class="mainContent">
                  <h1>
                  <?php
							  if(isset($linkmsg))
							  {
							  	echo $linkmsg;
							  }

							  ?>
                 </h1>
                  <?php if(isset($_POST['addLinkMenu']))
				  	{?>
				         <div>
						 <label>Add link menu</label>
						 <input type="text" name="linkMenu" value=""></br>
						 <input type="submit" name="linkMenuButton" value="Add link menu">
						</div>
					<?php } ?>

			<?php if(isset($_POST['showLinkMenu']))
  				  {
  				        $sql="select * from footer1";
			  		  	$result=mysql_query($sql);
			  	?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Link Name</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  


			  		<?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['link_name']; ?></td>
                          <td><a href="footer1.php?linkEditId=<?php echo $row['link_id']; ?>" >Edit</td>
                          <td><a href="footer1.php?linkDeleteId=<?php echo $row['link_id']; ?>" >Delete</td>
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
					
					$sql="select * from footer1 where link_id=$linkEditId ";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update link menu</label>
					 <input type="hidden" name="updateId" value="<?php echo $row['link_id']; ?>">
					 <input type="text" name="updateLink" value="<?php echo $row['link_name']; ?>"></br>
					 <input type="submit" name="updateLinkButton" value="Update link menu">
					</div>
			<?php 
		         }
		     }

            ?>
              </div>
          </div>
</form>