<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <title>台中旅遊網</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/custom.css" rel="stylesheet"/>
	<link href="css/RWD.css" rel="stylesheet"/>
	<style>
		td 	th
		{
			text-align:center;
		}
	</style>
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
              <a href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="topMenu">
           <form class="navbar-form navbar-left" role="search"  method="post" action="searchResult.php">
			<li>
			<?php
				session_start();
				if(isset($_SESSION["user"])) 
				{
					echo "<button type='button' class='btn btn-primary btn-lg'  onclick=\"javascript:location.href='logout.php'\" >登出</button>";
				}
				else
					echo "<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#ModalLogin' id='login'>會員登入</button>";
			?>
			</form>
			</li>
            
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
	<div style="text-align:center;background-color:rgba(255, 255, 255, 0.3);padding:50px;text-align:center;">
    <!--內容-->
		<table id="tableMember"  class="table table-hover">
				<?php
					require_once 'ConnectionFactory.php';
					if(isset($_SESSION["user"])) 
					{
						try
						{
							$conn = ConnectionFactory::getFactory()->getConnection();
							//$stmt = $conn->prepare('select * from favorite where userID = '.$_SESSION["userID"];
							$stmt = $conn->prepare("SELECT a.logDate as 'Date', b.name as 'Name',a.type as 'type' FROM `favorite` a left join hotel b on a.fid = b.id where a.type ='hotel' and a.userID = '".$_SESSION["userID"]."' UNION  SELECT a.logDate as 'Date', b.restName as 'Name',a.type as 'type' FROM `favorite` a left join restaurant b on a.fid = b.id where a.type ='restaurant' and a.userID = '".$_SESSION["userID"]."' UNION  SELECT a.logDate as 'Date', b.Name as 'Name',a.type as 'type' FROM `favorite` a left join attractions b on a.fid = b.id where a.type ='attractions' and a.userID = '".$_SESSION["userID"]."'");
							$stmt->execute();
							$result = $stmt->fetchAll(PDO::FETCH_CLASS);
							$conn = null;
							echo "<th>最愛景點名稱</th><th>加入最愛日期</th>><th>類型</th>";
							foreach ($result as $value) 
							{
								echo "<tr><td><b>".$value->Name."</b></td><td><b>".$value->Date."</b></td><td><b>";
								if($value->type=="attractions")
									echo "人文";
								else if($value->type=="hotel")
									echo "旅館";
								else
									echo "餐廳";
							echo "</b></td></tr>";
								
							}
							
							echo "</table>";
						}
						catch (PDOException $e) 
						{
							echo "<a href='index.php'>查詢不到物件</a>";
						}
					}
					else
					{
						echo "<div class='showError'>尚未登入會員</div>";
					}
					
					
				?>
	</div>
	<script>
	function changeHeart(table, user, tableID)
	{
		alert(table+user+tableID);
		var x = document.getElementById("heart").getAttribute("src");
		
		if (x=="images/like.png")
		{
			document.getElementById("heart").src="images/notlike.png";
			
			 $.ajax({
				url: "cancelFavorite.php?table="+table+"&user="+user+"&tableID="+tableID, 
			    context: document.body, 
			    success: function(){ 
			      alert('已取消我的最愛!'); 
			    } 
			  }); 
		}
		else
		{
			document.getElementById("heart").src="images/like.png";
			 $.ajax({ 
				url: "addFavorite.php?table="+table+"&user="+user+"&tableID="+tableID, 
			    context: document.body, 
			    success: function(){ 
			      alert('已加入我的最愛!'); 
			    } 
			  }); 
		}

		
	}
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>