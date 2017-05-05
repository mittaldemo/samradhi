<?php 
include('validate.php');
?>
<!DOCTYPE html>
<head>

<meta charset="utf-8">
<title></title>
<link rel="stylesheet"  href="style.css">
<!--<script type="text/javascript" src="script.js"></script>-->
</head>
<body>

<div class="registration">
 

<fieldset>
<legend>Regsistration form</legend>
	
	
		<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data">
			<span class="required">* Require fields</span>
				

			<label for="name"><span class="myspan">Name:</span>
			<input type="text" class="input-field"  name="username" value="<?=@$username?>"/>
             <span class="required"><?=@$nameerror?></span>
            </label>
            	
            <label for="email"><span class="myspan">Email <span class="required">*</span></span>
			<input type="text" class="input-field" name="email" value="<?=@$email?>" />
			<span id="email" class="required"><?=@$emailerror?></span>
			</label>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" name="password" value="<?=@$password?>" />
			<span id="pass" class="required"><?=@$passerror?></span>
			</label>

			<label for="confirm-password"><span class="myspan">Confirm Password<span class="required">*</span></span>
			<input type="password" class="input-field" name="confirm_password" value="<?=@$confirm_password?>" />
			<span id="cpass" class="required"><?=@$cpasserror?></span>
			</label>

			<label for="hobies"><span class="myspan">Hobies<span class="required">*</span></span>
			<select name="hobby[]" multiple="true" class="select-field">
			<option value="Reading">Reading</option>
			<option value="Playing">Playing</option>
			<option value="Music">Music</option>
			</select>
			</label>
          
            <span  class="required"><?=@$hobbyerror?></span>

			<label for="gender"><span class="myspan">Gender<span class="required">*</span></span>
			<input type="radio"  name="gender" value="male"<?php if($gender=='male'){echo checked;}  ?>>Male</input>
			<input type="radio"  name="gender" value="female"<?php if($gender=='male'){echo checked;}  ?>>Female</input>
			
			</label>

			<span id="gender" class="required"><?=@$gendererror?></span>

				  
			<label for="language"><span class="myspan">Language<span class="required">*</span></span>
			<input type="checkbox" name="lang[]" value="Hindi"/>Hindi
			<input type="checkbox" name="lang[]" value="English"/>English
			<input type="checkbox" name="lang[]" value="Others"/>Others
			
			</label>

			<span id="language" class="required"><?=@$languageerror?></span>

			<label for="file"><span class="myspan">Image<span class="required">*</span></span>
			<input type="file" name="profilepic" value="">
			
			</label>

			<span id="profilepic" class="required"><?=@$imageerror?></span>
			</br>


			<input type="submit" class="input-field" name="submit" value="submit" />
          
          </form>

</fieldset>

</div>

</body>
</html>