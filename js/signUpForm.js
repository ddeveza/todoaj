$(document).ready(function () {
  $("#loginbutton").click(function () {
    var loginmode = $(this)[0].innerText;

    if (loginmode === "Sign Up") {
      var fname = $("#firstname").val();
      var lname = $("#lastname").val();
      var email = $("#email").val();
      var pass = $("#password").val();

      $.ajax({
        type: "post",
        url: "php/SignUp.php",
        data: {
          fname: fname,
          lname: lname,
          email: email,
          pass: pass,
        },
        success: function (data) {
          if (data == "User Created") {
            swal("Successfully Registered!", "You may now create task", "success").then((res) => {
              if (res) {
                $("#firstname").val("");
                $("#lastname").val("");
                $("#email").val("");
                $("#password").val("");
                $("#exampleModalLabel")[0].innerText = "Login into your account";
                $("#loginbutton")[0].innerText = "Sign In";
                $("#login").show();
                $("#register").hide();
              }
            });
          } else if (data == "missing data") {
            swal("Missing credential!", "Note: You must complete all input fields", "error");
          } else if (data == "User existing") {
            swal("Email already exist!", "Note: Please try to use another  email", "error");
          }else{
            console.log(data);
          }
        },
      });
    }
  });
});
