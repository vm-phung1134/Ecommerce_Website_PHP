<?php
    include('config/connect.php');
    session_destroy();
    header('location: ../tech_web/login.php');
?>