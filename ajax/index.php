<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet"  href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="jquery.js"></script>
</head>
<body>
<div class="registration">
 

<fieldset>
<legend>Regsistration form</legend>
	
	
		<form  method="post" name="myform" id="validate-form" enctype="multipart/form-data">
			<span class="required">* Require fields</span></br>
			<span class="required" id="msg"></span>	

			<label for="name"><span class="myspan">Name:<span class="required">*</span></span>
			<input type="text" class="input-field" id="username" name="username" value="<?=@$username?>"/>
             <span class="required"><?=@$nameerror?></span>
            </label>
            	
            <label for="email"><span class="myspan">Email <span class="required">*</span></span>
			<input type="text" class="input-field" id="email" name="email" value="<?=@$email?>" />
			<span id="email" class="required"><?=@$emailerror?></span>
			</label>

			<label for="password"><span class="myspan">Password <span class="required">*</span></span>
			<input type="password" class="input-field" id="password" name="password" value="<?=@$password?>" />
			<span id="pass" class="required"><?=@$passerror?></span>
			</label>

			<label for="confirm-password"><span class="myspan">Confirm Password<span class="required">*</span></span>
			<input type="password" class="input-field" id="confirm_password" name="confirm_password" value="<?=@$confirm_password?>" />
			<span id="cpass" class="required"><?=@$cpasserror?></span>
			</label>

			<label for="hobies"><span class="myspan">Hobies<span class="required">*</span></span>
			<select name="hobby[]" id="hobby" multiple="true" class="select-field">
			<option value="Reading">Reading</option>
			<option value="Playing">Playing</option>
			<option value="Music">Music</option>
			</select>
			</label>
          
            <span  class="required"><?=@$hobbyerror?></span>

			<label for="gender"><span class="myspan">Gender<span class="required">*</span></span>
			<input type="radio"  name="gender" id="gender" value="male"<?php if($gender=='male'){echo checked;}  ?>>Male</input>
			<input type="radio"  name="gender"  id="gender" value="female"<?php if($gender=='male'){echo checked;}  ?>>Female</input>
			
			</label>

			<span id="gender" class="required"><?=@$gendererror?></span>

				  
			<label for="language"><span class="myspan">Language<span class="required">*</span></span>
			<input type="checkbox" name="lang[]" id="lang" value="Hindi"/>Hindi
			<input type="checkbox" name="lang[]" id="lang" value="English"/>English
			<input type="checkbox" name="lang[]" id="lang" value="Others"/>Others
			
			</label>

			<span id="language" class="required"><?=@$languageerror?></span>

			<label for="file"><span class="myspan">Image<span class="required">*</span></span>
			<input type="file" name="profilepic" id="profilepic" value="">
			
			</label>
			<span id="profilepic" class="required"><?=@$imageerror?></span>
			</br>


			<input type="submit" class="input-field" id="submit" name="submit" value="submit" />
          
          </form>

</fieldset>

</div>

</body>
</html>