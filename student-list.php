<?php include("head.php") ?>
<?php
	include("conn.php");
	// 执行SQL语句
	$sql = "select id,学号,班号,姓名,性别,出生日期,电话 from student";
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
				<p class="sui-text-xxlarge">学生修改信息</p>
				<table class="sui-table table-primary">
					<tr>
						<th>序号</th>
						<th>学号</th>
						<th>班号</th>
						<th>姓名</th>
						<th>性别</th>
						<th>出生日期</th>
						<th>电话</th>
						<th>操作</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$row1 = $row['性别'] == 1?"男":"女";
								echo "<tr>
									<td>{$row['id']}</td>
									<td>{$row['学号']}</td>
									<td>{$row['班号']}</td>
									<td>{$row['姓名']}</td>
									<td>{$row1}</td>
									<td>{$row['出生日期']}</td>
									<td>{$row['电话']}</td>
									<td>
										<a href='student-update.php?kid={$row['id']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
										<a href='student-del.php?kid={$row['id']}' class='sui-btn btn-small btn-danger'>删除</a>
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