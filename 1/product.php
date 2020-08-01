<?php require("dbcon.php"); ?>

<?php 
$sql="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."' and order_pro_id='".$_GET["uppro"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);


$sql2="select * from product where pro_id='".$_GET["uppro"]."'";
$query2=mysqli_query($dbcon,$sql2);
$data2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>magic shop</title>
</head>

<body style="font-size:18px; background-color:#ededed;">
<?php include("navbar.php"); ?>
<div class="container" style="background-color:#fff;">
	<div class="row">
    <div class="col-sm-6"></div>
    
    
    <div class="col-sm-6">
    <div class="row">
    	<div class="col-sm-4"></div>
        <div class="col-sm-8"><?php echo $data2["pro_nm"]; ?></div>
    </div><br>
    <div class="row">
    	<div class="col-sm-4"></div>
        <div class="col-sm-8"><?php echo $data2["pro_price"]; ?></div>
    </div><br>
    <div class="row">
    	<div class="col-sm-4"></div>
        <div class="col-sm-8"><?php echo $data2["pro_detail"]; ?></div>
    </div><br>
    <div class="row">
    	<div class="col-sm-4"></div>
        <div class="col-sm-8">
        <form action="" method="get">
        	<input name="prounit" type="number" value="1" max="">
        </form></div>
    </div><br>
    
    <div class="row">
    	 <a class="btn btn-danger" href="basket.php?proid=">เพิ่มไปยังตะกร้า</a>
    </div><br>
    
    </div>
    
    
    </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>