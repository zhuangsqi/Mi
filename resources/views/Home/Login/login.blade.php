<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/static/Home/css/Login.css">
    <title>小米商城</title>
</head>
<body>
    <div class="h_panel">
        <a href=""><div class="h_logo"></a>
    </div>
    </div>
    <div class="login_banner_panel" id="J_panel" style="background-image: url(/static/Home/image/f838fdcd77715410b441f2f56d8f10cd.jpg);">
        <div class="layout">
            <div class="login fr">
                <div id="nav-tabs" class="nav_tabs mt20">
                    <a class="navtab-link now" data-tab="pwd">帐号登录</a>  
                </div>
                <div class="login_form ">
                    <form action="/login" method="POST" id="login-main-form"  align="center">    
                        <input class="item_account mt20" type="text" name="username" id="username" placeholder="账号">
                        <input class="item_account mt20" type="password" id="pwd" name="password" placeholder="密码">
                        <input class="btnadpt mt20" id="login-button" type="submit" value="登 录">
                        <div class="n_links_area mt20">
                            <a class="outer-link" href="/user">立即注册</a>
                            <span> |</span>
                            <a class="outer-link" href="">忘记密码？</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="custom_display_4" class="n-footer">
		    <div class="nf-link-area">
		      <ul class="lang-select-list">
		        <li class="fl"><a href="" data-lang="zh_CN" class="lang-select-li current">简体</a>|</li>
		        <li class="fl"><a href="" data-lang="zh_TW" class="lang-select-li">繁体</a>|</li>
		        <li class="fl"><a href="" data-lang="en" class="lang-select-li">English</a>|</li>
		        <li class="fl"><a href="" class="lang-select-li">常见问题</a>|</li>
		        <li class="fl"><a href="" class="lang-select-li" target="_blank">隐私政策</a></li>
		        <div class="clear"></div>
		      </ul>
		    </div>
		    <div class="nf-link-beian">
			    <p class="nf-intro">小米公司版权所有-京ICP备10046444-
				    <a class="beian-record-link" target="_blank" href="">
					    <span>
					    	<img src="/static/Home/image/ghs.png">
					    </span>京公网安备11010802020134号
					</a>-京ICP证110507号
			    </p>
		    </div>
	  	</div>
    </div>
   
</body>
</html>