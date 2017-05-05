<?php
ini_set('display_errors',1);
error_reporting(~0);
?>
<!DOCTYPE html>
<html>
<body>
<form method="post">
	<label>Enter no of days between 3 to 20:</br>
	<input type="number" name="num" value="<?php if(isset($_REQUEST['num'])){echo $_REQUEST['num'];}?>" min="3" max="45"></br>
	</label>

		<label>Please select your non working days:</br>
		<select multiple="true" name="day[]">
		<option value="Monday"<?php if(in_array("Monday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Monday</option>
		<option value="Tuesday"<?php if(in_array("Tuesday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Tuesday</option>
		<option value="Wednesday"<?php if(in_array("Wednesday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Wednesday</option>
		<option value="Thrusday"<?php if(in_array("Thrusday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Thrusday</option>
		<option value="Friday"<?php if(in_array("Friday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Friday</option>
		<option value="Saturday"<?php if(in_array("Saturday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Saturday</option>
		<option value="Sunday"<?php if(in_array("Sunday",$_REQUEST['day']))
		{
			echo selected;
		}?>>Sunday</option>
		</select>
			</br>
			</label>
			
			<input type="submit" name="submit" value="submit"></br>
			</label>

</form>

<?php

if(isset($_REQUEST['submit']))
{
 
$day_array = array("Monday","Tuesday","Wednesday","Thrusday","Friday","Saturday","Sunday");

$num=$_REQUEST['num'];

$days=$_REQUEST['day'];


$t=date('d-m-Y');
$todays_day= date("D",strtotime($t));
echo "Today is".$todays_day."</br>";
$pos=array_search($todays_day.'day', $day_array);
$length=count($day_array);
$count=0;
for($i=0;$i<$length;$i++)
{
 	$value =$day_array[ ($pos+$i) % $length ];

 	if($count<$num)
 	{
		    if(in_array($value, $days))
			{

				 $num++;

			}
			else
			{
				$count++;
			}
    }
     
}


$startdate=strtotime($todays_day);

$enddate=strtotime('+'.$num.'days', $startdate);

$last_date=date("M d Y",$enddate);


$timestamp = strtotime($last_date);
$delivery_day=date('D', $timestamp);
echo "Delivery day ".$delivery_day."<br>";
echo $last_date;


}

?>

</body>
</html>
