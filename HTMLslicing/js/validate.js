function validate()
{
	var name=document.getElementById('name').value;
	
	var userName=document.getElementById('userName').value;
	var password=document.getElementById('password').value;
	var address=document.getElementById('address').value;
	var department=document.getElementById('department').value;
	var gender=document.getElementById('gender').value;
	var salary=document.getElementById('salary').value;
	var str='';
	if(name=='' || userName=='' || password=='' ||address=='' || department=='' || gender=='' || salary=='')
	{
		if(name=='')
		{
			
			str +="please enter name <br>";

		}
		if(password=='')
		{
			
			str +="please enter password <br>";
		}	
		if(address=='')
		{
			str +="please enter address <br>";
			
		}
		if(department=='')
		{
			str +="please select department <br>";
			
		}
		if(gender=='')
		{
			str +="please select gender <br>";
			
		}
		if(salary=='')
		{
			str +="please enter salary <br>";
			
		}
		if(userName=='')
		{
			str +="please enter user name <br>";
			
		}
		document.getElementById('message').innerHTML=str;
		return false;
	}
	return true;
	
}