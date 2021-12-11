<?php 
  include_once 'model/model.php';
  session_start();

  $email=$_POST['email'];
  $pass=$_POST['pass'];




  if ($email!='' && $pass!=''){
    $sql = "SELECT * FROM users WHERE (email=? AND password=?)";
    $stmtcheck = $db->prepare($sql);
    $result = $stmtcheck->execute([$email,$pass]);
    $user = $stmtcheck->fetchAll();
   
   
    if ($user) {
      $_SESSION['logged'] = true;
      echo 'found';
    }else {
      echo "Notfound";
    }
  }else {
    echo false;
  }

 

?>