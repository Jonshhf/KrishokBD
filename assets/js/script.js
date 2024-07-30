function GetTodaysMarketPrice()
{
    $("#Content").hide(300);

    $.get("API/GetTodaysMarketPrice.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}