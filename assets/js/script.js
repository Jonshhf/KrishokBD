function GetTodaysMarketPrice()
{
    $("#Content").hide(300);

    $.get("API/GetTodaysMarketPrice.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}

function Getpaddy()
{
    $("#Content").hide(300);

    $.get("API/GetPaddy.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}

function GetCorn()
{ 
    $("#Content").hide(300);

    $.get("API/GetCorn.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}


function GetOnion()
{
    $("#Content").hide(300);

    $.get("API/GetOnion.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}

function GetRosun()
{
    $("#Content").hide(300);

    $.get("API/GetRosun.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}

function GetPotato()
{
    $("#Content").hide(300);

    $.get("API/GetPotato.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}

function GetGinger()
{
    $("#Content").hide(300);

    $.get("API/GetGinger.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
    });
}
