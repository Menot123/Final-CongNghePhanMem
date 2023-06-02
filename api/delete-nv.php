<?php
require_once ('connection.php');

if (!isset($_POST['id']) ) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$id = $_POST['id'];

$sql = 'DELETE FROM nhanvien where id = ?';
try{
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($id));
    $count = $stmt->rowCount();
    header('location: ../admin.php');
}
catch(PDOException $ex){
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}

?>