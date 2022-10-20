<?php 
include('config/connect_db.php'); 
    try {
        if(isset($_GET['cart_id'])){
            $cart_id=$_GET['cart_id'];
            $dbh = getDB();
            $stmt3 = $dbh->prepare("delete from tbl_cart where cart_id=$cart_id");
            $stmt3->execute();
            header('location:../tech_web/cart.php'); 
        }
    }
    catch (PDOException $ex) {
        exit("Da co loi xay ra: " . $ex->getMessage());
    }
    
?>