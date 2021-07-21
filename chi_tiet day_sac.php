<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="cssweb.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
</head> 
<body>
   <?php
    
    session_start(); 
    ob_start();  //Sử dụng được hàm header();
    require_once('conn.php');
   ?>
   <?php
    if(isset($_POST['submit'])){
      if(!empty($_SESSION['fb_user_id'])){
      $stmt1 = $conn -> prepare('SELECT * FROM tainghe WHERE id = ?');
             $stt1 = $_GET["idDelete"];
             $stmt1 ->execute([$stt1]);
            $n1 = $stmt1->rowcount();
           if($n1>0){
           while($Price = $stmt1->fetch()) {
        $iduse = $_SESSION['fb_user_id'];
       $id = $Price['id'];
       $namePrice =  $Price['name'];
       $soluong = $_POST['points'];
       $soluongcl = $Price['soluong']-$soluong;
       $gia =  $Price['tien'];
       $link=  $Price['link'];
      $linkPrice = "chi_tiet day_sac.php?act=SP&idDelete=".$Price['id'].""; }}
       $sql = "SELECT * FROM giohang where id = ? and iduse = ?";
       $stm1 =  $conn->prepare($sql);
       $stm1->setFetchMode(PDO::FETCH_ASSOC); 
       $stm1 ->bindParam(':id',$id);
       $stm1 ->execute([$id,$iduse]);
       $cout = $stm1 ->rowcount();
      if($cout < 1 ){
         $stm = $conn -> prepare('INSERT INTO giohang (id,namePrice,soluong,gia,link,linkPrice,iduse) VALUES (:id,:namePrice,:soluong,:gia,:link,:linkPrice,:iduse)');
         $stm4 = $conn ->prepare('UPDATE tainghe SET soluong = ? WHERE id = ?;');
           $stm->bindParam(':id',$id);
           $stm->bindParam(':namePrice',$namePrice);
           $stm->bindParam(':soluong',$soluong);
           $stm->bindParam(':gia',$gia);
           $stm->bindParam(':link',$link);
           $stm->bindParam(':linkPrice',$linkPrice);
           $stm->bindParam(':iduse',$iduse);
           $stm ->execute();
           $stm4 ->execute([$soluongcl,$id]);
       
       
         }else{
              $stmt = $conn->prepare('SELECT soluong FROM giohang where id =?');

           $stmt->setFetchMode(PDO::FETCH_ASSOC);
           $stmt->execute([$id]);
           while($row = $stmt->fetch()) {
                  $addSl= $row['soluong'] + $soluong ; }
              
          $stm2  = $conn -> prepare('UPDATE giohang SET soluong=? WHERE id=?');
          $stm2 ->execute([$addSl,$id]);
       
        }
        header('location:giohang2.php');
      }

      else {
        header('location:./Facebook/');
      }
       
      }
  ?>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
<div class="fixed">
   <div id ="logo"><a href="Trang-chủ.php"><img src="https://font-preview.customer.envato.com/preview/21412083?text=B2W&version=241304529&filename=Casterio.OTF"></a></div>
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
<!--quay lai-->
<div id="menu">
  <ul class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
 <li typeof="v:Breadcrumb"><a href="Trang-chủ.php">Trang chủ</a><span>></span></li><li typeof="v:Breadcrumb"><a href="daysac.php">Dây sạc</a><span>></span></li><li typeof="v:Breadcrumb">chi tiết</li>
</ul>
</div>
<!--....--> 
<?php
/*<!DOCTYPE html>
<html>
<body>

<?php
$id ;
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $_SESSION['CODE'] =$randomString;
    return $randomString;
}
 echo generateRandomString(). "<br>";

 echo  $_SESSION['CODE'];
?>

</body>
</html>
*/
    if(isset($_GET["act"]) and $_GET["act"] == "SP"){
            $stmt1 = $conn -> prepare('SELECT * FROM tainghe WHERE id = ?');
             $stt1 = $_GET["idDelete"];
             $stmt1 ->execute([$stt1]);
            $n1 = $stmt1->rowcount();
           if($n1>0){
           while($Price = $stmt1->fetch()) {
           
            ?>
<form method="POST">
  <div class="bodyanh">
   <div class="img2"><img src="<?php echo $Price['link']; ?>"></div>
   <h3><span style="color: red;"><?php echo $Price['name']; ?>
</span></h3>
   <span style="color: white;"><p><h4>Đơn giá: </h4><span style="color: #f6b93b;"><?php echo $Price['tien']; ?></span></p> </span>
   <span style="color: white;"><p><h4>Số lượng:</h4><span style="color: #f6b93b;"><?php echo $Price['soluong']; ?></span></p></span>
   <span style="color: white;"><h4>Số Lượng:</h4></span>
   <input type="number" name="points" min="1" max="100" step="1" value="1"><br>
  <div class="qwe"><button class="button2" name="submit">MUA NGAY</button></div>
  <?php if(!empty($_SESSION['fb_user_id']) and $_SESSION['fb_user_id']== "112943172300563729681"): ?>
    <div class="qwe"><a href="#"><button class="button2">Sua</button></a></div>
     <?php endif ?>
</form>
<div class="chu">
  <h3>MÔ TẢ SẢN PHẨM</h3>
    <?php echo $Price['info']; ?>
</div>
<?php }}} ?>

