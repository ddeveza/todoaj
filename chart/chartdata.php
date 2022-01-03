<?php 
 include_once '../php/model/model.php';
 session_start();

 //$email = $_SESSION['emailuser'];
 $ongoing = 0;
 $completed = 0;
 $pastdue = 0;

 $email = "ddeveza@ymail.com";
 $sql = "SELECT * FROM tasks WHERE (email=?)";
 $stmtcheck = $db->prepare($sql);
 $result = $stmtcheck->execute([$email]);
 $datas = $stmtcheck->fetchAll(PDO::FETCH_ASSOC);


 foreach($datas as $data) {
    switch ($data['status']) {
        case 'completed':
          $completed += 1;
          break;
        case 'ongoing':
            $ongoing += 1;
          break;
        case 'past due date':
            $pastdue += 1;
          break;
      }
 }

 $dataProgress = [
     'completed'=>$completed,
     'ongoing'=>$ongoing,
     'pastdue'=>$pastdue
 ];

/*  print "<pre>";
 //print_r(json_encode($data));
 print_r(json_encode($dataProgress));
 print "</pre>"; */

 echo json_encode($dataProgress);

?>