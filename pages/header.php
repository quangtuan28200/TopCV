<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    GLOBAL $userid;
    GLOBAL $CV_created;
    GLOBAL $CV_GET;
    $CV_GET = '?taocv';
    $CV_created = 'Tạo CV';
    if(isset($_SESSION['dangnhap'])){
        $userid = $_SESSION['userid'];
        $mess = '&userid='.$userid;

        //Kiem tra xem user da tao CV hay chua
        $sql = "SELECT * from cv where userid = '".$userid."'";
        $query = mysqli_query($mysqli, $sql);
    
        while($row = mysqli_fetch_array($query)){
            if($row['userid'] == $userid){
                $CV_GET = '?suacv';
                $CV_created = 'Sửa CV';
            }
        }
    }else{
        $mess = '';
    }
?>

<div class="header">
    <div class="header__container">
        <a href="index.php" class="">
            <img src="./images/logo1.png" class="header__logo"></img>
        </a>
        <div class="header__nav">          
            <div class="header__login">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
                    if(isset($_SESSION['dangnhap'])){
                        include('login_acc/acc.php');
                    }else {
                        include('login_acc/login.php');
                    }
                ?>                
            </div>
            <div class="header__CV" style="margin-left: 25px;">
                <a class="header__link" href="<?php echo $CV_GET.$mess ?>"><?php echo $CV_created ?></a> 
            </div>
            <div class="header__recruiters">
                <a class="header__link" href="nhatuyendung/index.php">Nhà tuyển dụng</a>  
            </div>
        </div>
    </div>
    
</div>