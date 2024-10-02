function updatePrice(pid,product_id,product_type_id,division_id,district_id,date,e)
{
   var newPrice = e.innerText;

   var sql = `delete from district_wise_price  
           WHERE product_id = '${product_id}' 
           AND product_type_id = '${product_type_id}' 
           AND division_id = '${division_id}' 
           AND district_id = '${district_id}' 
           AND date = '${date}';`;

   console.log(sql);

   saveWithoutMessage(sql);

   var sql = `INSERT INTO district_wise_price (product_id, product_type_id, division_id, district_id, date, price) 
           VALUES ('${product_id}', '${product_type_id}', '${division_id}', '${district_id}', '${date}', '${newPrice}');`;
   
   console.log(sql);
   saveWithoutMessage(sql);
}



function get_districts(e) {
  var divisionId = $(e).val();
  if (divisionId) {
      $.ajax({
          url: 'Model/get_districts.php',
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

function LoadData()
{
   var division_id=$('#division').val();
   var district_id=$('#district').val();
   var date=$('#date').val();

   if(division_id==null || district_id==null || date=="")
   {
     alert("Please Insert Data!");
   }
   else{
    param="?division_id="+division_id+"&district_id="+district_id+"&date="+date;
    getcontent('price_entry',param);
   }

}