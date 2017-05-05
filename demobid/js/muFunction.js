       function validation()
       {
        
        var firstName=document.forms['myform']['firstName'].value;
        
        
        var lastName=document.forms['myform']['lastName'].value;
        
        var email=document.forms['myform']['email'].value;
      
       var bool=true;
       
        var password=document.forms['myform']['password'].value;

        var bool=true;
          if(firstName=='')
          {
              document.getElementById('fname').innerHTML="please enter first name";
              bool=false;
          }
          if(lastName=='')
          {
              document.getElementById('lname').innerHTML="please enter last name";
              bool=false;
          }
          if(email=='')
          {
              document.getElementById('e').innerHTML="please enter email";
              bool=false;
          }
          if(password=='')
          {
              document.getElementById('p').innerHTML="please enter password";
              bool=false;
          }
          
          
          return bool;
       }