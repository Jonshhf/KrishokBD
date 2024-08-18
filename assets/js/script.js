 var loader="<center>অনুগ্রহপূর্বক অপেক্ষা করুন . . . <br><img src='images/loader2.gif' height='120px;' width='350px;' style='opacity:0.5;'> </center> ";

function GetTodaysMarketPrice()
{
   
    
     $("html, body").animate({ scrollTop: 0 }, "slow");
     $("#Content").html(loader);

    $.get("API/GetTodaysMarketPrice.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}


function GetDivisions(ProductId)
{
   
     $("html, body").animate({ scrollTop: 0 }, "slow");
     $("#Content").html(loader);

    var dataString='ProductId='+ProductId;

    $.ajax({
        type: "POST",
        url: "API/GetDivisions.php",
        data: dataString,
        cache: false,
        success: function(html) {
          $("#Content").html(html);
          $("#Content").show(300);
        }
    });
}

function GetDistrictWisePrice(divisionId,productId)
{

    var dataString='divisionId='+divisionId+"&productId="+productId;

    $.ajax({
        type: "POST",
        url: "API/GetDistrictWisePrice.php",
        data: dataString,
        cache: false,
        success: function(html) {
            $('.modal-body').html(html);
        }
    });
}