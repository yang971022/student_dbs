<?php 
	session_start();
	include("conn.php");
	// 邮箱
	$emali = empty($_POST['emali']) ? "null":strtolower($_POST['emali']);
	// 密码
	$password = empty($_POST['password']) ? "null":$_POST['password'];
    $sql="select email,name,password,question,answer from user where email = '{$emali}' and password='{$password}'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) >= 1) {
		// 创建一个session,建为usname,值为$emali
		$_SESSION['usname'] = $emali;
		echo "<p class='pp'>登录成功</p><script>document.cookie='usname={$emali}';</script>";
		header("Refresh:1;url=index.php");
	}else{
		echo "<p class='pp'>登录失败</p>".mysqli_error($conn);
		header("Refresh:1;url=login.php");
	}
	mysqli_close($conn);
	include ("p.style.php");
 ?>
<style>
	.pp{
		width: 500px;
		height: 100px;
		background-color: #f34f4fd6;
		margin: 10px auto;
		text-align: center;
		line-height: 100px;
		border-radius: 10px 10px 10px 10px;
		font-size: 35px;
		display: none;
		color: color;
	}
</style>