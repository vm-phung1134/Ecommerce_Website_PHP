<?php  include('lib/header.php'); ?>
<div class='container'>
               <h2 class="text-success text-center mt-3">GIỎ HÀNG CỦA BẠN</h2>
               <div class="separator-icon gray"></div>
               <a href="index.php" class="btn btn-success mb-3">Quay lại cửa hàng</a>
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
            <?php  
                if(isset($_GET['pro_id'])){
                    $pro_id = $_GET['pro_id'];
                    $quantity=$_GET['quantity'];
                    $size=$_GET['size'];
                    $note=$_GET['note'];
                    $sql="SELECT * FROM tbl_product WHERE pro_id=$pro_id";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    $row=mysqli_fetch_assoc($res);
                    if($count>0){
                        $pro_name=$row['pro_name'];
                        $img=$row['img'];
                        $price=$row['price'];
                        $sql2 = "INSERT INTO tbl_cart SET
                        pro_id='$pro_id',
                        img='$img',
                        pro_name='$pro_name',
                        size='$size',
                        price='$price',
                        quantity='$quantity',
                        note='$note'
                        ";
                        $res2= mysqli_query($conn,$sql2) or die();
                    }
                }
            ?>
            <tbody>
            <?php
                $stt=1;
                $sql3="SELECT * FROM tbl_cart";
                $res3 = mysqli_query($conn,$sql3);
                $count3 = mysqli_num_rows($res3);
                if($count3>0){
                  while($row3=mysqli_fetch_assoc($res3)){
                        $pro_name=$row3['pro_name'];
                        $img=$row3['img'];
                        $quanlity=$row3['quantity'];
                        $size=$row3['size'];
                        $price=$row3['price'];
                        $note=$row3['note'];
                        ?>
                            <tr class="text-center">
                                <th scope="row"><?php echo $stt++ ?></th>
                                <td>
                                    <img src="img/<?php echo $img ?>" alt="" width="100" height="100">
                                </td>
                                <td><?php echo $pro_name  ?></td>
                                <td><?php echo $quanlity ?></td>
                                <td><?php echo $price .' VNĐ'  ?></td>
                                <td><?php echo $note ?></td>
                                <td><?php echo $total=$price * $quanlity .'.000 VNĐ'  ?></td>
                                <td>
                                    <a href="" class="btn btn-outline-danger">Xóa khỏi giỏ hàng</a>
                                </td>
                            </tr>
                        <?php 
                    
                    }  
                }
                
            ?>   
                    </tbody>
                </table>
                <div class="subtotal row">
                    <div class="col-lg-7 col "></div>
                    <div class="col-lg-5 col mb-10">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng tiền đơn hàng
                            <span style="font-size: 15px;" class="badge badge-primary badge-pill">100.000 VNĐ</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Chi phi giao hàng
                            <span style="font-size: 15px;" class="badge badge-primary badge-pill">2000 VNĐ</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng tiền cần thanh toán
                            <span style="font-size: 15px;" class="badge badge-primary badge-pill">120.000 VNĐ</span>
                        </li>
                        
                    </ul>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="confirm-order.php" class="btn btn-success">Tiến Hành Đặt Hàng</a>
                    </div>
                        
                    </div>
                </div>

    </div>
<?php include('lib./footer.php'); ?>