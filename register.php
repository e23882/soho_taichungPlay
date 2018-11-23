<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta http-equiv="refresh" content="3;index.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>台中食住網</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/custom.css" rel="stylesheet"/>
	<link href="css/RWD.css" rel="stylesheet"/>

  </head>
  <body style="background-image: url('images/back.jpg');">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding:10px;">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Home<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="topMenu">
           <form class="navbar-form navbar-left" role="search"  method="post" action="searchResult.php">
            <li><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLogin" id="login">會員登入</button></li>
            <li><button type="button" class="btn btn-primary btn-lg" id="logout" style="display: none">登出</button></li>
          </ul>
        </div>
      </div>
    </nav>

<!-- 會員登入畫面 -->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">會員登入</h4>
      </div>
	  <form method="post" action="login.php">
		  <div class="modal-body">
			<div class="form-group">
			  帳號：
			  <input type="text" class="form-control" id="account" name="ac">
			</div> 
			<div class="form-group">
			  密碼：
			  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
			</div>
		  </div>
		  <div class="modal-footer">
			<div id="error_msg"></div>
			<a id="addmember" data-toggle="modal" data-target="#ModalRegister" >註冊會員</a>
			<button type="reset" class="btn btn-default" data-dismiss="modal">取消</button>
			<button type="submit" class="btn btn-primary" id="loginbtn">登入</button>
		  </div>
	  </form>
    </div>
  </div>
</div>
<!-- 會員登入畫面 -->
<div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">會員註冊</h4>
      </div>
	  <form method="post" action="register.php">
		  <div class="modal-body">
			<div class="form-group">
			  姓名：
			  <input type="text" class="form-control" id="insertname" name="name"/>
			</div> 
			<div class="form-group">
			  帳號：
			  <input type="text" class="form-control" id="insertaccount" name="ac"/>
			</div> 
			<div class="form-group">
			  密碼：
			  <input type="password" class="form-control" id="insertpassword" placeholder="Password" name="pw"/>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="reset" class="btn btn-default" data-dismiss="modal">取消</button>
			<button type="submit" class="btn btn-primary" id="insertMember">註冊</button>
		  </div>
	  </form>
    </div>
  </div>
</div>
  
<!-- 移動式訊息區塊 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		
		<div class="carousel-inner">
			<div class="item active">
				<img src="images/01.jpg" alt="Los Angeles" style="width:100%;">
			</div>
			<div class="item">
				<img src="images/02.jpg" alt="Chicago" style="width:100%;"/>
			</div>
			<div class="item">
				<img src="images/03.jpg" alt="New York" style="width:100%;">
			</div>
    <?php
	require_once 'ConnectionFactory.php';
	try
	{
	
		if (strpos($_POST['ac'], ' ') !== false || strpos($_POST['pw'], ' ') !== false || strpos($_POST['name'], ' ') !== false) 
		{
			echo "<div style='font-family:微軟正黑體;z-index:100;font-weight:bold;font-size:25px;background-color:white;padding-left:80px;padding-right:80px;padding-top:20px;padding-bottom:20px;position:fixed;top:42%;left:20%;'>發現非法字元"."</div>";
		}
		else
		{
			$connUser = ConnectionFactory::getFactory()->getConnection();
			$stmtUser = $connUser->prepare("select uName from user where uAccount = '".$_POST['ac']."'");
			$stmtUser->execute();
			$resultUser = $stmtUser->fetchAll(PDO::FETCH_CLASS);
			$connUser = null;
			$count = 0;
			foreach ($resultUser as $value) 
			{
				$count++;
			}
			
			if($count>0)
			{
				echo "<div class='showError'>帳號已存在"."</div>";
			}
			else
			{
				// echo "<div>".$_POST['ac']."</div>";
				// echo "<div>".$_POST['pw']."</div>";
				// echo "<div>".$_POST['name']."</div>";
				$conn = ConnectionFactory::getFactory()->getConnection();
				$stmt = $conn->prepare("insert into user(uName, uAccount, uPassword) VALUES('".$_POST['name']."','".$_POST['ac']."','".hash('sha256', $_POST['pw'])."')");
				$stmt->execute();			
				$conn = null;
				$_SESSION['user']=$_POST['name'];
				echo "<div style='font-family:微軟正黑體;z-index:100;font-weight:bold;font-size:25px;background-color:white;padding-left:80px;padding-right:80px;padding-top:20px;padding-bottom:20px;position:fixed;top:50%;width:100%;text-align:center;'>註冊成功 ".$_POST['name']."</div>";
			}
			
		}
	}
	catch (PDOException $e) 
	{
		echo "error".$e.message;
	}
?>

	<!--內容-->
	<div class="row"  style="margin-top:5%;margin-bottom:15%;width:100%; position: absolute;left: 0;right: 0;margin-left: auto;margin-right: auto;">
		
		<div class="col-xs-6 col-md-3" style="text-align:center;">
			<a><img src="images/restaurant.png" style="border-radius:50%;width:60%;" alt=""/></a>
		</div>
		<div class="col-xs-6 col-md-3" style="text-align:center;">
			<a><img src="images/pet.png" style="border-radius:50%;width:60%;" alt=""/></a>
		</div>
		<div class="col-xs-6 col-md-3" style="text-align:center;">
			<a><img src="images/member.png" style="border-radius:50%;width:60%;" alt=""/></a>
		</div>
		<div class="col-xs-6 col-md-3" style="text-align:center;">
			<a><img src="images/view.png" style="border-radius:50%;width:60%;" alt=""/></a>
		</div>
	</div>
     
	
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>