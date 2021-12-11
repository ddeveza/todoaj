$(document).ready(function () {
    $("#loginbutton").click(function () {
      var loginmode = $(this)[0].innerText;
  
      if (loginmode === "Sign In") {
      
        var email = $("#SignInEmail").val();
        var pass = $("#SignInPass").val();
  
        $.ajax({
          type: "post",
          url: "php/SignIn.php",
          data: {
            email:email,
            pass:pass
          },
          success: function (data) {
            
            if(data){
              if(data == 'found'){
                window.location = 'Home.php'
              }else {
                swal("Wrong credentials!", "Note: Password and Email did not match", "warning");
              }
            }else{
              swal("Missing credentials!", "Note: You must complete all input fields", "error");
            }
              
          },
        });
      }
    });
  });
  