<?php include('lib/header.php') ?>
   <div style="background-image: url('img/bg-form.jpg');background-position:50% 50%;">
  <div class="container">
    <div class="row">
    <div class="col-12 col-md-5"> <!--form 1-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="model-title text-white">Đăng nhập</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Nhập vào email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Mật khẩu:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="inputPassword" placeholder="Nhập vào mật khẩu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ tên tài khoản</label>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-outline-success">
                                Đăng Nhập
                            </button>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-md-7"> <!--form 2-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="model-title text-white">Đăng Ký</h5>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label font-weight-bold">Khách hàng:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="inputEmail" placeholder="@nguyenvana">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Địa chỉ:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="inputPassword" placeholder="@choxincaidiachi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="inputEmail" placeholder="abc123@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Mật khẩu:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="inputPassword" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-outline-primary">
                               Tiến hành đăng ký
                            </button>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
       
   </div>
   </div>
   <script src="js/form.js"></script>
   <?php include('lib/footer.php') ?>