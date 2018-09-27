<?php include("head.php") ?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">学生信息查询</p>
				<form id="form1" action="query-save.php" method="post" class="sui-form form-horizontal sui-validate">
					<div class="control-group">
						<label for="inputEmail" class="control-label">姓名：</label>
						<div class="controls">
							<input type="text" id="xingming" name="xingming" class="input-large input-fat" placeholder="请输入姓名" data-rules="required|minlegth=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">学号：</label>
						<div class="controls">
							<input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlegth=2|maxlength=10">
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label"></label>
						<div class="controls">
							<input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include("foot.php"); ?>