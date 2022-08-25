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
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>
                                <img src="https://phuclong.com.vn/uploads/dish/8ebb07f0eeccc1-resize_damdadunggu07.png" alt="" width="100" height="100">
                            </td>
                            <td>Trà sữa</td>
                            <td>2</td>
                            <td>49.000 VNĐ</td>
                            <td>Thêm đá, full topping nhiều sữa</td>
                            <td>98.000 VNĐ</td>
                            <td>
                                <a href="" class="btn btn-outline-danger">Xóa khỏi giỏ hàng</a>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>
                                <img src="https://phuclong.com.vn/uploads/dish/8ebb07f0eeccc1-resize_damdadunggu07.png" alt="" width="100" height="100">
                            </td>
                            <td>Trà sữa</td>
                            <td>2</td>
                            <td>49.000 VNĐ</td>
                            <td>Thêm đá</td>
                            <td>98.000 VNĐ</td>
                            <td>
                                <a href="" class="btn btn-outline-danger">Xóa khỏi giỏ hàng</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="subtotal row">
                    <div class="col-7"></div>
                    <div class="col-5 mb-10">
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