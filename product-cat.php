<?php
try {
    include('lib/header.php');
    $dbh = getDB();
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
        $stmt = $dbh->prepare("select * from tbl_category where cat_id='$cat_id'");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $stmt2 = $dbh->prepare("select * from tbl_product where cat_id='$cat_id'");
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll();

    }
}
catch (PDOException $ex) {
    exit("Da co loi xay ra: " . $ex->getMessage());
}
?>
<img src="https://phuclong.com.vn/uploads/category/f9fda0c654e809-4b9491980fcdaetraolong1.jpeg" class="img-fluid"
    alt="">
<div class="container">
    <?php
foreach ($rows as $category) {
?>
    <h2 class="text-center my-3 text-uppercase">DANH MỤC -
        <?php echo $category['cat_name']?>
    </h2>
    <?php
}
?>


    <div class="separator-icon gray"></div>
    <div class="row d-lex justify-content-center">
        <?php
            foreach ($rows2 as $product) {
            ?>
            <div class="card mb-2 mx-2 col-lg-3 col-md-4 col-12" style="width: 16rem;">
            <img class="card-img-top" src="img/<?php echo $product['img']?>" alt="Card image cap" width="237px" height="237px">
            <div class="card-body text-center">
                <h4>
                    <?php echo $product['pro_name']?>
                </h4>
                <p>
                    <?php echo $product['price'] . ' VNĐ'; ?>
                </p>
                <a href="detail.php?pro_id=<?php echo $product['pro_id']?>" class="btn btn-outline-success">Đặt Hàng</a>
            </div>
            </div>
            <?php
            }
        ?>
    </div>
</div>
<?php include('lib/footer.php'); ?>