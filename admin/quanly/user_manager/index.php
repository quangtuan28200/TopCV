<?php
  if(isset($_GET['xoa'])){
    $sql_xoa_user = "DELETE from user where userid = $_GET[userid]";
    mysqli_query($mysqli, $sql_xoa_user);

    $sql_xoa_ut = "DELETE from ungtuyen where userid = $_GET[userid]";
    mysqli_query($mysqli, $sql_xoa_ut);

    $sql_xoa_cv = "DELETE from cv where userid = $_GET[userid]";
    mysqli_query($mysqli, $sql_xoa_cv);
  }
?>

<div class="main">
    <div class="container">
        <div class="table_wrap" style="min-height: 500px;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $stt = 0;
                    
                    $sql = "SELECT * from user";
                    $query = mysqli_query($mysqli, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                      $stt++;
                  ?>
                      <tr>
                        <th scope="row"><?php echo $stt ?></th>
                        <td><?php echo $row['userid'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['pass'] ?></td>
                        <td>
                            <a href="<?php echo'?xoa&userid='.$row['userid'] ?>">XÓA</a>
                        </td>
                      </tr>
                  <?php
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>