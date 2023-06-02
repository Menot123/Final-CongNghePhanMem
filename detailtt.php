<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $cartOk = "login.php";
    if(isset($_SESSION['name'])){
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array();
        }
        $cartOk = "cart.php";
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Tin tức nông sản</title>
    <style>
        .detail {
            font-size: 110%;
        }
        
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="fixed"> 
        <div class="top">
            <div class="two-button dropdown" style="display: inline-block; display:flex">
                <div <?php if(isset($_SESSION['name'])) echo "hidden";?>> 
                    <a style="text-decoration:none; font-size: 20px; margin-right:20px" class="dndk" href="login.php">Đăng nhập</a>
                </div> 
                <div <?php if(isset($_SESSION['name'])) echo "hidden";?>> <a style="text-decoration:none; font-size: 20px"  class="dndk" href="signin.php">Đăng ký</a> </div>
                
                <div <?php if(!isset($_SESSION['name'])) echo "hidden";?>> <a style="text-decoration:none; font-size: 20px"  class="dropbtn" href="">Xin chào, <?php echo $_SESSION['name'];?></a> </div> 
                
                <div <?php if(!isset($_SESSION['name'])) echo "hidden";?> class="dropdown-content">
                    <a href="changepass.php">Đổi mật khẩu</a>
                    <a href="logout.php">Đăng xuất</a>
                </div>
            </div>
        
            <img class="logo" src="img/logo.png" alt="">
            <div class="carts" style="display: inline-block; display:flex;">
                <a title="Giỏ hàng" style="text-decoration: none;" href="<?php echo $cartOk;?>">
                    <i class="fa">&#xf07a;</i>
                    <span class='badge badge-warning' id='lblCartCount'><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : "";?></span>
                </a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg" style="background-color: #1cc158;">
            <div class="container">
                <!-- <a class="navbar-brand" style="font-size: 250%;" href="#">DL FARM</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link active" aria-current="page" href="home.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link " href="vechungtoi.php">Về chúng tôi</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link" href="tintuc.php">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link" href="lienhe.php">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link" href="home.php?search=">Sản Phẩm</a>
                        </li>
                       

                        <li class="nav-item" hidden>
                            <form action="home.php" style="margin: auto; padding-top: 8px;" class="container d-flex" role="search">
                                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Tìm kiếm sản phẩm" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "";?>">
                                <button class="btn btn-outline-success text-dark" type="submit">Tìm</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
    </div>
    



    <!--Temp -->
        <div style="height: 167px; background-color: #1cc158;" class="top">
        </div>
    <!-- EndTemp -->

    <!-- detailtt1 -->
    <div style="width: 80%; margin: auto;">


    <?php
        require_once ('api/connection.php');
        $sql = 'SELECT * FROM tintuc WHERE id='.$_GET['id'];
        try{
            $stmt = $dbCon->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }

        //tintuc
        echo "<br>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
           echo $row['detail'];
        }
    ?>
        <!-- <h1 style="text-align: center;">Dưa Trung Quốc giá rẻ đổ vào Việt Nam</h1>
        <p class="detail">Mỗi năm có hàng nghìn tấn dưa Trung Quốc với đủ chủng loại nhập vào Việt Nam.</p>
        <p class="detail">Chị Hoa, tiểu thương chợ An Bình (quận 5, TP HCM) cho biết, hơn một tháng nay lượng dưa về chợ khá nhiều với đủ các mẫu mã. Trong đó, dưa lê và dưa lưới có giá rẻ hơn so với bình thường.</p>
        <p class="detail">“Nếu thông thường dưa vàng quả tròn có giá 60.000 đồng một kg thì nay loại dưa lưới quả dài mẫu mã đẹp cũng chỉ 25.000 - 40.000 đồng. Vì có giá hấp dẫn nên khách mua nhiều hơn”, chị Hoa nói và cho biết, loại dưa lưới này đa phần  nguồn gốc từ Trung Quốc, có nhiều từ tháng 6 trở đi. Loại trái này khá dễ phân biệt vì dưa Việt trái nhỏ và không đồng đều. Còn dưa lê Trung Quốc trái to và mẫu mã đồng đều nhau.</p>
        <img class="center" src="img/detailtt5.jpg" title="Dưa lê Trung Quốc thường có mẫu mã bắt mắt hơn hàng Việt.">
        <p class="detail">Cũng chuyên bán dưa tại chợ đầu mối Thủ Đức, chị Hòa cho biết, nửa đầu năm nay dưa hoàng kim và dưa lê chiếm đa số. Các loại dưa này năm nào cũng được đưa về Việt Nam theo mùa với số lượng lớn và giá rẻ hơn so với hàng Việt.</p>
        <p class="detail">Trao đổi với VnExpress, lãnh đạo chợ đầu mối nông sản Thủ Đức cho biết, thông thường các loại trái cây Trung Quốc trồng nghịch vụ so với hàng Việt nên được nhập về chợ với giá hấp dẫn. Vào tháng 9, 10 dưa lưới vàng được nhập về nhiều, còn dưa lê và dưa hoàng kim thì đang vào vụ nên lượng về chợ có tăng.</p>
        <p class="detail">Theo Cục Bảo vệ thực vật, trong năm 2017, Việt Nam nhập tới 7.210 tấn dưa từ thị trường Trung Quốc, trong đó, dưa lưới vàng 3.710 tấn, dưa lưới xanh 3.000 tấn, dưa lê nhập 500 tấn.</p>
        <p class="detail">Sang 2018, 5 tháng đầu năm, lượng dưa Trung Quốc đổ về cũng lên tới gần 650 tấn các loại, Theo lãnh đạo Cục Bảo vệ thực vật, sản phẩm khi nhập vào thị trường Việt Nam đều được kiểm định. Tuy nhiên, nhiều tiểu thương đã gắn mác hàng Việt để dễ bán hàng.</p>
        <p class="detail">Đặc điểm của dưa lưới vàng Trung Quốc là quả dài hình bầu dục, bên ngoài vỏ màu vàng nặng khoảng 3 - 4 kg một quả. Còn dưa Việt hình tròn, trọng lượng quả chỉ từ 1 - 2 kg. Giá dưa lưới vàng Việt Nam cũng cao gấp đôi dưa lưới vàng Trung Quốc.</p>
        <p class="detail">Còn với dưa lê, loại quả này không khó phân biệt vì hàng Trung Quốc trái to 300 - 600 gram một trái, mẫu mã đẹp. Ngược lại, hàng Việt trái nhỏ, hay bị méo.</p>
        <i style="float: right;">Hồng Châu</i> -->


        <a style="width: 40%; text-decoration: none; font-size: 20px;" href="tintuc.php"><i class="fas fa-angle-left"></i> Trở về tin tức</a>
    </div>


    <hr>
    <div>  
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3 text-secondary"></i>DL FARM
                </h6>
                <p>
                    DL FARM là hệ thống cửa hàng bán những sản phẩm nông sản tươi sạch, chất lượng. Với mong muốn bảo vệ sức khỏe của người tiêu dùng, DL FARM hiện có 20 chi nhánh trên toàn quốc nhằm giúp người tiêu dùng có thể tiếp cận và sử dụng những sản phẩm tốt nhất.
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                    SẢN PHẨM
                </h6>
                <p>
                    <a href="#!" class="text-reset" style="text-decoration: none">Rau</a>
                </p>
                <p>
                    <a href="#!" class="text-reset" style="text-decoration: none">Hoa quả</a>
                </p>
                <p>
                    <a href="#!" class="text-reset" style="text-decoration: none">Sản phẩm khác</a>
                </p>
                <p>
                    <a href="#!" class="text-reset" style="text-decoration: none">Sản phẩm nổi bật</a>
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                    VỀ CHÚNG TÔI
                </h6>
                <p>
                    <a href="vechungtoi.php" class="text-reset" style="text-decoration: none">Giới thiệu</a>
                </p>
                <p>
                    <a href="#" class="text-reset" style="text-decoration: none">Giỏ hàng</a>
                </p>
                <p>
                    <a href="tintuc.php" class="text-reset" style="text-decoration: none">Tin tức</a>
                </p>
                <p>
                    <a href="#" class="text-reset" style="text-decoration: none">Liên hệ hỗ trợ</a>
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">THÔNG TIN LIÊN HỆ</h6>
                <p><i style="font-size: 25px;" class="fa fa-home text-secondary"></i> Ấp Nam, Châu Thành, tỉnh Tiền Giang</p>
                <p>
                    <i style="font-size: 25px;" class="fa fa-envelope text-secondary"></i>
                    DLFARM@gmail.com
                </p>
                <p><i style="font-size: 25px;" class="fa fa-phone text-secondary"></i> 0878 27 2222</p>
                <p><i style="font-size: 25px;" class="fa fa-print text-secondary"></i> 03 343536 60</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="home.php">DL FARM</a>
        </div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</body>

</html>