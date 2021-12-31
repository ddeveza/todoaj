<?php include ('model/model.php');

$id = $_POST['id'];
$task = $_POST['task'];
$duedate = $_POST['duedate'];
$checked = $_POST['checkbox'];
$status = 'ongoing';

if ($checked == 'true') {
    $status = 'completed';
}else {
    $secs = strtotime( $duedate) - strtotime(date('Y/m/d')) ;// == <seconds between the two times>
    $days = $secs / 86400;
    if ($days < 0){
        $status = "past due date";
    }else {
        $status = 'ongoing';
    }
}



/* $id =3;
$task = 'testing';
$duedate = "2020-12-31"; */

$sql = "UPDATE tasks SET task=?, duedate=? , status=? WHERE id=?";
$stmt= $db->prepare($sql);
$result = $stmt->execute([$task, $duedate,$status, $id]);



if ($result ==1 ){
    echo $result;
}else {
    echo false;
}
?>