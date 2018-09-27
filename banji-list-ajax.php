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
					<tbody id="banjilist"></tbody>
					<?php
						// // 输出数据
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
						// // 	}
						// } else {
						// 	echo "没有记录";
						// }
					?>
				</table>
				<div class="test sui-pagination pagination-large">
  <ul>
    <li class="prev disabled"><a href="#">«上一页</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class="dotted"><span>...</span></li>
    <li class="next"><a href="#">下一页»</a></li>
  </ul>
  <div><span>共10页&nbsp;</span><span>
      到
      <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
      页</span></div>
</div>
		  </div>
		</div>
	</div>
			</div>
		</div>
<?php include("foot.php"); ?>
<script type="text/html" id="template1">
	{{each arr val idx}}
		<tr>
			<td>{{val.班号}}</td>
			<td>{{val.班长}}</td>
			<td>{{val.教室}}</td>
			<td>{{val.班主任}}</td>
			<td>{{val.班级口号}}</td>
			<td>
				<a href='banji-update.php?kid={{val['班号']}}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
				<a href='banji-del.php?kid={{val['班号']}}' class='sui-btn btn-small btn-danger'>删除
			</td>

		</tr>
	{{/each}}
</script>
<script>
function getPage(pageNum){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student",
			"pageNum":pageNum,
			"pageSize":2,
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				renderList(data.data);
			}
		}
	})
}
$(function(){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"banji"
		},
		beforeSend:function(XMLHttpRequest){
			$("#banjilist").html("<tr><td>正在查询中，请稍后……</td></tr>");
		},
		success:function(data,textStatus){
			var arr = data.data;
			var html = template('template1',{"arr":arr});
			$("#banjilist").html(html);
		// 	console.log( data,data );
		// 	if (data.code == 200) {
		// 		var str = "";
		// 		if(data.code == 200){
		// 			for(var i=0;i<data.data.length;i++){
		// 				console.log(data.data[i]);
		// 				str += "<tr><td>"+data.data[i].班号+"</td><td>"+ data.data[i].班长 +"</td><td>"+ data.data[i].教室 +"</td><td>"+ data.data[i].班主任 +"</td><td>"+ data.data[i].班级口号 +"</td><td></td></tr>"
		// 			}
		// 			$("#banjilist").html(str);
		// 		}
		// }
	},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			console.log('失败原因：' + errorThrown);
		}
	});
});

</script>
