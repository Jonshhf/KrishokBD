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


function saveImageProductType(){

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
      SaveProductsType(response);
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
           else if(table=='products_type')
           {
            GetProductType();
           }
           else if(table=='users')
           {
             GetUsers();
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
      var divisionId = $(e).val();
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
    var product_type_id=$('#type').val();
    var division_id=$('#division').val();
    var district_id=$('#district').val();
    var date=$('#date').val();
    var price=$('#price').val();
   

    var dataString='division_id='+division_id+'&district_id='+district_id+'&id='+PriceId+"&date="+date+"&price="+price+"&product_id="+product_id+"&product_type_id="+product_type_id;

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



function GetProductType()
{
  $.ajax({
    type: "POST",
    url: "API/GetProductType.php",
    data: "",
    cache: false,
    success: function(html) {
      $('.content-wrapper').html(html);
      let table = new DataTable('#productTbl');
    }
    });
}



var ProductTypeId=0;
function SaveProductsType(image_url)
{
    var product_id=$('#product').val();
    var name=$('#name').val();
   
    var is_active=$('#isactive').is(":checked");
    if(is_active)
    {
        is_active=1;
    }
    else{
        is_active=0;
    }
    var dataString='name='+name+'&is_active='+is_active+'&id='+ProductTypeId+"&image_url="+image_url+"&product_id="+product_id;

    $.ajax({
        type: "POST",
        url: "API/saveProductsType.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           ProductTypeId=0;
           GetProductType();
           window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
}



function EditProductType(id,e)
{
    ProductTypeId=id;
    var row = $(e).closest('tr');
    var name=row.find('.name').text();
    var product_name=row.find('.product_name').text();
    var is_active=row.find('.is_active').text();

    $('#name').val(name);
  
    if(is_active=="Inactive"){
       $( "#isactive" ).prop( "checked", false );
    }
    else
    {
        $( "#isactive" ).prop( "checked", true );
    }
    
     $('#product option').each(function() {
        if ($(this).text() === product_name) {
          $(this).prop('selected', true);
        }
     });
  
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
}

function get_product_type(e) {
  var productId = $(e).val();
  if (productId) {
      $.ajax({
          url: 'API/get_product_type.php',
          type: 'POST',
          data: {product_id: productId},
          success: function(data) {
              $('#type').html(data);
          }
      });
  } else {
      $('#type').html('<option value="" selected disabled>Select Type</option>');
  }
}



function GetUsers()
{
  $.ajax({
    type: "POST",
    url: "API/GetUsers.php",
    data: "",
    cache: false,
    success: function(html) {
      $('.content-wrapper').html(html);
      let table = new DataTable('#userTbl');
    }
    });
}




var UserId=0;
function SaveUsers()
{
    var username=$('#username').val();
    var password=$('#password').val();
    var division_id=$('#division_id').val();
   
    var is_active=$('#isactive').is(":checked");
    if(is_active)
    {
        is_active=1;
    }
    else{
        is_active=0;
    }
    var is_super_admin=$('#is_super_admin').is(":checked");
    if(is_super_admin)
    {
      is_super_admin=1;
    }
    else{
      is_super_admin=0;
    }
    var dataString='username='+username+'&is_active='+is_active+'&id='+UserId+"&password="+password+"&division_id="+division_id+"&is_super_admin="+is_super_admin;

    $.ajax({
        type: "POST",
        url: "API/saveUsers.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           UserId=0;
           GetUsers();
           window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
}


function EditUser(id,e)
{
    ProductTypeId=id;
    var row = $(e).closest('tr');
    var username=row.find('.username').text();
    var password=row.find('.password').text();
    var division_name=row.find('.division_name').text();
    var is_active=row.find('.is_active').text();

    $('#username').val(username);
    $('#password').val(password);
  
    if(is_active=="Inactive"){
       $( "#isactive" ).prop( "checked", false );
    }
    else
    {
        $( "#isactive" ).prop( "checked", true );
    }
    
     $('#division_id option').each(function() {
        if ($(this).text() === division_name) {
          $(this).prop('selected', true);
        }
     });
  
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
}



function updateProductOrderNo(id,element) {
  var updatedValue = element.innerText;
  var sql= "update products set order_no="+updatedValue+" where id="+id;
  save(sql);
}

function updateProductTypeOrderNo(id,element) {
  var updatedValue = element.innerText;
  var sql= "update products_type set order_no="+updatedValue+" where id="+id;
  save(sql);
}


function save(sql)
{

var sql=encodeURI(sql);
var dataString="sql="+sql;

$.ajax({
  type: "POST",
  url: "API/execute.php",
  data: dataString,
  cache: false,
  success: function(html) {
     //alert(html);
  }
});
function GetNotice() {

  $.ajax({
    type: "POST",
    url: "API/GetNotice.php",
    data: "",
    cache: false,
    success: function(html) {
      $('.content-wrapper').html(html);
     let table = new DataTable('#noticeTbl');
    }
    });
}

function SaveNotice()  {

    var text=$('#text').val();
    var area='header';
   
   
    var dataString='text='+text+'&area='+area;

    $.ajax({
        type: "POST",
        url: "API/SaveNotice.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           GetNotice();
           window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

  }







}



