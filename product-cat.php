<?php include('lib/header.php') ?>
<img src="https://phuclong.com.vn/uploads/category/f9fda0c654e809-4b9491980fcdaetraolong1.jpeg" class="img-fluid" alt="">
<div class="container">
    <?php 
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $sql2="SELECT cat_name FROM tbl_category where cat_id=$cat_id";
        $res2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($res2);
        $row2=mysqli_fetch_assoc($res2);
        if($count2>0){
            $cat_name=$row2['cat_name']; 
            ?>
            <h2 class="text-center my-3 text-uppercase">DANH MỤC - <?php echo $cat_name ?></h2>
            <?php
        }
    }
    ?>

    
    <div class="separator-icon gray"></div>
    <div class="row d-lex justify-content-center">
    <?php
        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $sql="SELECT * FROM tbl_product WHERE cat_id=$cat_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $pro_id=$row['pro_id'];
                    $pro_name=$row['pro_name'];
                    $img=$row['img'];
                    $price=$row['price'];

                ?>    
                    <!--------card product--------->
                    <div class="card mb-2 mx-2 col-lg-3 col-md-4 col-12" style="width: 16rem;">
                        <img class="card-img-top" src="img/<?php echo $img ?>" alt="Card image cap" width="237px" height="237px">
                        <div class="card-body text-center">
                            <h4><?php echo $pro_name ?></h4>
                            <p><?php echo $price .' VNĐ'; ?></p>            
                            <a href="detail.php?pro_id=<?php echo $pro_id ?>" class="btn btn-outline-success">Đặt Hàng</a>
                        </div>
                    </div>
                <?php
                }
            }
        }
    ?>
    </div>
</div>
<?php include('lib/footer.php'); ?>