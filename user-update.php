<?php include("head.php") ?>
<?php
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if ($kid == "null") {
		die ("请选择要修改的记录");
	} else {
		include("conn.php");
		// 执行SQL语句
		$sql1 = "select id,email,name,question from user where id={$kid}";
		$result = mysqli_query($conn,$sql1);
		// 输出数据
		if (mysqli_num_rows($result) > 0) {
			// 将查询结果转换成数组
			$row = mysqli_fetch_assoc($result);
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
				<p class="sui-text-xxlarge">会员管理修改</p>
				<form id="form1" action="user-save.php" method="post" class="sui-form form-horizontal sui-validate">
					<div class="control-group">
						<label for="inputEmail" class="control-label">邮件</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程编号 -->
							<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
							<input type="text" value="<?php echo $row['email'] ?>" id="email" name="email" class="input-large input-fat" placeholder="请输入邮件" data-rules="required|minlength=2|maxlength=20">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">名字：</label>
						<div class="controls">
							<input type="text" value="<?php echo $row['name'] ?>" id="mz" name="mz" class="input-large input-fat" placeholder="请输入邮件" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="question" class="control-label">密码提示问题：</label>
						<div class="controls">
							<div class="control-group">
								<select id="question" name="question">
									<option value="你的小学在哪上学">你的小学在哪上学</option>
									<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
									<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label"></label>
						<div class="controls">
							<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include("foot.php"); ?>