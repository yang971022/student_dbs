<?php
	include("conn.php");
	// 执行SQL语句
	$sql = "delete from banji where 班号='{$_GET['kid']}'";
	$result = mysqli_query($conn,$sql);
	
	if ($result) {
		echo "<script>alert('数据删除成功');</script>";
		// Refresh:暂停时间
		header("Refresh:1;url=grade-list.php");
	} else {
		echo "数据更新失败".mysqli_error($conn);
	}
	// 关闭数据库
	mysqli_close($conn);
?>