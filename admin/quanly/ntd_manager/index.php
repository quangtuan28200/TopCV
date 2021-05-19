<?php
  GLOBAL $check;

  $check = 'display: none;';
  if(isset($_GET['xoa_ntd'])){
    $sql_xoa = "DELETE from nhatuyendung where id = $_GET[id]";
    mysqli_query($mysqli, $sql_xoa);

    $sql_xoaCP = "DELETE from company where ntdid = $_GET[id]";
    mysqli_query($mysqli, $sql_xoaCP);

    $sql_xoaNews = "DELETE from news where ntdid = $_GET[id]";
    mysqli_query($mysqli, $sql_xoaNews);
  }

  function checkSTATUS(){
    include("../../../config/config.php");
    $sql = "SELECT * from news where status = 0";
    $query = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($query);
    if($count>0){
      return true;
    }else{
      return false;
    }
  }

  if(checkSTATUS()){
    $check = '';
  }

  if(isset($_POST['duyetall'])){
    $sql = "UPDATE news set status = 1 where status = 0";
    $query = mysqli_query($mysqli, $sql);

    header("Location:index.php?ntd");
  }
?>

<div class="main">
    <div class="container">    
        <!-- quan ly tai khoan    -->
        <div class="table_wrap">
            <table class="table">
                <h3 style="text-align: center;">Quản lý tài khoản</h3>
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
                    
                    $sql = "SELECT * from nhatuyendung";
                    $query = mysqli_query($mysqli, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                      $stt++;
                  ?>
                      <tr>
                        <th scope="row"><?php echo $stt ?></th>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['pass'] ?></td>
                        <td>
                            <a href="<?php echo'?xoa_ntd&id='.$row['id'] ?>">XÓA</a>
                        </td>
                      </tr>
                  <?php
                    }
                  ?>
                </tbody>
            </table>
        </div>
        <!-- tin cho duyet -->
        <div class="tinchoduyet">
          <h3 style="text-align: center;">TIN CHỜ DUYỆT</h3>
          <?php
            //lay data news
            $sql = "SELECT * from news where status = 0";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
          ?>
              <div class="news_wrap">
                  <a href="<?php echo '?news&newsid='.$row['id'] ?>">
                      <h3><?php echo $row['title'] ?></h3>
                      <div class="news_detail">
                          <p class="time_end">Hạn: <?php echo $row['date'] ?></p>
                          <p class="salary">Lương: <?php echo $row['salary'] ?></p>
                          <p class="address">Địa chỉ: <?php echo $row['address'] ?></p>
                          <p class="address">NTD_ID: <?php echo $row['ntdid'] ?></p>
                      </div>
                  </a>            
              </div>
          <?php
            }
          ?>

          <!-- duyet all -->
          <form method="POST" class="duyetall_wrap" style="width: 660px; margin: auto; text-align: end; <?php echo $check ?>">
            <input name="duyetall" type="submit" value="DUYỆT HẾT">
          </form>
        </div>
        <!-- tin da duyet -->
        <div style="padding-bottom: 30px;" class="tindaduyet">
          <h3 style="text-align: center;">TIN ĐÃ DUYỆT</h3>
          <?php
            //lay data news
            $sql = "SELECT * from news where status = 1";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
          ?>
              <div class="news_wrap">
                  <a href="<?php echo '?news&newsid='.$row['id'] ?>">
                      <h3><?php echo $row['title'] ?></h3>
                      <div class="news_detail">
                          <p class="time_end">Hạn: <?php echo $row['date'] ?></p>
                          <p class="salary">Lương: <?php echo $row['salary'] ?></p>
                          <p class="address">Địa chỉ: <?php echo $row['address'] ?></p>
                          <p class="address">NTD_ID: <?php echo $row['ntdid'] ?></p>
                      </div>
                  </a>            
              </div>
          <?php
            }
          ?>
        </div>
    </div>
</div>