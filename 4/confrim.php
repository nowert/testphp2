<?php require("dbcon.php"); ?>
<?php
if($_POST["btn_confrim"]=="ยืนยันการสั่งซื้อ"){
		$sql3="insert into `order` values ('".$_SESSION["orderid"]."','".$_SESSION["username"]."','".$dtstemp."','','".$_POST["addr_send"]."','','รอการชำระเงิน','')";
		$query3=mysqli_query($dbcon,$sql3);
	}
$sql="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);

$sql2="select * from member where mem_email='".$_SESSION["username"]."'";
$query2=mysqli_query($dbcon,$sql2);
$data2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-sclae=1">
<link rel="stylesheet" href="file:///C|/xampp/htdocs/team/css/bootstrap.min.css">
<script src="file:///C|/xampp/htdocs/team/jquery/jquery.min.js"></script>
<script src="file:///C|/xampp/htdocs/team/js/bootstrap.min.js"></script>
</head>

<body style="background-color:#ededed; font-size:18px;">
<?php include("navbar.php"); ?>

<div class="container" style="background-color:#fff;">
 	<div ><br>
    <h3><center>ยืนยันการสั่งซื้อ</center></h3><hr>
    </div>
    
     <form action="confrim.php" method="POST" class="form-horizontal" >
     
     <div class="form-group">
    <label class="control-label col-sm-4">รหัสใบสั่งซื้อ</label>
    <div class="col-sm-4">
    	<label class="form-control"><?php echo $data['order_temp_id']; ?></label>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">ที่อยู่ในการจัดส่ง</label>
      <div class="col-sm-4">
    	<textarea name="addr_send" cols="50" rows="5"><?php echo $data2['mem_nm']." "; ?><?php echo $data2['mem_address']." "; ?><?php echo $data2['mem_tel']; ?></textarea>
    	<!-- <input name="" type="" class="form-control btn btn-primary">-->
    </div>
    </div>
    
   
    
    
    <div class="form-group">
   
    <div class="col-sm-offset-4 col-sm-4">
    	<input name="btn_confrim" type="submit" value="ยืนยันการสั่งซื้อ" class="btn btn-success form-control">
    </div>
    </div>
    
    
    </form>
    
    <br>
</div>
</div>
<div style="position:absolute; bottom:0; display:block; width:100%;">
<?php include("footer.php"); ?>
</div>
</body>
</html>
<body>
</body>
</html>