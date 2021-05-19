<?php  
    include("config/config.php");
    GLOBAL $mess;
    GLOBAL $status;
    if(isset($_POST['dangki'])){
        $user = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass']; 

        if($pass == $re_pass && checkUserName($user)){
            $pass = md5($_POST['pass']);
            $sql = "INSERT into user(username, pass, email) value ('".$user."', '".$pass."', '".$email."')";
            $query = mysqli_query($mysqli, $sql);
            $mess = 'Register successfully';
            $status = 'signup-success';
        }elseif (!checkUserName($user)) {
            $mess = 'Username already exists';
            $status = 'signup-eror';
        }else{
            $mess = 'Pass or re-pass wrong';
            $status = 'signup-eror';
        }
    }
    function checkUserName($username)
    {
        include("config/config.php");
        $sql = "SELECT username from user";
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
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="user" id="name" placeholder="Your Name"/>
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
                        <div class="form-group form-button">
                            <input type="submit" name="dangki" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="pages/Register_user/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="index.php?dangnhap" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

</div>