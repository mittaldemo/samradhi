<?php
$output = '';
if(isset($_POST["query"]))
{
	
 include('connection.php');
 $search =trim($_POST["query"]);
 $query = "SELECT * FROM product WHERE product_name LIKE '%".$search."%'";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result))
	 {
       $output=$row['product_name'];
       $output .= '
     <h1 class="search-heading"></h1>';
 	echo $output;
     }
  
}
?>
