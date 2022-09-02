<?php  include('lib/header.php'); ?>
    <div class="container">
    <?php
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];
            $sql="SELECT * FROM tbl_product WHERE pro_id=$product_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            $row=mysqli_fetch_assoc($res);
            if($count>0){
                    $pro_id=$row['pro_id'];
                    $pro_name=$row['pro_name'];
                    $img=$row['img'];
                    $price=$row['price'];
                ?>    
                    <div class="row border border-dark my-3 p-5 rounded">
                    <img class="mr-3 col-md-5 col-12 "style="width: 16rem;"  src="img/<?php echo $img ?>" alt="Generic placeholder image">
                    <form method="GET" action="order.php" class="media-body col-md-7 col-12 mt-3">
                    <h5 class="text-dark">⇨ Chi tiết đặt hàng</h5>
                    <h2 class="text-success"><?php echo $pro_name ?></h2>
                        <div class="form-group row mt-4">
                                <label class="col-sm-3 col-form-label ">Kích Cỡ : </label>
                                <div id="option-form" class="col-sm-9 btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success btn-sm active mr-5 rounded">
                                        <input type="radio" name="size" id="option1"  value="M" autocomplete="off" checked> M
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
                                <h4><?php echo $price.' VNĐ' ?></h4>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label ">Số lượng : </label>
                        <div class="col-sm-5">
                        <input name="quantity" type="number" value="1" min="1" class="form-control border-dark" id="quantity">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label  class="col-sm-3 col-form-label ">Ghi Chú : </label>
                        <div class="col-sm-7">
                        <textarea name="note" class="rounded" name="" id="note" cols="50" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 ">
                            <a href="cart.php" data-id="<?php echo $pro_id; ?>" class="btn btn-success" data-toggle="modal" data-target="#MessageModal" ><i class="fas fa-cart-arrow-down"></i> Thêm vào giỏ hàng</a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-cash-register"></i> Mua Ngay</button>
                        </div>
                    </div>
                    </form>
                </div>
                <?php
            }
        }
    ?>
    <form action="" id="add-cart-form" method="POST"></form>
        <!--Message modal-->
    <div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="MessageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MessageModalLabel">Thông báo</h5>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn thêm sản phẩm vào giỏ hàng không !!!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                <button type="button" id="btn-add-cart" class="btn btn-success" data-dismiss="modal" aria-label="Close">Thêm vào giỏ hàng</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var productId;
            var selectedVal = "";
            var messageForm = document.forms['add-cart-form'];
            $('#MessageModal').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget);
                productId= button.data('id');
                var selected = $("#option-form input[type='radio']:checked");
            if (selected.length > 0) {
                selectedVal = selected.val();
            }
            // get data sl
            var quantity = $('#quantity').val();
            console.log(quantity);
            //get data note
            var note = $('#note').val();
            var btnAddCart = document.getElementById('btn-add-cart');
            btnAddCart.onclick=function(){
                // them action + data da get duoc tu form
                messageForm.action='cart.php?pro_id='+productId + '&size='+ selectedVal + '&quantity='+quantity+'&note='+note;
                messageForm.submit();
            }
            });
            // lay gia tri trong option radio 
                
        });
    </script>
<?php include('lib./footer.php'); ?>