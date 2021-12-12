<?php 
  include_once 'model/model.php';
  session_start();



  //1. kukunin lahat ng data from addtask modal - OK 
  //2. anu ung mga data ? taskname , duedata from front end - OK
  //3. anu pa ung mga kulang na data ? 
        //a. id - no neeed to code kasi auto increment sya sa database - OK
        //b. email - dapat isave mo na agad  sa session kapg naka-log in -  OK
        //c. date created - isearch natin panu kunnin ung date today sa php - OK 
        //d status - creating task automatic "ongoing", "completed" , "past due date"
        
  $taskname=$_POST['taskname'];
  $duedate=$_POST['duedate'];
  $email = $_SESSION['emailuser'];    
  $datecreated =date("Y/m/d");


  $secs = strtotime( $duedate) - strtotime($datecreated) ;// == <seconds between the two times>
  $days = $secs / 86400;
  $status = "ongoing";
  
  if ($taskname!='' && $duedate!=''){

    if ($days < 0){
        $status = "past due date";
    }

    $sql = "INSERT INTO tasks(email, task, status, datecreated, duedate) VALUES (? , ?,? , ?,? )";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([ $email,$taskname,$status,$datecreated, $duedate]);

    if($result){
        echo "task created";
    }else {
        echo "error";
    }

  }else {
      echo 'missing data';
  }
?>