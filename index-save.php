<?php include("conn.php");
	// 邮箱
	$emali = empty($_POST['emali']) ? "null":strtolower($_POST['emali']);
	// 用户名
	$userm = empty($_POST['userm']) ? "null":$_POST['userm'];
	// 密码
	$password = empty($_POST['password']) ? "null":$_POST['password'];
	// 密码提示
	$question = empty($_POST['question']) ? "null":$_POST['question'];
	// 答案
	$answer = empty($_POST['answer']) ? "null":$_POST['answer'];
	// 选择有没有邮件名称一样的
	$sql="insert into user(email,name,password,question,answer) value('$emali','$userm','$password','$question','$answer')";
	$result1 = mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result1) >= 1) {
		echo "error";
	}else{
		echo "ok";
	mysqli_close($conn);
 ?>