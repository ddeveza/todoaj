$(document).ready(function ()  {
  $("#signInModal").click(function () {
    $("#exampleModalLabel")[0].innerText = "Login into your account";
    $("#loginbutton")[0].innerText = "Sign In";
    $("#login").show();
    $("#register").hide();
    $("#exampleModal").modal("show");
  });

  $("#signUp").click(function () {
    $("#exampleModalLabel")[0].innerText = "Create account";
    $("#loginbutton")[0].innerText = "Sign Up";
    $("#login").hide();
    $("#register").show();
  });

  $("#signIn").click(function () {
    $("#exampleModalLabel")[0].innerText = "Login into your account";
    $("#loginbutton")[0].innerText = "Sign In";
    $("#register").hide();
    $("#login").show();
  });
});
