<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="/static/Home/css/register.css">
	</head>
	<body>
		<form  method="post" action="/register">
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="/" target="_self">小米商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					@if(count($errors)>0)
			        <div class="mws-form-message error" id="error" style="display: block;">
			          <div class="alert alert-danger">
			            <ul>
			              @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			              @endforeach
			            </ul>
			          </div>
			        </div>
			      	@endif
					
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;
						<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/>
						<span>请输入6位以上字符</span>
					</div>
					
					<div class="username">确认密码:&nbsp;&nbsp;
						<input class="shurukuang" type="password" name="repassword" placeholder="请确认你的密码"/>
						<span>两次密码要输入一致哦</span>
					</div>
					<!--<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;
						<input class="shurukuang" type="text" name="phone" placeholder="请填写正确的手机号"/>
						<span>填写下手机号吧，方便我们联系您！</span>
					</div>-->
					<div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;
						<input class="shurukuang" type="email" name="email" placeholder="请填写正确的电子邮箱"/>
						<span>填写下电子邮箱，电子发票将发送您的邮箱！</span>
					</div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="submit" value="立即注册" >
				</div>
				{{csrf_field()}}
			</div>
		</div>
		</form>
	</body>
	<script>
		var error = document.getElementById('error');
		error.onclick = function(){
			error.style.display="none";
		}
	</script>
</html>