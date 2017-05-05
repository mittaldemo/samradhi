<?php
include('header.php');
?>
<form action="" method="post" enctype="multipart/form-data">
   
      

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
			  
  			  	$sql="select orders.*,order_items.*,shipping_details.* from order_items inner join orders on(orders.ord_id=order_items.order_id) inner join shipping_details on(orders.shipping_address=shipping_details.shipping_id)";
			  		 $result=mysql_query($sql);
			  	   ?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Order id</th>
			  	<th>Product Id</th>
			  	<th>Quantity</th>
			  	<th>Total price</th>
			  	<th>email</th>
			  	<th>Shipping address</th>
			  	</tr>
			   <?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['order_id']; ?></td>
                          <td><?php echo $row['product_id']; ?></td>
                          <td><?php echo $row['quantity']; ?></td>
                          <td>$<?php echo $row['grand_total']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          
                          </tr>
					  	  <?php
					  	   }

					?>
				    	</table> 
			<?php  
			   

			
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