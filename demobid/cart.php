<?php
include("header.php");
if(isset($_REQUEST['submit']))
{ 
   foreach($_REQUEST['quantity'] as $key => $val)
    { 
      $_SESSION['cart'][$key]['quantity']=$val; 
	 } 
}
if(isset($_REQUEST['remove']))
{ 
unset($_SESSION['cart'][$_REQUEST['remove']]); 
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="add")
{ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id]))
        { 
              
      	$_SESSION['cart'][$id]['quantity']++; 
              
        }
        else
        { 
              
            $sql_s="SELECT * FROM product 
                WHERE product_id={$id}"; 
            $query_s=mysql_query($sql_s); 
            if(mysql_num_rows($query_s)!=0)
            { 
                $row_s=mysql_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['product_id']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['product_price'] 
                    ); 
                  
            }
            else
            { 
                  
           $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  ?>

<h1>Cart Details</h1> 

<form method="post" action="cart.php?page=cart"> 
      
	<div class="row">
		<div class="container">
		<h3>Your Cart</h3>
		</div>
	</div>

<hr></hr>

<div class="row">
		<div class="container">
			<div class="col-lg-6">
			
			</div>
		
				
				<div class="col-lg-2">
				<h3>Price</h3>
				</div>
				<div class="col-lg-2">
				<h3>Quantity</h3>
				</div>
				<div class="col-lg-2">
				<h3>Total</h3>
				</div>
			</div>	
		
</div>


    <?php 


            if(isset($_SESSION['cart'])) 
            {       
            $sql="SELECT * FROM product WHERE product_id IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY product_name ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
                    $_SESSION['total']=0;
                    while($row=mysql_fetch_array($query))
                    { 
                        $subtotal=$_SESSION['cart'][$row['product_id']]['quantity']*$row['product_price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                    <div class="row">
                    <div class="container">
    		<div class="col-lg-3">
			<img src="uploads/<?php echo $row['product_image'];?>" height="300px" width="200px">
			</div>
				<div class="col-lg-3">
		        <h4><?php echo $row['product_name'];?></h4>
		       <a href="cart.php?remove=<?php echo $row['product_id'] ?>" class='btn btn-primary w-100-pct'>Remove</a>
				</div>
				<div class="col-lg-2">
				<h4>$<?php echo $row['product_price'];?></h4>
				</div>
				<div class="col-lg-2">
				<h5><input type="number" name="quantity[<?php echo $row['product_id'] ?>]" min="1" value="<?php echo $_SESSION['cart'][$row['product_id']]['quantity'] ?>" /></h5>
				</div>
				<div class="col-lg-2">
				<h4>$
				<?php echo $_SESSION['cart'][$row['product_id']]['quantity']*$row['product_price'] ?>
				</h4>
				</div>
			
              <?php 
              $_SESSION['total']=$_SESSION['total']+$_SESSION['cart'][$row['product_id']]['quantity'];
              ?>
              </div>
              </div>
              <hr></hr>
              <?php
               } 
        ?>              
                
<hr></hr>
<div class="row">
<div class="container">
	<div class="col-lg-10">
	<button type="submit" name="submit" class='btn btn-primary w-100-pct'>Update Cart</button> 
	
	</div>
	<div class="col-lg-2">
	<h4>SubTotal   $<?php echo $totalprice; ?></h4>
   </div>
    
</div>
</div>
<div class="row">
<div class="container">
			<div class="col-lg-8">
			</div>
			<div class="col-lg-4">
			<a href="index.php" class='btn btn-primary w-100-pct'>Continue Shopping</a>
			<a href="checkOut.php" class='btn btn-primary w-100-pct'>Check Out</a>
			</div>
</div>
</div>
</form>

<?php
}
else
{?>
  <h1><?php echo "your card is empty"; ?></h1>
  <?php
}
include('footer.php');
?>