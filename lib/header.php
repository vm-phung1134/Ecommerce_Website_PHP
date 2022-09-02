<?php include('config/connect_db.php'); ?>
<!DOCTYPE hmtl>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Web_Technology
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-md ">
            <div class="logo col-sm mb-2 d-flex justify-content-center">
                <a href="index.php"><img src="img/logo.jpg" alt="" width="100" height="95"></a>
            </div>

        <form class="form-inline col-sm justify-content-center">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-success  my-sm-0" type="submit"><i class="fas fa-search"></i> Search</button>
        </form>
        <ul class="nav col justify-content-center mb-3 nav-bar-right">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> <i class="fas fa-home"></i> Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product.php"><i class="fas fa-mug-hot"></i> Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php"><i class="fas fa-cloud"></i> Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fas fa-cart-arrow-down"></i> Cart <span class="badge badge-light">2</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php"><i class="fas fa-address-card"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-question"></i> Contact</a>
            </li>
        </ul>
    </nav>