

function savedata()
{ 
  
  var shopname=$("input[name=shopname]").val();
 /* var tagline=$("input[name=tagline]").val(); 
  var address= $("input[name=address]").val(); 
  var mobileno= $("input[name=mobileno]").val();
  var website= $("input[name=website]").val();
  var facebook= $("input[name=facebook]").val(); 
  var username= $("input[name=username]").val();
  var password= $("input[name=password]").val();*/
  

  var dataString="text="+shopname; //+"&tagline="+tagline+"&address="+address+"&mobileno="+mobileno+"&website="+website+"&facebook="+facebook+"&username="+username+"&password="+password;

  $.ajax({
    type: "POST",
    url: "Model/updateinfo.php",
    data: dataString,
    cache: false,
    success: function(html) {
    
      alert(html);
    
    }
    });


   
}



// Update ....................................................
