<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $username = $_SESSION['dangnhaptd'];
    $id = $_SESSION['id'];
    // $sql = "SELECT id from nhatuyendung where username = '".$username."'";
    // $query = mysqli_query($mysqli, $sql);
    // while($row = mysqli_fetch_array($query)){
    //     $id = $row['id'];
    // };

    if(isset($_GET['dangxuat'])){
        unset($_SESSION['dangnhaptd']);
        unset($id);
        header("Location:index.php");
    }
?>

<div class="header__acc">
    <p><?php echo $username ?></p>
    <p><i class="ti-angle-down"></i></p> 
    <div class="acc__option">
        <div class="acc__option__header">
            <span>Mã NTD: <?php echo $id ?></span>
        </div>
        <div class="acc__option__item">
            <a href="?hoso" class="acc__option__link">Hồ sơ</a>
        </div>
        <div class="acc__option__item">
            <a href="?dangxuat" class="acc__option__link">Đăng xuất</a>
        </div>
    </div>        
</div>       