<?php
    include("../config/config.php");
    //Khoi tao 1 session 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    GLOBAL $mess;
    GLOBAL $status;
    GLOBAL $showCV;
    GLOBAL $hide;

    $mess = '';
    $status = '';
    $showCV = 'hide';
    $hide = '';

    if(exist($_SESSION['id'])){
        $hide = 'hide';
    }

    if(isset($_POST['taotin'])){
        //thong tin cong ty
        $ntdid = $_SESSION['id'];
		$name = $_POST['name'];
		$address = $_POST['add'];
        $phone = $_POST['phone'];
		$email = $_POST['email'];
        $introduce = $_POST['intro'];
		//Xu ly hinhanh
        $logo = $_FILES['img']['name'];
        $logo_tmp= $_FILES['img']['tmp_name'];

        //Hàm time() sẽ trả về số giây tính từ thời điểm 00:00:00 1/1/1970 đến thời điểm hiện tại.
        $logo = time().'_'.$logo;

        // thong tin tuyen dung
		$title = $_POST['title'];
		$salary = $_POST['salary'];
		$date = $_POST['date'];
        $address = $_POST['address'];
		$introducecv = $_POST['introcv'];
		$request = $_POST['request'];
		$benefit = $_POST['benefit'];
        
        //neu chua co thong tin cong ty
        if(!exist($ntdid)){
            //insert company
            $sql = "INSERT into company(ntdid, logo, name, addressCP, phone, email, introduceCP) 
                value ('".$ntdid."', '".$logo."', '".$name."', '".$address."', '".$phone."', '".$email."', '".$introduce."')";
            $query = mysqli_query($mysqli, $sql);

            //Chuyen hinh anh luu vao foder uploads
            move_uploaded_file($logo_tmp, 'pages/dangtin/logo/'.$logo);

            //insert news
            $sql = "INSERT into news(ntdid, title, salary, date, address, introduce, request, benefit, status) 
                value ('".$ntdid."', '".$title."', '".$salary."', '".$date."', '".$address."', '".$introducecv."', '".$request."','".$benefit."', 0)";
            $query = mysqli_query($mysqli, $sql);

            
        }else{          
            //insert news
            $sql = "INSERT into news(ntdid, title, salary, date, address, introduce, request, benefit, status) 
                value ('".$ntdid."', '".$title."', '".$salary."', '".$date."', '".$address."', '".$introducecv."', '".$request."','".$benefit."', 0)";
            $query = mysqli_query($mysqli, $sql);
        }

        //Cac bien mess
        $mess = 'Tạo CV thành công';
        $status = 'signup-success';    
        $showCV = '';
    }
    
    function exist($ntdID){
        include("../config/config.php");
        $sql = "SELECT ntdid from company";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            if($ntdID == $row['ntdid']){
                return true;
            }
        }
        return false;
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
             
                <!-- vao xem CV -->
                <a href="?hoso" class="<?php echo $showCV ?>">XEM HỒ SƠ</a>

                <!-- Gui anh phai co enctype -->
                <form method="POST" enctype="multipart/form-data">
                    
                    <!-- Nhập thông tin công ty -->
                    <div class="info_company <?php echo $hide ?>">
                        <h2 class="title">Nhập thông tin công ty</h2>

                        <div class="input-group">
                            
                            <label class="label">Chọn Logo</label>
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
                                    <label class="label">Tên công ty</label>
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
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Số điện thoại</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Giới thiệu về công ty</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <textarea class="hocvan" name="intro" rows="9" cols="70"></textarea>  
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nhập thông tin tuyển dụng -->
                    <div class="info_news">
                        <h2 class="title">Nhập thông tin tuyển dụng</h2>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tiêu đề</label>
                                    <input class="input--style-4" type="text" name="title">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mức lương đề nghị</label>
                                    <input class="input--style-4" type="text" name="salary">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Thời hạn</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="date">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Địa điểm làm viêc</label>
                                    <!-- <input class="input--style-4" type="text" name="address"> -->
                                    <select style="height: 50px; width: 470px; border: none; outline: none;" name="address" class="input--style-4">
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

                        <div class="input-group">
                            <label class="label">Mô tả công việc</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <textarea class="hocvan" name="introcv" rows="9" cols="70"></textarea>  
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Yêu cầu ứng viên</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <textarea class="hocvan" name="request" rows="9" cols="70"></textarea>  
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Quyền lợi được hưởng</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <textarea class="hocvan" name="benefit" rows="9" cols="70"></textarea>  
                            </div>
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="p-t-15">
                        <button name="taotin" class="btn btn--radius-2 btn--blue" type="submit">TẠO TIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>