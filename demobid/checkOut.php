<?php
session_start();
if(isset($_REQUEST['logout']))
{
     unset($_SESSION['email']);
     unset($_SESSION['firstName']);
     unset($_SESSION['lastName']);
     unset($_SESSION['address']);
}
include('connection.php');
if(isset($_REQUEST['sendOrder']))
{
	$firstName=$_REQUEST['firstName'];
	$lastName=$_REQUEST['lastName'];
	$address=$_REQUEST['address'];
	$email=$_REQUEST['email'];
  $error='';
  if($firstName=='')
  {
     $error .= "please enter first Name.</br>";

  }
  if($lastName=='')
  {
     $error .= "please enter last Name.</br>";
  }
  if($address=='')
  {
     $error .= "please enter address.</br>";
  }
  if($email=='')
  {
     $error .= "please enter email.</br>";
  }
  
  if(!$error)
  {
	$grandTotal=$_REQUEST['grandTotal'];
	$sql="insert into shipping_details(first_name,last_name,address,user_email) values('$firstName','$lastName','$address','$email')";
	$result=mysql_query($sql);
	$shippingID = mysql_insert_id();
	$shippingSql="select * from shipping_details where shipping_id='$shippingID'";
	$result=mysql_query($shippingSql);
	while($row=mysql_fetch_assoc($result))
	{
	  $_SESSION['email']=$row['user_email'];
		$_SESSION['firstName']=$row['first_name'];
		$_SESSION['lastName']=$row['last_name'];
		$_SESSION['address']=$row['address'];
	}
	
	$insertOrder = mysql_query("INSERT INTO orders(email, grand_total, shipping_address) VALUES ('$email','$grandTotal','$shippingID')");
        
      if($insertOrder)
      {
            $orderID = mysql_insert_id();
           
           foreach($_SESSION['cart'] as $id => $value) 
                    { 
                      
                      $quantity=$_SESSION['cart'][$id]['quantity'];
              $sql = "INSERT INTO order_items(order_id, product_id, quantity) VALUES ('$orderID','$id','$quantity')";
                      $insertOrderItems = mysql_query($sql);
                
                    } 
                    
            
		            if($insertOrderItems)
		            {
		              header("Location: orderSuccess.php?id=$orderID");
		            }
		            else
		            {
		                header("Location: cart.php");
		            }
	  }
  }
}
if(isset($_SESSION['cart']))
{?>
<!DOCTYPE html>  
     <html lang="en" class="no-js">  
     <head>  
            <meta charset="UTF-8" />  
            <title>Minimal-fashion.myshopifier.com</title>  
            <meta name="viewport" content="width=device-width, initial-scale=1.0">   
            <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />  
            <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />  
            <meta name="author" content="Codrops" />  
            <link rel="shortcut icon" href="../favicon.ico">   
            <link rel="stylesheet" type="text/css" href="css/demo.css" />  
            <link rel="stylesheet" type="text/css" href="css/style.css" />  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="js/validate.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
            <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
            <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
            <link href="generic.css" rel="stylesheet" type="text/css" />
      </head>
<form name="myform" method="post" id="registration">
<div class="checkout">
<table border="1">
<?php
//print_r($_SESSION['cart']);
	$sql="SELECT * FROM product WHERE product_id IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) 
                    { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY product_name ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
                    $_SESSION['total']=0;
                    while($row=mysql_fetch_array($query))
                    {
                    ?>
    		        <tr>
                <?php
                        $subtotal=$_SESSION['cart'][$row['product_id']]['quantity']*$row['product_price']; 
                        $totalprice+=$subtotal; 
                    ?>
                <td><h4>
              
              <?php 
              $_SESSION['total']=$_SESSION['total']+$_SESSION['cart'][$row['product_id']]['quantity'];
              echo $_SESSION['cart'][$row['product_id']]['quantity'];
              ?></h4></td>

            <td><img src="uploads/<?php echo $row['product_image'];?>" height="50px" width="50px"></td>  
		    <td><h4><?php echo $row['product_name'];?></h4></td> 
		      
				<td><h4>$
				<?php echo $_SESSION['cart'][$row['product_id']]['quantity']*$row['product_price'] ?>
				</h4></td>
				
        </tr>

              <?php
               }
               $sql="select * from shippingCharge";
               $result=mysql_query($sql);
               $row=mysql_fetch_assoc($result);
               if($row) 
               {
                  $shippingCost=$row['shipping_charges'];
                  if($totalprice>1000)
                  {
                      $shippingCost=0;
                  }
                  if($totalprice<200)
                  {
                    $shippingCost=2*$row['shipping_charges'];
                  }
                  
               }
               

               //$shippingCost=25; 
            ?>
            <tr>
            <td colspan="3"><h4>total</h4></td>
            <td><h4>$<?php echo $totalprice;?></h4></td>
            </tr>
            <tr>
            <td colspan="3"><h4>Shipping Cost</h4></td>
            <td><h4>$<?php echo $shippingCost;?></h4></td>
            </tr>
            <tr>
            <td colspan="3"><h4>Grand total</h4></td>
            <td><h4>$<?php 


            $grandTotal=$totalprice+$shippingCost;
            echo $grandTotal;
            ?></h4></td>
            </tr>
            <tr><td><input type="hidden" name="grandTotal" value="<?php echo $grandTotal;
            ?>"></td></tr>
           </table> 
           </div>   
<?php
}
?>
<div class="checkout">

<h3><p>Already have an account
<a href="login.php?id=1">Login</a>
</p></h3>
<h4>Customer Information</h4>	
<span class="error"><?php
if(isset($error))
{
  echo $error;
}

?></span>
</div>

<div class="row">
<div class="container">
<input type="text" name="email" value="<?php
if(isset($_SESSION['email']))
{
	echo $_SESSION['email'];
}
?>" placeholder="Enter email" class="input"><span class="error" id="e"></span></br>
<input type="submit" name="logout" value="Log Out" class='btn btn-primary w-100-pct'/></br>
<h3>Shipping Details</h3>
<input type="text" name="firstName" value="<?php
if(isset($_SESSION['firstName']))
{
	echo $_SESSION['firstName'];
}
?>" placeholder="First name" class="input"><span class="error" id="fname"></span></br>
<input type="text" name="lastName" value="<?php
if(isset($_SESSION['lastName']))
{
	echo $_SESSION['lastName'];
}
?>" placeholder="Last name" class="input"><span class="error" id="lname"></span></br>
<input type="text" name="address" value="<?php
if(isset($_SESSION['address']))
{
	echo $_SESSION['address'];
}
?>" placeholder="Address" class="input"></br>
<input type="submit" name="sendOrder" value="Send Order" class='btn btn-primary w-100-pct'>
</form>
</div>
</div>


