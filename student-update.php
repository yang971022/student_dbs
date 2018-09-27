<?php include("head.php"); 
include "conn.php";
$sql = "SELECT DISTINCT 班号 FROM banji";
$result1 = mysqli_query($conn, $sql);
?>
<?php
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if ($kid == "null") {
		die ("请选择要修改的记录");
	} else {
		include("conn.php");
		// 执行SQL语句
		$sql1 = "select * from student where id={$kid}";
		echo $sql1;
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
				<p class="sui-text-xxlarge">学生修改信息</p>
				<form id="form1" action="student-save.php" method="post" class="sui-form form-horizontal sui-validate">
					<div class="control-group">
						<label for="xuehao" class="control-label">学号：</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程编号 -->
							<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
							<input type="text" id="xuehao" name="xuehao"  value="<?php echo $row['学号'] ?>" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlegth=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="banhao" class="control-label">班号：</label>
						<div class="controls">
							<select id="banhao" name="banhao">
								<?php
									if( mysqli_num_rows($result) > 0 ){
										while ( $banji = mysqli_fetch_assoc($result1) ) {
											if ($banji['班号'] == $row['班号']) {
												echo "<option select='select' value='{$banji['班号']}'>{$banji['班号']}</option>";
											} else {
												echo "<option value='{$banji['班号']}'>{$banji['班号']}</option>";
											}
										}
									}else{
										echo "<option value=''>请先添加班级信息</option>";
									}
								?>
			    			</select>
						</div>
					</div>
					<div class="control-group">
						<label for="compellation" class="control-label">姓名：</label>
						<div class="controls">
							<input type="text" id="compellation" name="compellation" value="<?php echo $row['姓名'] ?>" class="input-large input-fat" placeholder="请输入姓名" data-rules="required|minlegth=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="file" class="control-label">照片：</label>
						<div class="controls">
							<input type="file" name="file" />
							<img width="80" height="150" src="<?php echo $row['照片']; ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">性别：</label>
						<div class="controls">
							<label class="radio-pretty inline <?php if($row['性别']=='1'){echo 'checked';}?>">
								<input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
							</label>
							<label class="radio-pretty inline <?php if($row['性别']=='0'){echo 'checked';}?>">
								<input type="radio" value="0" name="sSex"><span>女</span>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="birth" class="control-label">出生日期：</label>
						<div class="controls">
							<input type="text" id="birth" name="birth"  value="<?php echo $row['出生日期'] ?>" class="input-large input-fat" data-toggle="datepicker" placeholder="请输入出生日期">
						</div>
					</div>
					<div class="control-group">
						<label for="phone" class="control-label">电话：</label>
						<div class="controls">
							<input type="text" id="phone" name="phone"  value="<?php echo $row['电话'] ?>" class="input-large input-fat" placeholder="请输入电话" data-rules="required|minlegth=2|maxlength=10">
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