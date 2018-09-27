<?php include("head.php") ?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">班级录入信息</p>
				<form id="form2" method="post" action="banji-save.php" class="sui-form form-horizontal sui-validate">
					<div class="control-group">
						<label for="banhao" class="control-label">班号：</label>
						<div class="controls">
							<input type="text" id="banhao" name="banhao" class="input-large input-fat" placeholder="请输入班号" data-rules="required|minlength=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="banzhang" class="control-label">班长：</label>
						<div class="controls">
							<input type="text" id="banzhang" name="banzhang" class="input-large input-fat" data-rules="required|minlength=2|maxlength=10" placeholder="请输入班长姓名">
						</div>
					</div>
					<div class="control-group">
						<label for="jiaoshi" class="control-label">教室：</label>
						<div class="controls">
							<input type="text" id="jiaoshi" name="jiaoshi" class="input-large input-fat" data-rules="required|minlength=2|maxlength=10" placeholder="请输入教室">
						</div>
					</div>
					<div class="control-group">
						<label for="banzhuren" class="control-label">班主任：</label>
						<div class="controls">
							<input type="text" id="banzhuren" name="banzhuren" class="input-large input-fat" data-rules="required|minlength=2|maxlength=10" placeholder="请输入班主任姓名">
						</div>
					</div>
					<div class="control-group">
						<label for="banjikouhao" class="control-label">班级口号：</label>
						<div class="controls">
							<input type="text" id="banjikouhao" name="banjikouhao" class="input-large input-fat" data-rules="required|minlength=2|maxlength=10" placeholder="请输入班级口号">
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