<?php include('lib/header.php') ?>
<img src="https://phuclong.com.vn/uploads/category/f9fda0c654e809-4b9491980fcdaetraolong1.jpeg" class="img-fluid" alt="">
<div class="container">
    <h2 class="text-center my-3">SẢN PHẨM</h2>
    <div class="separator-icon gray"></div>
    <div class="row d-lex justify-content-center">
    <!--------card product--------->
        <?php
            $sql="SELECT * FROM tbl_product";
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
        ?>
    </div>
</div>
<?php include('lib/footer.php'); ?>