<?php 
include('config/connect_db.php'); 
    try {
        if(isset($_GET['order_id'])){
            $order_id=$_GET['order_id'];
            $dbh = getDB();
            $stmt3 = $dbh->prepare("delete from tbl_order where order_id=$order_id");
            $stmt3->execute();
            header('location:../tech_web/order.php'); 
        }
    }
    catch (PDOException $ex) {
        exit("Da co loi xay ra: " . $ex->getMessage());
    }
    
?>