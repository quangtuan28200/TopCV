<?php
    include("config/config.php");
    GLOBAL $mess;
    GLOBAL $status;
    GLOBAL $hide;
    GLOBAL $showCV;

    $mess = '';
    $status = '';
    $hide = '';
    $showCV = 'hide';
    if(isset($_POST['taocv'])){
        $userid = $_GET['userid'];
		$name = $_POST['name'];
		$add = $_POST['add'];
		$date = $_POST['date'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$edu = $_POST['edu'];
		$exp = $_POST['exp'];
		$acti = $_POST['acti'];
		$chungchi = $_POST['chungchi'];
		$prize = $_POST['prize'];
		$skill = $_POST['skill'];
		$hobbit = $_POST['hobbit'];   

        
        //Xu ly hinhanh
        $avatar = $_FILES['img']['name'];
        $avatar_tmp= $_FILES['img']['tmp_name'];
        
        //Hàm time() sẽ trả về số giây tính từ thời điểm 00:00:00 1/1/1970 đến thời điểm hiện tại.
        $avatar = time().'_'.$avatar;

        $sql = "INSERT into cv(userid, img, address, date, gendar, email, phone, edu, exp, acti, chungchi, prize, skill, hobbit, name) 
                            value ('".$userid."', '".$avatar."', '".$add."',
                                    '".$date."', '".$gender."', '".$email."',
                                    '".$phone."', '".$edu."', '".$exp."',
                                    '".$acti."', '".$chungchi."', '".$prize."',
                                    '".$skill."', '".$hobbit."', '".$name."')";
        $query = mysqli_query($mysqli, $sql);
        if(!$query)
        {
            echo mysqli_error($mysqli);
            die();
        }
        else
        {
            //Chuyen hinh anh luu vao foder uploads
            move_uploaded_file($avatar_tmp, 'pages/CV/avatar/'.$avatar);
    
            //Cac bien mess
            $mess = 'Tạo CV thành công';
            $status = 'signup-success';
            $hide = 'hide';
            $showCV = '';
        } 

    }
?>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" style="padding: 20px 0;">
    <div class="wrapper wrapper--w680" style="max-width: 1100px;">
        <div class="card card-4">
            <div class="card-body">
                <!-- mess thanh cong -->
                <div class="<?php echo $status ?>">
                    <?php echo $mess ?>
                </div>
                <!-- title -->
                <h2 class="title <?php echo $hide ?>">Nhập thông tin</h2>

                <!-- vao xem CV -->
                <a href="<?php echo '?hoso&userid='.$userid ?>" class="<?php echo $showCV ?>">XEM CV</a>

                <!-- Gui anh phai co enctype -->
                <form class="<?php echo $hide ?>" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <label class="label">Chọn ảnh avatar</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <!-- <input type="file">                 -->
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <div class="file-upload">
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">CHỌN ẢNH</button>

                            <div class="image-upload-wrap">
                                <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                <div class="drag-text">
                                <h3 style="font-weight: 300;">Kéo và thả ảnh vào đây hoặc bấm chọn ảnh</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">XÓA <span class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Họ và tên</label>
                                <input class="input--style-4" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Địa chỉ</label>
                                <!-- <input class="input--style-4" type="text" name="add"> -->
                                <select style="height: 50px; width: 470px; border: none; outline: none;" name="add" class="input--style-4">
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
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Ngày sinh</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="text" name="date">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Giới tính</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Nam
                                        <input type="radio" checked="checked" name="gender" value="Nam">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Nữ
                                        <input type="radio" name="gender" value="Nữ">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Điện thoại</label>
                                <input class="input--style-4" type="text" name="phone">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="input-group">
                        <label class="label">Subject</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="subject">
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option>Subject 1</option>
                                <option>Subject 2</option>
                                <option>Subject 3</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div> -->
                    <div class="input-group">
                        <label class="label">Học vấn</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="edu" rows="9" cols="70"></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Kinh nghiệm</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="exp" rows="9" cols="70"></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Hoạt động</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="acti" rows="9" cols="70"></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Chứng chỉ</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="chungchi" rows="9" cols="70"></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Giải thưởng</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="prize" rows="9" cols="70"></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">kỹ năng</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="skill" rows="9" cols="70"></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Sở thích</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea class="hocvan" name="hobbit" rows="9" cols="70"></textarea>  
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button name="taocv" class="btn btn--radius-2 btn--blue" type="submit">TẠO CV</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>