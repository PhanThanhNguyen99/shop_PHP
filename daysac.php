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
        
      <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/Facebook/">Đăng nhập</a></li>
      <?php endif ?>
    </ul>
   </div>
</div>
<div id="baymau">
  <center>
<script type="text/javascript">
farbbibliothek = new Array();
farbbibliothek[0] = new Array("#FF0000","#FF1100","#FF2200","#FF3300","#FF4400","#FF5500","#FF6600","#FF7700","#FF8800","#FF9900","#FFaa00","#FFbb00","#FFcc00","#FFdd00","#FFee00","#FFff00","#FFee00","#FFdd00","#FFcc00","#FFbb00","#FFaa00","#FF9900","#FF8800","#FF7700","#FF6600","#FF5500","#FF4400","#FF3300","#FF2200","#FF1100");
farbbibliothek[1] = new Array("#00FF00","#000000","#00FF00","#00FF00");
farbbibliothek[2] = new Array("#00FF00","#FF0000","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00");
farbbibliothek[3] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
farbbibliothek[4] = new Array("#FF0000","#EE0000","#DD0000","#CC0000","#BB0000","#AA0000","#990000","#880000","#770000","#660000","#550000","#440000","#330000","#220000","#110000","#000000","#110000","#220000","#330000","#440000","#550000","#660000","#770000","#880000","#990000","#AA0000","#BB0000","#CC0000","#DD0000","#EE0000");
farbbibliothek[5] = new Array("#000000","#000000","#000000","#FFFFFF","#FFFFFF","#FFFFFF");
farbbibliothek[6] = new Array("#0000FF","#FFFF00");
farben = farbbibliothek[4];
function farbschrift()
{
for(var i=0 ; i<Buchstabe.length; i++)
{
document.all["a"+i].style.color=farben[i];
}
farbverlauf();
}
function string2array(text)
{
Buchstabe = new Array();
while(farben.length<text.length)
{
farben = farben.concat(farben);
}
k=0;
while(k<=text.length)
{
Buchstabe[k] = text.charAt(k);
k++;
}
}
function divserzeugen()
{
for(var i=0 ; i<Buchstabe.length; i++)
{
document.write("<span id='a"+i+"' class='a"+i+"'>"+Buchstabe[i] + "<\/span>");
}
farbschrift();
}
var a=1;
function farbverlauf()
{
for(var i=0 ; i<farben.length; i++)
{
farben[i-1]=farben[i];
}
farben[farben.length-1]=farben[-1];

setTimeout("farbschrift()",50 );
}
//
var farbsatz=1;
function farbtauscher()
{
farben = farbbibliothek[farbsatz];
while(farben.length<text.length)
{
farben = farben.concat(farben);
}
farbsatz=Math.floor(Math.random()*(farbbibliothek.length-0.0001));
}
setInterval("farbtauscher()",5000);

text= "-----------------------Dây sạc-----------------------"; //h
string2array(text);
divserzeugen();
//document.write(text);
</script></center>
<br />
</div>
<div class="khunghead2">
  <!--<div id="tainghe"><h3>Tai nghe</h3></div>--></div>
  
    <div class="container">
        <?php 
  $stmt = $conn->prepare('SELECT * FROM daysac');

           $stmt->setFetchMode(PDO::FETCH_ASSOC);
           $stmt->execute();
           $n = $stmt->rowcount();
           if($n>0){
           while($Price = $stmt->fetch()) {
            ?>
           <div class="img">
      <img src="<?php echo $Price['link'] ?>">
      <div class="txt">
        <h3><?php echo $Price['tien'] ?></h3>
        <p><?php echo $Price['name']; ?></p>
         <a href="chi_tiet day_sac.php?act=DS&idDelete=<?php echo $Price['id'] ?>"><button class="button">XEM CHI TIẾT</button></a>
      </div>
      </div>
    <?php }
      } ?>
   
  </div>
 <div class="fooder3">
  <center><p>Địa chỉ: Lớp 19i1 Trường cao đăng công nghệ thông tin Đà Nẵng</p>
          <p>SĐT: 0369070674</p>
          <p>Email: ptvi.19i@cit.udn.vn - ncphong.19i@cit.udn.vn - ptnguyen.19i@cit.udn.vn</p></center>
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