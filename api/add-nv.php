<?php
    require_once ('connection.php');

    if (!isset($_POST['ten']) || !isset($_POST['email']) || !isset($_POST['sodienthoai'])  || !isset($_POST['matkhau']) || !isset($_POST['luong']) ) {
        die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
    }

    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $matkhau = $_POST['matkhau'];
    $luong = $_POST['luong'];

    $sql = 'INSERT INTO nhanvien(ten,email,sodienthoai,matkhau,luong) VALUES(?,?,?,?,?)';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($ten,$email,$sodienthoai,$matkhau,$luong));
        header('location: ../admin.php');
        echo json_encode(array('status' => true, 'data' => 'Thêm nhân viên thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }

?>