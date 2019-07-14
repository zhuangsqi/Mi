<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>小米帐号 -重置密码</title>
  	<link type="text/css" rel="stylesheet" href="/static/Home/css/reset.css">
    <link type="text/css" rel="stylesheet" href="/static/Home/css/layout.css">
  	<link type="text/css" rel="stylesheet" href="/static/Home/css/registerpwd.css">
  	<script src="/static/Home/js/jquery-1.7.2.min.js"></script>
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
      <div class="regbox">
        <h5 class="n_tit_msg">请输入注册的邮箱地址、手机号码或帐号：</h5>      
        <div class="inputbg">
          <!-- 错误添加class为err_label -->
          <label class="labelbox labelbox-user" for="user">
            <input type="text" name="id" id="user" placeholder="邮箱/手机号码/小米帐号">
          </label>
        </div>	
        <div class="err_tip error-con">
          <div class="dis_box">
            <em class="icon_error"></em>
            <span></span>
          </div>
        </div> 
		<div class="inputbg inputcode dis_box">
			<label class="labelbox labelbox-captcha" for="">
				<input id="code-captcha" class="code" type="text" name="code" autocomplete="off" placeholder="图片验证码">
			</label>
			<img src="/code" onclick="this.src=this.src+'?a=1'" title="看不清换一张" class="chkcode_img icode_image code-image">
		</div>
		<div class="err_tip error-con">
			<div class="dis_box"><em class="icon_error"></em><span></span></div>
		</div> 
        <div class="fixed_bot">
          <input class="btn332 btn_reg_1" type="button" id="submit_button" value="下一步">   
        </div>
      </div>
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
</html>