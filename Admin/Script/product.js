
// Image Brows ........................................

$(document).on("click", ".browse", function() {
  var file = $(this)
  .parent()
  .parent()
  .parent()
  .find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
  // get loaded data and render thumbnail.
  document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});

var imag_name="";

$("#image-form").on("submit", function() {
  debugger;
  $.ajax({
    type: "POST",
    url: "imageUpload/ajax/action.ajax.php",
    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false, // To send DOMDocument or non processed data file it is set to false
    async:false,
    success: function(data) {

      imag_name=data;
   
    },
    error: function(data) {


    }
  });

  });


function savedata()
{ 
       var userid=$('#userid').val();
       var Productname=$('#Product').val();

       $("#image-form").submit();

       if(id==0){
           var sql="INSERT INTO products (name,image_url) VALUES ('"+Productname+"','"+imag_name+"')";
       }
       else{
        if(imag_name==""){
           var sql = "UPDATE products SET name='"+Productname+"' WHERE id="+id;
        }
        else{
          var sql = "UPDATE products SET name='"+Productname+"',image_url='"+imag_name+"' WHERE id="+id;
        }
       }
      
       save(sql);

       id=0;

       
       ScrollToTop();
   
}

function updatedata(updateid,e)
{

  id=updateid;
  
  var row=$(e).closest('tr');

  $Productname=row.find('.Productname').text();

  $('#Product').val($Productname);

  
  ScrollToBottom();

}


function update_orderNo(id,e)
{
    var value=$(e).val();
    
    var sql="update products set order_no="+value+" where id= "+id;
    save(sql);
}

function update_active(id,e)
{
    var value=$(e).is(":checked");
    is_active=value==true?1:0;
    var sql="update products set is_active="+is_active+" where id= "+id;
    save(sql);
}