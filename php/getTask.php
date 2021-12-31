<?php include ('model/model.php');

$id = $_POST['id']; //1


//echo $id;

$sql = "SELECT * FROM tasks WHERE (id=?)";
 $stmtcheck = $db->prepare($sql);
 $result = $stmtcheck->execute([$id]);
 $forEdit = $stmtcheck->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($forEdit);
?>