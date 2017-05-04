<?php
include('header.php');
if(isset($_POST['addCharge']))
{
	$shippingCharge=$_POST['shippingCharge'];
	$sql="insert into shippingCharge(shipping_charges) values('$shippingCharge')";
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$uploadmsg="shipping charges added";
    	}
}
if(isset($_POST['updateChargeButtn']))
{
	
	$updateCharge=$_POST['updateCharge'];
	
	$sql="update shippingCharge set shipping_charges='$updateCharge' where id=1" ;
	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$uploadmsg="Charges  updated sucessfully";
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
  		    <li><input type="submit" name="addShippingCharge" value="Add shipping charges" class="sideMenu"></li>
  		    <li><input type="submit" name="updateShippingCharge" value="Update shipping charges" class="sideMenu"></li>
			<li><input type="submit" name="showShippingDetails" value="Show shipping details" class="sideMenu"></li>
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
                 
	<?php 
	if(isset($_REQUEST['addShippingCharge']))
	{?>
        <label>Add shipping charge</label>
        <input type="text" name="shippingCharge" value="">
        <input type="submit" name="addCharge" value="Add">
	<?php
    }
    if(isset($_REQUEST['updateShippingCharge']))
    {
    	$sql="select * from shippingCharge where id=1";
               $result=mysql_query($sql);
               $row=mysql_fetch_assoc($result);
               if($row) 
               {?>
                  <input type="text" name="updateCharge" value="<?php echo $row['shipping_charges']; ?>">
                  <input type="submit" name="updateChargeButtn" value="Update">
              <?php
               }
    }
	if(isset($_REQUEST['showShippingDetails']))
	{
			  $sql="select * from shipping_details";
			  		 $result=mysql_query($sql);
			  	   ?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>First Name</th>
			  	<th>Last Name</th>
			  	<th>Address</th>
			  	<th>User email</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			   <?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['first_name']; ?></td>
                          <td><?php echo $row['last_name']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['user_email']; ?></td>
                          <td><a href="menu.php?menuEditId=<?php echo $row['order_id']; ?>" >Edit</td>
                          <td><a href="menu.php?menuDeleteId=<?php echo $row['order_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					 ?>
		<?php  
			  } 

			}
              

            ?>
            </table>
              </div>
          </div>
</form>