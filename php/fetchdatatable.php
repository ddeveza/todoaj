<?php 
include_once 'model/model.php';
 session_start();
 
 $email = $_SESSION['emailuser'];
 

 $sql = "SELECT * FROM tasks WHERE (email=?)";
 $stmtcheck = $db->prepare($sql);
 $result = $stmtcheck->execute([$email]);
 $user = $stmtcheck->fetchAll(PDO::FETCH_ASSOC);


 
 if ($user){
    $rows = array('data' =>  array() );

    foreach($user as $value) {
        $ID = $value['id'];
        $action = '<button type="button" class="btn btn btn-warning view" id="'.$ID.'">EDIT</button>'.'<button type="button" class="btn btn btn-danger delete" id="'.$ID.'">DELETE</button>';
        $rows['data'][] = array(
            $value['id'],
            $value['task'],
            $value['datecreated'],
            $value['duedate'],
            $value['datecompleted'],
            $value['status'],
            $action

        );
    }
    
    echo json_encode($rows);

 }else {
     echo 'No data';
 }



?>