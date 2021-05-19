<?php
    //thong tin mac
    $avatar = 'avatar_default.jpg';
    $name = 'Nguyễn Văn A';
    $email = 'hotro@topcv.vn';
    $phone = '(024) 6680 5588';
    $gender = 'Nam';
    $date = '19/05/1992';
    $address = 'Số 1 đường Cầu Giấy, Hà Nội';
    $edu = 'Đại học TOPCV ,  Quản trị Doanh nghiệp10/2010 - 05/2014
    Tốt nghiệp loại Giỏi, điểm trung bình 8.0';
    $exp = 'Công ty TOPCV ,  Nhân viên bán hàng
    03/2015 - Hiện tại
    - Hỗ trợ viết bài quảng cáo sản phẩm qua kênh facebook, các forum,...
    - Giới thiệu, tư vấn sản phẩm, giải đáp các vấn đề thắc mắc của khách hàng qua điện thoại và email.
    Cửa hàng TOPCV ,  Nhân viên bán hàng
    06/2014 - 02/2015
    - Bán hàng trực tiếp tại cửa hàng cho người nước ngoài và người Việt.
    - Quảng bá sản phẩm thông qua các ấn phẩm truyền thông: banner, poster, tờ rơi...
    - Lập báo cáo sản lượng bán ra hàng ngày.';
    $acti = 'Nhóm tình nguyện TOPCV ,  Tình nguyện viên10/2013 - 08/2014
    Tập hợp các món quà và phân phát tới người vô gia cư.
    - Chia sẻ, động viên họ vượt qua giai đoạn khó khăn, giúp họ có những suy nghĩ lạc quan.';
    $chungchi = '2013
    Giải nhất Tài năng TOPCV';
    $prize = '2014
    Nhân viên xuất sắc năm công ty TOPCV';
    $skill = 'Tin học văn phòng TOPCV: - Sử dụng thành thạo các công cụ Word, Excel, Power Point
    Tiếng Anh: - Khả năng giao tiếp Tiếng Anh trôi chảy';
    $hobbit = 'Đọc sách - Mỗi tháng đọc 1 quyển sách về kinh doanh.
    Đá bóng - Tham gia hoạt động đá bóng của công ty hàng tuần';

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
                <img style="border-radius: 20px;" src="<?php echo 'pages/CV/avatar/'.$avatar ?>" alt="">
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