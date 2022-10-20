<?php include('config/connect_db.php'); 
    try {
        // lay so luong trong gio hang
        $dbh = getDB();
        if(isset($_SESSION['login'])){
           $customer_id = $_SESSION['user_id']; 
        
        $stmt = $dbh->prepare("select * from tbl_cart where customer_id = '$customer_id'");
        $stmt->execute();
        $count = $stmt->rowCount();
        // lay so luong don hang
        $stmt2 = $dbh->prepare("select * from tbl_order where customer_id = '$customer_id'");
        $stmt2->execute();
        $count2 = $stmt2->rowCount();
        }
    }
    catch (PDOException $ex) {
        exit("Da co loi xay ra: " . $ex->getMessage());
    }

?>

<!DOCTYPE hmtl>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>
            Bán trà sữa dạo
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js"></script>        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/validate.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-md ">
            <div class="logo col-sm mb-2 d-flex justify-content-center">
                <a href="index.php"><img src="img/logo.jpg" alt="" width="100" height="95"></a>
            </div>

        <form class="form-inline col-sm justify-content-center" method="post" action='search.php'>
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm thức uống" name="search">
            <button class="btn btn-success  my-sm-0" type="submit"><i class="fas fa-search"></i> Tìm kiếm</button>
        </form>
        <ul class="nav col justify-content-center mb-3 nav-bar-right">
            
            <li class="nav-item">
                <a class="nav-link" href="index.php"> <i class="fas fa-home"></i> Cửa hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product.php"><i class="fas fa-mug-hot"></i> Đồ uống</a>
            </li>
            <?php 
                    if(isset($_SESSION['login'])){
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="order.php"><i class="fas fa-list-alt"></i> Đơn hàng <span class="badge badge-light"><?php echo $count2 ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="fas fa-cart-arrow-down"></i> Giỏ hàng <span class="badge badge-light"><?php echo $count ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-headset"></i> Liên hệ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php"><i class="fas fa-arrow-alt-circle-right"></i> Đăng xuất</a>
                            </li>
                        <?php  
                    }else{
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-list-alt"></i> Đơn hàng <span class="badge badge-light"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-cart-arrow-down"></i> Giỏ hàng <span class="badge badge-light"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-headset"></i> Liên hệ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-arrow-circle-left"></i> Đăng nhập</a>
                            </li>
                        <?php
                    }
            ?>
        </ul>
    </nav>