<?php 
  include_once 'model/model.php';

  $taskname=$_POST['taskname'];
  $duedate=$_POST['duedate'];

  if ($fname!='' && $lname!='' && $email!='' && $pass!=''){

    $sqlCheckEmail = "SELECT * FROM users WHERE (email=?)";
    $stmtcheck = $db->prepare($sqlCheckEmail);
    $result = $stmtcheck->execute([$email]);
    $userFound = $stmtcheck->fetchAll(PDO::FETCH_ASSOC);

    if ($userFound){
      echo 'User existing';  
    }else {
      $sql = "INSERT INTO users(firstname , lastname,email , password) VALUES (? , ?,? , ? )";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([ $fname,$lname,$email,$pass]);
     
    
      if ($result) {
        echo 'User Created';
      }

    }


  }else {
    echo 'missing data';
  }

 

?>