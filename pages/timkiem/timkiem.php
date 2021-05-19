<div class="content">
    <div class="content__container">
        <div class="content__header">
            <p>TIN TUYỂN DỤNG, VIỆC LÀM TỐT NHẤT</p>
        </div>
        <div class="content__wrap">
            <ul class="content__list">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }   
                    //lay data news
                    $sql = "SELECT * from news n, company c where n.ntdid = c.ntdid and status = 1 
                            and title LIKE '%".$_GET['tukhoa']."%' and address LIKE '%".$_GET['address']."%'";
                    $query = mysqli_query($mysqli, $sql);
                        
                    while($row = mysqli_fetch_array($query)){    
                ?>
                        <li class="content__item">
                            <a href="<?php echo '?news&newsid='.$row['id'] ?>" class="content__link">
                                <div class="content__dtail">
                                    <img src="<?php echo 'nhatuyendung/pages/dangtin/logo/'.$row['logo'] ?>" class="dtail__img"></img>
                                    <div class="detail__textWrap">
                                        <h3 class="dtail__header"><?php echo $row['title'] ?></h3>
                                        <p class="dtail__company"><?php echo $row['name'] ?></p>
                                        <div class="dtail__price-add">
                                            <div class="dtail__price"><?php echo $row['salary'] ?></div>
                                            <div class="dtail__add"><?php echo $row['address'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                <?php
                    }
                ?>

                
            </ul>
        </div>
    </div>
</div>