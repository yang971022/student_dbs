<?php session_start();
	if (empty($_SESSION['usname'])) {
		header('Refresh:0;url=login.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生管理系统</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="css/default.css">
	<style type="text/css">
		.userinfo{
			position: absolute;
			width: 200px;
			height: 25px;
			line-height: 25px;
			bottom: 0;
			right: 0;
			font-size: 12px;
		}
		.userinfo span{
			color: red;
		}
		a{
		font-size: 12px;
		}
		#bt{
			width: 450px;
			height: 300px;
			float: left;
		}
		#bt li img{
			width: 420px;
			height: 270px;
		}
		#bt li p{
			width: 420px;
			font-size: 14px;
		}
		#bt li{
			float: left;
			padding-left: 80px;
			padding-top: 20px;
		}

	</style>
</head>
<body>
	<div class="sui-container">
		<div class="nav">北京网络职业学院学生管理系统V2.0
			<div class="userinfo">欢迎<span><?php echo $_SESSION['usname']; ?></span>登录&nbsp;<a href="login-out.php">退出</a> <span><a href="index.php">返回首页</a></span></div>

	</div>

