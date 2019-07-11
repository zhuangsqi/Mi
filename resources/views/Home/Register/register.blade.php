<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="/static/Home/css/register.css">
		<script src="/static/Home/js/jquery-1.7.2.min.js"></script>
	</head>
	<body>
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">账号注册</div>
					<div class="right fr"><a href="/" target="_self">小米商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_zc">
					<div class="regist_fs fl"><a id="mail">邮箱注册</a></div>
					<div class="regist_shu fl" style="font-size: 35px;margin-top:20px;">|</div>
					<div class="regist_fs fl"><a id="phone">手机注册</a></div>
				</div>

				<div id="mails"  style="display:block;">
					<form  method="post" action="/register">
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
						<div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;
							<input class="shurukuang" type="email" name="email" placeholder="请填写正确的电子邮箱"/>
							<span>发送邮件激活账号！</span>
						</div>
						<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;
							<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/>
							<span>请输入6位以上字符</span>
						</div>
						
						<div class="username">确认密码:&nbsp;&nbsp;
							<input class="shurukuang" type="password" name="repassword" placeholder="请确认你的密码"/>
							<span>两次密码要输入一致哦</span>
						</div>
						{{session('error')}}
						<div class="username">校&nbsp;&nbsp;验&nbsp;&nbsp;码:&nbsp;&nbsp;
							<input class="shurukuang" type="text" name="code" placeholder="请输入检验码"/>
							<img src="/code" onclick="this.src=this.src+'?a=1'" style="float:right;margin-right: 70px;">
						</div>
						<!--<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;
							<input class="shurukuang" type="text" name="phone" placeholder="请填写正确的手机号"/>
							<span>填写下手机号吧，方便我们联系您！</span>
						</div>-->
						
					</div>
					<div class="regist_submit">
						<input class="submit" type="submit" value="立即注册" >
					</div>
					{{csrf_field()}}
					</form>
				</div>

				<div id="phones"  style="display:none;">
					<form  method="post" action="/registerphone">
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
						<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;
							<input class="shurukuang" type="text" name="phone" placeholder="请填写正确的手机号"/>
							<span>发送验证码激活账号！</span>
						</div>
						<div class="username">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;
							<input class="shurukuang" type="text" name="phone" placeholder="请填写正确的手机号"/>
							<span>60秒内输入！</span>
						</div>
						<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;
							<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/>
							<span>请输入6位以上字符</span>
						</div>
						
						<div class="username">确认密码:&nbsp;&nbsp;
							<input class="shurukuang" type="password" name="repassword" placeholder="请确认你的密码"/>
							<span>两次密码要输入一致哦</span>
						</div>
						{{session('error')}}
						
					</div>
					<div class="regist_submit">
						<input class="submit" type="submit" value="立即注册" >
					</div>
					{{csrf_field()}}
					</form>
				</div>

			</div>
		</div>
	</body>
	<script>
		
		$('#phone').click(function(){
            $('#mails').hide();
            $('#phones').show();
	    })
	    $('#mail').click(function(){
	            $('#phones').hide();
	            $('#mails').show();
	    })
	</script>
</html>