<?php include("head.php");
include "conn.php";
$sql = "SELECT DISTINCT 课程名 FROM kecheng";
$result1 = mysqli_query($conn, $sql);
?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">成绩录入</p>
				<form id="form1" action="chengji-save.php" method="post" class="sui-form form-horizontal sui-validate">
					<div class="control-group">
						<label for="inputEmail" class="control-label">学号：</label>
						<div class="controls">
							<input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">课程名：</label>
						<div class="controls">
							<select id="bianhao" name="bianhao">
								<?php
									if( mysqli_num_rows($result1) > 0 ){
										while ( $row2 = mysqli_fetch_assoc($result1) ) {
											echo "<option value='{$row2['课程名']}'>{$row2['课程名']}</option>";
										}
									}else{
										echo "<option value=''>请先添加课程名信息</option>";
									}
								?>
			    			</select>
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">成绩：</label>
						<div class="controls">
							<input type="text" id="chengji" name="chengji" class="input-large input-fat" placeholder="请输入成绩" data-rules="required|minlength=2|maxlength=10">
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