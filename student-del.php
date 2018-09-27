<?php
	/* 学生删除
		created 1351169948@ 2018-08
	*/
	include("conn.php");
	// 执行SQL语句
	$sql = "delete from student where id='{$_GET['kid']}'";
	$result = mysqli_query($conn,$sql);
	
	if ($result) {
		echo "<script>alert('数据删除成功');</script>";
		// Refresh:暂停时间
		header("Refresh:1;url=student-list.php");
	} else {
		echo "数据更新失败".mysqli_error($conn);
	}
	// 关闭数据库
	mysqli_close($conn);
?>