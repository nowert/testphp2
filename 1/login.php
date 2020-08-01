<?php require("dbcon.php"); ?>
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
	<h3>เข้าสู่ระบบ</h3><hr>
    <form action="logincheck.php" method="get" class="form-horizontal">
    
    <div class="col-sm-offset-4 col-sm-4">
    	<input name="email" type="text" class="form-control"><br>
    </div>
    
    <div class="col-sm-offset-4 col-sm-4">
    	<input name="password" type="password" class="form-control"><br>
    </div>
    
    <div class="col-sm-offset-4 col-sm-4">
    	<input name="button" type="submit" class="form-control btn btn-success" value="เข้าสู่ระบบ"><br>
    </div>
    
    </form>
</div>
<div style="position:absolute; bottom:0; display:block; width:100%;">
<?php include("footer.php"); ?>
</div>
</body>
</html>