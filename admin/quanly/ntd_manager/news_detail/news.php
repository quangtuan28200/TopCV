<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include("../../../config/config.php");
    GLOBAL $status;

    if(duyeted()){
        $status = 'THÊM LẠI VÀO CHỜ';
    }else{
        $status = 'DUYỆT';
    }
    
    if(isset($_POST['duyet'])){
        if(duyeted()){
            //chuyen ve chua duyet
            $sql_duyet = "UPDATE news set status = 0 where id = $_GET[newsid]";
            mysqli_query($mysqli, $sql_duyet);

            //xoa ung tuyen
            $sql_xoa_ut = "DELETE from ungtuyen where newsid = $_GET[newsid]";
            mysqli_query($mysqli, $sql_xoa_ut);

            header("Location:index.php?ntd");          
        }else{
            $sql_duyet = "UPDATE news set status = 1 where id = $_GET[newsid]";
            mysqli_query($mysqli, $sql_duyet);
            header("Location:index.php?ntd");          
        }
        
    }

    if(isset($_POST['xoa'])){
        function existUT(){
            include("../../../config/config.php");
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
        
        header("Location:index.php?ntd");
    }

    //ham check da duyet hay chua
    function duyeted(){
        include("../../../config/config.php");
        $sql_duyeted = "SELECT status from news where id = $_GET[newsid]";
        $query_duyeted = mysqli_query($mysqli, $sql_duyeted);

        while($row = mysqli_fetch_array($query_duyeted)){  
            if($row['status'] == 1){
                return true;
            }
        }
        return false;
    }

    $sql = "SELECT * from news n, company c where n.ntdid = c.ntdid and n.id = $_GET[newsid]";
    $query = mysqli_query($mysqli, $sql);
    if(!$query)
    {
        echo mysqli_error($mysqli);
        die();
    }
    else{ 
    while($row = mysqli_fetch_array($query)){    
?>

        <div class="main">
            <div class="container">

                <div class="news_info">
                    <img src="<?php echo '../../../nhatuyendung/pages/dangtin/logo/'.$row['logo'] ?>">
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
                    <form method="POST" action="">
                        <div class="ungtuyen">                     
                            <input type="submit" name="duyet" class="ungtuyen_btn" value="<?php echo $status ?>"/>   
                            <input type="submit" name="xoa" class="ungtuyen_btn xoa" value="XÓA"/>          
                            <p><?php echo 'Hạn nộp hồ sơ: '.$row['date'] ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
    }}
?>