<?php include("head.php");
include "conn.php";
$sql = "SELECT DISTINCT 课程名 FROM kecheng";
$result1 = mysqli_query($conn, $sql);
?>
<?php
	$kid = empty($_GET["kid"])?"null":$_GET["kid"];
	if ($kid == "null") {
		die ("请选择要修改的记录");
	} else {
		include("conn.php");
		// 执行SQL语句
		$sql1 = "select 学号,课程编号,成绩 from xuanxiou where 学号='{$kid}'";
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
				<p class="sui-text-xxlarge">成绩修改</p>
				<form id="form1" action="chengji-save.php" method="post" class="sui-form form-horizontal sui-validate">
					<div class="control-group">
						<label for="inputEmail" class="control-label">学号：</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程编号 -->
							<input type="hidden" name="kid" value="<?php echo $row['学号'] ?>">
							<input type="text" value="<?php echo $row['学号'] ?>" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlength=1|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">课程编号：</label>
						<div class="controls">
							<input type="text" value="<?php echo $row['课程编号'] ?>" id="bianhao" name="bianhao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlength=1|maxlength=10">
							<!-- <select id="bianhao" name="bianhao">
								<?php
									if( mysqli_num_rows($result) > 0 ){
										while ( $row2 = mysqli_fetch_assoc($result1) ) {
											echo "<option value='{$row2['课程名']}'>{$row2['课程名']}</option>";
										}
									}else{
										echo "<option value=''>请先添加班级信息</option>";
									}
								?>
			    			</select> -->
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">成绩：</label>
						<div class="controls">
							<input type="text" value="<?php echo $row['成绩'] ?>" id="chengji" name="chengji" class="input-large input-fat" placeholder="请输入成绩" data-rules="required|minlength=1|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label"></label>
						<div class="controls">
							<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include("foot.php"); ?>