<?php  
    include("../config/config.php");
    GLOBAL $mess;
    GLOBAL $status;

    $mess = '';
    $status = '';
    if(isset($_POST['dangki'])){
        //thong tin dang nhap
        $user = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass']; 

        //thong tin ca nhan
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $company = $_POST['company'];
        $position = $_POST['location'];
        $address = $_POST['address'];


        if($pass == $re_pass && checkUserName($user)){
            $pass = md5($_POST['pass']);
            $sql = "INSERT into nhatuyendung(username, pass, email, name, phone, gender, company, vitrilamviec, address) 
                value ('".$user."', '".$pass."', '".$email."',
                       '".$name."', '".$phone."', '".$gender."',
                       '".$company."', '".$position."', '".$address."')";
            $query = mysqli_query($mysqli, $sql);
            $mess = 'Đăng ký thành công';
            $status = 'signup-success';
        }elseif (!checkUserName($user)) {
            $mess = 'Username đã tồn tại';
            $status = 'signup-eror';
        }else{
            $mess = 'Pass or re-pass wrong';
            $status = 'signup-eror';
        }
    }
    function checkUserName($username)
    {
        include("../config/config.php");
        $sql = "SELECT username from nhatuyendung";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            if($username == $row['username']){
                return false;
            }
        }
        return true;
    }
?>

<div class="main" style="padding: 20px 0;">
    <!-- Sign up form -->
    <section class="signup" style="margin: 0;">
        <div class="container">
            <div class="signup-content">                    
                <div class="signup-form">
                    <div class="<?php echo $status ?>">
                        <?php echo $mess ?>
                    </div>
                    <h2 class="form-title">Sign up</h2>
                    
                    <form method="POST" class="register-form" id="register-form">
                    <!-- thong tin dang nhap -->
                        <h3 class="form-title">THÔNG TIN ĐĂNG NHẬP</h3>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="user" id="user" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->

                    <!-- thông tin nha tuyen dung -->
                        <h3 class="form-title">THÔNG TIN NHÀ TUYỂN DỤNG</h3>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Họ và Tên"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="phone" id="phone" placeholder="Số điện thoại"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-male-female"></i></label>
                            <input type="text" name="gender" id="gen" placeholder="Giới tính"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-city"></i></label>
                            <input type="text" name="company" id="com" placeholder="Tên công ty"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-edit"></i></label>
                            <input type="text" name="location" id="lo" placeholder="Vị trí công tác"/>
                        </div>
                        <div class="form-group" style="border-bottom: 1px solid #999;">
                            <label for="pass"><i class="zmdi zmdi-pin-drop"></i></label>
                            <!-- <input type="text" name="address" id="add" placeholder="Địa điểm làm việc"/> -->
                            <select  name="address" class="add-type__selected">
                                <option value="">Tỉnh/ Thành phố
                                <option value="An Giang">An Giang
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
                                <option value="Bắc Giang">Bắc Giang
                                <option value="Bắc Kạn">Bắc Kạn
                                <option value="Bạc Liêu">Bạc Liêu
                                <option value="Bắc Ninh">Bắc Ninh
                                <option value="Bến Tre">Bến Tre
                                <option value="Bình Định">Bình Định
                                <option value="Bình Dương">Bình Dương
                                <option value="Bình Phước">Bình Phước
                                <option value="Bình Thuận">Bình Thuận
                                <option value="Bình Thuận">Bình Thuận
                                <option value="Cà Mau">Cà Mau
                                <option value="Cao Bằng">Cao Bằng
                                <option value="Đắk Lắk">Đắk Lắk
                                <option value="Đắk Nông">Đắk Nông
                                <option value="Điện Biên">Điện Biên
                                <option value="Đồng Nai">Đồng Nai
                                <option value="Đồng Tháp">Đồng Tháp
                                <option value="Đồng Tháp">Đồng Tháp
                                <option value="Gia Lai">Gia Lai
                                <option value="Hà Giang">Hà Giang
                                <option value="Hà Nam">Hà Nam
                                <option value="Hà Tĩnh">Hà Tĩnh
                                <option value="Hải Dương">Hải Dương
                                <option value="Hậu Giang">Hậu Giang
                                <option value="Hòa Bình">Hòa Bình
                                <option value="Hưng Yên">Hưng Yên
                                <option value="Khánh Hòa">Khánh Hòa
                                <option value="Kiên Giang">Kiên Giang
                                <option value="Kon Tum">Kon Tum
                                <option value="Lai Châu">Lai Châu
                                <option value="Lâm Đồng">Lâm Đồng
                                <option value="Lạng Sơn">Lạng Sơn
                                <option value="Lào Cai">Lào Cai
                                <option value="Long An">Long An
                                <option value="Nam Định">Nam Định
                                <option value="Nghệ An">Nghệ An
                                <option value="Ninh Bình">Ninh Bình
                                <option value="Ninh Thuận">Ninh Thuận
                                <option value="Phú Thọ">Phú Thọ
                                <option value="Quảng Bình">Quảng Bình
                                <option value="Quảng Bình">Quảng Bình
                                <option value="Quảng Ngãi">Quảng Ngãi
                                <option value="Quảng Ninh">Quảng Ninh
                                <option value="Quảng Trị">Quảng Trị
                                <option value="Sóc Trăng">Sóc Trăng
                                <option value="Sơn La">Sơn La
                                <option value="Tây Ninh">Tây Ninh
                                <option value="Thái Bình">Thái Bình
                                <option value="Thái Nguyên">Thái Nguyên
                                <option value="Thanh Hóa">Thanh Hóa
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế
                                <option value="Tiền Giang">Tiền Giang
                                <option value="Trà Vinh">Trà Vinh
                                <option value="Tuyên Quang">Tuyên Quang
                                <option value="Vĩnh Long">Vĩnh Long
                                <option value="Vĩnh Phúc">Vĩnh Phúc
                                <option value="Yên Bái">Yên Bái
                                <option value="Phú Yên">Phú Yên
                                <option value="Tp.Cần Thơ">Tp.Cần Thơ
                                <option value="Tp.Đà Nẵng">Tp.Đà Nẵng
                                <option value="Tp.Hải Phòng">Tp.Hải Phòng
                                <option value="Tp.Hà Nội">Tp.Hà Nội
                                <option value="TP  HCM">TP HCM
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="dangki" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="pages/Register_user/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="index.php?dangnhap" class="signup-image-link">đăng nhập</a>
                </div>
            </div>
        </div>
    </section>

</div>