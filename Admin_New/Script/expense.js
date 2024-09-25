
function savedata()
{ 
       var userid=0;

       var expense_for=$('#expense_for').val();
       var amount=$('#amount').val();
       var date=$('#date').val();
       
       if(expense_for=="" || amount=="" || date=="")
       {
           alert("Please Insert Data !");
       }
       else{

       if(id==0){
        var sql="INSERT INTO expense (userid,expense_for,amount,expense_date) VALUES ("+userid+",'"+expense_for+"','"+amount+"','"+date+"')";
       }
       else{
        var sql = "UPDATE expense SET expense_for='"+expense_for+"', amount='"+amount+"', expense_date='"+date+"' WHERE id="+id;
       }
      
       save(sql);

       id=0;

       ScrollToTop();
       
       }
   
}

function updatedata(updateid,e)
{
  
  id=updateid;

  var row=$(e).closest('tr');

  $expense_for=row.find('.expense_for').text();
  $amount=row.find('.amount').text();
  $date=row.find('.expense_date').text();
  

  $('#expense_for').val($expense_for);
  $('#amount').val($amount);
  $('#date').val($date);

  ScrollToBottom();

}
