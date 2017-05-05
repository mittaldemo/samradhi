<?php
include('header.php');
$email=$_SESSION['email'];
$sql="select orders.*,order_items.*,product.* from orders inner join order_items on(orders.ord_id=order_items.order_id) inner join product on(order_items.product_id=product.product_id) where orders.email='$email'";
$result=mysql_query($sql);
?>
<h1>All orders</h1>
<table border="1" class="menu-table">
			  	<tr>
			  	<th>Product Name</th>
			  	<th>Product Price</th>
			  	<th>Product Quantity</th>
			  	<th>Toal charge</th>
			  	<th>Product Image</th>
			  	</tr>
			    <?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          
                          <tr>
                          <td><?php echo $row['product_name']; ?></td>
                          <td><?php echo $row['product_price']; ?></td>
                          <td><?php echo $row['quantity']; ?></td>
                          <td><?php echo $row['grand_total']; ?></td>
                          <td><img src="uploads/<?php echo $row['product_image'];?>" height="100px" width="100px"></td>
                          
                          </tr>
					  	  <?php
					  	   }

					?>
</table> 

<?php
include('footer.php');
?>