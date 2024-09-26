function updatePrice(id,product_id,product_type_id,division_id,district_id,date,e)
{
   var newPrice = e.innerText;

   if (id == 0) {
      var sql = `INSERT INTO district_wise_price (product_id, product_type_id, division_id, district_id, date, price) 
           VALUES ('${product_id}', '${product_type_id}', '${division_id}', '${district_id}', '${date}', '${newPrice}');`;
   } else {
    var sql = `UPDATE district_wise_price 
           SET price = '${newPrice}' 
           WHERE id = '${id}' 
           AND product_id = '${product_id}' 
           AND product_type_id = '${product_type_id}' 
           AND division_id = '${division_id}' 
           AND district_id = '${district_id}' 
           AND date = '${date}';`;
   }
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