<?php include("head.php") ?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
				<ul id="bt">
					
				</ul>

			</div>
		</div>
<?php include("foot.php"); ?>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(function(){
    $.ajax({
      url:"api.php",
      type:"POST",
      dataType:"json",
      data:{
        "action":"news"
      },
      beforeSend:function(XMMLHttpRequest){
        $("#newslist").html("<tr><td>正在查询,请稍后...</td></tr>")
      },
      success:function(data,textStatus){
        console.log(data.data);
        if (data.code == 200) {
          var str1 = "";
            for(var i = 0;i < data.data.length;i++){
                console.log(data.data[i].内容);
                console.log(data.data[i].图片);
                str1 += "<a href=''><img src='"+data.data[i].图片+"'></a><br><span>'" + data.data[i].发布时间 + "' | 北网新闻</span><h4><a href='"+data.data[i].标题 +"'></a></h4><p>"+data.data[i].内容+"</p>";
            }
            console.log(str1);
            $("#bt").html(str1);
        }
      },
      error:function(XMLHttpRequest,textStatus,errorThrown){
        //请求失败后调用此函数
        console.log("失败原因: "+ errorThrown);
      }
    });
  })
	// 第一种方法
	// document.cookie = "uname = xiaowu;expires=Thu,22 Aug 2018 00:00:00 GMT";
	// 第二种方法
	// var days = 30;
	// var daysTime = 30*24*60*60*1000; //转换成毫秒
	// var exp = new Date();
	// exp.setTime(exp.getTime() + daysTime); //设置为30天后

	// document.cookie = "uname=xiaowu;expires=" + exp.toGMTString();

	// var password = "123456";
	// document.cookie = "password = " + password;

	var days = 30;
    var daysTime = 30*24*60*60*1000;//转换成毫秒
    var exp = new Date();
    exp.setTime(exp.getTime() + daysTime);//设置为30天后
    document.cookie = "name = lixiangyun;expires=" + exp.toGMTString();
    document.cookie = "password = 123456";
</script>