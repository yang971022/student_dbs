<?php include("head.php") ?>

		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">班级修改信息</p>
				<table class="sui-table table-primary">
					<tr>
						<th>班号</th>
						<th>班长</th>
						<th>教室</th>
						<th>班主任</th>
						<th>班级口号</th>
						<th>操作</th>
					</tr>
					<tbody>
						
					</tbody>
					<?php
						// 输出数据
						// if (mysqli_num_rows($result) > 0) {
						// 	while ($row = mysqli_fetch_assoc($result)) {
						// 		echo "<tr>
						// 			<td>{$row['班号']}</td>
						// 			<td>{$row['班长']}</td>
						// 			<td>{$row['教室']}</td>
						// 			<td>{$row['班主任']}</td>
						// 			<td>{$row['班级口号']}</td>
						// 			<td>
						// 				<a href='banji-update.php?kid={$row['班号']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
						// 				<a href='banji-del.php?kid={$row['班号']}' class='sui-btn btn-small btn-danger'>删除</a>
						// 			</td>
						// 		</tr>";
						// 	}
						// } else {
						// 	echo "没有记录";
						// }
					?>
				</table>
			</div>
		</div>
<?php include("foot.php"); ?>
<script>
$(function(){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"banji"
		},
		beforeSend:function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询中，请稍后……</td></tr>");
		},
		success:function(data,textStatus){
			console.log( data,data );
			if (data.code == 200) {
				var str = "";
				if(data.code == 200){
					for(var i=0;i<data.data.length;i++){
						console.log(data.data[i]);
						str += "<tr><td>"+data.data[i].id+"</td><td>"+ data.data[i].学号 +"</td><td>"+ data.data[i].班号 +"</td><td>"+ data.data[i].姓名 +"</td><td>"+ data.data[i].性别 +"</td><td>"+ data.data[i].出生日期 +"</td><td>"+ data.data[i].电话 +"</td><td></td></tr>"
					}
					$("#studentlist").html(str);
				}
		}
	},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			console.log('失败原因：' + errorThrown);
		}
	});
})