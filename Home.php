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
$(document).on('click', '.view', function() {
    alert('hello');
    alert($(this).attr('id'));

});
</script>