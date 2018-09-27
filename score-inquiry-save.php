<?php include("head.php") ?>
<?php
	$xuehao = $_POST["xuehao"];
	$xingming = $_POST["xingming"];
	$kecheng = $_POST["kecheng"];
	include("conn.php");
	// 执行SQL语句
	$sql = "SELECT * FROM xuanxiou INNER JOIN kecheng ON kecheng.课程编号=xuanxiou.课程编号 INNER JOIN student ON xuanxiou.学号=student.学号 WHERE student.学号='{$xuehao}' or student.姓名='{$xingming}';";
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
				<p class="sui-text-xxlarge">成绩查询信息</p>
				<table class="sui-table table-primary">
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>课程名</th>
						<th>成绩</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>{$row['学号']}</td>
									<td>{$row['姓名']}</td>
									<td>{$row['课程名']}</td>
									<td>{$row['成绩']}</td>
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