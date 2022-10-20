<!--1-->
<?php
try {
    include('lib/header.php');
    // sau khi post tu detail (sl,size,note) goi data tu product de them đủ thong tin
    if (isset($_GET['pro_id'])) {
        $pro_id = $_GET['pro_id'];
        $dbh = getDB();
        $stmt1 = $dbh->prepare("select * from tbl_product where pro_id=$pro_id");
        $stmt1->execute();
        $rows1 = $stmt1->fetchAll();
        //insert data vao tu detail cart
        $stmt = $dbh->prepare(
            "insert into tbl_cart(customer_id,pro_id, img, pro_name, size, price, quantity, note) 
            values (:cus_id,:pr_id, :i, :pr_name, :sz, :pr, :sl, :nt)"
        );
        foreach ($rows1 as $product) {
            $stmt->execute([
                'cus_id' => $_SESSION['user_id'],
                'pr_id' => $_GET['pro_id'],
                'i' => $product['img'],
                'pr_name' => $product['pro_name'],
                'sz' => $_GET['size'],
                'pr' => $product['price'],
                'sl' => $_GET['quantity'],
                'nt' => $_GET['note'],
            ]);
        }
    }
    // lay data tu gio hang va hien thị
    $customer_id = $_SESSION['user_id'];
    $stmt2 = $dbh->prepare("select * from tbl_cart where customer_id='$customer_id'");
    $stmt2->execute();
    $rows2 = $stmt2->fetchAll();
    $count2 = $stmt2->rowCount();
}
catch (PDOException $ex) {
    exit("Da co loi xay ra: " . $ex->getMessage());
}
?>
    <div class='container'>
        <h2 class="text-success text-center mt-3">GIỎ HÀNG CỦA BẠN</h2>
        <div class="separator-icon gray"></div>
        <a href="product.php" class="btn btn-success mb-3">Thêm Thức Uống</a>
<!--2-->
<?php
    //2.1
    ?>
        <br>
        <table class="table table-light mb-3">
        <thead>
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col"></th>
                <th scope="col">TÊN SẢN PHẨM</th>
                <th scope="col">S.LƯỢNG</th>
                <th scope="col">GIÁ</th>
                <th scope="col">GHI CHÚ</th>
                <th scope="col">THÀNH TIỀN</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
    <?php
    //
        $stt = 1;
        $subtotal = 0;
        $shipping = 15;
        foreach ($rows2 as $cart) {
        //
        ?>
            <tr class="text-center ">
                <th scope="row">
                    <?php echo $stt++?>
                </th>
                <td>
                    <img src="img/<?php echo $cart['img']?>" alt="" width="100" height="100">
                </td>
                <td>
                    <?php echo $cart['pro_name']?>
                </td>
                <td>
                    <?php echo $cart['quantity']?>
                </td>
                <td>
                    <?php echo $cart['price'] . ' VNĐ'?>
                </td>
                <td>
                    <?php echo $cart['note']?>
                </td>
                <td class="text-dark">
                    <?php $total = $cart['price'] * $cart['quantity'];
                        echo $total . '.000 VNĐ'?>
                </td>
                <td>
                    <a href="del-cart.php?cart_id=<?php echo $cart['cart_id']; ?>" class="btn btn-outline-danger">Xóa
                        khỏi giỏ hàng</a>
                </td>
            </tr>
            <?php $subtotal += $total; ?>
        <?php
        }
?>
        </tbody>
    </table>
    <?php
        if($count2==0){
            ?>  
                <div class="d-flex justify-content-center my-md-4">
                    <h4 class="btn btn-outline-danger">Giỏ Hàng Không Có Gì !!!</h4>
                </div>
            <?php
        }else{
            ?>
            <div class="subtotal row">
                <div class="col-lg-7 col "></div>
                <div class="col-lg-5 col mb-10">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng tiền các đơn hàng
                            <span style="font-size: 17px;" class="badge badge-pill">
                                <?php echo $subtotal . ".000 VNĐ"?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Chi phí giao hàng
                            <span style="font-size: 17px;" class="badge badge-pill">
                                <?php echo $shipping . ".000 VNĐ"?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng tiền cần thanh toán
                            <span style="font-size: 17px;" class="badge badge-pill">
                                <?php $payment = $subtotal + $shipping;
                                    echo $payment . ".000 VNĐ"?>
                            </span>
                        </li>

                    </ul>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="#" data-id="<?php echo $product['pro_id']; ?>" class="btn btn-success" data-toggle="modal"
                            data-target="#MessageModal">Tiến hành đặt hàng</a>
                    </div>
                    <div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="MessageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="MessageModalLabel">Thông báo</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn có muốn đặt hàng ngay bây giờ không !!!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                    <a href="order.php?cart_id=<?php echo $cart['cart_id']; ?>" class="btn btn-success">Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
</div>
<?php include('lib./footer.php'); ?>