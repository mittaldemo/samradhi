<?php
include('connection.php');
include('header.php');
?>
<div class="container">
	<div class="row">
		<div id="slider">
		        <?php
		          $sql="select * from slider";
		          $result=mysql_query($sql);
		          while($row=mysql_fetch_assoc($result))
		          {
		          ?>
		            <img src="uploads/<?php echo $row['slider_image']; ?>"/>
		            <?php
		          }
		            ?>
		</div>
	</div>
</div>

<div class="container">
<?php
          $sql="select min(heading_id),heading_name,heading_desc from heading";
          $result=mysql_query($sql);
          while($row=mysql_fetch_assoc($result))
          {
          ?>
            <h2 class="heading"><?php echo $row['heading_name']; ?></h2>
            <?php $row['heading_desc']; ?>
            <?php
          }
            ?>

</div>


<div class="container">
      <div class="row">
      <?php
                $sql="select heading_name,heading_desc from heading where heading_id=10";
                $result=mysql_query($sql);
                while($row=mysql_fetch_assoc($result))
                {
                ?>
                  <h3><?php echo $row['heading_name']; ?></h3>
                  <?php
                }
      ?>

      </div>
</div>

<div class="container">
<div class="row">
<?php
          $sql="select * from product";
          $result=mysql_query($sql);
          while($row=mysql_fetch_assoc($result))
          {
          	
          ?>
            <div class="col-lg-3 product">
            
            <div>
           <a href="product.php?productId=<?php echo $row['product_id'];?>"> <img src="uploads/<?php echo $row['product_image']; ?>" height="480px" width="300px"></a></h3>
            </div>
            <div>
            <h4><?php echo $row['product_name']; ?></h4>
            <h5>$<?php echo $row['product_price']; ?></h5>
            </div>
            </div>
            <?php
          }
?>
</div>
</div>]
<?php
include('footer.php');

?>

