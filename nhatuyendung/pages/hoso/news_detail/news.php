<?php
    include("../config/config.php");
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
                    <img src="<?php echo 'pages/dangtin/logo/'.$row['logo'] ?>">
                    <div class="text_wrap">
                        <h2 class="title"><?php echo $row['title'] ?></h2>
                        <p class="name">
                            <a href="?hoso"><?php echo $row['name'] ?></a>
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

                    <!-- //danh sach ung vien da ung tuyen -->
                    <h3>ỨNG VIÊN ỨNG TUYỂN</h3>                                
                    <div class="ungvien_container">
                        <?php
                            $sql = "SELECT * from ungtuyen ut, cv c where newsid = $_GET[newsid] and ut.userid = c.userid";
                            $query = mysqli_query($mysqli, $sql);

                            while($row = mysqli_fetch_array($query)){  
                        ?>
                                <a href="<?php echo '?ungvien&userid='.$row['userid'] ?>">
                                    <div class="ungvien_wrap">
                                        <div class="ungvien_img">
                                            <img src="<?php echo '../pages/CV/avatar/'.$row['img'] ?>" alt="">
                                        </div>
                                        <div class="ungvien_text">
                                            <h3><?php echo $row['name'] ?></h3>
                                            <div class="text">
                                                <p><?php echo $row['gendar'] ?></p>
                                                <p><?php echo $row['address'] ?></p>
                                            </div>                               
                                        </div>
                                    </div>                        
                                </a>
                        <?php
                            }
                        ?>
                    </div>

                    <div class="modifier">
                        <!-- sua tin -->
                        <form method="POST" action="">                           
                            <div class="ungtuyen">          
                                <a href="<?php echo'?suatd&newsid='.$_GET['newsid'] ?>" class="ungtuyen_btn">SỬA</a>           
                                <!-- <input type="submit" name="suatd" class="ungtuyen_btn" value="SỬA"/>           -->
                            </div>                         
                        </form>
    
                        <!-- xoatin tin -->
                        <form method="POST" action="">
                            <div class="ungtuyen">   
                                <a href="<?php echo'?xoatd&newsid='.$_GET['newsid'] ?>" class="ungtuyen_btn xoa">XÓA</a>           
                                <!-- <input type="submit" name="xoatd" class="ungtuyen_btn xoa" value="XÓA"/>           -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
    }
?>