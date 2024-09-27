
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
       var UserName=$('#UserName').val();
       var Password=$('#Password').val();
       var DivisionName=$('#DivisionName').val();

       if(id==0){
           var sql="INSERT INTO users (username,password,division_id) VALUES ('"+UserName+"','"+Password+"','"+DivisionName+"')";
       }else{
           var sql = "UPDATE users SET username='"+UserName+"',password='"+Password+"',division_id='"+DivisionName+"' WHERE id="+id;
       }
      
       save(sql);

       id=0;

       
       ScrollToTop();
   
}

function updatedata(updateid,e)
{

  id=updateid;
  
  var row=$(e).closest('tr');

  $UserName=row.find('.UserName').text();
  $('#UserName').val($UserName);

  $Password=row.find('.Password').text();
  $('#Password').val($Password);


  $DivisionName=row.find('.DivisionName').text();
  console.log($DivisionName);
  $("#DivisionNames option:contains(" + $DivisionName + ")").attr('selected', 'selected').change();

  ScrollToBottom();

}


function update_superadmin(id,e)
{
  var value=$(e).is(":checked");
  is_super_admin=value==true?1:0;
  var sql="update users set is_super_admin="+is_super_admin+" where id= "+id;
  save(sql);
}

function update_active(id,e)
{
    var value=$(e).is(":checked");
    is_active=value==true?1:0;
    var sql="update users set is_active="+is_active+" where id= "+id;
    save(sql);
}