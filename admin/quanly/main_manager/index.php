<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css main-->
    <link rel="stylesheet" href="style.css">

    <!-- icon main-->
    <link rel="stylesheet" href="../../../icons/themify-icons.css">

    <!-- CSS khac -->
    <?php
        if(isset($_GET['user']) || isset($_GET['xoa'])){
            echo '<link rel="stylesheet" href="../user_manager/style.css">';
        }else if(isset($_GET['ntd']) || isset($_GET['xoa_ntd'])){
            echo '<link rel="stylesheet" href="../ntd_manager/style.css">';
            echo '
                <style>
                    .news_wrap{
                        border: 1px solid #ccc;
                        margin-bottom: 10px;
                        max-width: 60%;
                        margin: 0 auto 10px auto ;
                    }
                    
                    .news_wrap:hover{
                        background-color: rgb(241, 238, 238);
                    }
                    
                    .news_wrap a{
                        text-decoration: none;
                        color: black;
                    }
                    
                    .news_wrap h3{
                        margin: 5px 10px 10px 15px;
                    }
                    
                    .news_detail{
                        margin: 0 15px;
                        display: flex;
                        justify-content: space-between;
                        line-height: 0px;
                    }
                </style>';
        }else if(isset($_GET['news'])){
            echo '<link rel="stylesheet" href="../ntd_manager/news_detail/style.css">';
            echo' 
                <style>
                    .xoa{
                        background-color: #de2424 !important;
                    }

                    .hide{
                        display: none;
                    }
                </style>';
        }else if(isset($_GET['company'])){
            echo '<link rel="stylesheet" href="../ntd_manager/news_detail/company/style.css">';
        }
        
    ?>
    <title>ADMIN</title>
</head>
<body>
    <?php
        include("../../../config/config.php");
        include("pages/header.php");
        if(isset($_GET['user']) || isset($_GET['xoa'])){
            include("../user_manager/index.php");
        }else if(isset($_GET['ntd']) || isset($_GET['xoa_ntd'])){
            include("../ntd_manager/index.php");
        }else if(isset($_GET['news'])){
            include("../ntd_manager/news_detail/news.php");
        }else if(isset($_GET['company'])){
            include("../ntd_manager/news_detail/company/index.php");
        }else{
            include("pages/content.php");
        }
        include("pages/footer.php");
    ?>
</body>
</html>