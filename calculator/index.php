<html>
<head>
<script>
function addInput() 
{

   var myDiv = document.createElement('div');
   var inputHTML ="<input name='number'></input>";
   myDiv.innerHTML = inputHTML;
  
    document.getElementById('newdynamicInput').appendChild(myDiv);
	
    var choices = ["Addition", "Substraction","Multiplication","Division"];
    
    var newDiv = document.createElement('div');
    
    var selectHTML = "<select name='operator'>";
    
    for(i = 0; i < choices.length; i = i + 1) 
    {
        selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
    }

    selectHTML += "</select>";
    newDiv.innerHTML = selectHTML;
  
   document.getElementById('dynamicInput').appendChild(newDiv);
    return true;
    
}
function displayInput()
{

    var oplength = document.getElementsByName("operator").length;
    var nolength = document.getElementsByName("number").length;
    var firstno=document.getElementById('firstno').value;
    
            if(document.getElementsByName("operator")[0].value=="Addition")
             {
             var result=parseFloat(firstno)+parseFloat(document.getElementsByName("number")[0].value);
             }

             
               else if(document.getElementsByName("operator")[0].value=="Substraction")
               {
 
               var result=parseFloat(firstno)-parseFloat(document.getElementsByName("number")[0].value);
               }
               
               else if(document.getElementsByName("operator")[0].value=="Division")
                   {
                    var result=parseFloat(firstno)/parseFloat(document.getElementsByName("number")[0].value);
                   }
               
               
            
                  else if(document.getElementsByName("operator")[0].value=="Multiplication")
                   {

                   var result=parseFloat(firstno)*parseFloat(document.getElementsByName("number")[0].value);
                   }
    var i;
    
    for (i = 1; i < oplength; i++) 
    {


         switch(document.getElementsByName("operator")[i].value)
        {
          
           case "Addition":
             
             var result=result+parseFloat(document.getElementsByName("number")[i].value);
                 break;
             
             
            
        case "Substraction":

            
             var result=result-parseFloat(document.getElementsByName("number")[i].value);
               break;
            
        
         case "Division":
            
             
             var result=result/parseFloat(document.getElementsByName("number")[i].value);
             break;
             
            case "Multiplication":
            
            var result=result*parseFloat(document.getElementsByName("number")[i].value);
                break;
           
        }   
        
    }
    
    //alert(result);
    document.getElementById('message').innerHTML="Result is  ";
    document.getElementById('result').innerHTML=result;

   return true;
}


</script>

</head>


<body>
<form class="new" method="post" action="/jobs">
    <div id="dynamicInput">
    
    </div>
    <div id="newdynamicInput">
        <input type="text"  id="firstno" value=""/>
    </div>
     
    

    <input type="button" value="Add Number" onclick="return addInput();" />
    <input type="button" value="Result" onclick="return displayInput();" />
    </br>
    <span id="message">
        
    </span>
    <span id="result">
        
    </span>

</form>



</body>
</html>