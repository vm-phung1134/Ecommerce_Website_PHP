<?php
      try {
        include('lib/header.php');
        $dbh = getDB();
        if(isset($_GET['cart_id'])){
            $stmt4 = $dbh->prepare("select * from tbl_cart");
            $stmt4->execute();
            $rows4 = $stmt4->fetchAll();
            $count = $stmt4->rowCount();
            // lay data trong cart chuyen den order
            $stmt1 = $dbh->prepare(
                "insert into tbl_order(pro_id, cart_id, pro_name, customer_id, quantity, price, size, img) values (:pr_id, :c_id, :pr_name, :cus_id, :sl, :pr, :sz, :i)"
            );
            foreach($rows4 as $cart){
                $stmt1->execute([
                    'pr_id' => $cart['pro_id'],
                    'c_id' => $cart['cart_id'],
                    'pr_name' => $cart['pro_name'],
                    'cus_id' => $cart['customer_id'],
                    'sl' => $cart['quantity'],
                    'pr' => $cart['price'],
                    'sz' => $cart['size'],
                    'i' => $cart['img']     
                ]);
            }
            //xoa data trong gio cart
            $stmt3 = $dbh->prepare("delete from tbl_cart");
            $stmt3->execute();
        }
        // lay het data tu bang order
        $customer_id = $_SESSION['user_id'];
        $stmt2 = $dbh->prepare("select * from tbl_order where customer_id='$customer_id'");
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll();
        $count2 = $stmt2->rowCount();

        } catch (PDOException $ex) {
        exit("Da co loi xay ra: " . $ex->getMessage());
        }
?>
        <div class='container'>
               <h2 class="text-success text-center mt-3">ĐƠN HÀNG CỦA BẠN</h2>
               <div class="separator-icon gray"></div>
               <a href="product.php" class="btn btn-success mb-3">Quay lại cửa hàng</a>
    <?php
                $stt=0;
                if($count2 ==0){
                    ?>
                        <div class="d-flex justify-content-center my-md-4">
                            <h4 class="btn btn-outline-danger">Chưa Có Đơn Hàng Nào !!!</h4>
                        </div>
                    <?php
                }
                foreach($rows2 as $order){
                $stt++;
                $subtotal = 0;  
                $shipping=9;
            ?>
                <table class="table table-light mb-0">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">MÃ HĐ</th>
                        <th scope="col"></th>
                        <th scope="col">TÊN SẢN PHẨM</th>
                        <th scope="col">S.LƯỢNG</th>
                        <th scope="col">GIÁ</th>
                        <th scope="col">NGÀY ĐẶT</th>
                        <th scope="col">THÀNH TIỀN</th>
                        <th scope="col">TRẠNG THÁI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center ">
                            <th scope="row"><?php echo $stt ?></th>
                            <td>
                                <img src="img/<?php echo $order['img'] ?>" alt="" width="100" height="100">
                            </td>
                            <td><?php echo $order['pro_name']  ?></td>
                            <td><?php echo $order['quantity'] ?></td>
                            <td><?php echo $order['price'] .' VNĐ'  ?></td>
                            <td><?php echo $order['order_date'] ?></td>
                            <td class="text-dark"><?php $total=$order['price'] * $order['quantity']; echo $total .'.000 VNĐ'  ?></td>
                            <td>Đang xử lý</td>
                        </tr>
                    </tbody>
                </table>
                <?php $subtotal += $total; ?>
                <div class="subtotal row">
                    <div class="col-lg-7 col "></div>
                    <div class="col-lg-5 col mb-10">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng tiền các đơn hàng
                            <span style="font-size: 17px;" class="badge badge-pill"><?php echo $subtotal.".000 VNĐ" ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Chi phí giao hàng
                            <span style="font-size: 17px;" class="badge badge-pill"><?php  echo $shipping.".000 VNĐ" ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng tiền cần thanh toán
                            <span style="font-size: 17px;" class="badge badge-pill"><?php $payment = $subtotal + $shipping; echo $payment.".000 VNĐ" ?></span>
                        </li>
                        
                    </ul>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="del-order.php?order_id=<?php echo $order['order_id']; ?>" class="btn btn-danger">Hủy đơn</a>
                    </div>
                        
                    </div>
                </div>
            <?php 
        }
    ?>        
    </div>
<?php include('lib./footer.php'); ?>