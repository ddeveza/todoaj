<?php 
  include_once 'model/model.php';

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];


  if ($fname!='' && $lname!='' && $email!='' && $pass!=''){
    $sql = "INSERT INTO users(firstname , lastname,email , password) VALUES (? , ?,? , ? )";
    $stmtinsert = $db->prepare($sql);
  
    $result = $stmtinsert->execute([ $fname,$lname,$email,$pass]);
   
  
    if ($result) {
      echo true;
    }else {
      echo false;
    }
  }else {
    echo false;
  }

 

?>