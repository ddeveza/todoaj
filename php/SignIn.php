<?php 
  include_once 'model/model.php';
  session_start();

  $email=$_POST['email'];
  $pass=$_POST['pass'];

/*   $email='ddeveza@ymail.com';
  $pass='123'; */


  if ($email!='' && $pass!=''){
    $sql = "SELECT * FROM users WHERE (email=? AND password=?)";
    $stmtcheck = $db->prepare($sql);
    $result = $stmtcheck->execute([$email,$pass]);
    $user = $stmtcheck->fetchAll(PDO::FETCH_ASSOC);
    
   /*  echo var_dump($user);
    echo $user[0]['firstname'].' '.$user[0]['lastname']; */
    if ($user) {
      $_SESSION['logged'] = true;
      $_SESSION['user'] = $user[0]['firstname'].' '.$user[0]['lastname'];
      $_SESSION['emailuser'] = $email;
      

      echo 'found';
    }else {
      echo "Notfound";
    }
  }else {
    echo false;
  }

 

?>