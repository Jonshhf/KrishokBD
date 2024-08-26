function GetTodaysMarketPrice()
{
    $("#Content").hide(300);

    $.get("API/GetTodaysMarketPrice.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}


function GetDivisions(ProductId)
{
    $("#Content").hide(300);

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
function package()
{
    $("#Content").hide(300);

    $.get("API/package.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}