<?php
    require_once ('connection.php');
    if (!isset($_POST['id']) || !isset($_POST['ten']) || !isset($_POST['email']) || !isset($_POST['sodienthoai']) || !isset($_POST['matkhau']) || !isset($_POST['luong'])) {
        echo $_POST['luong'];
        die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));

    }
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $matkhau = $_POST['matkhau'];
    $luong = $_POST['luong'];

    $sql = 'UPDATE nhanvien SET ten = ?, email = ?, sodienthoai = ?, matkhau = ?, luong = ? where id = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($ten,$email,$sodienthoai,$matkhau,$luong, $id));
        header("location:../admin.php");
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
?>