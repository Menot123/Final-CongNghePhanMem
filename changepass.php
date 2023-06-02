
<?php
    session_start();
    $oldpassword = "";
    $newpassword = "";
    $passwordConfirm = "";
    $err = "";
    $complete = "";
    if(isset($_POST['btnChangePass']))
    {
        require_once ('api/connection.php');
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $checkpass = strlen($newpassword);

        if($newpassword == $passwordConfirm && $checkpass >= 7 && $oldpassword == $_SESSION['password'] && $oldpassword != $newpassword)
        {
            $object = "users";
            if($_SESSION["type"] == 1)
                $object = "nhanvien";
            if($_SESSION["type"] == 2)
                $object = "admin";
            $sql = 'UPDATE '.$object.' set matkhau = ? where id = ?';
            try{
                $stmt = $dbCon->prepare($sql);
                $stmt->execute(array($newpassword, $_SESSION['id']));
                $complete = "Đổi mật khẩu thành công, nhấp vào đây để đăng nhập lại";
                $err = "";
                $oldpassword = "";
                $newpassword = "";
                $passwordConfirm = "";
                session_destroy();
            }
            catch(PDOException $ex){
                
            }
        }else{
            if($checkpass < 7)
                $err = "Mật khẩu mới phải từ 7 ký tự trở lên";
            else if($oldpassword != $_SESSION['password'])
                $err = "Mật khẩu hiện tại không chính xác";
            else if($oldpassword == $newpassword)
                $err = "Mật khẩu mới không được trùng mật khẩu hiện tại";
            else
                $err = "Mật khẩu xác nhận không đúng, vui lòng nhập lại";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta hoten="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <title>Đổi mật khẩu</title>

</head>
<body>
    <div id="logreg-forms">
        <!-- Đổi mật khẩu  -->
        <form action="" class="form-signup" method="post">
            <h1 class="h1 mb-3 font-weight-normal" style="text-align: center">Đổi mật khẩu</h1>
        
            <!-- ĐANG LÀM TỚI ĐÂY -->
            Mật khẩu hiện tại<input type="password" id="user-pass" class="form-control" placeholder="Nhập mật khẩu hiện tại" autofocus="" required name="oldpassword" value="<?php echo $oldpassword;?>">
            Mật khẩu mới<input type="password" id="user-pass" class="form-control" placeholder="Nhập mật khẩu mới" autofocus="" required name="newpassword" value="<?php echo $newpassword;?>">
            Xác nhận mật khẩu<input type="password" id="user-repeatpass" class="form-control" placeholder="Nhập lại mật khẩu mới" autofocus="" required name="passwordConfirm" value="<?php echo $passwordConfirm;?>">
            <input type="submit" value="Đổi mật khẩu" class="btn btn-primary btn-block" name="btnChangePass">
            <div style="color: red;"><?php echo $err;?></div>
            <a name="loginAgain" href="login.php" id="cancel_signup">
                <div style="color: green;"><?php echo $complete;?></div>
            </a>
            <!-- <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Đổi mật khẩu</button> -->
            
            <a style="width: 35%;" href="home.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở về trang chủ</a>
        </form>
    </div>
</body>
</html>