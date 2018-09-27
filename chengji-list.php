<?php include("head.php") ?>
<?php
	include("conn.php");
	// 执行SQL语句
	$sql = "select 学号,课程编号,成绩 from xuanxiou";
	$result = mysqli_query($conn,$sql);
	// 关闭数据库
	mysqli_close($conn);
?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">成绩修改信息</p>
				<table class="sui-table table-primary">
					<tr>
						<th>学号</th>
						<th>课程编号</th>
						<th>成绩</th>
						<th>操作</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$sql1="select 课程编号,课程名,时间 from kecheng where 课程编号= {$row['课程编号']} ";
								include("conn.php");
								$res = mysqli_query($conn,$sql1);
								if (mysqli_num_rows($res) > 0) {
									$rww = mysqli_fetch_assoc($res);
								}
								echo "<tr>
									<td>{$row['学号']}</td>
									<td>{$rww['课程编号']}</td>
									<td>{$row['成绩']}</td>
									<td>
										<a href='chengji-update.php?kid={$row['学号']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
										<a href='chengji-del.php?kid={$row['学号']}' class='sui-btn btn-small btn-danger'>删除</a>
									</td>
								</tr>";
							}
						} else {
							echo "没有记录";
						}
					?>
				</table>
			</div>
		</div>
<?php include("foot.php"); ?>