
<?php
    session_start();
    $hoten = "";
    $ngaysinh = "";
    $gioitinh = "";
    $email = "";
    $password = "";
    $passwordConfirm = "";
    if(isset($_SESSION['hoten']))
    {
        header("Location: home.php");
    }
    $err = "";
    $complete = "";
    if(isset($_POST['btnSignUp']))
    {
        require_once ('api/connection.php');
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $checkpass = strlen($password);

        if($password == $passwordConfirm && $checkpass >= 7)
        {
            $sql = 'INSERT INTO users(hoten,ngaysinh,gioitinh,email,matkhau) VALUES(?,?,?,?,?)';
            try{
                $stmt = $dbCon->prepare($sql);
                $stmt->execute(array($hoten,$ngaysinh,$gioitinh,$email,$password));
                $complete = "Tạo tài khoản thành công";
                $err = "";
                $hoten = "";
                $ngaysinh = "";
                $gioitinh = "";
                $email = "";
                $password = "";
                $passwordConfirm = "";
            }
            catch(PDOException $ex){
                
            }
        }else{
            if($checkpass < 7)
                $err = "Mật khẩu phải từ 7 ký tự trở lên";
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
    
    <title>Đăng ký tài khoản</title>

</head>
<body>
    <div id="logreg-forms">
        <!-- Đăng ký  -->
        <form action="" class="form-signup" method="post">
            <h1 class="h1 mb-3 font-weight-normal" style="text-align: center">Đăng ký</h1>

                Họ tên:<input type="text" class="form-control" placeholder="Nhập họ và tên" required=""  name="hoten" value="<?php echo $hoten;?>">
                Ngày sinh:<input type="date" class="form-control" required="" name="ngaysinh" value="<?php echo $ngaysinh;?>">
                
                <div>
                    Giới tính:   
                    <input style="margin-left: 12px;" type="radio" id="nam" name="gioitinh" value="Nam" required <?php if($gioitinh == "Nam") echo "checked"?>>
                    <label for="nam" style="margin-right: 12px;">Nam</label>
                    <input type="radio" id="nu" name="gioitinh" value="Nữ" <?php if($gioitinh == "Nữ") echo "checked"?>>
                    <label for="nu" style="margin-right: 12px">Nữ</label>
                    <input type="radio" id="khac" name="gioitinh" value="Khác" <?php if($gioitinh == "Khác") echo "checked"?>>
                    <label for="khac">Khác</label>
                </div>
                
                Địa chỉ email:<input type="email" id="user-email" class="form-control" placeholder="Nhập email" required name="email" value="<?php echo $email;?>">
                Mật khẩu:<input type="password" id="user-pass" class="form-control" placeholder="Nhập mật khẩu" required name="password" value="<?php echo $password;?>">
                Xác nhận mật khẩu:<input type="password" id="user-repeatpass" class="form-control" placeholder="Nhập lại mật khẩu" required name="passwordConfirm" value="<?php echo $passwordConfirm;?>">
                
                <br><input type="submit" value="Đăng ký" class="btn btn-primary btn-block" name="btnSignUp">
                <div style="color: red;"><?php echo $err;?></div>
                <div style="color: green;"><?php echo $complete;?></div>
                <!-- <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Đăng Ký</button> -->
                
                <a style="width: 35%;" href="home.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở về trang chủ</a>
                <a style="width: 47%;" href="login.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở về trang đăng nhập</a>
        </form>
    </div>
</body>
</html>