<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css main-->
    <link rel="stylesheet" href="css\style.css?v=<?php echo time() ?>">
    
    <!-- font main-->
    <link rel="preconnect" href="https://fonts.gstatic.com">    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    
    <!-- icon main-->
    <link rel="stylesheet" href="../icons/themify-icons.css">

    <!-- CSS_khac -->
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        if(isset($_GET['dangnhap']) || 
          (isset($_GET['dangtin']) && !isset($_SESSION['dangnhaptd']))){
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
                    .add-type__selected{
                        padding-left: 31px;
                        width: 272px;
                        height: 33px;
                    }
                </style>';
        }elseif (isset($_GET['dangtin']) && isset($_SESSION['dangnhaptd']) || isset($_GET['suacp']) || isset($_GET['suatd'])) {
            echo '
                <!-- Icons font CSS-->
                <link href="pages/dangtin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="pages/dangtin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">
            
                <!-- Vendor CSS-->
                <link href="pages/dangtin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="pages/dangtin/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
            
                <!-- Main CSS-->
                <link href="pages/dangtin/css/main.css" rel="stylesheet" media="all">

                <!-- Upload CSS-->
                <link href="pages/dangtin/css/upload.css" rel="stylesheet" media="all">
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
        }elseif (isset($_GET['hoso'])){
            echo '<link rel="stylesheet" href="pages/hoso/style.css">';
            echo '
                <style>
                    .haveUV{
                        background-color: #ccf1c5;
                    }
                    .ungtuyen{
                        margin-left: 100px
                    }
                    
                    .ungtuyen_btn{
                        background-color: #00b14f;
                        padding: 10px 20px;
                        margin: auto;
                        border-radius: 4px;
                        border: none;
                        color: white;
                        font-weight: 500;
                        outline: none;
                    }
                    
                    .ungtuyen_btn:hover{
                        background-color: #32bb70;
                        cursor: pointer;
                    }
                </style>';
        }elseif (isset($_GET['news'])) {
            echo '<link rel="stylesheet" href="pages/hoso/news_detail/style.css">';
            echo '
                <style>
                    .modifier{
                        display: flex;
                        margin: 20px 0 10px 0;
                    }

                    .xoa{
                        background-color: #de2424 !important;
                    }
                    
                    .ungtuyen a{
                        text-decoration: none;
                    }

                    .ungtuyen_btn{
                        background-color: #00b14f;
                        padding: 10px 20px;
                        margin: auto;
                        border-radius: 4px;
                        border: none;
                        color: white;
                        font-weight: 500;
                        outline: none;
                        margin-right: 20px;
                    }
                    
                    .ungtuyen_btn:hover{
                        opacity: 80%;
                        cursor: pointer;
                    }

                    .ungvien_container{
                        width: 100%;
                        display: flex;
                        flex-wrap: wrap;                 
                    }

                    .ungvien_container a{
                        text-decoration: none;
                        color: #333;
                    }

                    .ungvien_wrap{                       
                        display: flex;
                        border: 1px solid #ccc;
                        margin: 0 10px 10px 0;
                        width: 508px;
                        height: 154px;
                    }

                    .ungvien_wrap:hover{
                        background-color: rgb(240, 240, 240);
                    }

                    .ungvien_wrap img{
                        margin: 10px 60px 6px 20px;
                        width: 100px;
                        object-fit: contain;
                    }

                    .ungvien_text h3{
                        margin-top: 10px;
                    }
                    
                    .ungvien_text p{
                        margin: 0;
                    }

                    .text{
                        display: flex;
                        margin-top: 16px;
                        justify-content: space-between;
                    }
                </style>';
        }elseif (isset($_GET['ungvien'])) {
            echo '<link rel="stylesheet" href="pages/hoso/news_detail/my_CV/css/style.css">';
        }
        
    ?>
    <!-- Title -->
    <title>TopCV for Business</title>
    <!-- End_header -->
</head>
<body>
    <?php 
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
        //header
        include("../config/config.php");
        include("header.php");

        //content
        if(isset($_GET['dangnhap']) || 
          (isset($_GET['dangtin']) && !isset($_SESSION['dangnhaptd']))){
            include("pages/Login_user/index.php");
        }elseif(isset($_GET['dangky'])){
            include("pages/Register_user/index.php");
        }elseif (isset($_GET['dangtin']) && isset($_SESSION['dangnhaptd'])) {
            include('pages/dangtin/index.php');
        }elseif (isset($_GET['hoso'])) {
            include('pages/hoso/index.php');
        }elseif (isset($_GET['news'])) {
            include('pages/hoso/news_detail/news.php');
        }elseif (isset($_GET['ungvien'])) {
            include('pages/hoso/news_detail/my_CV/index.php');
        }elseif (isset($_GET['suacp']) || isset($_GET['suatd'])) {
            include('pages/sua/sua.php');
        }elseif (isset($_GET['xoatd'])) {

            function existUT(){
                include("../config/config.php");
                $sql = "SELECT * from ungtuyen where newsid = $_GET[newsid]";
                $query = mysqli_query($mysqli, $sql);
                $count = mysqli_num_rows($query);
        
                if($count > 0){
                    return true;
                }else {
                    return false;
                }
            }
           
            //xoa news
            $sql_xoa_news = "DELETE from news where id = $_GET[newsid]";
            mysqli_query($mysqli, $sql_xoa_news);
    
            //xoa ungtuyen
            if(existUT()){
                $sql_xoa_ut = "DELETE from ungtuyen where newsid = $_GET[newsid]";
                mysqli_query($mysqli, $sql_xoa_ut);
            }
            
            header("Location:index.php?hoso");
        }else{
            include("./filter.php");
            // include("./content.php");
        }        

        //footer
        include("footer.php");

        // JS
        if(isset($_GET['dangnhap'])){
            echo'
                <script src="pages/Login_user/vendor/jquery/jquery.min.js"></script>
                <script src="pages/Login_user/js/main.js"></script>';
        }elseif(isset($_GET['dangky'])){
            echo '
                <script src="pages/Register_user/vendor/jquery/jquery.min.js"></script>
                <script src="pages/Register_user/js/main.js"></script>';
        }elseif (isset($_GET['dangtin']) && isset($_SESSION['dangnhaptd']) || isset($_GET['suacp']) || isset($_GET['suatd'])) {
            echo '
                <!-- Jquery JS-->
                <script src="pages/dangtin/vendor/jquery/jquery.min.js"></script>
                <!-- Vendor JS-->
                <script src="pages/dangtin/vendor/select2/select2.min.js"></script>
                <script src="pages/dangtin/vendor/datepicker/moment.min.js"></script>
                <script src="pages/dangtin/vendor/datepicker/daterangepicker.js"></script>
            
                <!-- Main JS-->
                <script src="pages/dangtin/js/global.js"></script>
                
                <!-- Upload JS-->
                <script src="pages/dangtin/js/upload.js"></script>';         
        }
        //End JS
    ?> 
</body>
</html>