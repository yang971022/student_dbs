<?php
	$title = $_POST["title"];
	$title2 = $_POST["title2"];
	$column = $_POST["column"];
	$userid = $_POST["userid"];
	$timer = $_POST["timer"];
	// $filename = $_POST["filename"];
	$content = $_POST["content"];
	// 如果是录入页面提交,那么$action等于add
	//
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "video/mp4")
			|| ($_FILES["file"]["type"] == "imag/jepeg"))
			&& ($_FILES["file"]["size"] < 10241000)){
				if ($_FILES["file"]["error"] > 0) {
				  echo "错误: " . $_FILES["file"]["error"] . "<br />";
				 }else{
				 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
				 	$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
					//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
					move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
					// echo $filename;
				}
			}else{
				echo "您上传的文件不符合要求！";
			}


	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "index.php";
		$sql = "insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,cloumnid) value('$title','$title2','$filename','$content','$timer','".time()."','$userid','$column')";
		// echo $sql;
	} else if ($action=="update"){
		$str1 = "数据修改成功!";
		$str2 = "数据修改失败!";
		$url = "news-input.php";
		$kid = $_POST["kid"];
	 	$sql = "update news set 标题 = '{$title}',肩题='{$title2}',图片='{$filename}',内容='{$content}',发布时间='{$timer}',userid='{$userid}',cloumnid='{$column}' where id={$kid}";
	 	echo $sql;
	} else {
		die("请选择操作方法");
	}
	include("conn.php");
	// 执行SQL语句
	$result = mysqli_query($conn,$sql);
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