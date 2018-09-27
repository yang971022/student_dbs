<?php include("head.php") ?>
<?php
	include("conn.php");
	// 执行SQL语句
	$sql = "select id,email,name,question from user";
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
				<p class="sui-text-xxlarge">会员管理</p>
				<table class="sui-table table-primary">
					<tr>
						<th>id</th>
						<th>邮件</th>
						<th>名字</th>
						<th>密码提示问题</th>
						<th>操作</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>{$row['id']}</td>
									<td>{$row['email']}</td>
									<td>{$row['name']}</td>
									<td>{$row['question']}</td>
									<td>
										<a href='user-update.php?kid={$row['id']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
										<a href='user-del.php?kid={$row['id']}' class='sui-btn btn-small btn-danger'>删除</a>
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