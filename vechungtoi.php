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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Về chúng tôi</title>
</head>
<style>

        
</style>
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
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link" aria-current="page" href="home.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 150%; margin-left:100px; width: 100%;" class="nav-link active" href="vechungtoi.php">Về chúng tôi</a>
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
        <div style="height: 155px;" class="top">
        </div>
    <!-- EndTemp -->

    <div class="vct">
        <div class="vct1"></div>
        <div class="vct2"></div>
        <img class="img_vct1" src="img/vct_img11.png" alt="">
        <div class="title_vct"><h1 style="font-size:60px; color: #333"><b>VỀ CHÚNG TÔI</b></h1> </div>
        <div class="content_vct">
            <h2 style="margin-bottom: 30px; color: #fff"><b>CÂU CHUYỆN THÀNH LẬP</b></h2>
            <p style="color:#fff; font-size: 19px"> Đó là câu chuyện mà rất nhiều người đã nói về chúng tôi là ai và chúng tôi làm gì. Lịch sử của DL Farm  là một câu chuyện thành công khi chúng tôi là tập hợp những người yêu nông sản sạch biết nắm lấy cơ hội đúng lúc cùng với tầm nhìn xa phát triển nâng tầm thành một doanh nghiệp. Bắt đầu từ cửa hàng nhỏ đầu tiên tại Tiền Giang năm 2022, chúng tôi đã chứng kiến và tạo ra nhiều thay đổi thú vị trong ngành cung cấp nông sản sạch tại Việt Nam. </p>
        </div>
    </div>

    <div class="camket">
        <img class="img_camket" src="img/camket_img1.png" alt="">
        <div class="content_camket">
            <h2 style="margin-bottom: 30px; color: #fff"><b>CAM KẾT CỦA CHÚNG TÔI</b></h2>
            <ul class="details_content_camket">
                <li>DL Farm cung cấp những sản phẩm và dịch vụ chất lượng nhất cho người tiêu dùng.</li>
                <li>Phát triển nhiều dịch vụ tiện ích bên cạnh việc cung cấp nông sản sạch giúp thuận tiện cho khách hàng.</li>
                <li>Xây dựng và mở rộng cửa hàng với những sản phẩm tốt nhất.</li>
                <li>Làm việc không mệt mỏi để cải thiện cuộc sống của khách hàng từng nơi nói riêng. Và cuộc sống của người tiêu dùng Việt Nam nói chung.</li>
                <li>Không ngừng sáng tạo để đáp ứng tốt hơn nữa nhu cầu của người tiêu dùng.</li>
            </ul>
        </div>
    </div>

    <div class="tamnhin_doingu">
        <img class="img_tamnhin" src="img/tamnhin_img.png" alt="">
        <img class="img_doingu" src="img/doingu_img.png" alt="">
        <div class="content_tamnhin"> 
            <h2 style="margin-bottom: 30px; color: #fff"><b>TẦM NHÌN CỦA CHÚNG TÔI</b></h2>
            <ul class="details_tamnhin">
                <li>Chúng tôi tin rằng đó là nhiệm vụ của chúng tôi để đảm bảo sức khỏe và hạnh phúc cho người tiêu dùng. Giúp người tiêu dùng cảm nhận được mình đang được đầu tư về sức khỏe.</li>
                <li>Nông sản tươi sạch nói chung, và những sản phẩm tươi sạch, chất lượng nói riêng sẽ làm con người tích cực hơn trong cuộc sống và đảm bảo cung cấp sản phẩm tươi sạch là nhiệm vụ của chúng tôi.</li>
                <li>Chúng tôi tin tưởng vào những gì chúng tôi đang làm dựa trên những tiêu chuẩn trong việc cung cấp sản phẩm sạch. Chất lượng sản phẩm và chăm sóc khách hàng.</li>
            </ul>
        </div>

        <div class="content_doingu">
            <h2 style="margin-bottom: 20    px; color: #fff"><b>ĐỘI NGŨ CHUYÊN MÔN CỦA <br> DL FARM</b></h2>
            <p style="color:#fff; font-size: 19px">Nhiều năm có mặt trên thị trường, DL FARM được biết đến là địa chỉ uy tín và chuyên nghiệp hàng đầu dành cho thú cưng. Mỗi nhân viên của DL FARM đều là một chuyên gia sản phẩm sạch, một chuyên gia trong cung cấp nông sản chất lượng. Khách hàng chắc chắn sẽ vô cùng hài lòng về chất lượng sản phẩm và dịch vụ tại đây.</p>
        </div>
    </div>

    <!-- Footer -->
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