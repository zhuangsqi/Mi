@extends('Home.HomePublic.public')
@section('main')
	<!-- start banner_y -->

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
		@foreach($cate as $val)
		<div class="peijian w">

			<div class="biaoti center">
				<div class="fl">{{$val->name}}</div>
				@foreach($val->suv as $rows)
				<div class="fr">{{$rows->name}}</div>
				@endforeach
				<div class="clear"></div>
			</div>
			<div class></div>
			<div class="main center">
				<div class="content">
					<div class="remen fl"><a href=""><img src="/static/Home/image/peijian1.jpg"></a>
					</div>
					@foreach($shop as $s)
					@foreach($s as $ss)
					@if($ss->cid == $val->id)
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href="/home/{{$ss->aid}}"><img src="/uploads/product/{{$ss->logo}}" width="160"></a></div>
						<div class="miaoshu"><a href="">{{$ss->aname}}</a></div>
						<div class="jiage">{{$ss->money}}元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>{{$ss->goods}}</span>
								<span>点击查看详情</span>
							</a>
						</div>
					</div>
					@endif
					@endforeach
					@endforeach
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>			
			</div>
			
		</div>
		@endforeach
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
@endsection
@section('title','小米商城')