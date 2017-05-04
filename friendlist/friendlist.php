<!DOCTYPE html>
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet"  href="../style.css">
  
</head>
<body>
<?php
session_start();
if(isset($_SESSION["userid"]))
{
	$active=0;
	$friend=0;
     
    $userid=$_SESSION["userid"];
   
    include('../connection.php');
    include('../validate.php');
   
    $sql="select * from userinfo where id=$userid ";
   
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    if($row)
    {
   ?>
			<div>
			<h1 style="color: white">Welcome  <?php $username=$row["name"]; echo $username;?>
			<img src="../uploads/<?php echo $row['image']; ?>" height="70px" width="70px">
				
			    <a href="../logout.php" class="list">Log out</a>
			    <a href="friendlist/friendlist.php" class="list">Friend List</a>
			</h1>
			</div>  
	<?php
	}

    ?> 

<form method="post">

			<div class="container">
					<div class="row friend">

						<div class="col-lg-4 list1">
						<h1>Friend list</h1>

					<?php
                        
					 $sql="select request_id from FriendRequest where (sender_id=$userid ||receiver_id=$userid) and active=1 and friend=1";
					 $result=mysql_query($sql);
						if($row=mysql_fetch_assoc($result))
						{
							$friendlist=1;
						}
						else
						{
							$friendlist=0;
						}

							if(isset($_REQUEST['acceptid']))
							{
								$acceptid=base64_decode($_REQUEST['acceptid']);
								$sql="update FriendRequest set friend=1 where receiver_id=$userid and sender_id=$acceptid";
								
								$query=mysql_query($sql);
								if(mysql_affected_rows()>0)
								{
									
								}
							}
							if(isset($_REQUEST['pendingid']))
							{
								$pendingid=base64_decode($_REQUEST['pendingid']);
								$sql="update FriendRequest set active=0 where receiver_id=$userid and sender_id=$pendingid";
								
								$query=mysql_query($sql);
								if(mysql_affected_rows()>0)
								{
									
								}
							}

							if($friendlist)
							{?>
						
						<table border="1" class="mytable">
						<tr>
							<th>Name</th>
							<th>Image</th>
							<th>Remove Friend</th>
						</tr>

						<?php

						$sql="SELECT u.id,u.name,u.image FROM `userinfo` AS u INNER JOIN `FriendRequest` AS f ON u.id=f.sender_id  where f.receiver_id=$userid  and f.friend=1";
						//print_r($sql);

						$result=mysql_query($sql);
						while($row=mysql_fetch_assoc($result))
						{?>
							                        <tr>
						 							<td><?php echo $row['name']; ?></td>
						 							<td><img src="../uploads/<?php echo $row['image']; ?>" height="50px" width="50px"/></td>
						 							<td><a href="friendlist.php?removeid=<?php echo base64_encode($row['id']); ?>">Remove Friend</tr>
						 							</tr>


						<?php
						 } 

						$sql="SELECT u.id,u.name,u.image FROM `userinfo` AS u INNER JOIN `FriendRequest` AS f ON u.id=f.receiver_id  where f.sender_id=$userid  and f.friend=1";
						//print_r($sql);
						$result=mysql_query($sql);
						while($row=mysql_fetch_assoc($result))
						{?>
							                        <tr>
						 							<td><?php echo $row['name']; ?></td>
						 							<td><img src="../uploads/<?php echo $row['image']; ?>" height="50px" width="50px"/></td>
						 							<td><a href="friendlist.php?removeid=<?php echo base64_encode($row['id']); ?>">Remove Friend</tr>
						 							</tr>


						<?php
						 } 

                      ?>

						</table>

					    <?php }
					    else
					    {
					    	echo "no friend";
					    }

						if(isset($_REQUEST['removeid']))
						{
								$removeid=base64_decode($_REQUEST['removeid']);
								//$sql="update FriendRequest set friend=0,active=0 where receiver_id=$userid and sender_id=$removeid";
								$sql="delete from FriendRequest where (receiver_id=$userid and sender_id=$removeid) ||(sender_id=$userid and receiver_id=$removeid) and friend=1";
								$query=mysql_query($sql);
								if(mysql_affected_rows()>0)
								{
									
								}
						}

							?>
							
						</div>
						<div class="col-lg-4 list2">
						<h1>Search friend</h1>

						   <label>
											<input type="text" class="text" name="friendname" value="" placeholder="search friend by name">
										    <input type="submit" style="color: black" name="search" value="search">
						   </label></br>
						   <label>

						   
						   	<?php

						   	if(isset($_POST['search']))
 						   {
 										

 	                         $friendname=$_POST['friendname'];
 	                         $sql="select id,name,image from userinfo where name like '%$friendname%' ";
 							 $result=mysql_query($sql);
 							 while($row=mysql_fetch_assoc($result))
 							 {
	 							 $fid=$row['id'];
	 							 //echo $fid;


 						$selectsql="select * from FriendRequest where ((sender_id='$userid' and receiver_id='$fid') ||(sender_id='$fid' and receiver_id='$userid')) and (friend=1||active=1)"; 
 						//print_r($selectsql);
 					

 						$myresult=mysql_query($selectsql);
 						$newrow=mysql_fetch_assoc($myresult);	
 						

                               if($newrow || $userid==$row['id'])
	                              {
	                              	
	                              	echo "Request has already send to  ".$row['name']."  or already in friend list";

	                              }
                          
	                               else
	                              {?>

                              	<table border="1" class="mytable">
 										<tr>
 										<th>Name</th>
 										<th>Image</th>
 										<th>Send Request</th>
 										</tr>
 										<tr>
 										 	<td><?php echo $row['name']; ?></td>
 											<td><img src="../uploads/<?php echo $row['image']; ?>" height="50px" width="50px"/></td>
 										<td><a href="friendlist.php?thisid=<?php echo base64_encode($row['id']); ?>">Send Request</td></tr>
 										
 									    </table>
 									<?php

 								  }
 								
 						}



 					}




                               if(isset($_REQUEST['thisid']))
 								{

                             
 									
 						    $revid=base64_decode($_REQUEST['thisid']);
 						    echo $revid;

 							
 							        $sql="insert into FriendRequest(sender_id,receiver_id,active) values('$userid','$revid','1')";
 							       
 									$result=mysql_query($sql);
		 									if(mysql_affected_rows()>0)
		 									{
		 									
		 									echo "request send";

		 									}
		                              
		 						}
                         ?>

						   </label>
						</div>
						<div class="col-lg-4 list3">
						<h1>Friend request</h1>

<?php
$sql="select * from FriendRequest where receiver_id=$userid and active=1 and friend=0";
$result=mysql_query($sql);
if($row=mysql_fetch_assoc($result))
{
	$friendrequest=1;
}
else
{
	$friendrequest=0;
}
if($friendrequest)
{?>
						<table border="1" class="mytable">
                           <tr>
							<th>Name</th>
							<th>Image</th>
							<th>Accept</th>
							<th>Not Now</th>
						  </tr>

<?php
      
      $sql="SELECT u.id,u.name,u.image FROM `userinfo` AS u INNER JOIN `FriendRequest` AS f ON u.id=f.sender_id 
      where f.receiver_id=$userid and f.active=1 and f.friend=0";
      $result=mysql_query($sql);
						 while($row=mysql_fetch_assoc($result))
						 {?>
						 	
 							<tr>
 							<td><?php echo $row['name']; ?></td>
 							<td><img src="../uploads/<?php echo $row['image']; ?>" height="50px" width="50px"/></td>
 							<td><a href="friendlist.php?acceptid=<?php echo base64_encode($row['id']); ?>">Accept Request</td>
 							<td><a href="friendlist.php?pendingid=<?php echo base64_encode($row['id']); ?>">Not Now</tr>
						<?php
						 } ?>
						 </table>
<?php
}
else
{
	echo "no friend request";
}
						 
						?>
						
						</div>
					</div>
			</div>
			</form>
}
<?php
}

	//print_r($newrow);
 						   
 						   /*$arr = array();
 							if(){
 								$arr[] = "asdfas";
 							}else{
 								$arr[] = "abs";
 							}
 							print_r($arr); */

?>