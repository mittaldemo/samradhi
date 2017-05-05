<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>  
     <html lang="en" class="no-js">  
     <head>  
            <meta charset="UTF-8"/>  
            <title>Minimal-fashion.myshopifier.com</title>  
            <meta name="viewport" content="width=device-width, initial-scale=1.0">   
            <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />  
            <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />  
            <meta name="author" content="Codrops" />  
            <link rel="shortcut icon" href="../favicon.ico">   
            <link rel="stylesheet" type="text/css" href="css/demo.css" />  
            <link rel="stylesheet" type="text/css" href="css/style.css" />  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="js/validate.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
            <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
            <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
            <link href="generic.css" rel="stylesheet" type="text/css" />
        </head>  
        <script type="text/javascript">
          $(document).ready(function() 
            {

              load_data();

                     $('#menu-nav li').hover(function() 
                     {
                      $('ul', this).slideDown('fast');
                     }, function() 
                     {
                      $('ul', this).slideUp('fast');
                     });
                     $('#search-image').click(function()
                     {

                      var searchData= $('#search-text-input').val();
                     
                      window.location = 'searchName.php?searchName=' + searchData;
                     });



                   function load_data(query)
                   {
                        $.ajax({
                         url:"search.php",
                         method:"POST",
                         data:{query:query},
                         success:function(data)
                         {
                            $('#srcname').html(data);
                         }
                    });
                  }
                   $('#search-text-input').keyup(function()
                   {
                    var search = $(this).val();
                    if(search != '')
                    {
                     load_data(search);
                    }
                    else
                    {
                     load_data();
                    }
                   });

            });  
            
</script>
        <body>

        <div class="row">
            <div class="nav">
                <div class="container">
                    <div class="col-lg-8">

        <input type='text' name="search" id="search-text-input" value=""/></br>
        
                    <div id='button-holder'>
                        <img src="uploads/search.png" id="search-image" /></br>

                    </div>
                    </div>
                    <div class="col-lg-4 nav-menu">
                    <ul >
                    <li><a href="login.php">Login</a></li>
                    <li>or</li>
                    <li><a href="register.php">Create Account</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="cart.php"><img src='uploads/cart.png'  id='button-holder'/></a></li>
                    <li><a href="">
                    <?php
                    if(isset($_SESSION['total']))
                    {
                        echo  $_SESSION['total'];
                    }
                    ?></a></li>
                    
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="container">
              <div id="srcname">
                </div>
                </div>
        </div>
        <div class="row">
                <header>
                    <div class="container"> 
                    <div class="col-lg-4">
                    <?php
                    $sql="select * from logo where logo_id=1";
                    $result=mysql_query($sql);
                    
                    while($row=mysql_fetch_assoc($result))
                    {
                        
                    ?>
                    <img src="uploads/<?php echo $row['logo_image']; ?>" id="logo">
                    <?php
                    }
                    ?>
                    </div>
                    <div class="col-lg-8">
                    <ul id="menu-nav">

                    <?php
                   $sql="select * from menu where menu_name!='Home' order by menu_id desc ";
                   $result=mysql_query($sql);
                   while($row=mysql_fetch_assoc($result))
                    {
                    ?>
                    <li class="list">
                        <a href=""><?php echo $row['menu_name']; ?></a>
                    <?php
                    $res_pro=mysql_query("SELECT * FROM sub_menu WHERE main_menu_id=".$row['menu_id']);
                                 ?>
                                        <ul class="sub-menu">    
                                  <?php  
                                  while($pro_row=mysql_fetch_assoc($res_pro))
                                  {
                                   ?><li><a href=""><?php echo $pro_row['sub_menu_name']; ?></a></li><?php
                                  }
                                  ?>
                                 </ul>
                       
                    </li>
                    <?php
                    }
                    ?>
                    <li class="list"><a href="index.php">Home</a></li> 
                    </ul>
                    </div>
                    </div>  
                </header>  
                <hr style="border:1px solid #dddddd"></hr>
        </div>  
