<?php
     session_start();
     ob_start();
     require_once('conn.php');
?>
<html>
<head>
	 <meta charset="UTF-8">
  <title>Giỏ hàng</title>

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
   <div   id="logo"><a href="Trang-chủ.php"><img src="https://font-preview.customer.envato.com/preview/21412083?text=B2W&version=241304529&filename=Casterio.OTF"></a></div>
   <div id="tren">
    <ul>
      <!--<li><i class="fas fa-mobile" style="font-size: 30px;"></i></li>
      <li><i class="fas fa-headphones-alt" style="font-size: 30px;"></i></li>
      <li><i class="fas fa-battery-full" style="font-size: 30px;"></i></li>!-->
      <li><a href="Trang-chủ.php">Trang chủ</a></li>
      <li><a href="ốp lưng.php">Ốp lưng</a></li>
      <li><a href="tainghe.php">Tai nghe</a></li>
      <li><a href="daysac.php">Dây sạc</a></li>
      <li><a href="thẻ nhớ.php">Thẻ nhớ</a></li>
      <li><a href="giohang2.php">Giỏ hàng</a></li>
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
          if(isset($_GET["act"]) and $_GET["act"] == "det"){
            $stmt1 = $conn -> prepare('DELETE FROM giohang WHERE id = ?');
             $stt1 = $_GET["idDelete"];
             $stmt1 ->execute([$stt1]);
              
            }
          $tongTien = 0;
          $stmt = $conn->prepare('SELECT id ,soluong,gia,link,namePrice,linkPrice FROM giohang');

           $stmt->setFetchMode(PDO::FETCH_ASSOC);
           $stmt->execute();
           $n = $stmt->rowcount();
               
           if($n>0){
           while($Price = $stmt->fetch()) {
           
           $thanhTien = $Price['gia'] * $Price['soluong'];
           $tongTien = $thanhTien + $tongTien;
           $id= $Price['id'];
          

           

?>    
  <tbody style="color: 4F4A40;  "><tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="<?php echo $Price['link'] ;?>" alt="Sản phẩm 1" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin"><?php echo $Price['namePrice']; ?></h4> 
     </div> 
    </div> 
   </td> 
   <td data-th="Price"><?php echo number_format($Price['gia'], 0, ",","."); ?> đ</td> 
   <td data-th="Subtotal" class="text-center"><?php echo $Price['soluong'];?>
   </td> 
   <td data-th="Subtotal" class="text-center"><?php echo number_format($thanhTien, 0, ",","."); ?>đ</td> 
   <td class="actions" data-th="">
      <a href="<?php echo $Price['linkPrice'] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit" style="width: 20px;height: 16px"></i>
    </button></a> 
    <a href="giohang2.php?act=det&idDelete=<?php echo $Price['id'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" ></i>Xóa
    </button></a>
   </td> 
  </tr>
  </tbody>
  <?php 
   }
 }
  else{
            echo '<script language="javascript">';
        echo 'alert("Giỏ hàng trống trơn :)))")';
         echo '</script>'; 
           }?>

  <tfoot> 
   <tr> 
    <td><a href="Trang-chủ.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <td class="hidden-xs text-center"><strong>Tổng tiền:<div style="color: red;"><?php echo number_format($tongTien, 0, ",","."); ?> đ</div></strong>
    </td> 
    <td><a href="muangay.php" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
    </td> 
   </tr> 
  </tfoot> 
 </table>


<div class="fooder2">
  <center><p>Địa chỉ: Lớp 19i1 Trường cao đăng công nghệ thông tin Đà Nẵng</p>
          <p>SĐT: 0328173909</p>
          <p>Email:ptnguyen.19i@cit.udn.vn</p></center>

</div>
<?php
ob_end_flush();
?>
</body>
</html> 