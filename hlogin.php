<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="refresh" content="3;url=index.php">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>台中旅遊網</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
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
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search"  method="post" action="searchResult.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">找找</button>
              <span id="login_showname"></span>
            </form>
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
		<?php
		require_once 'ConnectionFactory.php';
			if (strpos($_POST['ac'], ' ') !== false || strpos($_POST['password'], ' ') !== false ) 
			{
				echo "<div style='font-family:微軟正黑體;z-index:100;font-weight:bold;font-size:25px;background-color:white;padding-left:80px;padding-right:80px;padding-top:20px;padding-bottom:20px;position:fixed;top:42%;left:20%;'>發現非法字元"."</div>";
			}
			else			
			{
				$conn = ConnectionFactory::getFactory()->getConnection();
				$stmt = $conn->prepare("select uName from user where uAccount = '".$_POST['ac']."' and uPassword = '".$_POST['password']."'");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_CLASS);
				$conn = null;
				$count = 0;
				foreach ($result as $value) 
				{
					$count++;
				}
				
				if($count>0)
				{
					echo "<div style='font-family:微軟正黑體;z-index:100;font-weight:bold;font-size:25px;background-color:white;padding-left:80px;padding-right:80px;padding-top:20px;padding-bottom:20px;position:fixed;top:42%;left:35%;'>歡迎回來 ".$value->uName."</div>";
					session_start();
					$_SESSION['user']=$value->uName;
				}
				else
					echo "<a href='login.html' style='color:black;font-family:微軟正黑體;'>密碼錯誤</a>";	
			}			
		?>

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
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/01.jpg" alt="...">
      
    </div>
    <div class="item">
      <img src="https://travel.taichung.gov.tw/Utility/DisplayImage?id=27344&prefix=original_" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!--內容-->
	<div class="row" style="margin-top:5%;">
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
     
	<footer>
		<div class="row">
			<div class="col-lg-12"></div>
		</div>
	</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>