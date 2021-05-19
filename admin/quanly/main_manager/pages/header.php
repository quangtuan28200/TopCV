<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_GET['dangxuat'])){
        unset($_SESSION['dangnhapAD']);
        header("Location:../../admin.php");
    }
?>

<div class="header">
    <div class="header_container">
        <a href="index.php">
            <h2>ADMINISTRATOR'S PAGE</h2>
        </a>
        <div class="header_nav">
            <div class="acc">
                <h3><?php echo $_SESSION['dangnhapAD'] ?></h3>
                <div class="header_icon"><i class="ti-angle-down"></i>
                </div> 
                <div class="dangxuat">
                    <a href="?dangxuat">
                        <h3>Đăng xuất</h3>
                    </a>           
                </div>
            </div>
            <a href="?user">
                <h3 class="text">Quản lý ứng viên</h3>
            </a>
            <a href="?ntd">
                <h3 class="text">Quản lý nhà tuyển dụng</h3>
            </a>
            
        </div>
    </div>
</div>