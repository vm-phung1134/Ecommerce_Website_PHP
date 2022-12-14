<?php
      try {
        include('lib/header.php');
        $dbh = getDB();
        $stmt = $dbh->prepare('select * from tbl_category');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        } catch (PDOException $ex) {
        exit("Da co loi xay ra: " . $ex->getMessage());
        }
?>
        <main>
        <div id="carousel-example-generic" class="carousel slide text-center mt-1" data-interval="5000" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid w-100" alt="First slide" src="img/slide-1.jpg" />
                </div>
                <div class="carousel-item">
                    <img class="img-fluid w-100" alt="Second slide" src="img/slide-2.jpg" />
                </div>
                <div class="carousel-item">
                    <img class="img-fluid w-100" alt="Third slide" src="img/slide-3.png" />
                </div>
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev justify-content-start ml-5" href="#carousel-example-generic"
                data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next justify-content-end mr-5" href="#carousel-example-generic"
                data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
            <div class="container">
            <h2 class="mt-5 text-center">DANH MỤC THỨC UỐNG</h2>
            <div class="separator-icon gray"></div>
            <div class="row category-list mb-5  justify-content-center">
            <?php
            foreach ($rows as $category){
                ?>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="d-flex justify-content-center shadow-img">
                            <a href="product-cat.php?cat_id=<?php echo  $category["cat_id"]?>"><img class="m-2 rounded " src="img/<?php echo $category["cat_img"]?>" width="330" height="300"></a>
                        </div>
                        <div class="d-flex justify-content-center">
                          <h5 class="text-center text-uppercase">⊰ <?php echo  $category["cat_name"]?> ⊱</h5>  
                        </div>
                        
                    </div> 
                    
                <?php
            }
           
        ?> 
            </div>
            <h2 class="mt-5 text-center">TIN TỨC</h2>
            <div class="separator-icon gray"></div>
            <ul class="list-unstyled mt-3">
            <li class="media">
                <img class="mr-3" src="img/new1.jpg" alt="Generic placeholder image" width="250" height="200">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">MINIGAME: TRUNG THU VUI VẦY - QUÀ ĐẦY YÊU THƯƠNG</h5>
                    <p class="text-justify">
                        Một mùa Trung Thu sum vầy lại đến. Để Tết Trung Thu thêm phần đầm ấm, 
                        Milk & Tea xin gửi tặng những hộp Bánh Trung Thu “Thưởng Nguyệt Đoàn Viên”,
                        như một lời chúc đến cho khách hàng luôn ủng hộ và yêu mến Phúc Long qua 
                        Minigame "Trung Thu Vui Vầy - Quà Đầy Yêu Thương”.
                    </p>
                <a href="#" class="btn btn-outline-success">Chi tiết</a>
                </div>
            </li>
            <li class="media my-4">
                <img class="mr-3 " src="img/new2.jpg" alt="Generic placeholder image" width="250" height="200">
                <div class="media-body">
                <h5 class="mt-0 mb-1">THƯỞNG THỨC TRÀ Ủ LẠNH MIỄN PHÍ</h5>
                <p class="text-justify">
                    Từ 01.08.2022 – 30.08.2022 khách hàng đến cửa hàng Milk & 
                    Tea truyền thống trong danh sách và mua sắm với hóa đơn từ 120,000Đ sẽ được tặng
                    1 chai Trà Ủ Lạnh đóng chai Cold BrewTea.
                </p>
                <a href="#" class="btn btn-outline-success">Chi tiết</a>
                </div>
            </li>
            <li class="media ">
                <img class="mr-3" src="img/new3.jpg" alt="Generic placeholder image" width="250" height="200">
                <div class="media-body">
                <h5 class="mt-0 mb-1">TRÀ VẢI TƯƠI DẦM – TƯƠI NGON, MÁT LẠNH</h5>
                <p class="text-justify">
                    Chính thức ra mắt thức uống mới Trà Vải Tươi Dầm từ 19.06.2021, 
                    Phúc Long gửi đến khách hàng chương trình ưu đãi hấp dẫn giới hạn.
                </p>
                <a href="#" class="btn btn-outline-success">Chi tiết</a>
                </div>
            </li>
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-outline-success"> <i class="	fas fa-arrow-down"></i> Xem Thêm</a>
            </div>
        </ul>
        </div>
        </main>
        <!-- Footer -->
   <?php include('lib/footer.php'); ?>