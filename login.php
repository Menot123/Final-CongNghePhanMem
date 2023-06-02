<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    
    if(isset($_SESSION['name']))
    {
        if($_SESSION['type'] == 2)
            header("Location: admin.php");
        if($_SESSION['type'] == 1)
            header("Location: nhanvien.php");
        if($_SESSION['type'] == 0)
            header("Location: home.php");
    }
    require_once ('api/connection.php');
    $sql = 'SELECT * FROM users';
    if(isset($_POST['LoginNV']))
        $sql = 'SELECT * FROM nhanvien';
    if(isset($_POST['LoginAdmin']))
        $sql = 'SELECT * FROM admin';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
    $err = "";
    $email = "";
    $password = "";
    if(isset($_POST['Login']))
    {
        $false = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] == $row['email'] && $_POST['password'] == $row['matkhau'])
            {
                $_SESSION['name'] = $row['hoten'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['type'] = 0;
                $_SESSION['id'] = $row['id'];
                $_SESSION['password'] = $row['matkhau'];
                $false = 0;
                header("Location: home.php");
            }   
        }
        if($false == 1)
        {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(strlen($password) < 7)
                $err = "Mật khẩu phải từ 7 ký tự trở lên";
            else
                $err = "Tài khoản hoặc mật khẩu không chính xác";
        }
    }

    if(isset($_POST['LoginNV']))
    {
        $false = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] == $row['email'] && $_POST['password'] == $row['matkhau'])
            {
                $_SESSION['name'] = $row['ten'];
                $_SESSION['type'] = 1;
                $_SESSION['id'] = $row['id'];
                $_SESSION['password'] = $row['matkhau'];
                $false = 0;
                header("Location: home.php");
            }   
        }
        if($false == 1)
        {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(strlen($password) < 7)
                $err = "Mật khẩu phải từ 7 ký tự trở lên";
            else
                $err = "Tài khoản hoặc mật khẩu không chính xác";
        }
    }

    if(isset($_POST['LoginAdmin']))
    {
        $false = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] == $row['email'] && $_POST['password'] == $row['matkhau'])
            {
                $_SESSION['name'] = $row['ten'];
                $_SESSION['type'] = 2;
                $_SESSION['id'] = $row['id'];
                $_SESSION['password'] = $row['matkhau'];
                $false = 0;
                header("Location: admin.php");
            }   
        }
        if($false == 1)
        {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(strlen($password) < 7)
                $err = "Mật khẩu phải từ 7 ký tự trở lên";
            else
                $err = "Tài khoản hoặc mật khẩu không chính xác";
        }
    }
   
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Đăng nhập</title>
</head>



<body>
    <div id="logreg-forms">
        <!-- Đăng nhập -->
        <form class="form-signin" method="POST">
            <!-- User -->
            <h1 class="h1 mb-3 font-weight-normal" style="text-align: center">Đăng nhập</h1>
            Địa chỉ email:<input type="email" id="inputEmail" class="form-control" placeholder="Nhập email" required="" name="email" value="<?php echo $email;?>">
            Mật khẩu:<input type="password" id="inputPassword" class="form-control" placeholder="Nhập mật khẩu" required="" name="password" value="<?php echo $password;?>">
            <br><input class="btn btn-success btn-block" type="submit" value="Đăng nhập" name="Login">
            
            <!-- NhanVien -->
            <br><input class="btn btn-info btn-block" type="submit" value="Đăng nhập với tư cách nhân viên" name="LoginNV">

            <!-- Admin -->
            <br><input class="btn btn-warning btn-block" type="submit" value="Đăng nhập vào Admin" name="LoginAdmin">

            <!-- Err -->
            <div style="color: red;"><?php echo $err;?></div>
            
            
            <hr>

            <!-- <p>Don't have an account!</p>  -->
            <button onclick="location.href='signin.php'" class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Đăng ký Tài Khoản Người Dùng Mới</button>
            <a style="width: 35%;" href="home.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở về trang chủ</a>
        </form>


        <br>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function toggleResetPswd(e) {
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle() // display:block or none
            $('#logreg-forms .form-reset').toggle() // display:block or none
        }

        $(() => {
            // Login Register Form
            $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
            $('#logreg-forms #cancel_reset').click(toggleResetPswd);
        })
    </script>
</body>

</html>