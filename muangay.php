<?php 
 session_start();
 ob_start();
     require_once('conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="cssweb.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="owl.carousel.min.css">
<link rel="stylesheet" href="owl.theme.default.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="owl.carousel.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>

</head> 
<body>
  <!--<script type="text/javascript">
    $(document).ready(function(){
  var owl = $('.owl-carousel');
owl.owlCarousel({
    items:2 ,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
});

  </script>-->
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
<div class="fixed">
   <div   id="logo"><a href="Trang-chủ.php"><img src="https://font-preview.customer.envato.com/preview/21412083?text=B2W&version=241304529&filename=Casterio.OTF"></a></div>
   <div id="tren">
    <ul>
      <!--<li><i class="fas fa-mobile" style="font-size: 30px;"></i></li>
      <li><i class="fas fa-headphones-alt" style="font-size: 30px;"></i></li>
      <li><i class="fas fa-battery-full" style="font-size: 30px;"></i></li>!-->
      <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/Trang-chủ.php">Trang chủ</a></li>
      <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/tainghe.php">Tai nghe</a></li>
      <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/daysac.php">Dây sạc</a></li>
      <?php if(!empty($_SESSION['fb_user_id'])): ?>
      <li>
          <button id="vidu2">Hello: <?php echo  $_SESSION['fb_user_name']; ?>
          <?php if($_SESSION['fb_user_id']=="112943172300563729681"): ?>
    <a id="pvidu2" href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/admin1.php">Admin</a>
          <?php else: ?>
            <a id="pvidu2" href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/giohang2.php">Giỏ hàng</a>
            <?php endif ?>
    <a id="pvidu3" href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/Facebook/logout.php">Đăng xuất</a>
</button>
      </li>
      <?php else: ?>
         <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/giohang2.php">Giỏ hàng</a></li>
      <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/Facebook/">Đăng nhập</a></li>
      <?php endif ?>
    </ul>
   </div>
</div>
      
  <?php
    if(isset($_POST['submit'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $soDienThoai = $_POST['phone'];
       $diaChi = $_POST['address'];
      if(empty($name) || empty($email) || empty($soDienThoai) || empty($diaChi) ){
        echo '<script language="javascript">';
        echo 'alert("Điền đầy đủ thông tin")';
         echo '</script>'; 
         }
         else{
          if(!empty($_SESSION['fb_user_id'])){
      $stmt1 = $conn -> prepare('SELECT * FROM tainghe WHERE id = ?');
             $stt1 = $_GET["idDelete1"];
             $stmt1 ->execute([$stt1]);
            $n1 = $stmt1->rowcount();
           if($n1>0){
           while($Price = $stmt1->fetch()) {
           $stmt2 = $conn -> prepare('DELETE FROM giohang WHERE id = ? and iduse = ?');
           $stmt3 = $conn -> prepare('UPDATE tainghe SET soluong = ? WHERE id = ?');
        $iduse = $_SESSION['fb_user_id'];
       $id = $Price['id'];
       $namePrice =  $Price['name'];
       $soluong = $_POST['points'];
       $soluongcl = $Price['soluong']-$soluong;
       $gia =  $Price['tien'];
       $link=  $Price['link'];
       $stmt2 ->execute([$id,$iduse]);
       $stmt3 -> execute([$soluongcl,$id]);
      $linkPrice = "chi_tiet day_sac.php?act=SP&idDelete=".$Price['id'].""; }
         header('location:thongbao.php');
           }
       }
     }
     }
  ?>
    <div class="containe">
        <form  method="POST">
            <label for="fname">Họ Và Tên</label>
            <input type="text"  name="name" value="">
     
            <label for="lname">Email</label>
            <input type="text" name="email" value="">
     
            <label for="country">Số Điện Thoại</label>
            <input type="text"  name="phone" value="">
     
            <label for="address">Địa Chỉ</label>
            <input type="text"  name="address" value="">
            <h3><input type="radio" id="r1" name="rr" />
                <label for="r1"><span></span>Thanh toán online</label></h3>
               
                <h3><input type="radio" id="r2" name="rr" />
                <label for="r2"><span></span>Thanh toán khi nhận hàng</label></h3>
            <input type="submit" value="Gửi" name="submit">
            <div id="anh" onclick="quay_lai_trang_truoc()"><img src="https://cdn.pixabay.com/photo/2012/04/02/15/55/arrow-24819_960_720.png"></div>

                  <script>
                      function quay_lai_trang_truoc(){
                          history.back();
                      }
                  </script>
        </form>
    </div>
 </body>
</html>
<script>
  $("#pvidu2").hide();
  $("#pvidu3").hide();
    $("#vidu2").click(function() {
        $("#pvidu2").toggle(500);
         $("#pvidu3").toggle(1000);
    });
</script>
<style>
  #vidu2{
    background-color: #A0A6A9;
  }
</style>
