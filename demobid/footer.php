<div class="footer">
<div class="container">
<div class="row">
	<div class="col-lg-4">
	<h4 class="l">Links</h4>
	<ul class="linkMenu">
                    <?php
                    $sql="select * from footer1";
                    $result=mysql_query($sql);
                    while($row=mysql_fetch_assoc($result))
                    {
                    ?>
                    <li><a href=""><?php echo $row['link_name']; ?></a></li>
                    <?php
                    }
                    ?>
    </ul>
	</div>
	<div class="col-lg-4">
	<h4 class="l">Follow Us</h4>
	<ul class="socialMenu">
                    <?php
                    $sql="select * from social_icon";
                    $result=mysql_query($sql);
                    while($row=mysql_fetch_assoc($result))
                    {
                    ?>
                    <li><img src="uploads/<?php echo $row['icon_image']; ?>" height="30px" width="30px"></li>
                    <?php
                    }
                    ?>
                    </ul>
	</div>
	<div class="col-lg-4">
	<h4 class="l">Newsletter</h4>
	<h5>Sign up for the latest news, offers and styles</h5>

    <input type="text" name="" placeholder="Your email" class="navinput"/></br>
    <inpu type="submit" name="" value="subscribe" class="subscribe"/>

    </div>
	
    </div>
		<div class="row">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4">
		<h5 class="Copyright">Copyright © 2017, Minimal Fashion Theme. Ecommerce Software by Shopify<h5>
		<div class="payment">
		<ul class="paymentMenu">
		                    <?php
		                    $sql="select * from payment_icon";
		                    $result=mysql_query($sql);
		                    while($row=mysql_fetch_assoc($result))
		                    {
		                    ?>
		                    <li><img src="uploads/<?php echo $row['icon_image']; ?>" height="30px" width="30px"></li>
		                    <?php
		                    }
		                    ?>
		</ul>
		</div>
		</div>
		<div class="col-lg-4">
		</div>
		</div>
</div>
<div class="footer">