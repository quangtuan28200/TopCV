<?php
    include("../../../config/config.php");
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
        <div class="info_company" style="padding-bottom: 10px;">
            <div class="company_wrap">
                <img src="<?php echo '../../../nhatuyendung/pages/dangtin/logo/'.$logo ?>" alt="">
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
    </div>
</div>