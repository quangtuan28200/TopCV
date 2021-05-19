<?php
    include("../config/config.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //login
    if(isset($_POST['dangnhap'])){
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		
		$sql = "SELECT * from admin where user = '".$user."' and pass = '".$pass."' ";
		$query = mysqli_query($mysqli, $sql);
		$count = mysqli_num_rows($query);
		
		if($count > 0){
            $_SESSION['dangnhapAD'] = $user;
            header("Location:quanly/main_manager/index.php");
        }else{
            echo 'tai khoan hoac mat khau sai';
        }
    }
?>