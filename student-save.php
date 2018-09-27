<?php
	$xuehao = $_POST["xuehao"];
	$banhao = $_POST["banhao"];
	$compellation = $_POST["compellation"];
	$gender = $_POST["sSex"];
	$birth = $_POST["birth"];
	$phone = $_POST["phone"];
	$id = empty($_REQUEST['id'])?"null":$_REQUEST['id'];
	// 如果是录入页面提交,那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "video/mp4")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 10241000)) {
		if ($_FILES["file"]["error"] > 0) {
			echo "错误: " . $_FILES["file"]["error"] . "<br />";
		} else {
			// 重新给上传的文件命名,增加一个年月日时分秒的前缀,并且加上保存路径
			$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
			// move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
			move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
		}
	} else {
		echo "您上传的文件不符合要求";
	}
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "student-list-ajax.php";
		$sql1 = "insert into student(班号,学号,姓名,照片,性别,出生日期,电话) value('{$banhao}','{$xuehao}','{$compellation}','{$filename}',{$gender},'{$birth}','{$phone}')";
		echo $sql1;
	} else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "student-input.php";
		$kid = $_POST["kid"];
		$sql1 = "update student set 学号='{$xuehao}',班号='{$banhao}',姓名='{$compellation}',照片='{$filename}',性别='{$gender}',出生日期='{$birth}',电话='{$phone}' where id='{$id}'";
	} else {
		die("请选择操作方法");  // die() 输出提示语并终止下面的代码执行
	}
	include("conn.php");
	// 执行SQL语句
	$result = mysqli_query($conn,$sql1);
	// 输出数据
	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		// Refresh:暂停时间
		header("Refresh:1;url={$url}");
	} else {
		echo $str2.mysqli_error($conn);
	}
	// 关闭数据库
	mysqli_close($conn);
?>