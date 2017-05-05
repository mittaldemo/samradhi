<?php
include('header.php');
if(isset($_POST['addMenuButton']))
{
	$mainMenu=$_POST['mainMenu'];
	$subMenu=$_POST['subMenu'];
	$sql="insert into sub_menu(sub_menu_name,main_menu_id) values('$subMenu','$mainMenu')";
	$result=mysql_query($sql);
    if(mysql_affected_rows()>0)
    {
     $uploadmsg="sub menu added";
    }
}
if(isset($_POST['updateSubMenuButton']))
{
	$subMenuName=$_POST['updateSubMenu'];
	$updateId=$_POST['updateId'];
	echo $subMenuName;
	$sql="update sub_menu set sub_menu_name='$subMenuName' where sub_menu_id=$updateId" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$uploadmsg="sub menu updated sucessfully";
    	}
}
if(isset($_REQUEST['subMenuDeleteId']))
{
								
$deleteId=$_REQUEST['subMenuDeleteId'];
								
$sql="delete from sub_menu where sub_menu_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$uploadmsg="sub menu deleted sucessfully";
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="addSubMenu" value="Add Sub Menu" class="sideMenu"></li>
			<li><input type="submit" name="showSubMenu" value="Show Sub Menu" class="sideMenu"></li>
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
                  <?php if(isset($_POST['addSubMenu']))
  				  {?>
				     <div>
					 <label>Select menu</label>
					 <select name="mainMenu">
					 <?php
					 $sql="select * from menu";
					 $result=mysql_query($sql);
					 while($row=mysql_fetch_assoc($result))
					 {
					 ?>
					 <option value="<?php echo $row['menu_id']; ?>"><?php echo $row['menu_name']; ?></option>
				<?php
					 } ?>
					 </select></br>
					 <input type="text" name="subMenu" value=""></br>
					 <input type="submit" name="addMenuButton" value="Add menu">
					</div>
		   <?php } ?>

			  <?php 

			     if(isset($_POST['showSubMenu']))
  				  {
  				     $sql="select menu.*,sub_menu.* from menu inner join sub_menu on menu.menu_id=sub_menu.main_menu_id";
			  		 $result=mysql_query($sql);
			  	   ?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Main Menu Name</th>
			  	<th>Sub Menu Name</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  
                <?php  while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['menu_name']; ?></td>
                          <td><?php echo $row['sub_menu_name']; ?></td>
                          <td><a href="subMenu.php?subMenuEditId=<?php echo $row['sub_menu_id']; ?>" >Edit</td>
                          <td><a href="subMenu.php?subMenuDeleteId=<?php echo $row['sub_menu_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					  	   }

					?>
				  
				  </table> 
			<?php  
			  } 

			
              if(isset($_REQUEST['subMenuEditId']))
				{
					$subMenuEditId=$_REQUEST['subMenuEditId'];
					
					$sql="select * from sub_menu where sub_menu_id=$subMenuEditId";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update menu</label>
					 <input type="hidden" name="updateId" value="<?php echo $row['sub_menu_id']; ?>">
					 <input type="text" name="updateSubMenu" value="<?php echo $row['sub_menu_name']; ?>"></br>
					 <input type="submit" name="updateSubMenuButton" value="Update menu">
					</div>
			<?php 
		         }
		     }

            ?>
              </div>
          </div>
</form>