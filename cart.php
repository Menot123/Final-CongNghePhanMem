<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    td{
        vertical-align: baseline !important;
    }
</style>
<body>
    <div class="container">
        <h2>Giỏ hàng</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td colspan="7">
                        <button onclick="location.href = 'home.php'" type="button" class="btn btn-primary">Tiếp tục mua hàng</button>
                    </td>
                </tr>
                <tr>
                    <th>Ảnh</th>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng (theo kg)</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    session_start();
                    if(!isset($_SESSION['cart']))
                    {
                        header("Location: login.php");
                    }

                    $arr = $_SESSION['cart'];
                    
                    if(isset($_GET['del']))
                    {
                        unset($_SESSION['cart'][$_GET['del']]);
                        $newarr = array();
                        foreach ($_SESSION['cart'] as $value) {
                            array_push($newarr, $value);
                        }
                        $_SESSION['cart'] = $newarr;
                    }

                
                    if(isset($_GET['id']))
                    {
                        $checkEqual = 0;
                        
                        for($i = 0; $i < count($_SESSION['cart']); $i++){
                            if($_SESSION['cart'][$i][0] == $_GET['id'])
                            {
                                $_SESSION['cart'][$i][1] += 1;
                                $checkEqual = 1;
                                break;
                            }
                        }
                        if($checkEqual == 0)
                        {
                            array_push($_SESSION['cart'], array($_GET['id'], 1));
                        }
                        if(isset($_GET['xem']))
                        {
                            header("Location: xemsanpham.php?id=".$_GET['id']);   
                        }
                        else header("Location: home.php?search=");       
                    }
                    $sum = 0;
                    for($i = 0; $i < count($_SESSION['cart']); $i++) {
                        require_once ('api/connection.php');
                        $sql = 'SELECT * FROM sanpham WHERE id='.$_SESSION['cart'][$i][0];
                        try{
                            $stmt = $dbCon->prepare($sql);
                            $stmt->execute();
                        }
                        catch(PDOException $ex){
                            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
                        }
                        
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<tr>';
                            echo '<td><img src="'.$row['image'].'" style="max-height: 70px"></td>';
                            echo '<td>'.($i+1).'</td>';
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td style="padding-left:6%">'.$_SESSION['cart'][$i][1].'</td>';
                            echo '<td>';
                            echo '<p>'.number_format($row['price']).' đ</p>';
                            echo '</td>';
                            echo '<td id = "total">'.number_format($row['price']*$_SESSION['cart'][$i][1]).' đ</td>';
                            echo '<td><a href="?del='.$i.'"><button type="button" onclick="deleteProduct(this)" class="btn btn-danger">Xóa</button></a></td>';
                            echo '</tr>';
                            $sum+=$row['price']*$_SESSION['cart'][$i][1];
                        }
                    }
                    $_SESSION['sumPrice'] = $sum;
                    echo '<tr>';
                    echo '<td colspan="5" style="text-align: right;">';
                    echo ' <b>Tổng tiền: '.number_format($_SESSION['sumPrice']).' đ</b>';
                    echo '</td>';
                ?> 
                    <td colspan="7" style="text-align: right">
                        <button onclick="location.href='fillinfo.php'" type="button" class="btn btn-success" <?php echo (count($_SESSION['cart'])==0)?"disabled":"";?>>Thanh toán</button>
                    </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
    <script>

        function deleteProduct(thisProduct){
            var tr = thisProduct.parentNode.parentNode.parentNode;
            tr.parentNode.removeChild(tr);
        }
    </script>
</body>

</html>