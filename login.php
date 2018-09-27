<?php include("head_01.php"); ?>
		<form class="sui-form form-horizontal sui-validate" method="post" id="from1">
			<div class="control-group">
			    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
			    <div class="controls">
			    	<input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
			    </div>
			</div>
			<div class="control-group">
			    <label for="password" class="control-label">密码：</label>
			    <div class="controls">
			    	<input type="password" id="password" placeholder="请输入密码" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=4|maxlength=15">
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
			    <label class="control-label"></label>
			    <div class="controls">
			    	<button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label"></label>
			    <div class="controls">
			    	<a href="wangji.php">忘记密码</a>
			    </div>
			</div>
		</form>
<p class="pp">登陆成功</p>
<?php include("foot_02.php") ?>
<script>
$('button[type=submit]').on('click', function() {
		// 使用$.ajax()提交数据
		// console.log(this);
		$.ajax({
			url: 'login-save-ajax.php',
			type: 'POST',
			data: $('#from1').serialize(),
			dataType: 'json',
			success: function (data, textStatus) {
				// 请求成功后调用此函数
				console.log(data);
				if (data.code == 200) {
					console.log("ok");
					$('.pp').slideDown(2000, function() {
						window.location.href = 'index.php';
					});
				}
				if (data.code == 20001) {
					// 提示密码错误
				}
				if (data.code == 20004) {
					// 提示邮箱填写错误
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				// 请求失败后调用此函数
				console.log('失败原因：' + errorThrown);
			}
		});
		return false;
	});

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
		if(neirong==code_btn.value.toUpperCase()) {
			alert("验证通过");
		} else if(yzm.value.length == 0) {
			alert("请输入验证码");
		} else {
			alert("验证有误");
			$("form").attr("action","login.php");
			history.go(0);
		}
	}
</script>