<?php
include("header.php");
if(isset($_REQUEST['searchName']))
{
   $searchName=trim($_REQUEST['searchName']);
   $sql="select * from product where product_name='$searchName'";
   $result=mysql_query($sql);
?>
<div class="row">
<div class="container">
<h3>your search <?php echo $searchName; ?> reveals the following results</h3>
</div>
</div>
<div class="row">
		<div class="container">
		<input class="searchText" type="text" name="" value="<?php echo $searchName; ?>">
		<label><img src="uploads/search.png" id="#search-image" height="46px" width="50px"/></label>
		</div>
</div>
<hr></hr>
<div class="row">
		<div class="container">
		<div class="col-lg-4">
		<?php
		if($row=mysql_fetch_assoc($result))
		{
		?>
		<img src="uploads/<?php echo $row['product_image'];?>" height="500pxs">
        
		</div>
		<div class="col-lg-8">
				<div class="row">
				<h4><?php echo $row['product_name'];?></h4>
				</div>
				<div class="row">
				<h4>$<?php echo $row['product_price'];?></h4>
				</div>
			<?php
	     }
	     else
	     {
	     	?>
           <h4>No result found</h4>
			 <?php
			}
			 ?>
		</div>
</div>

<?php
}


?>
<?php
include('footer.php');
?>