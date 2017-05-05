function myScript()
{

	var uname=document.getElementById('usernamesignup').value;
	var email=document.getElementById('emailsignup').value;
    var password=document.getElementById('passwordsignup').value;
    var confirm_password=document.getElementById('passwordsignup_confirm').value;
	var check=true;	
	if(uname=='')
	{
		document.getElementById('username').innerHTML="please enter user name";
		check=false;
	}
	if(email=='')
	{
		document.getElementById('email').innerHTML="please enter email";
		check=false;
	}
	if(password=='')
	{
		document.getElementById('password').innerHTML="please enter password";
		check=false;
	}
	if(confirm_password=='')
	{
		document.getElementById('confirm_password').innerHTML="please enter confirm password";
		check=false;
	}
	return true;
}