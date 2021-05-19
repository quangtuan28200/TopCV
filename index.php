<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css main-->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- font main-->
    <link rel="preconnect" href="https://fonts.gstatic.com">    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    
    <!-- icon main-->
    <link rel="stylesheet" href="icons/themify-icons.css">

    <!-- CSS_khac -->
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        if(isset($_GET['dangnhap']) || 
          (isset($_GET['taocv']) && !isset($_SESSION['dangnhap'])) ||
          (isset($_GET['news']) && !isset($_SESSION['dangnhap']))){
            echo '<link rel="stylesheet" href="pages/Login_user/fonts/material-icon/css/material-design-iconic-font.min.css">';
            echo '<link rel="stylesheet" href="pages/Login_user/css/style.css">';
            echo '<style>
                    .signup-eror{
                        padding: 15px;
                        color: #a94442;
                        background-color: #f2dede;
                        border: 1px solid #ebccd1;
                        font-size: 14px;
                    }
                </style>';
        }elseif(isset($_GET['dangky'])){
            echo '<link rel="stylesheet" href="pages/Register_user/fonts/material-icon/css/material-design-iconic-font.min.css">';
            echo '<link rel="stylesheet" href="pages/Register_user/css/style.css">';
            echo '
                <style>
                    .signup-eror{
                        padding: 15px;
                        color: #a94442;
                        background-color: #f2dede;
                        border: 1px solid #ebccd1;
                        font-size: 14px;
                    }
                    .signup-success{
                        padding: 15px;
                        color: #008c11;
                        background-color: #d1f1be;
                        border: 1px solid #a3f3ad;
                        font-size: 14px;
                    }
                </style>';
        }elseif ((isset($_GET['taocv']) || isset($_GET['suacv'])) && isset($_SESSION['dangnhap'])) {
            echo '
                <!-- Icons font CSS-->
                <link href="pages/CV/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="pages/CV/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">
            
                <!-- Vendor CSS-->
                <link href="pages/CV/vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="pages/CV/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
            
                <!-- Main CSS-->
                <link href="pages/CV/css/main.css" rel="stylesheet" media="all">

                <!-- Upload CSS-->
                <link href="pages/CV/css/upload.css" rel="stylesheet" media="all">
                <style>
                    .hocvan{
                        resize: none;
                        width: 100%;
                        outline: none;
                    }
                    .signup-success{
                        padding: 15px;
                        color: #008c11;
                        background-color: #d1f1be;
                        border: 1px solid #a3f3ad;
                        font-size: 14px;
                        width: 30%;
                        margin-bottom: 20px;
                    }
                    .hide{
                        display: none;
                    }
                </style>';
        }elseif (isset($_GET['hoso'])) {
            echo '<link rel="stylesheet" href="pages/my_CV/css/style.css">';
        }elseif (isset($_GET['news'])) {
            echo '<link rel="stylesheet" href="pages/news_detail/style.css">';
            echo '
            <style>
                .disable{
                    background: #ccc;
                    pointer-events: none;
                }
                .show{
                    padding: 15px;
                    color: #008c11;
                    background-color: #d1f1be;
                    border: 1px solid #a3f3ad;
                    font-size: 14px;
                }
                .hide{
                    display: none;
                }
            </style>';
        }elseif (isset($_GET['company'])) {
            echo '<link rel="stylesheet" href="pages/news_detail/company/style.css">';
        }     
    ?>
    <!-- Title -->
    <title>TopCV</title>
    <!-- End_header -->
</head>
<body>
    <?php 
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        include("config/config.php");
        include("pages/header.php");
        if(isset($_GET['dangnhap']) || 
          (isset($_GET['taocv']) && !isset($_SESSION['dangnhap'])) ||
          (isset($_GET['news']) && !isset($_SESSION['dangnhap']))){
            include("pages/Login_user/index.php");
        }elseif(isset($_GET['dangky'])){
            include("pages/Register_user/index.php");
        }elseif (isset($_GET['taocv']) && isset($_SESSION['dangnhap'])) {
            include('pages/CV/index.php');
        }elseif (isset($_GET['suacv']) && isset($_SESSION['dangnhap'])) {
            include('pages/CV/suacv.php');
        }elseif (isset($_GET['hoso'])) {
            include('pages/my_CV/index.php');
        }elseif (isset($_GET['news']) && isset($_SESSION['dangnhap'])) {
            include("pages/filter.php");
            include('pages/news_detail/news.php');
        }elseif (isset($_GET['company'])) {
            include("pages/filter.php");
            include('pages/news_detail/company/index.php');
        }elseif (isset($_GET['timkiem'])) {
            include("pages/filter.php");
            include("pages/timkiem/timkiem.php");
        }else{
            include("pages/filter.php");
            include("pages/content.php");
        }        
        include("pages/footer.php");

        // JS    
        if(isset($_GET['dangnhap']) || 
          (isset($_GET['taocv']) && !isset($_SESSION['dangnhap'])) ||
          (isset($_GET['news']) && !isset($_SESSION['dangnhap']))){
            echo'
                <script src="pages/Login_user/vendor/jquery/jquery.min.js"></script>
                <script src="pages/Login_user/js/main.js"></script>';
        }elseif(isset($_GET['dangky'])){
            echo '
                <script src="pages/Register_user/vendor/jquery/jquery.min.js"></script>
                <script src="pages/Register_user/js/main.js"></script>';
        }elseif ((isset($_GET['taocv']) || isset($_GET['suacv'])) && isset($_SESSION['dangnhap'])) {
            echo '
                <!-- Jquery JS-->
                <script src="pages/CV/vendor/jquery/jquery.min.js"></script>
                <!-- Vendor JS-->
                <script src="pages/CV/vendor/select2/select2.min.js"></script>
                <script src="pages/CV/vendor/datepicker/moment.min.js"></script>
                <script src="pages/CV/vendor/datepicker/daterangepicker.js"></script>
            
                <!-- Main JS-->
                <script src="pages/CV/js/global.js"></script>
                
                <!-- Upload JS-->
                <script src="pages/CV/js/upload.js"></script>';         
        }
        //End JS
    ?> 
</body>
</html>