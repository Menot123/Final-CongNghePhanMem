<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm nhân viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    body{
        padding-top: 50px;
    }
    table{

        text-align: center;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
</style>


<div class="container" style="width: 600px">
    <h2 style="color:blue">Nhập thông tin để xác nhận mua hàng</h2>
    <form action="bill.php" method="POST">
        <div class="form-group">
            <label for="ten">Tên:</label>
            <input type="text" class="form-control" id="ten" placeholder="Họ và tên:" name="ten" required value="<?php echo $_SESSION["name"];?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email" required value="<?php echo $_SESSION["email"];?>">
        </div>
        <div class="form-group">
            <label for="sodienthoai">Số điện thoại:</label>
            <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" name="sodienthoai" required>
        </div>
        <div class="form-group">
            <label for="diachi">Địa chỉ</label>
            <input type="text" class="form-control" id="diachi" placeholder="Nhập Địa chỉ" name="diachi" required>
        </div>
        <div class="form-group">
            <label for="ghichu">Ghi chú:</label>
            <input type="text" class="form-control" id="ghichu" placeholder="Nhập ghi chú" name="ghichu" required>
        </div>

        <a href="cart.php"><button type="button" class="btn btn-default">Trở về</button></a>
        <button type="submit" name="thanhtoan" class="btn btn-primary">Xác nhận mua</button>
        
    </form>

    <br>
</div>


</body>
</html>