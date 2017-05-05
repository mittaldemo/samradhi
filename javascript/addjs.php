<html>
	<head>
	<script type="text/javascript">
	function addNumber()
	{
	
	var firstNumber=document.getElementById('firstNumber').value;
	var secondNumber=document.getElementById('secondNumber').value;
	var result=parseInt(firstNumber)+parseInt(secondNumber);
    document.getElementById('result').value=result;
    document.getElementById('message').innerText="Result is";
    document.getElementById('divResult').innerText=result;
	}
	function onblurCall()
	{
	   var firstNumber=document.getElementById('firstNumber');
	   var secondNumber=document.getElementById('secondNumber');
	   firstNumber.style.color="red";
	}
	function onfocusCall()
	{
		var firstNumber=document.getElementById('firstNumber');
	   var secondNumber=document.getElementById('secondNumber');
	   firstNumber.style.color="blue";
	}
	
	</script>
	</head>
	<body>
		<div>
			<p>
			<label>First Number</label>
			<input type="text" name="firstNumber" id="firstNumber" value="">
			</p>
			<p>
			<label>Second Number</label>
			<input type="text" name="secondNumber" id="secondNumber" value="">
			</p>
			<p>
			<label></label>
            <input type="button" name="add" id="add" value="Result" onclick="return addNumber()">
            </p>
            <p>
            <label></label>
            <input type="text" name="result" id="result" value="">
            </p>
		</div>
		<label id="message"></label> 
	    <div id="divResult">
		</div>
	</body>
</html>