function validate()
{
	var name=document.forms["myform"]["name"].value;
	var email=document.forms["myform"]["email"].value;
	var pass=document.forms["myform"]["pass"].value;
	var cpass=document.forms["myform"]["cpass"].value;
	var gender=document.forms["myform"]["gender"].value;
	var image=document.forms["myform"]["file"].value;
	var valid=true;
	if(name=='')
	{
		document.getElementById('name').innerHTML="please enter name";
		valid=false;
	}
	else
	{
		document.getElementById('name').innerHTML="";
	}
	if(email=='')
	{
		document.getElementById('email').innerHTML="please enter email";
		valid=false;

		
	}
	else
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(email) == false) 
	    {
	        	document.getElementById('email').innerHTML="please enter valid email";
			     valid=false;
	            
	    }
	    else
	   {
		document.getElementById('email').innerHTML="";
	    }
	}
	
	if(pass=='')
	{
		document.getElementById('pass').innerHTML="please enter password";
		valid=false;
	}
	else
	{
		if(pass.length>15||pass.length<8)
		{
			document.getElementById('pass').innerHTML="please enter password length between 8 to 15";
		    valid=false;

		}
		else
	   {
		document.getElementById('pass').innerHTML="";
	     }
	}
	if(cpass=='')
	{
		document.getElementById('cpass').innerHTML="please enter confirm password";
		valid=false;
	}
	else
	{
		if(pass!=cpass)
		{
			document.getElementById('cpass').innerHTML="password does not match";
		    valid=false;

		}
		else
	   {
		document.getElementById('cpass').innerHTML="";
	    }
	}
	if(gender=='')
	{
		document.getElementById('gender').innerHTML="please enter gender";
		valid=false;
	}
	else
	{
		document.getElementById('gender').innerHTML="";
	}
	if(document.myform.lang1.checked == false && document.myform.lang2.checked == false && document.myform.lang3.checked == false)
	{
		document.getElementById('language').innerHTML="please enter atlease one language";
		valid=false;
	}
	else
	{
		document.getElementById('language').innerHTML="";
	}
	if(image=='')
	{
		document.getElementById('image').innerHTML="please enter image";
		valid=false;
	}
	else
	{
		document.getElementById('image').innerHTML="";
	}
	
	return valid;
}