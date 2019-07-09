<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>@yield("title")</title>
		<link rel="stylesheet" type="text/css" href="/static/Home/css/style.css">
    <script src="/static/Home/js/base.min.js"></script>
		<script src="/static/Home/js/H-ui.js"></script>
		<link rel="stylesheet" href="/static/Home/css/base.min.css" /> 
  	<!--<link rel="stylesheet" href="/static/Home/css/index.min.css" />-->
	</head>
	<body>
	<!-- start header -->
  <div class="site-topbar"> 
   <div class="container"> 
    <div class="topbar-nav"> 
     <a rel="nofollow" href="">小米商城</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">MIUI</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="">IoT</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">云服务</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">金融</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">有品</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">小爱开放平台</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">企业团购</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">资质证照</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank">协议规则</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" target="_blank" id="J_downloadapp">下载app</a>
     <span class="sep">|</span>
     <a rel="nofollow" href="" data-toggle="modal">Select Region</a> 
    </div> 
    <div class="topbar-cart" id="J_miniCartTrigger"> 
     <a rel="nofollow" class="cart-mini" id="J_miniCartBtn" href="//static.mi.com/cart/"><i class="iconfont"></i>购物车<span class="cart-mini-num J_cartNum"></span></a> 
     <div class="cart-menu" id="J_miniCartMenu"> 
      <div class="loading">
       <div class="loader"></div>
      </div> 
     </div> 
    </div> 
    <div class="topbar-info" id="J_userInfo">
    @if(session()->has('name') == null)
     <a rel="nofollow" class="link" href="/login" data-agreement="true" data-login="true">登录</a>
     <span class="sep">|</span>
     <a rel="nofollow" class="link" href="/create" data-agreement="true" data-register="true">注册</a>
    @else
      <div class="user_name"><a id="user_name" class="">{{session('name')}}</a>
        <div id="user_name_none" class="user_name_none">
          <li><a href="/user">个人中心</a></li>
          <li><a href=" ">我的订单</a></li>
          <li><a href=" ">修改密码</a></li>
          <li><a href="/uplogin">退出登录</a></li>
        </div>
      </div>
    @endif
    </div> 
   </div> 
  </div> 
  <div class="site-header"> 
   <div class="container"> 
    <div class="header-logo"> 
     <a href="/" target="_blank"><div class="logo fl"></div></a>
    </div> 
    <div class="header-nav"> 
     <ul class="nav-list J_navMainList clearfix"> 
      <li id="" class="nav-category"> <a class="link-category" href="//list.mi.com"><span class="text">全部商品分类</span></a> 
      </li>


      <li class="nav-item"> <a class="link" href="javascript: void(0);"><span class="text">小米手机</span><span class="arrow"></span></a> 
       <div class="item-children"> 
        <div class="container"> 
         <ul class="children-list clearfix"> 
          <li class="first"> 
           <div class="figure figure-thumb"> 
            <a href="https://www.mi.com/micc9/"><img src="/static/Home/image/bigtap-mitu-faild.png" alt="小米CC9" width="160" height="110" /></a> 
           </div> 
           <div class="title">
            <a href="https://www.mi.com/micc9/">小米CC9</a>
           </div> <p class="price">1799元</p> 
           <div class="flags">
            <div class="flag">
             新品
            </div>
           </div> </li> 
          <li> 
           <div class="figure figure-thumb"> 
            <a href="https://www.mi.com/xiaomicc9mt/"><img src="/static/Home/image/bigtap-mitu-faild.png" alt="小米CC9美图定制版" width="160" height="110" /></a> 
           </div> 
           <div class="title">
            <a href="https://www.mi.com/xiaomicc9mt/">小米CC9美图定制版</a>
           </div> <p class="price">2599元</p> 
           <div class="flags">
            <div class="flag">
             新品
            </div>
           </div> </li> 
          <li> 
           <div class="figure figure-thumb"> 
            <a href="https://www.mi.com/micc9e/"><img src="/static/Home/image/bigtap-mitu-faild.png" alt="小米CC9e" width="160" height="110" /></a> 
           </div> 
           <div class="title">
            <a href="https://www.mi.com/micc9e/">小米CC9e</a>
           </div> <p class="price">1299元</p> 
           <div class="flags">
            <div class="flag">
             新品
            </div>
           </div> </li> 
          <li> 
           <div class="figure figure-thumb"> 
            <a href="https://www.mi.com/mi9/"><img src="/static/Home/image/bigtap-mitu-faild.png" alt="小米9" width="160" height="110" /></a> 
           </div> 
           <div class="title">
            <a href="https://www.mi.com/mi9/">小米9</a>
           </div> <p class="price">2999元</p> </li> 
          <li> 
           <div class="figure figure-thumb"> 
            <a href="https://www.mi.com/mi8youth/"><img src="/static/Home/image/bigtap-mitu-faild.png" alt="小米8 青春版" width="160" height="110" /></a> 
           </div> 
           <div class="title">
            <a href="https://www.mi.com/mi8youth/">小米8 青春版</a>
           </div> <p class="price">1099元</p> </li> 
          <li> 
           <div class="figure figure-thumb"> 
            <a href="https://www.mi.com/mix3/"><img src="/static/Home/image/bigtap-mitu-faild.png" alt="小米MIX 3" width="160" height="110" /></a> 
           </div> 
           <div class="title">
            <a href="https://www.mi.com/mix3/">小米MIX 3</a>
           </div> <p class="price">3299元</p> </li> 
         </ul> 
        </div> 
       </div> 
      </li> 
      
      <li class="nav-item"> <a class="link" href="//www.mi.com/service/" target="_blank"><span class="text">服务</span></a> </li> 
      <li class="nav-item"> <a class="link" href="http://www.xiaomi.cn/" target="_blank"><span class="text">社区</span></a> </li> 
     </ul> 
    </div> 
    <div class="header-search"> 
     <form id="J_searchForm" class="search-form clearfix" action="//search.mi.com/search" method="get"> 
      <label for="search" class="hide">站内搜索</label> 
      <input class="search-text" type="search" id="search" name="keyword" autocomplete="off" data-search-config="{'defaultWords':[{'Key':'小米9','Rst':22},{'Key':'Redmi&nbsp;K20&nbsp;Pro','Rst':4},{'Key':'Redmi&nbsp;K20','Rst':10},{'Key':'Redmi&nbsp;Note&nbsp;7','Rst':7},{'Key':'Redmi&nbsp;Note&nbsp;7&nbsp;Pro','Rst':1},{'Key':'小米电视4C','Rst':10},{'Key':'电视32英寸','Rst':5},{'Key':'笔记本pro','Rst':6},{'Key':'小爱音箱','Rst':5},{'Key':'净水器','Rst':16}]}" /> 
      <input type="submit" class="search-btn iconfont" value="" /> 
     
     </form> 
    </div> 
   </div> 
  </div>
	<!--end header -->
		@section('main')

		@show

		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
  <script>
    var user_name = document.getElementById('user_name');
    var user_name_none = document.getElementById('user_name_none');
    var timmer;
    user_name.onmouseover = user_name_none.onmouseover = function(){
      clearTimeout(timmer);
      user_name_none.style.display="block";
    }
    user_name.onmouseout = user_name_none.onmouseout = function(){
      timmer = setTimeout(function(){
        user_name_none.style.display="none";
      },300)
    }
  </script>
 
</html>