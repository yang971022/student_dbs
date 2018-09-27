<?php include("head.php") ?>
<?php
	$xingming = $_POST["xingming"];
	$xuehao = $_POST["xuehao"];
	include("conn.php");
	// 执行SQL语句
	$sql = "select * from student where 姓名='$xingming' or 学号='$xuehao'";
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
				<p class="sui-text-xxlarge">学生信息查询</p>
				<table class="sui-table table-primary">
					<tr>
						<th>id</th>
						<th>学号</th>
						<th>姓名</th>
						<th>出生日期</th>
						<th>性别</th>
						<th>电话</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>{$row['id']}</td>
									<td>{$row['学号']}</td>
									<td>{$row['姓名']}</td>
									<td>{$row['出生日期']}</td>
									<td>{$row['性别']}</td>
									<td>{$row['电话']}</td>
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