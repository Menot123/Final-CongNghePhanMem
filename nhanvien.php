<?php
    session_start();
    if(!isset($_SESSION["name"]))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Đơn Hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>  
    <!-- form edit -->
    <form id="form-edit" style="display: none;" action="api/edit.php" method="POST">
        <input type="text" name="idNhanVien" id="idNhanVien">   
        <input type="text" name="ten" id="ten">
        <input type="text" name="email" id="email">
        <input type="text" name="sodienthoai" id="sodienthoai">
        <input type="text" name="taikhoan" id="taikhoan">
        <input type="text" name="matkhau" id="matkhau">
        <input type="text" name="luong" id="luong">
        <input id="submitEdit" type="submit" value="Submit">
    </form>

    <!-- Top  -->
    <div class="top">
        <div class="two-button dropdown" style="display: inline-block; display:flex">
            <div> <a style="text-decoration:none; font-size: 20px; margin-right:20px" class="text-light dropbtn" href="">Xin chào <b><?php echo $_SESSION['name']?></b></a></div> 
            <div class="dropdown-content">
                <a href="changepass.php">Đổi mật khẩu</a>
                <a href="#">Thay đổi thông tin</a>
                <a href="logout.php">Đăng xuất</a>
            </div>
        </div>
        <img  class="logo" src="img/logo.png" alt="">
        <div class="carts" style="display: inline-block; display:flex">
            <div> <a style="text-decoration:none; font-size: 20px; margin-right:20px" class="text-light" href="">Quản lý Đơn Hàng</a></div> 
        </div>
    </div>

    <!-- Nav Bar -->
   

<style>
    
    table{

        text-align: center;
    }
    td{
        padding: 10px;
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
        /* font-weight: bold; */
    }

    .top{
            background-color:#A0DB87;
            height: 150px;
            position: relative;
        
        }

    .logo{
        text-align: center;
        height: 250px;
        width: 250px;
        right: 45%;
        top: -25%;
        position: absolute; 
    }

    .two-button{
        position: absolute;
        top: 65px;
        left: 113px;
    }

    .carts{
        background-color:#A0DB87;
        width: 300px;
        position: absolute;
        top: 65px;
        right: 113px;
    }
</style>


<script>
    var id;
    function handleClick(idDel) {
        id = idDel;
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    function confirmDelete()
    {
        console.log(id);
        $.ajax({
            url: 'delete-product.php', type: 'POST', data: { 'id': id }, dataType: 'json' });
            location.reload();
    }

    function goEdit(idNhanVien, ten, email, sodienthoai, taikhoan, matkhau, luong) {
            $("#idNhanVien").val(idNhanVien)
            $("#ten").val(ten)
            $("#email").val(email)
            $("#sodienthoai").val(sodienthoai)
            $("#taikhoan").val(taikhoan)
            $("#matkhau").val(matkhau)
            $("#luong").val(luong)
            $("#form-edit").submit();
        }

</script>


<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="5">
            <a href="api/add.php">Quản lý hóa đơn</a>
            
        </td>
    </tr>
    <!-- <tr class="header">
        <td>Tên</td>
        <td>Email</td>
        <td>Số điện thoại</td>
        <td>Tài khoản</td>
        <td>Mật khẩu</td>
        <td>Lương</td>
        <td>Hành Động</td>
    </tr> -->
    <?php
        // require_once ('api/connection.php');
        // $sql = 'SELECT * FROM nhanvien';
        
        // try{
        //     $stmt = $dbCon->prepare($sql);
        //     $stmt->execute();
        // }
        // catch(PDOException $ex){
        //     die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        // }
    
        // $i = 0;
        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        // { 
        //     echo "<tr class=\"item\">";
        //     echo "<td>".$row["ten"]."</td>";
        //     echo "<td>".$row["email"]."</td>";
        //     echo "<td>".$row["sodienthoai"]."</td>";
        //     echo "<td>".$row["taikhoan"]."</td>";
        //     echo "<td>".$row["matkhau"]."</td>";
        //     echo "<td>".$row["luong"]."</td>";
        //     echo "<td><a href=\"#\" onclick='goEdit(\"$row[idNhanVien]\" , \"$row[ten]\" , \"$row[email]\", \"$row[sodienthoai]\" , \"$row[taikhoan]\" , \"$row[matkhau]\", \"$row[luong]\")'>Edit</a> | <a href=\"#\" onclick=handleClick(this.dataset.id) data-id=\"$row[idNhanVien]\">Delete</a></td>";
        //     echo "</tr>";
        //     $i++;
        // }
    ?>
    <!-- <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Số lượng hóa đơn: <?php echo $i; ?></p>
        </td>
    </tr> -->
</table>


<!-- Delete Confirm Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick=confirmDelete()>Delete</button>
            </div>

        </div>

    </div>
</div>

</body>
</html>