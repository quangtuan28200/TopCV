<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include("config/config.php");
    GLOBAL $disable;
    GLOBAL $ungtuyen;
    GLOBAL $mess;
    GLOBAL $show;
    GLOBAL $check1;
    GLOBAL $check2;

    $disable ='';
    $mess = '';
    $show = 'hide';
    $check1 = 'hide';
    $check2 = 'hide';
    //disable btn ung tuyen
    if(exist()){
        // $disable = 'disable';
        $check1='';
        $ungtuyen = 'HỦY ỨNG TUYỂN';
    }else if(!existCV()){
        // $ungtuyen = 'TẠO CV NGAY';
        $check2='';
        $show = '';
    }else{
        $check1='';
        $ungtuyen = 'ỨNG TUYỂN NGAY';
    }

    if(isset($_POST['ungtuyen'])){
        if(existCV() && !exist()){
            $sql_ungtuyen = "INSERT into ungtuyen(userid, newsid) value ('".$_SESSION['userid']."', '".$_GET['newsid']."')";
            $query_ungtuyen = mysqli_query($mysqli, $sql_ungtuyen);
    
            $mess = 'Ứng tuyển thành công';
            $show = 'show';
        }elseif(exist()){
            $sql_xoa_ut = "DELETE from ungtuyen where userid = $_SESSION[userid] and newsid = $_GET[newsid]";
            mysqli_query($mysqli, $sql_xoa_ut);

            $mess = 'Đã hủy ứng tuyển';
            $show = 'show';
        }else{
            header("Location:index.php");
        }
    }

    function exist(){
        include("config/config.php");
        $sql_dis = "SELECT userid from ungtuyen where newsid = $_GET[newsid]";
        $query_dis = mysqli_query($mysqli, $sql_dis);

        while($row = mysqli_fetch_array($query_dis)){  
            if($_SESSION['userid'] == $row['userid']){
                return true;
            }
        }
        return false;
    }

    function existCV(){
        include("config/config.php");
        $sql = "SELECT * from cv where userid = $_SESSION[userid]";
        $query = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($query);

        if($count > 0){
            return true;
        }else{
            return false;
        } 
    }

    $sql = "SELECT * from news n, company c where n.ntdid = c.ntdid and id = $_GET[newsid]";
    $query = mysqli_query($mysqli, $sql);
    
    while($row = mysqli_fetch_array($query)){    
?>

        <div class="main">
            <div class="container">
                <!-- //notifi -->
                <div class="<?php echo $show ?>">
                    <?php echo $mess ?>
                </div>

                <div class="news_info">
                    <img src="<?php echo 'nhatuyendung/pages/dangtin/logo/'.$row['logo'] ?>">
                    <div class="text_wrap">
                        <h2 class="title"><?php echo $row['title'] ?></h2>
                        <p class="name">
                            <a href="<?php echo '?company&ntdid='.$row['ntdid'] ?>"><?php echo $row['name'] ?></a>
                        </p>
                        <p class="address"><?php echo 'Địa chỉ: '.$row['addressCP'] ?></p>
                        <p class="date"><?php echo 'Hạn nộp hồ sơ: '.$row['date'] ?></p>
                    </div>
                </div>

                <div class="news_detail">
                    <h3>MÔ TẢ CÔNG VIỆC</h3>
                    <p><?php echo $row['introduce'] ?></p>
                    <h3>YÊU CẦU ỨNG VIÊN</h3>
                    <p><?php echo $row['request'] ?></p>
                    <h3>QUYỀN LỢI ĐƯỢC HƯỞNG</h3>
                    <p><?php echo $row['benefit'] ?></p>
                    <h3>CÁCH THỨC ỨNG TUYỂN</h3>
                    <form method="POST" action="">
                        <div class="ungtuyen">                     
                            <input type="submit" name="ungtuyen" class="ungtuyen_btn <?php echo $check1 ?>" value="<?php echo $ungtuyen ?>"/>
                            <a style="text-decoration: none;" class="ungtuyen_btn <?php echo $check2 ?>" href="<?php echo '?taocv&userid='.$_SESSION['userid'] ?>">TẠO CV NGAY</a>        
                            <p><?php echo 'Hạn nộp hồ sơ: '.$row['date'] ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
    }
?>