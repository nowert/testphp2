<?php require("dbcon.php"); ?>
<?php 
$sql3="delete from order_temp where order_temp_id='".$_SESSION["orderid"]."' and order_pro_id='".$_GET["prodel"]."'";
$query=mysqli_query($dbcon,$sql3);

$sql="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_assoc($query)
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>

<body style="font-size:18px; background-color:#ededed;">
<?php include("navbar.php"); ?>
	<div class="container" style="background-color:#fff;">
    
    <h3>ตะกร้าสินค้า</h3><hr>
    <table class="table">
<thead>

  <tr>
    <td width="10%">ลำดับ</td>
    <td width="15%">รูป</td>
    <td width="25%">ชื่อสินค้า</td>
    <td width="10%">ราคา</td>
    <td width="10%">จำนวน</td>
    <td width="10%">ราคารวม</td>
    <td width="10%">แก้ไข</td>
    <td width="10%">ลบ</td>
  </tr>
  
</thead>
<tbody>
<?php do {?>
<?php 

$sql2="select * from product where pro_id='".$data["order_pro_id"]."'";
$query2=mysqli_query($dbcon,$sql2);
$data2=mysqli_fetch_assoc($query2);
$totalrow=mysqli_num_rows($query2);
?>
    <tr>
    <td><?php echo $data["order_temp_id"]; ?></td>
    <td><?php echo $data2["pro_nm"]; ?></td>
    <td><?php echo $data2["pro_prict"]; ?></td>
    <td><?php echo $data["order_pro_unit"]; ?></td>
    <td> </td>
    
    <td></td>
    <td><a class="btn btn-warning" href="product.php?uppro=<?php echo $data2["pro_id"]; ?>">แก้ไข</a></td>
    <td><a class="btn btn-danger" href="basket.php?prodel=<?php echo $data2["pro_id"]; ?>">ลบ</a></td>
  </tr>
 <?php } while($data=mysqli_fetch_assoc($query)) ?>
  </tbody>
  
  <tfoot>
   <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ราคารวม</td>
    <td width="10%"></td>
    <td width="10%">บาท</td>
  </tr>
  
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ส่วนลด</td>
  
    <td width="10%"></td>
    <td width="10%">บาท</td>
  </tr>
  
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ภาษี</td>
    <td width="10%"></td>
    <td width="10%">บาท</td>
  </tr>
  
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ค่าขนส่ง</td>
    <td width="10%"></td>
    <td width="10%">บาท</td>
  </tr>
  
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ราคาสุทธิ</td>
    <td width="10%"></td>
    <td width="10%">บาท</td>
  </tr>
   <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%"><a class="btn btn-info" href="">พิมพ์ใบสั่งซื้อ</a></td>
    <td width="10%"><a class="btn btn-info" href="confrim.php">ยืนยันการสั่งซื้อ</a></td>
  </tr>
  </tfoot>
</table>

    
    </div>
    <br><br>
    <?php include("footer.php"); ?>
</body>
</html>