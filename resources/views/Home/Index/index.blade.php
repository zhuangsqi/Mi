@extends('Home.HomePublic.public')
@section('main')
	<!-- start banner_y -->
		<style>
		* {
			margin: 0;
			padding: 0;
		}

		.container {
			width: 1226px;
			margin: 50px auto;
		}


		.scroll {
			width: 1226px;
			height:300px;
			border: 0px solid #ccc;
			overflow: hidden;
		}

		.scroll ul {
			white-space: nowrap;
		}

		.scroll ul li {
			display: inline-block;
			margin: 10px;
		}

		.scroll ul img {
			width:170px;
			height: 200px;
			vertical-align: top;
		}
		.bs1:hover{
			background:url('/static/Home/image/74c4fcb4475af8308e9a670db9c01fdf.png') no-repeat center !important;
			cursor:pointer;
		}
		.bs2:hover{
			background:url('/static/Home/image/41f858550f42eb1770b97faf219ae215.png') no-repeat center !important;
			cursor:pointer;
		}
		.bs3:hover{
			background:url('/static/Home/image/95fbf0081a06eec7be4d35e277faeca0.png') no-repeat center !important;
			cursor:pointer;
		}
		.bs4:hover{
			background:url('/static/Home/image/5e9f2b1b0da09ac3b3961378284ef2d4.png') no-repeat center !important;
			cursor:pointer;
		}
		.bs5:hover{
			background:url('/static/Home/image/692a6c3b0a93a24f74a29c0f9d68ec71.png') no-repeat center !important;
			cursor:pointer;
		}
		.bs6:hover{
			background:url('/static/Home/image/totop_hover.png') no-repeat center !important;
			cursor:pointer;
		}
	</style>
	<div style="width:84px;height:430px;position:fixed;display:block;margin-left:1815px">
		
		<div class="bs1" style="width:84px;height:70px;background:url('/static/Home/image/98a23aae70f25798192693f21c4d4039.png') no-repeat center;"><a href=""></a></div>

		<div class="bs2" style="width:84px;height:70px;background:url('/static/Home/image/55cad219421bee03a801775e7309b920.png') no-repeat center;"><a href=""></a></div>

		<div class="bs3" style="width:84px;height:70px;background:url('/static/Home/image/12eb0965ab33dc8e05870911b90f3f13.png') no-repeat center;"><a href=""></a></div>

		<div class="bs4" style="width:84px;height:70px;background:url('/static/Home/image/4f036ae4d45002b2a6fb6756cedebf02.png') no-repeat center;"><a href=""></a></div>

		<div class="bs5" style="width:84px;height:70px;background:url('/static/Home/image/d7db56d1d850113f016c95e289e36efa.png') no-repeat center;"><a href=""></a></div>

		<a href="#first"><div class="bs6" style="width:84px;height:70px;background:url('/static/Home/image/totop.png') no-repeat center;margin-top:10px;"></div></a>

	</div>
		<div class="banner_y center">
			<img src="../../../uploads/pic1.jpg" id="imgid" align="right" style="position:absolute;z-index:-1;width:1226px;height:460px;">
			<div class="nav">				
				<ul>
					@foreach($cate as $row)
					<li>
						<a href="">{{$row->name}}</a>
						@if(count($row->suv))
						<div class="pop">
							@foreach($row->suv as $rows)
							<div class="left fl">				
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="../../../uploads/xt/{{$rows->img_url}}" alt="" width="40px" height="40px"></div>
											<span class="fl">{{$rows->name}}</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="" target="_blank">选购</a></div>
									<div class="clear"></div>
								</div>
									
							</div>
							@endforeach
							<div class="clear"></div>
							
						</div>
						
						@endif
					</li>
					@endforeach
				</ul>
			</div>
		</div>	
		
		<div class="sub_banner center">
			<div class="sidebar fl">
				<div class="fl"><a href=""><img src="/static/Home/image/hjh_01.gif"></a></div>
				<div class="fl"><a href=""><img src="/static/Home/image/hjh_02.gif"></a></div>
				<div class="fl"><a href=""><img src="/static/Home/image/hjh_03.gif"></a></div>
				<div class="fl"><a href=""><img src="/static/Home/image/hjh_04.gif"></a></div>
				<div class="fl"><a href=""><img src="/static/Home/image/hjh_05.gif"></a></div>
				<div class="fl"><a href=""><img src="/static/Home/image/hjh_06.gif"></a></div>
				<div class="clear"></div>
			</div>
			<div class="datu fl"><a href=""><img src="/static/Home/image/hongmi4x.png" alt=""></a></div>
			<div class="datu fl"><a href=""><img src="/static/Home/image/xiaomi5.jpg" alt=""></a></div>
			<div class="datu fr"><a href=""><img src="/static/Home/image/pinghengche.jpg" alt=""></a></div>
			<div class="clear"></div>


		</div>
		
	<!-- end banner -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/static/Home/image/pinpai1.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米MIX</a></div>
					<div class="youhui">5月9日-21日享花呗12期分期免息</div>
					<div class="jiage">3499元起</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/static/Home/image/pinpai2.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米5s</a></div>
					<div class="youhui">5月9日-10日，下单立减200元</div>
					<div class="jiage">1999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/static/Home/image/pinpai3.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米手机5 64GB</a></div>
					<div class="youhui">5月9日-10日，下单立减100元</div>
					<div class="jiage">1799元</div>
				</div>
				<div class="mingxing fl"> 	
					<div class="sub_mingxing"><a href=""><img src="/static/Home/image/pinpai4.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米电视3s 55英寸</a></div>
					<div class="youhui">5月9日，下单立减200元</div>
					<div class="jiage">3999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/static/Home/image/pinpai5.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米笔记本</a></div>
					<div class="youhui">更轻更薄，像杂志一样随身携带</div>
					<div class="jiage">3599元起</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<!-- <div class="sub_banner center" id="add" style="width:1226px;height:260px">
			<div class="sidebar fl" style="width:190px;height:260px">
				<a href=""><img src="./static/Home/image/1.png"></a>
			</div>

			<ul>
				<div class="sub_banner fr" style="width:1036px;height:260px;margin-top:0px;">
					<div class="sidebar fl" style="width:190px;height:260px;margin-right:16px;">
						<li>
							<a href="">
								<span align="center" style="width:190px;height:30px;display:inline-block;">11111</span>
								<img src="" width="190px" height="230px">
							</a>
						</li>
					</div>
					<div class="sidebar fl" style="width:190px;height:260px;margin-right:16px;">
						<li>
							<a href="">			
								<img src="" width="190px" height="230px">
								<span align="center" style="width:190px;height:30px;position:absolute;">11111</span>
							</a>
						</li>
					</div>
					<div class="sidebar fl" style="width:190px;height:260px;margin-right:16px;">
						<li>
							<a href="">
								<span align="center" style="width:190px;height:30px;display:inline-block;">11111</span>
								<img src="" width="190px" height="230px">
							</a>
						</li>
					</div>
					<div class="sidebar fl" style="width:190px;height:260px;margin-right:16px;">
						<li>
							<a href="">			
								<img src="" width="190px" height="230px">
								<span align="center" style="width:190px;height:30px;position:absolute;">11111</span>
							</a>
						</li>
					</div>
					<div class="sidebar fl" style="width:190px;height:260px;margin-right:16px;">
						<li>
							<a href="">
								<span align="center" style="width:190px;height:30px;display:inline-block;">11111</span>
								<img src="" width="190px" height="230px">
							</a>
						</li>
					</div>
				</div>
		</ul>
		</div> -->
		<style>
			.imga{
				position:relative;
			}
			.as{
				position:relative;
				bottom: -200px;
				right: 115px;
			}

		</style>
		<div class="container">
			<div class="scroll">
				<ul>
					<li><a href=""><img src="/static/Home/image/pinpai1.png" class="imga" alt=""><span class="as">小米CC9</span></a></li>
					<li><a href=""><img src="/static/Home/image/pinpai5.png" class="imga" alt=""><span class="as">小米游戏本</span></a></li>
					<li><a href=""><img src="/static/Home/image/pms_1560230039.18218237.jpg" class="imga" alt=""><span class="as">小爱同学</span></a></li>
					<li><a href=""><img src="/static/Home/image/pinpai2.png" class="imga" alt=""><span class="as">小米9</span></a></li>
					<li><a href=""><img src="/static/Home/image/pinpai4.png" class="imga" alt=""><span class="as">小米电视机</span></a></li>
					<li><a href=""><img src="/static/Home/image/qianzhao.jpg" class="imga" alt=""><span class="as">小米路由器</span></a></li>
					<li><a href=""><img src="/static/Home/image/pms_1560510426.98522616.jpg" class="imga" alt=""><span class="as">小米平衡车</span></a></li>
				</ul>
			</div>
		</div>
		<div class="peijian w">
			<div class="biaoti center">配件</div>
			<div class="main center">
				<div class="content">
					<div class="remen fl"><a href=""><img src="/static/Home/image/peijian1.jpg"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian2.jpg"></a></div>
						<div class="miaoshu"><a href="">小米6 硅胶保护套</a></div>
						<div class="jiage">49元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian3.jpg"></a></div>
						<div class="miaoshu"><a href="">小米手机4c 小米4c 智能</a></div>
						<div class="jiage">29元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:red">享6折</span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian4.jpg"></a></div>
						<div class="miaoshu"><a href="">红米NOTE 4X 红米note4X</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian5.jpg"></a></div>
						<div class="miaoshu"><a href="">小米支架式自拍杆</a></div>
						<div class="jiage">89元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content">
					<div class="remen fl"><a href=""><img src="/static/Home/image/peijian6.png"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian7.jpg"></a></div>
						<div class="miaoshu"><a href="">小米指环支架</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian8.jpg"></a></div>
						<div class="miaoshu"><a href="">米家随身风扇</a></div>
						<div class="jiage">19.9元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/static/Home/image/peijian9.jpg"></a></div>
						<div class="miaoshu"><a href="">红米4X 高透软胶保护套</a></div>
						<div class="jiage">59元</div>
						<div class="pingjia">775人评价</div>
					</div>
					<div class="remenlast fr">
						<div class="hongmi"><a href=""><img src="/static/Home/image/hongmin4.png" alt=""></a></div>
						<div class="liulangengduo"><a href=""><img src="/static/Home/image/liulangengduo.png" alt=""></a></div>					
					</div>
					<div class="clear"></div>
				</div>	

			</div>
		</div>
		
		<script>
			img = document.getElementById('imgid');
			num = 0;
			setInterval(function(){
				num++;
				img.src='../../../uploads/pic'+num+'.jpg';
				if(num >=5){
					num = 0;
				}
			},3000)

		</script>
		<script type="text/javascript">
			$(function () {
				$('.scroll').scroll({
					speed: 80, //数值越大，速度越快
					direction: 'horizantal'
				});
			});
	</script>
@endsection
@section('title','小米商城')