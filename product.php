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
    <title>Quản Lý Nhân Viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>  
    <!-- form edit -->
    <form id="form-edit" style="display: none;" action="api/editproduct.php" method="POST">
        <input type="text" name="id" id="id">   
        <input type="text" name="name" id="name">
        <input type="text" name="image" id="image">
        <input type="text" name="price" id="price">
        <textarea type="text" name="description" id="description"></textarea>
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
            <a style="text-decoration:none; font-size: 20px; margin-right:20px" class="text-light" href="admin.php">Quản lý nhân viên</a>
            <a style="text-decoration:none; font-size: 20px; font-weight: bold" class="text-primary"  href="product.php">Quản lý sản phẩm</a>
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
    .carts {
    background-color: #A0DB87;
    width: 400px;
    position: absolute;
    top: 40px;
    right: 0px;
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
        $.ajax({
            url: 'api/delete-sp.php', type: 'POST', data: { 'id': id }, dataType: 'json' });
        location.reload();
    }

    

    function goEdit(id, name, image, price, description) {
            $("#id").val(id)
            $("#name").val(name)
            $("#image").val(image)
            $("#price").val(price)
            $("#description").val(description)
            $("#form-edit").submit();
        }

</script>


<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="5">
            <a href="api/addproduct.php">Thêm Sản phẩm</a>
            
        </td>
    </tr>
    <tr class="header">
        <td>Tên</td>
        <td>Link hình ảnh</td>
        <td>Giá</td>
        <td>Mô tả sản phẩm</td>
        <td>Hành Động</td>
    </tr>
    <?php
        require_once ('api/connection.php');
        $sql = 'SELECT * FROM sanpham';
        
        try{
            $stmt = $dbCon->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
    
        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        { 
            
            echo "<tr class=\"item\">";
            echo "<td>".$row["name"]."</td>";
            echo "<td><img src=\"".$row["image"]."\" style=\"max-height: 80px\"></td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "<td><a href=\"#\" onclick='goEdit(\"$row[id]\" , \"$row[name]\" , \"$row[image]\", \"$row[price]\" , \"$row[description]\")'>Edit</a> | <a href=\"#\" onclick=handleClick(this.dataset.id) data-id=\"$row[id]\">Delete</a></td>";
            echo "</tr>";
            $i++;
        }
    ?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Số lượng sản phẩm: <?php echo $i; ?></p>
        </td>
    </tr>
</table>


<!-- Delete Confirm Modal -->


</body>
</html>