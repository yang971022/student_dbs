<?php include("head.php");
	include("conn.php");
	$sql = "select distinct * from newscolumn";
	$sql1 = "select id from user where name = '{$_SESSION['usname']}'";
	// echo $sql1;
	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
	if (mysqli_num_rows($result1) > 0) {
			// 将查询结果转换成数组
			$row1 = mysqli_fetch_assoc($result1);
		} else {
			echo "找不到这条记录";
	}
 ?>
 <?php
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	// echo $kid;
	if ($kid == "null") {
		die ("请选择要修改的记录");
	} else {
		// 执行SQL语句
		$sql2 = "select * from news where id={$kid}";
		$result2 = mysqli_query($conn,$sql2);
		// var_dump( $result);
		// 输出数据
		if (mysqli_num_rows($result2) > 0) {
			// 将查询结果转换成数组
			$row = mysqli_fetch_assoc($result2);
		} else {
			echo "找不到这条记录";
		}
		// 关闭数据库
		mysqli_close($conn);
	}
?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge my-padd">新闻录入</p>
				<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" id="form1" enctype="multipart/form-data">
					<div class="control-group">
						<label for="title" class="control-label">标题：</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程编号 -->
							<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
							<input id="title" value="<?php echo $row['标题']; ?>" name="title" class="input-large input-fat" type="text" placeholder="请输入标题" data-rules="required">
						</div>
					</div>
					<div class="control-group">
						<label for="title2" class="control-label">肩题：</label>
						<div class="controls">
							<input id="title2" name="title2" value="<?php echo $row['肩题']; ?>" class="input-large input-fat" type="text" placeholder="请输入肩题">
						</div>
					</div>
					<div class="control-group">
						<label for="zuozhe" class="control-label">作者：</label>
						<div class="controls">
							<input type="hidden" id="userid" name="userid" value="<?php echo $row1['id']; ?>">
							<input type="text" readonly= "true" class="input-large input-fat" value="<?php echo $_SESSION['usname']?>">
						</div>
					</div>
					<div class="control-group">
						<label for="column" class="control-label">栏目：</label>
						<div class="controls">
							<select id="column" name="column">
								<?php
									if( mysqli_num_rows($result) > 0 ){
										while ( $row = mysqli_fetch_assoc($result) ) {
											echo "<option value='{$row['id']}'>{$row['name']}</option>";
										}
									}else{
										echo "<option value=''>请先添加栏目信息</option>";
									}
								 ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="ftime" class="control-label">发布时间：</label>
						<div class="controls">
							<input type="text" id="timer" name="timer" value="<?php echo $row['发布时间']; ?>" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入发布时间">
						</div>
					</div>
					<div class="control-group">
						<label for="file" class="control-label">图片：</label>
						<div class="controls">
							<input type="file" name="file" value="<?php echo $row['图片']; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label v-top">内容：</label>
						<div class="controls">
							<textarea name="content" value="<?php echo $row['内容']; ?>" id="" cols="30" rows="5"></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include("foot.php"); ?>