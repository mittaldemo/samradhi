<?php
include('header.php');
if(isset($_POST['menuButton']))
{
	$menu=$_POST['menu'];
	$sql="insert into menu(menu_name) values('$menu')";
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$uploadmsg="menu added";
    	}
}
if(isset($_POST['updateMenuButton']))
{
	$menuName=$_POST['updateMenu'];
	$updateId=$_POST['updateId'];
	
	$sql="update menu set menu_name='$menuName' where menu_id=$updateId" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$uploadmsg="menu updated sucessfully";
    	}
}
if(isset($_REQUEST['menuDeleteId']))
{
								
$deleteId=$_REQUEST['menuDeleteId'];
								
$sql="delete from menu where menu_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$uploadmsg="menu deleted sucessfully";
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="addMenu" value="Add Menu" class="sideMenu"></li>
			<li><input type="submit" name="showMenu" value="Show Menu" class="sideMenu"></li>
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
                  <?php if(isset($_POST['addMenu']))
  				  {?>
				     <div>
					 <label>Add menu</label>
					 <input type="text" name="menu" value=""></br>
					 <input type="submit" name="menuButton" value="Add menu">
					</div>
				  <?php } ?>

			  <?php if(isset($_POST['showMenu']))
  				  {
  				     $sql="select * from menu";
			  		 $result=mysql_query($sql);
			  	   ?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Menu Name</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  


			  		<?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['menu_name']; ?></td>
                          <td><a href="menu.php?menuEditId=<?php echo $row['menu_id']; ?>" >Edit</td>
                          <td><a href="menu.php?menuDeleteId=<?php echo $row['menu_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					  	   }

					?>
				    	</table> 
			<?php  
			  } 

			
              if(isset($_REQUEST['menuEditId']))
				{
					$menuEditId=$_REQUEST['menuEditId'];
					
					$sql="select * from menu where menu_id=$menuEditId ";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update menu</label>
					 <input type="hidden" name="updateId" value="<?php echo $row['menu_id']; ?>">
					 <input type="text" name="updateMenu" value="<?php echo $row['menu_name']; ?>"></br>
					 <input type="submit" name="updateMenuButton" value="Update menu">
					</div>
			<?php 
		         }
		     }

            ?>
              </div>
          </div>
</form>