<!-- Day sac -->
<?php  
if(isset($_GET["act"]) and $_GET["act"] == "DS"){
            $stmt1 = $conn -> prepare('SELECT * FROM daysac WHERE id = ?');
             $stt1 = $_GET["idDelete"];
             $stmt1 ->execute([$stt1]);
            $n1 = $stmt1->rowcount();
           if($n1>0){
           while($Price = $stmt1->fetch()) {
           
            ?>
<form method="POST">
  <div class="bodyanh">
   <div class="img2"><img src="<?php echo $Price['link']; ?>"></div>
   <h3><span style="color: red;"><?php echo $Price['name']; ?>
</span></h3>
   <span style="color: white;"><p><h4>Đơn giá: </h4><span style="color: #f6b93b;"><?php echo $Price['tien']; ?></span></p> </span>
   <span style="color: white;"><p><h4>Số lượng:</h4><span style="color: #f6b93b;"><?php echo $Price['soluong']; ?></span></p></span>
   <span style="color: white;"><h4>Số Lượng:</h4></span>
   <input type="number" name="points" min="1" max="100" step="1" value="1"><br>
  <div class="qwe"><button class="button2" name="submit">MUA NGAY</button></div>
  <?php if(!empty($_SESSION['fb_user_id']) and $_SESSION['fb_user_id']== "112943172300563729681"): ?>
    <div class="qwe"><a href="#"><button class="button2">Sua</button></a></div>
     <?php endif ?>
</form>
<div class="chu">
  <h3>MÔ TẢ SẢN PHẨM</h3>
    <?php echo $Price['info']; ?>
</div>
<?php }}} ?>

<!-- Tai Nghe -->
<?php  
if(isset($_GET["act"]) and $_GET["act"] == "DS"){
            $stmt1 = $conn -> prepare('SELECT * FROM daysac WHERE id = ?');
             $stt1 = $_GET["idDelete"];
             $stmt1 ->execute([$stt1]);
            $n1 = $stmt1->rowcount();
           if($n1>0){
           while($Price = $stmt1->fetch()) {
           
            ?>
<form method="POST">
  <div class="bodyanh">
   <div class="img2"><img src="<?php echo $Price['link']; ?>"></div>
   <h3><span style="color: red;"><?php echo $Price['name']; ?>
</span></h3>
   <span style="color: white;"><p><h4>Đơn giá: </h4><span style="color: #f6b93b;"><?php echo $Price['tien']; ?></span></p> </span>
   <span style="color: white;"><p><h4>Số lượng:</h4><span style="color: #f6b93b;"><?php echo $Price['soluong']; ?></span></p></span>
   <span style="color: white;"><h4>Số Lượng:</h4></span>
   <input type="number" name="points" min="1" max="100" step="1" value="1"><br>
  <div class="qwe"><button class="button2" name="submit">MUA NGAY</button></div>
  <?php if(!empty($_SESSION['fb_user_id']) and $_SESSION['fb_user_id']== "112943172300563729681"): ?>
    <div class="qwe"><a href="#"><button class="button2">Sua</button></a></div>
     <?php endif ?>
</form>
<div class="chu">
  <h3>MÔ TẢ SẢN PHẨM</h3>
    <?php echo $Price['info']; ?>
</div>
<?php }}} ?>
<div class="fooder">
     <center><p>Địa chỉ: Lớp 19i1 Trường cao đăng công nghệ thông tin Đà Nẵng</p>
          <p>SĐT: 0328173909</p>
          <p>Email: ptnguyen.19i@cit.udn.vn</p></center>
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