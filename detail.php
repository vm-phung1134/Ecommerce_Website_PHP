<?php  include('lib/header.php'); ?>
    <div class="container">
        <div class="row border border-dark my-3 p-5 rounded">
            <img class="mr-3 col-md-5 col-12 "style="width: 16rem;"  src="https://phuclong.com.vn/uploads/dish/8ebb07f0eeccc1-resize_damdadunggu07.png" alt="Generic placeholder image">
            <form method="GET" action="order.php" class="media-body col-md-7 col-12 mt-3">
            <h5 class="text-dark">Danh Mục: Coffee</h5>
            <h2 class="text-success">Coffee Sữa Đá</h2>
                <div class="form-group row mt-4">
                    <label class="col-sm-3 col-form-label ">Kích Cỡ : </label>
                    <div class="col-sm-9 btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success btn-sm active mr-5 rounded">
                            <input type="radio" name="size" id="option1"  value="M" autocomplete="off"> M
                        </label>
                        <label class="btn btn-outline-success btn-sm mr-5 rounded">
                            <input type="radio" name="size" id="option2" value="L" autocomplete="off"> L
                        </label>
                        <label class="btn btn-outline-success btn-sm mr-5 rounded">
                            <input type="radio" name="size" id="option2" value="XL" autocomplete="off"> XL
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label ">Giá : </label>
                    <div class="col-sm-7">
                        <h4>49.000 VNĐ</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label ">Số lượng : </label>
                    <div class="col-sm-5">
                    <input name="quanlity" type="number" class="form-control border-dark" id="">
                    </div>
                </div>
                <div class="form-group row ">
                    <label  class="col-sm-3 col-form-label ">Ghi Chú : </label>
                    <div class="col-sm-7">
                    <textarea name="note" class="rounded" name="" id="" cols="50" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9 ">
                        <a href="cart.php" class="btn btn-success"><i class="fas fa-cart-arrow-down"></i> Thêm vào giỏ hàng</a>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-cash-register"></i> Mua Ngay</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
<?php include('lib./footer.php'); ?>