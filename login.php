<?php include('config/connect_db.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Đăng Nhập - Bán trà sữa dạo
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/validate.js"></script>
</head>

<body style="background-image: url('img/bg-form.jpg');background-position:50% 50%;">
    <ul class="nav justify-content-start bg-danger mb-lg-4 pl-md-5 pl-1 py-2">
        <li class="nav-item">
            <img src="img/logo.jpg" alt="" width="100" height="95" class="border rounded-circle">
        </li>
        <li class="d-flex text-center align-items-center ml-md-4 text-white fa-2x">WELL COME, MILK & TEA WEBSITE</li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--form 1-->
                <div class="modal-dialog shadow">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="model-title">Đăng Nhập</h5>
                        </div>
                        <div class="modal-body">
                            <form id="signinForm" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail"
                                        class="col-sm-3 col-form-label font-weight-bold">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email-login" name="email_login"
                                            placeholder="Nhập vào email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Mật
                                        khẩu</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password-login"
                                            name="pass_login" placeholder="Nhập vào mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ tên tài
                                                khoản</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="login" class="btn btn-outline-success">
                                            Đăng Nhập
                                        </button>
                                    </div>
                                </div>
                            </form>
<?php
    try {
        $dbh = getDB();
        if (isset($_POST['login'])) {
            $email = $_POST['email_login'];
            $pass = $_POST['pass_login'];
            $stmt = $dbh->prepare("SELECT * FROM tbl_customer
                WHERE customer_email ='$email' AND customer_pass ='$pass'");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $count = $stmt->rowCount();
            if ($count > 0){
                foreach($rows as $customer){
                    $_SESSION['login'] = $customer['customer_name'];
                    $_SESSION['user_id'] = $customer['customer_id'];
                    header('Location: index.php');
                }
                 
            } else {
                echo '<p class=text-danger>(*) Tên đăng nhập hoặc mật khẩu chưa đúng</p>';
            }
        }
    } catch (PDOException $ex) {
        exit("Da co loi xay ra: " . $ex->getMessage());
    }
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {
            $("#signinForm").validate({
                rules: {
                    email_login: { required: true, email: true },
                    pass_login: { required: true, minlength: 6 },
                },
                messages: {
                    email_login: "Hộp thư điện tử không hợp lệ",
                    pass_login: {
                        required: "Bạn chưa nhập vào mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 6 ký tự"
                    },

                },
                errorElement: "div",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
    
</body>

</html>
