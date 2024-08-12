function checkCredential()
{
    var username=$('#username').val();
    var password=$('#password').val();

    if(username=='' || password=='')
    {
        alert("Please Insert UserName & Password!");
    }
    else{
    
        var dataString="username="+username+"&password="+password;

        $.ajax({
            type: "POST",
            url: "API/checkCredential.php",
            data: dataString,
            cache: false,
            success: function(html) {
               if(html=="1"){
                window.location.href = "Home.php";
               }
               else{
                alert("Wrong Username or Password!");
               }
               
            }
            });

    }
}



function saveImage(){

    var file = $("#imageInput")[0].files[0];
    if(file==undefined)
    {
      SaveProducts("");
    }
    else
    {
    var formData = new FormData();
    formData.append('image', file);

    $.ajax({
      url: 'API/saveImage.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        console.log("Image uploaded successfully. URL: " + response);
        SaveProducts(response);
        // You can do something with the URL, like display it to the user
      },
      error: function(xhr, status, error) {
        console.error("Error uploading image: " + error);
      }
    });
  }
}


function GetProductList()
{
  $.ajax({
    type: "POST",
    url: "API/GetProductList.php",
    data: "",
    cache: false,
    success: function(html) {
      $('.content-wrapper').html(html);
      let table = new DataTable('#productTbl');
    }
    });
}


var ProductId=0;
function SaveProducts(image_url)
{
    var name=$('#name').val();
   
    var is_active=$('#isactive').is(":checked");
    if(is_active)
    {
        is_active=1;
    }
    else{
        is_active=0;
    }
    var dataString='name='+name+'&is_active='+is_active+'&id='+ProductId+"&image_url="+image_url;

    $.ajax({
        type: "POST",
        url: "API/saveProducts.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           ProductId=0;
           GetProductList();
           window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
}


function Delete(id,table)
{

  if(confirm('Are You Sure?')){

    dataString='id='+id+'&table='+table;

    $.ajax({
        type: "POST",
        url: "API/delete.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           if(table=='products'){
             GetProductList();
           }
           else{
              GetPrice();
           }
        }
    });
  }
}


function EditProduct(id,e)
{
    ProductId=id;
    var row = $(e).closest('tr');
    var name=row.find('.name').text();
    
    var is_active=row.find('.is_active').text();

    $('#name').val(name);
  
    if(is_active=="Inactive"){
       $( "#isactive" ).prop( "checked", false );
    }
    else
    {
        $( "#isactive" ).prop( "checked", true );
    }
    
     $('#category_id option').each(function() {
        if ($(this).text() === category_name) {
          $(this).prop('selected', true);
        }
     });
  
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
}


function GetPrice()
{
  $.ajax({
    type: "POST",
    url: "API/GetPrice.php",
    data: "",
    cache: false,
    success: function(html) {
      $('.content-wrapper').html(html);
      let table = new DataTable('#priceTbl');
    }
  });
}



  function get_districts(e) {
      console.log("Hi");
      var divisionId = $(e).val();
      console.log(divisionId);
      if (divisionId) {
          $.ajax({
              url: 'API/get_districts.php',
              type: 'POST',
              data: {division_id: divisionId},
              success: function(data) {
                  $('#district').html(data);
              }
          });
      } else {
          $('#district').html('<option value="" selected disabled>Select District</option>');
      }
  }


var PriceId=0;
function savePrice()
{
    var product_id=$('#product').val();
    var division_id=$('#division').val();
    var district_id=$('#district').val();
    var date=$('#date').val();
    var price=$('#price').val();
   

    var dataString='division_id='+division_id+'&district_id='+district_id+'&id='+PriceId+"&date="+date+"&price="+price+"&product_id="+product_id;

    $.ajax({
        type: "POST",
        url: "API/savePrice.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           PriceId=0;
           GetPrice();
           window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
}
