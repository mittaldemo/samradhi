<html>
<head>
<style type="text/css">
	#h1, #h2
	{
		display: none;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{
		$("#slidedown").click(function()
		{
		$("#h1").slideToggle();
		$("#h2").slideDown();
	    });
		$("#slideup").click(function()
		{
			$("#h1").slideUp("slow");
			$("#h2").slideUp("slow");
		});
	});
</script>
	</head>
<body>
<div id="h1">Hello i am samradhi</div>
<div id="h2">This is CIS</div>
<input type="button" id="slidedown" value="slideDown">
<input type="button" id="slideup" value="slideUp">
</body>
</html>