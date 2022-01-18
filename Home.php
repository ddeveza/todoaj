<?php 

session_start();

    if(!isset($_SESSION['logged'])){
        header("Location: index.php");
    }

    
    $name = $_SESSION['user'];
    


    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <?php include_once 'plugins/plugins.php'?>
</head>

<body>
    <?php include_once 'component/navbarLogged.php'?>
    <br>
    <br>
    <br>
    <h1>Welcome ,<?php echo $name;?></h1>
    <div>
        <?php include_once 'component/Table.php'?>
    </div>
    <!-- Added Chart JS  -->
    <div id='testing'>
        <?php include_once 'chart/chart.php'?>
    </div>
    <!-- End of  Chart JS  -->
    <?php include_once 'component/Team.php'?>
</body>

</html>

<script>
$('#logout').click(function() {

    $.ajax({
        url: "php/LogOut.php",
        success: function(data) {
            window.location = 'index.php';
        }
    });
});
</script>


<script>
var myTable;
$(document).ready(function() {
    myTable = $('#taskTable').DataTable({
        "processing": true,
        'ajax': {
            "url": "/todog1/php/fetchdatatable.php",
            "error": function(xhr, error, code) {
                console.log('No Task Added Yet')
                swal("No Task Available Yet!", "Note: Click Create for the new task", "info")
            }

        },
    });
    $('#openTaskModal').click(function() {
        $('#taskModal').modal('show');
    })
    $('#closeTaskModal').click(function() {
        $('#taskModal').modal('hide');
    })

});
</script>
<script type="text/javascript" src="js/addtask.js"></script> <!-- addtask -->


<script>
$(document).on('click', '.editBtn', function(event) {
    var id = $(this).attr('id');
    $.ajax({
        url: "php/getTask.php",
        type: "post",
        data: {
            id: id
        },
        success: function(data) {
            //console.log(JSON.parse(data));
            var forEdit = JSON.parse(data);
            //console.log(forEdit[0]);
            $('#id').val(forEdit[0].id);
            $('#_taskname').val(forEdit[0].task);
            $('#_duedate').val(forEdit[0].duedate);
            $('#editTaskModal').modal('show');

        }
    });

    $('#closeEditModal').click(function() {
        $('#editTaskModal').modal('hide');
    });
});

$(document).on('click', '#saveEditModal', function() {
    var id = $('#id').val();
    var task = $('#_taskname').val();
    var duedate = $('#_duedate').val();
    var checkbox = $('#flexCheckChecked').prop("checked");



    $.ajax({
        url: "php/updateTask.php",
        type: "post",
        data: {
            id: id,
            task: task,
            duedate: duedate,
            checkbox: checkbox
        },
        success: function(data) {
            console.log(data);
            if (data) {
                swal("Successfully Saved!", "Your task has been updated.", "success")
                    .then((res) => {
                        if (res) {

                            $('#taskTable').DataTable().ajax.reload();

                            reload();
                        }

                    });

                $('#editTaskModal').modal('hide');
                /*  $("#taskname").val('');
                 $("#duedate").val(''); */


            } else swal("Missing credential!", "Note: You must complete all input fields", "error");

        },
    });
});

$(document).on('click', '.deleteBtn', function() {
    var id = $(this).attr('id');
    $('#confirmDelete').addClass(id);
    $('#deleteTask').modal('show');
});
$(document).on('click', '#closeDelete', function() {
    $('#deleteTask').modal('hide');
});
$(document).on('click', '#confirmDelete', function() {
    var id = $('#confirmDelete').attr('class');
    var splitClass = id.split(" ");
    var getID = splitClass[splitClass.length - 1];
    $.ajax({
        url: "php/deleteTask.php",
        type: "post",
        data: {
            id: getID,
        },
        success: function(data) {
            if (data) {


                swal("Successfully Deleted!", "Note: You must complete all input fields", "success")
                    .then((res) => {
                        if (res) {
                            $('#taskTable').DataTable().ajax.reload();
                            reload();
                        }

                    });

                $('#deleteTask').modal('hide');
            }

        },
    });
});
</script>