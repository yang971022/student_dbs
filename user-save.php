<?php
	$email = $_POST["email"];
	$mz = $_POST["mz"];
	$question = $_POST["question"];
	// 如果是录入页面提交,那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "user-list.php";
		$sql = "select email,name,question from user where id={$id}";
	} else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "user-update.php";
		$kid = $_POST["kid"];
		$sql1 = "update student set email='{$email}',name='{$mz}',question='{$question}' where id='{$kid}'";
	} else {
		die("请选择操作方法");
	}
	include("conn.php");
	// 执行SQL语句
	$result = mysqli_query($conn,$sql1);
	// 输出数据
	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		// Refresh:暂停时间
		header("Refresh:1;url={$url}");
	}
	// 关闭数据库
	mysqli_close($conn);
?>