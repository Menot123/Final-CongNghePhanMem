<?php  
    session_start();
    if(!isset($_SESSION['hd']))
    {
        $_SESSION['hd'] = 1233;
    }
    if(isset($_POST['thanhtoan']))
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $_SESSION['date'] = date("Y/m/d H:i:s");
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $sodienthoai = $_POST['sodienthoai'];
        $diachi = $_POST['diachi'];
        $ghichu = $_POST['ghichu'];
        $_SESSION['hd']++;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <title>Bill</title>
</head>

<body>
    <div class="card">
        <div class="card-body mx-4">
            <div class="container" style="width: 500px; border: 1px solid;">
                <p class="my-5 mx-5" style="font-size: 30px; text-align: center;">Hóa đơn mua hàng</p>
                <div class="row">
                    <ul class="list-unstyled">
                        <li class="text-black">Tên: <?php echo $ten;?></li>
                        <li class="text-black">Email: <?php echo $email;?></li>
                        <li class="text-black">Số điện thoại: <?php echo $sodienthoai;?></li>
                        <li class="text-black">Địa chỉ giao: <?php echo $diachi;?></li>
                        <li class="text-muted mt-1"><span class="text-black">Hóa đơn số: </span>#<?php echo $_SESSION['hd'];?></li>
                        <li class="text-black mt-1">Ngày mua: <?php echo $_SESSION['date'];?></li>
                    </ul>
                    <!-- <hr>
                    <div class="col-xl-9">
                        <p>Pro Package</p>
                    </div>
                    <div class="col-xl-3">
                        <p class="float-end">200.000 đ
                        </p>
                    </div>
                    <hr> -->
                </div>
                <!-- <div class="row">
                    <div class="col-xl-9">
                        <p>Consulting</p>
                    </div>
                    <div class="col-xl-3">
                        <p class="float-end">200.000 đ
                        </p>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <p>Support</p>
                    </div>
                    <div class="col-xl-3">
                        <p class="float-end">300.000 đ
                        </p>
                    </div>
                    <hr style="border: 2px solid black;">
                </div> -->
                <div class="row text-black">

                    <div class="col-xl-12">
                        <p class="float-end fw-bold">Tổng cộng: <?php echo number_format($_SESSION["sumPrice"])?> đ
                        </p>
                    </div>
                    <hr style="border: 2px solid black;">
                </div>
                Ghi chú: <?php echo $ghichu;?>
                <div class="text-center" style="margin-top: 30px;">
                    <a href="home.php"><u class="text-info">Nông sản DL</u></a>
                    <p>Ấp Nam, Châu Thành, tỉnh Tiền Giang</p>
                    <p>DLFARM@gmail.com</p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>