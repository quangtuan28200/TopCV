<?php
    include("config/config.php");
    //Khoi tao 1 session 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //lay data company
    $sql = "SELECT * from company where ntdid = $_GET[ntdid]";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        $logo = $row['logo'];
        $name = $row['name'];
        $address = $row['addressCP'];
        $phone = $row['phone'];
        $email = $row['email'];
        $introduce = $row['introduceCP'];
    }    

?>

<div class="main_container">
    <div class="container">
        <div class="info_company">
            <div class="company_wrap">
                <img src="<?php echo 'nhatuyendung/pages/dangtin/logo/'.$logo ?>" alt="">
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
        <div class="info_news">
            <!-- da ung tuyen -->
            <div class="daungtuyen">
                <h3>TIN ĐÃ ỨNG TUYỂN</h3>
                <?php
                    //lay data news
                    $sql = "SELECT news.id, title, date, salary, address from news, ungtuyen where ntdid = $_GET[ntdid] and status = 1 and news.id = newsid and userid = $_SESSION[userid]";
                    $query = mysqli_query($mysqli, $sql);
                    if(!$query)
                    {
                        echo mysqli_error($mysqli);
                        die();
                    }
                    else{
                    while($row = mysqli_fetch_array($query)){
                ?>
                        <div class="news_wrap">
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
                    }
                ?>
            </div>
            <!-- da dang -->
            <div class="dadang">
                <h3>TIN TUYỂN DỤNG KHÁC</h3>
                <?php
                    //lay data news
                    $sql = "SELECT id, title, date, salary, address from news where ntdid = $_GET[ntdid] and status = 1
                            EXCEPT
                            SELECT news.id, title, date, salary, address from news, ungtuyen where ntdid = $_GET[ntdid] and status = 1 and news.id = newsid and userid = $_SESSION[userid]";
                    $query = mysqli_query($mysqli, $sql);
                    if(!$query)
                    {
                        echo mysqli_error($mysqli);
                        die();
                    }
                    else{
                    while($row = mysqli_fetch_array($query)){
                ?>
                        <div class="news_wrap">
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
                    }
                ?>
            </div>
        </div>
    </div>
</div>