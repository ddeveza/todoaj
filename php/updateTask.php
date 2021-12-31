<?php include ('model/model.php');

$id = $_POST['id'];
$task = $_POST['task'];
$duedate = $_POST['duedate'];
/* $id =3;
$task = 'testing';
$duedate = "2020-12-31"; */

$sql = "UPDATE tasks SET task=?, duedate=? WHERE id=?";
$stmt= $db->prepare($sql);
$result = $stmt->execute([$task, $duedate, $id]);



if ($result ==1 ){
    echo $result;
}else {
    echo false;
}

/* if ($task!='' && $duedate!=''){

    if($forSave){
        echo "task updated";
    }else {
        echo "error";
    }

  }else {
      echo 'missing data';
  } */

?>