 var loader="<center>অনুগ্রহপূর্বক অপেক্ষা করুন . . . <br><img src='images/loader2.gif' height='120px;' width='350px;' style='opacity:0.5;'> </center> ";
 var base_url = "krisokBD/KrishokBD";
 var PageContent = {};
 
 function navigate(page,data)
 {
        var url="/"+base_url+"/"+page;
        history.pushState({page:page},'',url);
        PageContent[page]=data;
 }

 document.addEventListener('DOMContentLoaded', function() {
    var HomeContent = document.getElementById('Content').innerHTML;
    navigate('Home', HomeContent);
});

/*
window.addEventListener('beforeunload', function (event) { 
    this.alert('Hi');
    navigate('index.html', HomeContent);
});
*/

window.addEventListener('popstate', function (event) {
     debugger;
     var CurrentPage=getLastPartOfURL();
     var CurrentContent=PageContent[CurrentPage];
     $("#Content").html(CurrentContent);
});

function getLastPartOfURL() {
    const url = window.location.pathname;
    return url.substring(url.lastIndexOf('/') + 1);
}

function removeLastPartOfURL() {
    const url = window.location.pathname;
    const newURL = url.substring(0, url.lastIndexOf('/'));
    history.replaceState(null, '', newURL);
    location.reload();
}

function GetTodaysMarketPrice()
{
    
     $("html, body").animate({ scrollTop: 0 }, "slow");
     $("#Content").html(loader);

    $.get("API/GetTodaysMarketPrice.php", function(data, status){
        $("#Content").html(data);
        $("#Content").show(300);
        navigate('Products',data);
    });
}

function GetTypes(ProductId)
{
   
     $("html, body").animate({ scrollTop: 0 }, "slow");
     $("#Content").html(loader);

    var dataString='ProductId='+ProductId;

    $.ajax({
        type: "POST",
        url: "API/GetTypes.php",
        data: dataString,
        cache: false,
        success: function(html) {
          $("#Content").html(html);
          $("#Content").show(300);
          navigate('Products_Type',html);
        }
    });
}

function GetDivisions(ProductId,productTypeId)
{
   
     $("html, body").animate({ scrollTop: 0 }, "slow");
     $("#Content").html(loader);

    var dataString='ProductId='+ProductId+'&productTypeId='+productTypeId;

    $.ajax({
        type: "POST",
        url: "API/GetDivisions.php",
        data: dataString,
        cache: false,
        success: function(html) {
          $("#Content").html(html);
          $("#Content").show(300);
          navigate('Divisions',html);
        }
    });
}

function GetDistrictWisePrice(divisionId,productId,productTypeId)
{

    var dataString='divisionId='+divisionId+"&productId="+productId+"&productTypeId="+productTypeId;

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