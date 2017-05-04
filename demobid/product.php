<?php
include("header.php");
if(isset($_REQUEST['productId']))
{
	$productId=$_REQUEST['productId'];
	$sql="select * from product where product_id='$productId'";
    $result=mysql_query($sql);
?>
<form method="post">
<input type="hidden" name="proId" value="<?php echo $productId ?>">
<div class="row">
		<div class="container">
		<div class="col-lg-6">
		<?php
		while($row=mysql_fetch_assoc($result))
		{
			
		?>

		<img src="uploads/<?php echo $row['product_image'];?>" height="500px" width="400px">
        
		</div>
		<div class="col-lg-6">
				<div class="row">
					<h4><?php echo $row['product_name'];?></h4>
				</div>
				<div class="row">
					<h4>$
					<?php
					echo $row['product_price'];
					?></h4>
				</div>
				<div class="row">
				<a href="cart.php?action=add&id=<?php echo $row['product_id'] ?>" class='btn btn-primary w-100-pct'>
				 Add to Cart</a>
	            
         
				</div>
			<?php
	     }
	     
			 ?>
		</div>
</div>
</div>
<?php
}
?>
<?php
include('footer.php');
?>