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
        SaveNews(response);
        // You can do something with the URL, like display it to the user
      },
      error: function(xhr, status, error) {
        console.error("Error uploading image: " + error);
      }
    });
}

