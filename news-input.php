<?php
	include("head.php");
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
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">新闻发布模块</p>
				<form id="form2" method="post" action="news-save.php" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
					<div class="control-group">
						<label for="title" class="control-label">标题：</label>
						<div class="controls">
							<input type="text" id="title" name="title" class="input-large input-fat" placeholder="请输入标题" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="title2" class="control-label">肩题：</label>
						<div class="controls">
							<input type="text" id="title2" name="title2" class="input-large input-fat" data-rules="required|minlength=2|maxlength=10" placeholder="请输入肩题">
						</div>
					</div>
					<div class="control-group">
						<label for="filename" class="control-label">照片：</label>
						<div class="controls">
							<input type="file" name="file" /> 
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
						<label for="timer" class="control-label">时间：</label>
						<div class="controls">
							<input type="text" id="timer" name="timer" class="input-large input-fat" data-toggle="datepicker" placeholder="请输入时间">
						</div>
					</div>
					<div class="control-group">
						<label for="content" class="control-label">内容：</label>
						<div class="controls">
							<textarea name="content" id="content" class="input-large input-fat" data-rules="required|minlength=2|maxlength=10" placeholder="请输入内容" cols="30" rows="10"></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label"></label>
						<div class="controls">
							<input type="submit" value="提交" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include("foot.php"); ?>