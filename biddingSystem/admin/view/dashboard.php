<?php
include('header.php');
$funObj=new myFunction();
  if(isset($_REQUEST['userid']))
    {
        $userid=base64_decode($_REQUEST['userid']);
        $select=$funObj->display($userid);
        if($select)
        {
          
           $username=$_SESSION['name'];
           $email=$_SESSION['email'];
           $password=$_SESSION['password'];
           $confirm_password=$_SESSION['confirm_password'];
        }

    }
?>



            <div class="container">  
                  
                  
                
                <section>               
                    
                    <div id="container_demo" >  
                         
                        <a class="hiddenanchor" id="toregister"></a>  
                        <a class="hiddenanchor" id="tologin"></a>  
                        <div id="wrapper">  
                            <div id="login" class="animate form">  
                               <form name="login" method="post" action="" enctype="multipart/form-data">  
                                    <h1>Add product</h1> 
                                    <p><?php echo $add; ?></p> 
                                    <p>   
                                        <label class="youmail" data-icon="e">Product Name</label>  
                                        <input id="prodName" name="prodName" type="text" placeholder="" />   
                                    </p>  
                                <p>   
                                   <label for="password" class="youpasswd" data-icon="p">Product image </label> 
                                    <input id="password" name="prodImage" type="file"/>   
                                </p>  
                                    
                                    <p class="login button">   
                                        <input type="submit" name="addProduct" value="Add" />   
                                    </p>  
                                    <p class="change_link">  
                                        
                                        <a href="#toregister" name="showProd" class="to_register">Show product List</a>  
                                    </p>  
                                </form>  
                            </div>  
      
                            <div id="register" class="animate form">  
                                <form name="login" method="post" action="" onsubmit="return myScript()">  
                                    <h1>Product List:</h1> 
                                    <p><?php echo $show; ?></p>   
                                    <table border="1">
                                    <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    </tr>
                                    </table> 
                                     
                                    <p class="change_link">    
                                        
                                    <a href="#tologin" class="to_register">Add product</a>  
                                    </p>  
                                </form>  
                            </div>  
                              
                        </div>  
                    </div>    
                </section>  
            </div>  
        </body> 
</html>  
