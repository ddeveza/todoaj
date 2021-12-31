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

       

        if ($value['status'] != 'completed'){
            $secs = strtotime( $value['duedate']) - strtotime(date("Y/m/d")) ;// == <seconds between the two times>
            $days = $secs / 86400;
        
            if ($days < 0){
                $status1 = "past due date";
            }else{
                $status1 = "ongoing";
            }
            
        }else {
            $status1 = "completed";
        }
      
         ///update status
         $sqlStatus = "UPDATE tasks SET status=? WHERE id=?";
         $stmtStatus = $db->prepare($sqlStatus);
         $stmtStatus->execute([$status1, $value['id']]); 

        $ID = $value['id'];


        $action = '<button type="button" class="btn btn btn-warning editBtn" id="'.$ID.'">EDIT</button>'.'<button type="button" class="btn btn btn-danger deleteBtn" id="'.$ID.'">DELETE</button>';
        $rows['data'][] = array(
            $value['id'],
            $value['task'],
            $value['datecreated'],
            $value['duedate'],
            $value['datecompleted'],
            $status1,
            $action

        );
    }
    
    echo json_encode($rows);

 }else {
     echo 'No data';
 }



?>