<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="/static/Home/css/register.css">
		<script src="/static/Home/js/jquery.min.js"></script>
		<script src="/static/Home/js/amazeui.min.js"></script>
		<style type="text/css">
	    .cur{
	      border:1px solid red;
	    }

	    .curs{
	      border:1px solid green;
	    }
 	 	</style>
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
					<div class="regist_fs fl"><a id="phone">手机注册</a></div>
					<div class="regist_shu fl" style="font-size: 35px;margin-top:20px;">|</div>
					<div class="regist_fs fl"><a id="mail">邮箱注册</a></div>
					<div class="clear"></div>
				</div>

				<div id="remail"  style="display:none;">
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
					</div>
					<div class="regist_submit">
						<input class="submit" type="submit" value="立即注册" >
					</div>
					{{csrf_field()}}
					</form>
				</div>

				<div id="rephone"  style="display:block;">
					<form  method="post"  id="tijiao" action="/registerphone">
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
							<input class="shurukuang" type="tel" name="phone" class="jiaodian" placeholder="请填写正确的手机号" reminder="请输入正确的手机号"/>
							<span>发送验证码激活账号！</span>
						</div>
						<div class="username">
							<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;
								<input class="yanzhengma jiaodian" type="text" name="code" placeholder="请输入验证码"/>
							</div>
							<div class="right fl"><a id="huoqu" href="javascript:void(0)">获取验证码</a></div>
							<span>60秒内输入！</span>
							<div class="clear"></div>
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
            $('#remail').hide();
            $('#rephone').show();
	    })
	    $('#mail').click(function(){
	            $('#rephone').hide();
	            $('#remail').show();
	    })
	    //获取焦点
	    PHONES=false;
	    CODE=false;
	    $('.jiaodian').focus(function(){
	    	reminder=$(this).attr('reminder');
	    	$(this).next('span').css('color','red').html(reminder);
	    	$(this).addClass('cur');
	    });

	    //手机号检验
	    $("input[name='phone']").blur(function(){
	    	phone=$(this).val();
	    	ob=$(this);
	    	p=ob.val();

	    	//检测手机号是否符合规则
	    	if(phone.match(/^\d{11}$/)==null){
	    		$(this).next('span').css('color','red').html('手机号不合法');
	    		$(this).addClass("cur");
	    		PHONES=false;
	    	}else{
	    		//Ajax判断手机是否被注册
	    		$.get("/checkphone",{p:p},function(data){
	    			
	    			if(data==1){
	    				ob.next('span').css('color','red').html('手机号已被注册');
	    				ob.addClass("cur");
	    				//把获取验证码的按钮禁用
	    				$('#huoqu').attr('disabled',true);
	    				PHONES=false;
	    			}else{
	    				ob.next('span').css('color','green').html('手机号可用');
	    				ob.addClass('curs');
	    				//获取验证码的按钮激活
	    				$('#huoqu').attr('disabled',false);
	    				PHONES=true;
	    			}
	    		});
	    	}
	    });

	    //获取手机验证码
	    $("#huoqu").click(function(){
	    	oo=$(this);
	    	pp=$("input[name='phone']").val();
	    	$.get('/sendphone',{pp:pp},function(data){
	    		//判断状态码
	    		// alert(data.result);
	    		if(data.result==0){
	    			m=60;
	    			mytime=setInterval(function(){
	    				m--;
	    				oo.html(m);
	    				oo.attr('disabled',true);
	    				if(m<0){
	    					clearInterval(mytime);
	    					oo.html('获取验证码');
	    					oo.attr('disabled',false);
	    				}
	    			},1000);
	    		}
	    	},'json');
	    });

	    //校验输入框
		$("input[name='code']").blur(function(){
		  cc=$(this);
		  bb=$(this).parent();
		  //获取输入的校验码
		  code=$(this).val();
		  //Ajax 请求
		  $.get("/checkcode",{code:code},function(data){
		    if(data==1){
		      bb.siblings("span").css("color","green").html("校验码正确");
		      cc.addClass("curs");
		      CODE=true;
		    }else if(data==2){
		      bb.siblings("span").css("color","red").html("校验码有误");
		      cc.addClass("cur");
		      CODE=false;
		    }else if(data==3){
		      bb.siblings("span").css("color","red").html("校验码为空");
		      cc.addClass("cur");
		      CODE=false;

		    }else{
		      bb.siblings("span").css("color","red").html("校验码过期");
		      cc.addClass("cur");
		      CODE=false;
		    }
		  });
		});

		$("#tijiao").submit(function(){
			$("input").trigger('blur');
			if(PHONES && CODE){
				return true;
			}else{
				return false;
			}
		});
	</script>
</html>