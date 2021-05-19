<?php
    include("config/config.php");
    GLOBAL $mess;
    GLOBAL $status;

    $mess = '';
    $status = '';
    $hide = '';
    $showCV = 'hide';

    //day data ra form
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

    if(isset($_POST['suacv'])){
        $suserid = $_GET['userid'];
		$sname = $_POST['name'];
		$sadd = $_POST['add'];
		$sdate = $_POST['date'];
		$sgender = $_POST['gender'];
		$semail = $_POST['email'];
		$sphone = $_POST['phone'];
		$sedu = $_POST['edu'];
		$sexp = $_POST['exp'];
		$sacti = $_POST['acti'];
		$schungchi = $_POST['chungchi'];
		$sprize = $_POST['prize'];
		$sskill = $_POST['skill'];
		$shobbit = $_POST['hobbit'];   

        //Xu ly hinhanh
        $savatar = $_FILES['img']['name'];
        $savatar_tmp= $_FILES['img']['tmp_name'];

        //Hàm time() sẽ trả về số giây tính từ thời điểm 00:00:00 1/1/1970 đến thời điểm hiện tại.
        $savatar = time().'_'.$savatar;

        // !file_exists('pages/CV/avatar/'.$savatar)
        if($savatar == time().'_'){
            $sql_update = "UPDATE cv set address = '".$sadd."', date = '".$sdate."', 
                                         gendar = '".$sgender."', email = '".$semail."', phone = '".$sphone."', 
                                         edu = '".$sedu."', exp = '".$sexp."', acti = '".$sacti."', 
                                         chungchi = '".$schungchi."', prize = '".$sprize."', skill = '".$sskill."', 
                                         hobbit = '".$shobbit."', name = '".$sname."' where userid = '".$suserid."'"; 
            $query = mysqli_query($mysqli, $sql_update);
            
        }else{
            $sql_update = "UPDATE cv set img = '".$savatar."', address = '".$sadd."', date = '".$sdate."', 
                                         gendar = '".$sgender."', email = '".$semail."', phone = '".$sphone."', 
                                         edu = '".$sedu."', exp = '".$sexp."', acti = '".$sacti."', 
                                         chungchi = '".$schungchi."', prize = '".$sprize."', skill = '".$sskill."', 
                                         hobbit = '".$shobbit."', name = '".$sname."' where userid = '".$suserid."'"; 
            $query = mysqli_query($mysqli, $sql_update);
    
            //Xoa anh cu
            unlink('pages/CV/avatar/'.$avatar);
    
            //Chuyen hinh anh luu vao foder uploads
            move_uploaded_file($savatar_tmp, 'pages/CV/avatar/'.$savatar);
        }

        //Cac bien mess
        $mess = 'Sửa CV thành công';
        $status = 'signup-success';
        $hide = 'hide';
        $showCV = '';
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

                            <div class="image-upload-wrap" style="display: none;">
                                <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                <div class="drag-text">
                                <h3 style="font-weight: 300;">Kéo và thả ảnh vào đây hoặc bấm chọn ảnh</h3>
                                </div>
                            </div>
                            <div class="file-upload-content" style="display: block;">
                                <img class="file-upload-image" src="<?php echo 'pages/CV/avatar/'.$avatar ?>" alt="your image" />
                                <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">XÓA <span class="image-title"><?php echo $avatar ?></span></button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Họ và tên</label>
                                <input value="<?php echo $name ?>" class="input--style-4" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Địa chỉ</label>
                                <input value="<?php echo $address ?>" class="input--style-4" type="text" name="add">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Ngày sinh</label>
                                <div class="input-group-icon">
                                    <input value="<?php echo $date ?>" class="input--style-4 js-datepicker" type="text" name="date">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Giới tính</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Nam
                                        <?php
                                            if($gender == 'Nam'){
                                        ?>
                                            <input type="radio" checked="checked" name="gender" value="Nam">
                                            <span class="checkmark"></span>
                                        <?php
                                            }else{
                                        ?>
                                            <input type="radio" name="gender" value="Nam">
                                            <span class="checkmark"></span>
                                        <?php
                                            }
                                        ?>
                                    </label>
                                    <label class="radio-container">Nữ
                                        <?php
                                            if($gender == 'Nữ'){
                                        ?>
                                            <input type="radio" checked="checked" name="gender" value="Nữ">
                                            <span class="checkmark"></span>
                                        <?php
                                            }else{
                                        ?>
                                            <input type="radio" name="gender" value="Nữ">
                                            <span class="checkmark"></span>
                                        <?php
                                            }
                                        ?>                             
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input value="<?php echo $email ?>" class="input--style-4" type="email" name="email">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Điện thoại</label>
                                <input value="<?php echo $phone ?>" class="input--style-4" type="text" name="phone">
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
                            <textarea class="hocvan" name="edu" rows="9" cols="70"><?php echo $edu ?></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Kinh nghiệm</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea  class="hocvan" name="exp" rows="9" cols="70"><?php echo $exp ?></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Hoạt động</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea  class="hocvan" name="acti" rows="9" cols="70"><?php echo $acti ?></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Chứng chỉ</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea  class="hocvan" name="chungchi" rows="9" cols="70"><?php echo $chungchi ?></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Giải thưởng</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea  class="hocvan" name="prize" rows="9" cols="70"><?php echo $prize ?></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">kỹ năng</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea  class="hocvan" name="skill" rows="9" cols="70"><?php echo $skill ?></textarea>  
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="label">Sở thích</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <textarea  class="hocvan" name="hobbit" rows="9" cols="70"><?php echo $hobbit ?></textarea>  
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button name="suacv" class="btn btn--radius-2 btn--blue" type="submit">LƯU THAY ĐỔI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>