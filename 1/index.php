<?php require("dbcon.php"); ?>
<?php 
if(isset($_GET["proid"])&& $_GET["proid"]<>""){
	if($_SESSION["username"]<>""){
		$sql="insert into order_temp values ('".$_SESSION["orderid"]."','".$_GET["proid"]."',1,'".$_SESSION["username"]."')";
		$query=mysqli_query($dbcon,$sql);
		}else{
			echo "<script language=\"javascript\">alert('กรุณาเข้าสู่ระบบ')</script>";
			}
	}

$sql="select * from product limit 8";
$query=mysqli_query($dbcon,$sql);

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

<div class="container">
<div class="panel-body center-block">
	
    <form action="" method="get">
    	<div class="col-sm-5">
        <input name="search" type="text" class="form-control input-lg" placeholder="ค้นหา">
        </div>
        
        <div class="col-sm-3">
       	<select name="select" class="form-control input-lg">
        <option value="0" selected>เลือก</option>
        <option value="1">เลือก</option>
        </select>
        </div>
        
        <div class="col-sm-3">
       	<select name="select" class="form-control input-lg">
        <option value="0" selected>เลือก</option>
        <option value="1">เลือก</option>
        </select>
        </div>
        
        <div class="col-sm-1">
        <input name="button" type="submit" class="input-lg btn btn-primary" value="ค้นหา">
        </div>
    
    </form>
    
</div>
</div>

<div class="container">
	<div class="carousel slide" id="myCarousel" data-ride="carousel">
    <div class="carousel-inner">
    <div class="item active">
    <img src="image/chicago.jpg">
    </div>
    
    <div class="item">
    <img src="image/la.jpg">
    </div>
    
    <div class="item">
    <img src="image/ny.jpg">
    </div>
    </div>
    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    	<span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>    
</div>

<div class="container" style="background-color:#fff;">
	<h3>สินค้าแนะนำ</h3><hr>
    <?php if($query){
		while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		?>
    <div class="col-sm-3">
    <div class="thumbnail">
    	<img src="image/product/img02.png" class="img-rounded">
        
        <div class="row">
        <div class="col-sm-12"><?php echo $data["pro_nm"]; ?></div>
        </div>
        
        <div class="row">
        <div class="col-sm-3">ราคา</div>
        <div class="col-sm-9"><?php echo $data["pro_price"]; ?></div>
        </div>
        
        <center>
        <a class="btn btn-danger" href="index.php?proid=<?php echo $data["pro_id"]; ?>">เพิ่มไปยังตะกร้า</a>
        <a class="btn btn-primary" href="pro.php?id=<?php echo $data["pro_id"]; ?>">รายละเอียด</a>
        </center>
        
    </div>
    </div>
    <?php }} ?>
</div>


<div class="container" style="background-color:#fff;">
	<h3><a id="type"></a> หมวดหมู่ : <a class="btn btn-primary" href="index.php#type">all</a> 
	<?php 
  	$sql="select * from product_type";
	$query=mysqli_query($dbcon,$sql);
	
	if($query){
		while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
			$type=$data["protype_id"];
  	?>
    
    <a class="btn btn-primary" href="index.php?protype=<?php echo $type ?>#type"><?php echo $data["protype_name"]; ?></a> 
    
  <?php }} ?>
  </h3><hr>
  <?php if ($_GET["protype"]<>""){
	  $sql1="select * from product where pro_type='".$_GET["protype"]."'";
  } else{
	  $sql1="select * from product";
	  }
	  $query=mysqli_query($dbcon,$sql1);
	
	if($query){
		while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
	   ?>
    <div class="col-sm-3">
    <div class="thumbnail">
    	<img src="image/product/img02.png" class="img-rounded">
        
        <div class="row">
        <div class="col-sm-12"><?php echo $data["pro_nm"]; ?></div>
        </div>
        
        <div class="row">
        <div class="col-sm-3">ราคา</div>
        <div class="col-sm-9"><?php echo $data["pro_price"]; ?></div>
        </div>
        
        <center>
        <a class="btn btn-danger" href="index.php?proid=<?php echo $data["pro_id"]; ?>">เพิ่มไปยังตะกร้า</a>
        <a class="btn btn-primary" href="pro.php?id=<?php echo $data["pro_id"]; ?>">รายละเอียด</a>
        </center>
        
    </div>
    </div>
   <?php }}?>
</div>


<?php include("footer.php"); ?>

</body>
</html>