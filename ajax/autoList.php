<!doctype html>
<html lang="en">
<head>
<style>
.navList li
{
  display: none;
}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
  $("document").ready(function () 
   {
        $("#box").on("keyup", function () 
        {                             
          var searchText = $(this).val();
          searchText = searchText.toLowerCase();

          /// \s+/g trime the input data before and after the text

          searchText = searchText.replace(/\s+/g, '');
          $('.navList li').each(function()
          {
                var currentLiText = $(this).text(),      
                showCurrentLi = ((currentLiText.toLowerCase()).replace(/\s+/g, '')).indexOf(searchText) !== -1;
                $(this).toggle(showCurrentLi);
          });
        
        });
    });
</script>
</head>
<body>
<label>Search name</label>
<input placeholder="Search Me" id="box" type="text">
<ul class="navList">
<?php
include('../connection.php');
$sql="select * from userinfo";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result))
{
?>
<li><?php echo $row['name']; ?></li>
<?php
}
?> 
</ul>
</body>
</html>