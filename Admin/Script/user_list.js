function updateDelivery(oid,e)
{
  var delivery=$(e).is(":checked")==true?"checked":"";

  if(confirm('Are You Sure?')){

  var dataString="delivery="+delivery+"&oid="+oid;

  $.ajax({
    type: "POST",
    url: "Model/updateorder.php",
    data: dataString,
    cache: false,
    success: function(html) {
    
     // alert(html);

      getcontent('order');
    
    }
    });

  }
  else{
    getcontent('order');
  }

}





function orderdetails(oid)
{

  
  //var redirectWindow =window.open('../Recipt/orderrecipt.php?orderid='+oid+'','_blank');
  //redirectWindow.location;
  //window.reload();

  window.location.href="../Recipt/orderrecipt.php?orderid="+oid;
  /*
 // alert(ip);
  
  var dataString = 'ip=' + ip;

$.ajax({
type: "POST",
url: "Model/getcart.php",
data: dataString,
cache: false,
success: function(html) {

//alert(html);
// document.getElementById("modal-body").innerHTML = html;
 
window.location.href="../Recipt/orderrecipt.php";


}
});

*/

}