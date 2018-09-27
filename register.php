<?php include("head_01.php"); ?>
		<form class="sui-form form-horizontal sui-validate" action="register-save.php" method="post">
			<div class="control-group">
			    <label for="email " class="control-label .input-fat">邮箱：</label>
			    <div class="controls">
			    	<input type="text" id="email" placeholder="请输入邮箱" class="input-fat input-large" name="emali" data-rules="required|minlength=2|maxlength=30"><span id="tips"></span>
			    	<span id="tipx"></span>
			    </div>
			</div>
			<div class="control-group">
			    <label for="userm " class="control-label .input-fat">用户名：</label>
			    <div class="controls">
			    	<input type="text" id="userm" placeholder="请输入用户名" class="input-fat input-large" name="userm" data-rules="required|minlength=2|maxlength=10">
			    </div>
			</div>
			<div class="control-group">
			    <label for="password" class="control-label">密码：</label>
			    <div class="controls">
			    	<input type="password" id="password" placeholder="请输入密码" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12">
			    </div>
			</div>
			<div class="control-group">
			    <label for="word" class="control-label">重复密码：</label>
			    <div class="controls">
			    	<input type="password" id="word" placeholder="请输入重复密码" class="input-fat input-large" name="word"data-rules="required|minlength=2|maxlength=12">
			    </div>
			</div>
			<div class="control-group">
			    <label for="yzm" class="control-label">验证码：</label>
			    <div class="controls">
			    	<input type="input" id="yzm" placeholder="请输入验证码" class="input-fat input-large" name="yzm" data-rules="required|minlength=4|maxlength=4">
			    </div>
			</div>
			<input type="text" id="code_btn" >
			<div class="control-group">
				<label for="question" class="control-label">密码提示问题：</label>
				<div class="controls">
					<select id="question" name="question">
						<option value="你的小学在哪上学">你的小学在哪上学</option>
						<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
						<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="answer " class="control-label .input-fat">密码答案：</label>
				<div class="controls">
					<input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
				</div>
			</div>
		</form>
<?php include("foot_02.php") ?>
<script>
	var code_btn = document.getElementById('code_btn');
	getCodeFn();
	code_btn.onclick = getCodeFn;
	function getCodeFn() {
		var strArry = ["0","1","2","3","4","5","6","7","8","9","a","b",'c','d','e','f','h','i','g','k','l','m','m','o','p','q','r','s','t','u','v','w','x','y','z',"A","B",'C','D','E','F','G','I','G','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		var code_str = "",num;
		for (var i = 0; i < 4; i++) {
			num = parseInt(Math.random()*strArry.length);
			code_str += strArry[num];
		}
		code_btn.value = code_str;
	}
	var cha = document.getElementById('cha');
	var yzm = document.getElementById('yzm');
	cha.onclick = function() {
		var neirong = yzm.value.toUpperCase();
		if(neirong == code_btn.value.toUpperCase()) {
			alert("验证通过");
		} else if(yzm.value.length == 0) {
			alert("请输入验证码");
		} else {
			alert("验证有误");
			$("form").attr("action","login.php");
			history.go(0);
		}
	}
	$("input:eq(0)").on("blur",function(){
		// 使用$.get()来进行异步请求
		// $get(url,[data][callback],[type])
		// url请求的(提交的地址)
		// data	发送到服务器的数据,以键值对的形式附加到url的后面,例如:logon.php?usname=dengbin&pass=123456
		// type	服务器返回的内容的格式.包括xml|script|json|text|_default
	$.get("yj-save.php",
			{"email":$(this).val()},
			function( data ){
				console.log( data );
				if (data == "ok") {
					$("#tips").html("√&nbsp;可以注册");
				}else{
					$("#tipx").html("X&nbsp;邮件重复");
				}
			},
			"text"
		);
	});
	var email = document.getElementById('email');
	var userm = document.getElementById('userm');
	var password = document.getElementById('password');
	// var word = document.getElementById('word');
	var question = document.getElementById('question');
	var answer = document.getElementById('answer');
	$("button:eq(0)").on("click",function(){
		if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest()
		}else{
			var xhr = new ActiveObject("Msxml2.XMLHTTP")
		}
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4) {
				console.log("请求完成");
				console.log(xhr.responseText);
			};
		}
		xhr.open("post","index-save.php",true);
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xhr.send("email="+encodeURIComponent(email.value)+"&userm="+encodeURIComponent(userm.value)+"&password="+encodeURIComponent(password.value)+"&question="+encodeURIComponent(question.value)+"&answer="+encodeURIComponent(answer.value));
	});
</script>