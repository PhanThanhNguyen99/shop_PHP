<?php
     session_start();
     ob_start();
     require_once('conn.php');
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=290654905197434&autoLogAppEvents=1" nonce="yu46DaST"></script>
<html>
<head>
	 <meta charset="UTF-8">
  <title></title>

   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script src="js/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="cssweb.css">
</head> 
<body>
  <style>
 
@media screen and (max-width: 600px) { 
table#cart tbody td .form-control { 
width:20%; 
display: inline !important;
} 
 
.actions .btn { 
width:36%; 
margin:1.5em 0;
} 
 
.actions .btn-info { 
float:left;
} 
 
.actions .btn-danger { 
float:right;
} 
 
table#cart thead {
display: none;
} 
 
table#cart tbody td {
display: block;
padding: .6rem;
min-width:320px;
} 
 
table#cart tbody tr td:first-child {
background: #333;
color: #fff;
} 
 
table#cart tbody td:before { 
content: attr(data-th);
font-weight: bold; 
display: inline-block;
width: 8rem;
} 
 
table#cart tfoot td {
display:block;
} 
table#cart tfoot td .btn {
display:block;
}
}</style>

<div class="fixed">
   <div   id="logo"><a href="Trang chủ.html"><img src="https://font-preview.customer.envato.com/preview/21412083?text=B2W&version=241304529&filename=Casterio.OTF"></a></div>
   <div id="tren">
    <ul>
      <!--<li><i class="fas fa-mobile" style="font-size: 30px;"></i></li>
      <li><i class="fas fa-headphones-alt" style="font-size: 30px;"></i></li>
      <li><i class="fas fa-battery-full" style="font-size: 30px;"></i></li>!-->
      <li><a href="Trang-chủ.html">Trang chủ</a></li>
      <li><a href="ốp lưng.html">Ốp lưng</a></li>
      <li><a href="tainghe.html">Tai nghe</a></li>
      <li><a href="daysac.html">Dây sạc</a></li>
      <li><a href="thẻ nhớ.html">Thẻ nhớ</a></li>
      <!--tim kiếm-->
        <li>
          <div class="timkiem">
          <form id="demo-2">
          <input type="search" placeholder="">
        </div>
        </form>
      </li>
    <!--....-->
    </ul>
   </div>
</div>
           



  <table id="cart" class="table table-hover table-condensed">
  <thead> 
   <tr> 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:10%">Giá</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <?php
          $tongTien = 0;
          $stmt = $conn->prepare('SELECT id ,soluong,gia,link,namePrice FROM giohang');

           $stmt->setFetchMode(PDO::FETCH_ASSOC);
           $stmt->execute();
           while($Price = $stmt->fetch()) {
           $thanhTien = $Price['gia'] * $Price['soluong'];
           $tongTien = $thanhTien + $tongTien;
     echo "<tbody><tr> 
      <td data-th=\"Product\"> 
    <div class=\"row\"> 
     <div class=\"col-sm-2 hidden-xs\"><img src=\"";echo $Price['link']; echo "\""; echo"alt=\"Sản phẩm 1\" class=\"img-responsive\" width=\"100\">
     </div> 
     <div class=\"col-sm-10\"> 
      <h4 class=\"nomargin\">";echo $Price['namePrice'];echo"</h4> 
     </div> 
    </div> 
   </td> 
   <td data-th=\"Price\">";echo number_format($Price['gia'], 0, ",","."); echo"đ</td> 
   <td data-th=\"Subtotal\" class=\"text-center\">"; echo $Price['soluong'];echo"</td> 
   <td data-th=\"Subtotal\" class=\"text-center\">"; echo number_format($thanhTien, 0, ",",".");echo " đ</td> 
   <td class=\"actions\" data-th=\"\">
    <button class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash-o\"name= \"delete\">x</i>
    </button>
    </form>
   </td> 
  </tr>";
  }
?>
  </tbody><tfoot> 
   <tr> 
    <td><a href="Trang-chủ.html" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <td class="hidden-xs text-center"><strong><?php echo number_format($tongTien, 0, ",","."); ?>đ</strong>
    </td> 
    <td><a href="muangay.html" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
    </td> 
   </tr> 
  </tfoot> 
 </table>
<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></div>

<div class="fooder2">
  <center><p>Địa chỉ: Lớp 19i1 Trường cao đăng công nghệ thông tin Đà Nẵng</p>
          <p>SĐT: 0369070674</p>
          <p>Email:ptnguyen.19i@cit.udn.vn</p></center>

</div>
</body>
</html> 