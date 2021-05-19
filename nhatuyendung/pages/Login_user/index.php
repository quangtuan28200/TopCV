<?php	
	//Khoi tao 1 session 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
	include("../config/config.php");
    GLOBAL $mess;
    GLOBAL $status;

    $mess = '';
    $status = '';
	if(isset($_POST['dangnhap'])){
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		
		$sql = "SELECT * from nhatuyendung where username = '".$user."' and pass = '".$pass."' ";
		$query = mysqli_query($mysqli, $sql);
		$count = mysqli_num_rows($query);
		
		if($count > 0){
			//luu bien user vao bien session 
			$_SESSION['dangnhaptd'] = $user;

            //luu bien id vao bien session 
            $sql = "SELECT id from nhatuyendung where username = '".$user."'";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
                $_SESSION['id'] = $row['id'];
            };

            if(isset($_GET['dangnhap'])){
                header("Location:../../TopCV/nhatuyendung/index.php");
            }elseif (isset($_GET['dangtin'])) {
                header("Location:../../TopCV/nhatuyendung/index.php?dangtin");
            }
        }else{
			$mess = 'Tài khoản hoặc mật khẩu sai';
            $status = 'signup-eror';
		}
	}
?>

<div class="main" style="padding: 20px 0;" >
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="pages/Login_user/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="index.php?dangky" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <div class="<?php echo $status ?>">
                        <?php echo $mess ?>
                    </div>
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="user" id="your_name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="dangnhap" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                    <!-- <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</div>