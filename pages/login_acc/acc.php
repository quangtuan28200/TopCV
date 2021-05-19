<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $username = $_SESSION['dangnhap'];
    $sql = "SELECT userid from user where username = '".$username."'";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        $userid = $row['userid'];
    };

    if(isset($_GET['dangxuat'])){
        unset($_SESSION['dangnhap']);
        unset($_SESSION['userid']);
        header("Location:index.php");
    }
?>

<div class="header__acc">
    <p><?php echo $username ?></p>
    <p><i class="ti-angle-down"></i></p> 
    <div class="acc__option">
        <div class="acc__option__header">
            <span>Mã ứng viên: <?php echo $userid ?></span>
        </div>
        <div class="acc__option__item">
            <a href="<?php echo '?hoso&userid='.$userid ?>" class="acc__option__link">Hồ sơ</a>
        </div>
        <div class="acc__option__item">
            <a href="?dangxuat" class="acc__option__link">Đăng xuất</a>
        </div>
    </div>        
</div>       