<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>小米帐号 -重置密码</title>
  	<link type="text/css" rel="stylesheet" href="/static/Home/css/reset.css">
    <link type="text/css" rel="stylesheet" href="/static/Home/css/layout.css">
  	<link type="text/css" rel="stylesheet" href="/static/Home/css/registerpwd.css">
  	<script src="/static/Home/js/jquery-1.7.2.min.js"></script>
    <style type="text/css">
      .cur{
        border:1px solid red;
      }

      .curs{
        border:1px solid green;
      }
  </style>
  </head>
<!-- 添加版本uLocale -->
  <body class="zh_CN">
  <div class="wrapper">
  <div class="wrap">
    <div class="layout">  
    <div class="n-frame device-frame reg_frame">
      <div class="external_logo_area"><a class="milogo" href=""></a></div>
      <div class="title-item t_c">
        <h4 class="title_big30">重置密码</h4>
      </div>
      <!-- 记得在此添加标记语言uLocale -->
        <form action="/dorepwd" id="tijiao" method="post">
          <div class="regbox">
            <h5 class="n_tit_msg">请输入注册的邮箱地址、手机号码或帐号：</h5>      
            <div class="inputbg">
              <!-- 错误添加class为err_label -->
              <label class="labelbox labelbox-user" for="user">
                <input type="mail" class="jiaodian" name="mail" id="user" reminder="请输入正确邮箱" placeholder="请输入正确的邮箱">
                <span></span>
              </label>
            </div>	
        		<div class="inputbg inputcode dis_box">
        			<label class="labelbox labelbox-captcha" for="">
        				<input id="code-captcha" class="code" type="text" name="code" autocomplete="off" placeholder="图片验证码">
        			</label>
        			<img src="/code" onclick="this.src=this.src+'?a=1'" title="看不清换一张" class="chkcode_img icode_image code-image">
        		</div>
            <span></span>
        		<p style="color:red;">{{session('error')}}</p>
            <div class="fixed_bot">
              <input class="btn332 btn_reg_1" type="submit" value="下一步">   
            </div>
          </div>
          {{csrf_field()}}
        </form>
    </div>
    </div>
  </div>
  </div>
  <div class="n-footer">
    <div class="nf-link-area clearfix">
    <ul class="lang-select-list">
      <li><a class="lang-select-li current" >xxx</a>|</li>
      <li><a class="lang-select-li" >xxx</a>|</li>
      <li><a class="lang-select-li" >xxx</a></li>|
      <li><a class="a_critical" target="_blank"><em></em>常见问题</a></li>
    </ul>
    </div>
    <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank" href=""><span><img src="/static/Home/image/ghs.png"></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
  </div>
  </body>
  <script>
    //获取焦点
    PHONES=false;
    CODE=false;
    $('.jiaodian').focus(function(){
      reminder=$(this).attr('reminder');
      $(this).next('span').css('color','red').html(reminder);
      $(this).addClass('cur');
    });
    //手机号检验
    $("input[name='mail']").blur(function(){
      mail=$(this).val();
      ob=$(this);
      m=ob.val();
      //Ajax判断邮箱是否被注册
      $.get("/checkmail",{m:m},function(data){
        if(data==1){
          ob.next('span').css('color','green').html('OK');
          ob.addClass('curs');
          MAIL=true;
        }else if(data==2){
          ob.next('span').css('color','red').html('此邮箱未注册!!!');
          ob.addClass('cur');
          //获取验证码的按钮激活
          $('#huoqu').attr('disabled',false);
          MAIL=false;
        }else{
          ob.next('span').css('color','red').html('请输入邮箱!!!');
          ob.addClass('cur');
          //获取验证码的按钮激活
          $('#huoqu').attr('disabled',false);
          MAIL=false;
        }
      });
    });

    //校验输入框
    $("input[name='code']").blur(function(){
      cc=$(this);
      bb=$(this).parent();
      ee=bb.parent();
      //获取输入的校验码
      code=$(this).val();
      //Ajax 请求
      $.get("/repwdcheckcode",{code:code},function(data){
        if(data==1){
          ee.siblings("span").css("color","green").html("校验码正确");
          cc.addClass("curs");
          CODE=true;
        }else if(data==2){
          ee.siblings("span").css("color","red").html("校验码有误");
          cc.addClass("cur");
          CODE=false;
        }else{
          ee.siblings("span").css("color","red").html("请输入校验码!!!");
          cc.addClass("cur");
          CODE=false;
        }
      });
    });

    //阻止表单提交
    $("#tijiao").submit(function(){
      $("input").trigger('blur');
      if(MAIL && CODE){
        return true;
      }else{
        return false;
      }
    });
  </script>
</html>