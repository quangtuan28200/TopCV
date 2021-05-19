<?php
    include("../config/config.php");
    //Khoi tao 1 session 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    GLOBAL $haveUV;

    //macdinh
    $logo = 'logo.png';
    $name = 'CÔNG TY TNHH GIẢI PHÁP ĐÔ THỊ NAM HẢI';
    $address = 'Ha Noi';
    $phone = '0387126034';
    $email = 'namhai@gmail.com';
    $introduce = 'Công ty TNHH giải pháp đô thị Nam Hải – đơn vị được biết đến trong lĩnh vực chuyên cung cấp các dòng ắc quy xe nâng, xe điện và máy nạp cùng phụ kiện nhập khẩu chính hãng có chất lượng hàng đầu như ắc quy KOBE-HITACHI, ắc quy MIDAC, ắc quy thương hiệu US Battery…..
    Nhằm tri ân khách hàng đã, đang và SẼ hợp tác với Nam Hải. Nhân dịp cuối năm 2016 , Nam Hải gửi đến quý khách hàng Chương trình quà tặng “ Mua ắc quy nhận lì xì” cực hấp dẫn, trong đó bao gồm các hạng mục dành cho tất cả những ai đặt mua ắc quy trong thời gian của chương trình.';

    //lay data company
    $sql = "SELECT * from company where ntdid = $_SESSION[id]";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        $logo = $row['logo'];
        $name = $row['name'];
        $address = $row['addressCP'];
        $phone = $row['phone'];
        $email = $row['email'];
        $introduce = $row['introduceCP'];
    }    

    //chuyen den trang sua CP
    if(isset($_POST['suacp'])){
        header("Location:index.php?suacp");
    }

?>

<div class="main_container">
    <div class="container">
        <div class="info_company">
            <div class="company_wrap">
                <img src="<?php echo 'pages/dangtin/logo/'.$logo ?>" alt="">
                <div class="company_name">
                    <h2 class=""><?php echo $name ?></h2>
                    <p class="company_address">Địa chỉ: <?php echo $address ?></p>
                    <p class="company_contact">Đường dây nóng: <?php echo $phone ?></p>
                    <p class="company_contact">Email: <?php echo $email ?></p>
                </div>
            </div>
            <div class="company_introduce">
                <h3>GIỚI THIỆU CÔNG TY</h3>
                <p><?php echo $introduce ?></p>
            </div>
        </div>

        <!-- sua thong tin company -->
        <form method="POST" action="">
            <div class="ungtuyen">                     
                <input type="submit" name="suacp" class="ungtuyen_btn" value="SỬA THÔNG TIN CÔNG TY"/>          
            </div>
        </form>

        <div class="info_news">

            <!-- cho duyet -->
            <div class="choduyet">
                <h3>TIN CHỜ DUYỆT</h3>
                <?php
                    //lay data news
                    $sql = "SELECT * from news where ntdid = $_SESSION[id] and status = 0";
                    $query = mysqli_query($mysqli, $sql);
                    while($row = mysqli_fetch_array($query)){
                        //thong bao co ung vien
                        $sql_noti = "SELECT * from ungtuyen ut, cv c where newsid = $row[id] and ut.userid = c.userid";
                        $query_noti = mysqli_query($mysqli, $sql_noti);
                        $count = mysqli_num_rows($query_noti);     
                        if($count > 0){
                            $haveUV = 'haveUV';
                        }else{
                            $haveUV = '';
                        }        
                ?>
                        <div class="news_wrap <?php echo $haveUV ?>">
                            <a href="<?php echo '?news&newsid='.$row['id'] ?>">
                                <h3><?php echo $row['title'] ?></h3>
                                <div class="news_detail">
                                    <p class="time_end">Hạn: <?php echo $row['date'] ?></p>
                                    <p class="salary">Lương: <?php echo $row['salary'] ?></p>
                                    <p class="address">Địa chỉ: <?php echo $row['address'] ?></p>
                                </div>
                            </a>
                            
                        </div>
                <?php
                    }
                ?>
            </div>

            <!-- da duyet -->
            <div class="choduyet">
                <h3>TIN ĐANG ĐĂNG</h3>
                <?php
                    //lay data news
                    $sql = "SELECT * from news where ntdid = $_SESSION[id] and status = 1";
                    $query = mysqli_query($mysqli, $sql);
                    while($row = mysqli_fetch_array($query)){
                        //thong bao co ung vien
                        $sql_noti = "SELECT * from ungtuyen ut, cv c where newsid = $row[id] and ut.userid = c.userid";
                        $query_noti = mysqli_query($mysqli, $sql_noti);
                        $count = mysqli_num_rows($query_noti);     
                        if($count > 0){
                            $haveUV = 'haveUV';
                        }else{
                            $haveUV = '';
                        }        
                ?>
                        <div class="news_wrap <?php echo $haveUV ?>">
                            <a href="<?php echo '?news&newsid='.$row['id'] ?>">
                                <h3><?php echo $row['title'] ?></h3>
                                <div class="news_detail">
                                    <p class="time_end">Hạn: <?php echo $row['date'] ?></p>
                                    <p class="salary">Lương: <?php echo $row['salary'] ?></p>
                                    <p class="address">Địa chỉ: <?php echo $row['address'] ?></p>
                                </div>
                            </a>
                            
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>