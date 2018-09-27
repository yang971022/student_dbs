<?php include("head.php");
include "conn.php";
$sql = "SELECT DISTINCT 班号 FROM banji";
$result1 = mysqli_query($conn, $sql);
?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">学生录入信息</p>
				<form id="form1" action="student-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
					<div class="control-group">
						<label for="xuehao" class="control-label">学号：</label>
						<div class="controls">
							<input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="banhao" class="control-label">班号：</label>
						<div class="controls">
							<select id="banhao" name="banhao">
								<?php
									if( mysqli_num_rows($result1) > 0 ){
										while ( $row2 = mysqli_fetch_assoc($result1) ) {
											echo "<option value='{$row2['班号']}'>{$row2['班号']}</option>";
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
							<input type="text" id="compellation" name="compellation" class="input-large input-fat" placeholder="请输入姓名" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="file" class="control-label">照片：</label>
						<div class="controls">
							<input type="file" name="file" id="file">
						</div>
					</div>
					<div class="control-group">
						<label for="gender" class="control-label">性别：</label>
						<div class="controls">
							<label class="radio-pretty inline checked">
								<input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
							</label>
							<label class="radio-pretty inline">
								<input type="radio" value="0" checked="checked" name="sSex"><span>女</span>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="birth" class="control-label">出生日期：</label>
						<div class="controls">
							<input type="text" id="birth" name="birth" class="input-large input-fat" data-toggle="datepicker" placeholder="请输入出生日期">
						</div>
					</div>
					<div class="control-group">
						<label for="phone" class="control-label">电话：</label>
						<div class="controls">
							<input type="text" id="phone" name="phone" class="input-large input-fat" placeholder="请输入电话" data-rules="required|minlength=2|maxlength=11">
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
<script>
	var str = document.cookie;
	console.log(str.split(";"));
	console.log(str.split(";")[0]);
	console.log(str.split(";")[0].split("="));
	console.log(str.split(";")[0].split("=")[1]);
	// 用正则表达式
	function getCookie(name) {
		var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
		if(arr=document.cookie.match(reg)) {
			return unescape(arr[2]);
		} else {
			return null;
		}
	}
	console.log(getCookie(""));
</script>