<?php
session_start();
if(isset($_SESSION["userid"]))
{
     
    $userid=$_SESSION["userid"];
   
    include('connection.php');
    include('validate.php');
    $sql="select * from userinfo where id=$userid ";
   
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    if($row)
    {
        $langarray=explode(',',$row['language']);
		$hoobbyarray=explode(',',$row['hobbies']);

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet"  href="style.css">
<!--<script type="text/javascript" src="script.js"></script>-->
</head>
<body>

<div>
<h1 style="color: white">Welcome  <?php echo $row["name"]; ?>
<img src="uploads/<?php echo $row['image']; ?>" height="70px" width="70px">
	
    <a href="logout.php" class="list">Log out</a>
    <a href="friendlist/friendlist.php" class="list">Friend List</a>
    </h1>
</div>
<div class="registration">
 

<fieldset>
<legend>Update form</legend>

	<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data">
			<span class="required">* Require fields</span></br>
             <span><?=@$updatemsg?></span>
            <input type="hidden" name="userid" value="<?php echo $row['id'];?>">
			<label for="name"><span class="myspan">Name:<span class="required">*</span></span>
			<input type="text" class="input-field"  name="username" value="<?=@$row['name']?>">
             <span class="required"><?=@$nameerror?></span>
            </label>
            <label for="email"><span class="myspan">Email<span class="required">*</span></span>
			<input type="text" class="input-field" name="email" value="<?=@$row['email']?>" />
			<span id="email" class="required"><?=@$emailerror?></span>
			</label>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" name="password" value="<?=@$row['password']?>" />
			<span id="pass" class="required"><?=@$passerror?></span>
			</label>

<label for="confirm-password"><span class="myspan">Confirm Password<span class="required">*</span></span>
			<input type="password" class="input-field" name="confirm_password" value="<?=@$row['confirm_password']?>" />
			<span id="cpass" class="required"><?=@$cpasserror?></span>
			</label>

			<label for="hobies"><span class="myspan">Hobies</span>
			<select name="hobby[]" multiple="true" class="select-field">
			<option value="Reading" <?php if(in_array("Reading", $hoobbyarray))
			{
               echo "selected";
			}?>
			>Reading</option>
			<option value="Playing"<?php if(in_array("Playing", $hoobbyarray))
			{
               echo "selected";
			}?>>Playing</option>
			<option value="Music"<?php if(in_array("Music", $hoobbyarray))
			{
               echo "selected";
			}?>>Music</option>
			</select>
			</label>
 
            <span  class="required"><?=@$hobbyerror?></span>
			
			<label for="gender"><span class="myspan">Gender<span class="required">*</span></span>
			<input type="radio"  name="gender" value="male"<?php if($row['gender']=='male'){echo checked;}  ?>>Male</input>
			<input type="radio"  name="gender" value="female"<?php if($row['gender']=='female'){echo checked;}  ?>>Female</input>
			
			</label>

			<span id="gender" class="required"><?=@$gendererror?></span>

				  
			<label for="language"><span class="myspan">Language<span class="required">*</span></span>
			<input type="checkbox" name="lang[]" value="Hindi"<?php if(in_array("Hindi", $langarray))
			{
               echo "checked";
			}?>/>Hindi
			<input type="checkbox" name="lang[]" value="English"<?php if(in_array("English", $langarray))
			{
               echo "checked";
			}?>/>English
			<input type="checkbox" name="lang[]" value="Others"<?php if(in_array("Others", $langarray))
			{
               echo "checked";
			}?>/>Others
			
			</label>

			<span id="language" class="required"><?=@$languageerror?></span>

			<label for="file"><span class="myspan">Image<span class="required">*</span></span>
			<img src="uploads/<?php echo $row['image']; ?>" height="50px" width="50px">
	        <input type="file" name="profilepic" value="">
			
			</label>

			<span id="profilepic" class="required"><?=@$imageerror?></span>
			
			</br>

			<input type="submit" class="input-field" name="update" value="update" />

        <?php 

         }
        ?>

			</form>
   
</fieldset>

</div>

<?php

}
else
{
	header("location:login.php");
}
?>
</body>
</html>