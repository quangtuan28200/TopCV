<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    GLOBAL $mess;
    if(isset($_SESSION['dangnhaptd'])){
        $mess = '?dangtin';
    }else{
        $mess = '?dangnhap';
    }
?>

<div class="header">
    <div class="header__container">
        <a href="index.php" class="">
            <img src="../images/logo_topcv_for_business.png" class="header__logo"></img>
        </a>
        <div class="header__nav">          
            <div class="header__login">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
                    if(isset($_SESSION['dangnhaptd'])){
                        include('pages/login_acc/acc.php');
                    }else {
                        include('pages/login_acc/login.php');
                    }
                ?>                
            </div>
            <div class="header__CV" style="margin-left: 25px;">
                <a class="header__link" href="<?php echo $mess ?>">Đăng tin</a> 
            </div>
            <div class="header__recruiters">
                <a class="header__link" href="../index.php">Người tìm việc</a>           
            </div>
        </div>
    </div>
    
</div>