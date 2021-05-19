<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <title>ADMIN</title>
</head>
<body>
    <div class="main_container">
        <div class="container">
            <h3>ĐĂNG NHẬP ADMIN</h3>
            <form method="POST" action="xuly.php">
                <div class="user">
                    <p>Tên đăng nhập</p>
                    <input name="user" type="text">
                </div>
                <div class="pass">
                    <p>Mật khẩu</p>
                    <input name="pass" type="password">
                </div>
                <input name="dangnhap" class="login" type="submit" value="ĐĂNG NHẬP">
            </form>
        </div>
    </div>
</body>
</html>