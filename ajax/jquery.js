$(document).ready(function()
{
	$("#submit").click(function()
	{
		var username=$("#username").val();	
		var password=$("#password").val();
		var confirm_password=$("#confirm_password").val();
		var email=$("#email").val();
		var gender=$("#gender").val();
		var hobby=$("#hobby").val();
		var language=$("#language").val();
	    var dataString = 'username='+ username + '&email='+ email + '&password='+ password + '&confirm_password='+confirm_password+'&gender='+gender+'&hobby='+hobby+'&language='+language;
		alert(dataString);
		$.ajax({
			type: "post",
			url:  "insert.php",
			data: dataString,
			success: function(){

			$("#msg").text("form submitted successfully");

			}

		});

		return false;

	});



});