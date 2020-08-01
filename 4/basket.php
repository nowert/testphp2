<?php require("dbcon.php"); ?>
<?php 
$sql3="delete from order_temp where order_temp_id='".$_SESSION["orderid"]."' and order_pro_id='".$_GET["prodel"]."'";
$query=mysqli_query($dbcon,$sql3);

$sql="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_assoc($query);
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
$totalrows=mysqli_num_rows($query2);
?>
    <tr>
    <td><?php echo $data["order_temp_id"]; ?></td>
    <td></td>
    <td><?php echo $data2["pro_nm"]; ?></td>
    <td><?php echo $data2["pro_price"]; ?></td>
    <td><?php echo $data["order_pro_unit"]; ?></td>
    
    
   	<?php 
	
	$pro_weight=$data["order_pro_unit"]*$data2["weight"];
	$totalprice=$totalprice+($data2["pro_price"]*$data["order_pro_unit"]); ?>
    <td><?php echo $data2["pro_price"]*$data["order_pro_unit"]; ?></td>
    <td>
	<a class="btn btn-warning" href="update_product.php?uppro=<?php echo $data2["pro_id"]; ?>">แก้ไข</a></td>
    <td>
    <a class="btn btn-danger" href="basket.php?prodel=<?php echo $data2["pro_id"]; ?>">ลบ</a></td>
  </tr>
  <?php } while ($data=mysqli_fetch_assoc($query));?>
  </tbody>
  
  <tfoot>
   <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ราคารวม</td>
    <td width="10%"><?php echo $totalprice; ?></td>
    <td width="10%">บาท</td>
  </tr>
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ส่วนลด<?php echo $lodshow; ?></td>
   <?php if ($totalprice>=5000){
	   	$lod=$totalprice*(5/100);
		$lodshow="5%";
	   } else if ($totalprice>=3000){
	   	$lod=$totalprice*(3/100);
		$lodshow="3%";
	   } else if ($totalprice>=2000){
	   	$lod=$totalprice*(2/100);
		$lodshow="2%";
	   } else {
		   $lod=0;
		   }
	 ?>
    <td width="10%"><?php echo $lod; ?></td>
    <td width="10%">บาท</td>
  </tr>
  
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ภาษี</td>
 <?php $vet=($totalprice-$lod)*(7/107);?>
    <td width="10%"><?php echo number_format($vet,2); ?></td>
    <td width="10%">บาท</td>
  </tr>
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ค่าขนส่ง</td>
    
   	<?php if($pro_weight>=1 and $pro_weight>2){
		$totalweight=40;
		} else if($pro_weight>=3 and $pro_weight>5){
		$totalweight=45;
		} else if($pro_weight>=5 and $pro_weight>10){
		$totalweight=80;
		}else if($pro_weight>=10 and $pro_weight>50){
		$totalweight=200;
		} else {
			$totalweight=400;
			}
			
		?>
    <td width="10%"><?php echo $totalweight; ?></td>
    <td width="10%">บาท</td>
  </tr>
  
  <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%">ราคาสุทธิ</td>
    <td width="10%"><?php echo number_format((($totalprice-$lod)+($vet+$totalweight)),2); ?></td>
    <td width="10%">บาท</td>
  </tr>
   <tr>
    <td width="10%"></td>
    <td width="15%"></td>
    <td width="25%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
    <td width="10%"><a class="btn btn-info" href="" onClick="window.print();">พิมพ์ใบสั่งซื้อ</a></td>
    <td width="10%"><a class="btn btn-info" href="confrim.php">ยืนยันการสั่งซื้อ</a></td>
  </tr>
  </tfoot>
</table>

    
    </div>
    <br><br>
    <?php include("footer.php"); ?>
</body>
</html>