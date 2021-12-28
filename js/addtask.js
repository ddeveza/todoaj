$(document).ready(function () {
  $("#saveTaskModal").click(function () {
    var taskname = $("#taskname").val();
    var duedate = $("#duedate").val();
    console.log("im clicked add");
    $.ajax({
      type: "post",
      url: "php/addtask.php",
      data: {
        taskname: taskname,
        duedate: duedate,
      },
      success: function (data) {
        console.log(data);
        if (data == "task created") {
          swal("Missing credential!", "Note: You must complete all input fields", "success").then((res) => {
            if (res) {
              //window.location = "http://localhost:81/todog1/Home.php";
              $('#taskTable').DataTable().ajax.reload(); // ito para magrealod ung table
             
               
            }

          });

          $('#taskModal').modal('hide');
          $("#taskname").val('');
          $("#duedate").val('');
         
      
        } else if (data == "error") swal("Missing credential!", "Note: You must complete all input fields", "error");
        else if (data == "missing data") swal("Missing credential!", "Note: You must complete all input fields", "warning");
      },
    });
  });
});
