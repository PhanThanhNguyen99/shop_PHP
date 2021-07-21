<?php
    session_start(); 
    ob_start();  //Sử dụng được hàm header();
    require_once('conn.php');
   ?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <link href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/Facebook/css/style.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/cssweb.css">
               
               <script type="text/javascript" src="ckeditor/ckeditor.js"></script>    
               <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #user_login form{
                width: 300px;
                margin: 40px auto;
            }
            #user_login form input{
                margin: 5px 0;
            }
            h1{
                color: #C0C0C0;
            }

        </style>
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
         <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/giohang2.php">Giỏ hàng</a></li>
      <li><a href="http://localhost/thi%20d%e1%bb%b1%20%c3%a1n%20web/Facebook/">Đăng nhập</a></li>
      <?php endif ?>
    </ul>
   </div>
</div>
                <?php 
                    if(isset($_POST['submit'])){
                       $id = $_POST['id'];
                       $name = $_POST['name'];
                       $link = $_POST['link'];
                       $money = $_POST['money'];
                       $soluong = $_POST['soluong'];
                       $info = $_POST['info'];
                       $sql = "SELECT * FROM tainghe where id = ? ";
                       $stm1 =  $conn->prepare($sql);
                       $stm1->setFetchMode(PDO::FETCH_ASSOC); 
                       $stm1 ->bindParam(':id',$id);
                       $stm1 ->execute([$id]);
                       $cout = $stm1 ->rowcount();
                       if($cout < 1 ){
                           $stm = $conn -> prepare('INSERT INTO tainghe (id,name,soluong,link,info,tien) VALUES (:id,:name,:soluong,:link,:info,:tien)');
                           $stm->bindParam(':id',$id);
                           $stm->bindParam(':name',$name);
                           $stm->bindParam(':soluong',$soluong);
                           $stm->bindParam(':tien',$money);        
                           $stm->bindParam(':link',$link);
                           $stm->bindParam(':info',$info);
                           $stm ->execute();
       
       
                        }else{
                          
                            $stm = $conn -> prepare(' UPDATE tainghe SET id =?,name=?,soluong = ?,link=?,info=? WHERE id = ?;');
                            $stm ->execute([$id,$name,$soluong,$link,$info,$id]);
        }

                         }
                         if(isset($_GET["actt"]) and $_GET["actt"] == "SP"){
            $stmt1 = $conn -> prepare('SELECT * FROM tainghe WHERE id = ?');
             $stt1 = $_GET["id"];
             $stmt1 ->execute([$stt1]);
              while($Price = $stmt1->fetch()) {
            
       
                 ?>
                 <div id="user_login" class="box-content">
                <h1>ADMIN</h1>
                <form method="POST">
                    <input type="text" name="id"  value="<?php echo $Price['id'] ?>" placeholder="ID" /><br/>
                    <input type="text" name="name"  value="<?php echo $Price['name'] ?>" placeholder="NAME" /><br/>
                    <input type="text" name="link"  value="<?php echo $Price['name'] ?>" placeholder="LINK" /><br/>
                    <input type="text" name="money"  value="<?php echo $Price['money'] ?>" placeholder="MONEY" /><br/>
                    <input type="text" name="soluong"  value="<?php echo $Price['soluong'] ?>" placeholder="SOLUONG" /><br/>
                
                 <textarea name="info" rows="5" cols="150" ><?php echo $Price['info'] ?></textarea> <br>
                 <a href="Trang-chủ.php"><input type="submit" value="Tai nghe" /></a>
                 <input type="submit"  name="submit" value="Dây sạc" /><br/>
                 </form>
                 </div>
                 <?php }}
                 else{ ?>
                  
                <h1>ADMIN</h1>
                <form method="POST">
                    <input type="text" name="id"  value="" placeholder="ID" /><br/>
                    <input type="text" name="name"  value="" placeholder="NAME" /><br/>
                    <input type="text" name="link"  value="" placeholder="LINK" /><br/>
                    <input type="text" name="money"  value="" placeholder="MONEY" /><br/>
                    <input type="text" name="soluong"  value="" placeholder="SOLUONG" /><br/>
                
                 <textarea name="info" rows="5" cols="150"></textarea> <br>
                 <input type="submit"  name="submit" value="Xác nhận" /><br/>
                 </form>
                 
                 </div>
               <?php } ?>
                <script>
    // Thay thế <textarea id="post_content"> với CKEditor
    CKEDITOR.replace( 'info' );// tham số là biến name của textarea
</script>
        </body>
</html>
<!--<script type="text/javascript" src="template/ckeditor/ckeditor.js"></script>

<script>
    // Thay thế <textarea id="post_content"> với CKEditor
    CKEDITOR.replace( 'descr' );// tham số là biến name của textarea
</script>-->
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