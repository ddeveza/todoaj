<?php include ('model/model.php');

/* $id = 3; */
$id = $_POST['id'];

$sql = "DELETE FROM tasks WHERE id=?";
$stmt= $db->prepare($sql);
$result = $stmt->execute([$id]);



if ($result == 1 ){
    echo $result;
}else {
    echo false;
}
?>