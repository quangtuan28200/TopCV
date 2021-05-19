<?php
    include("../config/config.php");
    $sql = "SELECT * from cv where userid = $_GET[userid]";
    $query = mysqli_query($mysqli, $sql);

    while($row = mysqli_fetch_array($query)){
        $avatar = $row['img'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $gender = $row['gendar'];
        $date = $row['date'];
        $address = $row['address'];
        $edu = $row['edu'];
        $exp = $row['exp'];
        $acti = $row['acti'];
        $chungchi = $row['chungchi'];
        $prize = $row['prize'];
        $skill = $row['skill'];
        $hobbit = $row['hobbit'];
    }
?>

<div class="cv__container">
    <div class="cv__form">
        <div class="form__self">
            <div class="self__img">
                <img style="border-radius: 20px;" src="<?php echo '../pages/CV/avatar/'.$avatar ?>" alt="">
            </div>
            <div class="self__info">
                <h1 class="self__name"><?php echo $name ?></h1>
                <div class="self__email">
                    <h3>Email: </h3>
                    <p><?php echo $email ?></p>
                </div>
                <div class="self__phone">
                    <h3>Điên thoại: </h3>
                    <p><?php echo $phone ?></p>
                </div>
                <div class="self__gendar">
                    <h3>Giới tính: </h3>
                    <p><?php echo $gender ?></p>
                </div>
                <div class="self__date">
                    <h3>Ngày sinh: </h3>
                    <p><?php echo $date ?></p>
                </div>
                <div class="self__add">
                    <h3>Địa chỉ: </h3>
                    <p><?php echo $address ?></p>
                </div>
            </div>
        </div>
        <div class="form__work">
            <div class="work__edu">
                <h2>HỌC VẤN</h2>
                <p><?php echo $edu ?></p>
            </div>
            <div class="work__exp">
                <h2>KINH NGHIỆM LÀM VIỆC</h2>
                <p><?php echo $exp ?></p>
            </div>
            <div class="work__activity">
                <h2>HOẠT ĐỘNG</h2>
                <p><?php echo $acti ?></p>
            </div>
            <div class="work__certifycate">
                <h2>CHỨNG CHỈ</h2>
                <p><?php echo $chungchi ?></p>
            </div>
            <div class="work__prize">
                <h2>GIẢI THƯỞNG</h2>
                <p><?php echo $prize ?></p>
            </div>
            <div class="work__skill">
                <h2>CÁC KỸ NĂNG</h2>
                <p><?php echo $skill ?></p>
            </div>
            <div class="work__hobbit">
                <h2>SỞ THÍCH</h2>
                <p><?php echo $hobbit ?></p>
            </div>
        </div>
    </div>
</div>