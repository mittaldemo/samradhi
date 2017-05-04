<?php
include('header.php');
if(isset($_POST['addNewProduct']))
{
	
	$productName=$_POST['productName'];
	$productPrice=$_POST['productPrice'];
	$productDesc=$_POST['productDesc'];
	echo $productDesc;
    $target_file = $_FILES["productImage"]["name"];
	$image=$_FILES["productImage"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES["productImage"]["tmp_name"], "../uploads/".$target_file))
    {
 $sql="insert into product(product_name,product_price,product_desc,product_image) values('$productName','$productPrice','$productDesc','$target_file')";
 
    	$result=mysql_query($sql);
    	if(mysql_affected_rows()>0)
    	{
    		$productmsg="product added successfully";
    	}
	}

}
if(isset($_POST['updateProductButton']))
{
	$productName=$_POST['updateProductName'];
	$productPrice=$_POST['updateProductPrice'];
	$updateId=$_POST['updateId'];
	$target_file = $_FILES["updateProductImage"]["name"];
	$image=$_FILES["updateProductImage"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$sql="update product set product_name='$productName',product_price='$productPrice' where product_id=$updateId" ;
	$result=mysql_query($sql);
	if(move_uploaded_file($_FILES["updateProductImage"]["tmp_name"], "../uploads/".$target_file))
	{
		$sql="update product set product_image='$target_file' where product_id=$updateId";
		$result=mysql_query($sql);
	}
	if(mysql_affected_rows()>0)
    	{
    		$productmsg="product updated sucessfully";
    	}
    
}
if(isset($_REQUEST['productDeleteId']))
{
								
$deleteId=$_REQUEST['productDeleteId'];
								
$sql="delete from product where product_id=$deleteId" ;
$result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$productmsg="product deleted sucessfully";
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">
   
      <div class="col-lg-2 sidebar">
  		  <ul>
  		    <li><input type="submit" name="addProduct" value="Add Product" class="sideMenu"></li>
			<li><input type="submit" name="showProduct" value="Show Product" class="sideMenu"></li>
		 </ul>
  	  </div>


          <div class="col-lg-10 sidebar-content">

                  <div class="mainContent">
                  <h1>
                  <?php
							  if(isset($productmsg))
							  {
							  	echo $productmsg;
							  }

							  ?>
                 </h1>
                  <?php if(isset($_POST['addProduct']))
				  	{?>
				    <div>
				    <label>Add product</label></br>
				    <label>product Name</label></br>
				    <input type="text" name="productName" value=""></br>
				    <label>product Price</label></br>
				    <input type="text" name="productPrice" value=""></br>
				    <label>product Image</label></br>
				    <input type="file" name="productImage" value=""></br>
				    <textarea cols="20" rows="4" name="productDesc"></textarea></br>
				    <input type="submit" name="addNewProduct" value="Add product">
				    </div>
				    <?php } ?>
          
          <?php if(isset($_POST['showProduct']))
  				  {
  				        $sql="select * from product";
			  		  	$result=mysql_query($sql);
			  	?>
			  	<table border="1" class="menu-table">
			  	<tr>
			  	<th>Product Name</th>
			  	<th>Product Price</th>
			  	<th>Product Image</th>
			  	<th>Edit</th>
			  	<th>Delete</th>
			  	</tr>
			  


			  		<?php while($row=mysql_fetch_assoc($result))
			  		  	  {?>
                          <tr>
                          <td><?php echo $row['product_name']; ?></td>
                          <td>$<?php echo $row['product_price']; ?></td>
                      <td><img src="../uploads/<?php echo $row['product_image']; ?>" height="50px" width="50px"></td>
                          <td><a href="product.php?productEditId=<?php echo $row['product_id']; ?>" >Edit</td>
                          <td><a href="product.php?productDeleteId=<?php echo $row['product_id']; ?>" >Delete</td>
                          </tr>
					  	  <?php
					  	   }

					?>
				    	</table> 
			<?php  
			  } 

			
              if(isset($_REQUEST['productEditId']))
				{
					$productEditId=$_REQUEST['productEditId'];
					
					$sql="select * from product where product_id=$productEditId ";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{?>
					<div>
					 <label>Update product</label></br>
					 <label>Product Name</label></br>
					 <input type="hidden" name="updateId" value="<?php echo $row['product_id']; ?>">
					 <input type="text" name="updateProductName" value="<?php echo $row['product_name']; ?>"></br>
					 <label>product Price</label></br>
					 <input type="text" name="updateProductPrice" value="<?php echo $row['product_price']; ?>"></br>
					 <label>product Image</label></br>
					 <img src="../uploads/<?php echo $row['product_image']; ?>" height="100px" width="100px"/>
					 <input type="file" name="updateProductImage" value="<?php if(isset($row['product_image']))
					    {
					    	echo $row['product_image'];
					    }
					 	?>"/>
					 <input type="submit" name="updateProductButton" value="Update Product">
					</div>
			<?php 
		         }
		     }

            ?>
              </div>
          </div>
</form>