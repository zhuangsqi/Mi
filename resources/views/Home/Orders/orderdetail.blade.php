@extends('Home.HomePublic.user')
@section('user')
<div class="uc-box uc-main-box"> 
   <div class="uc-content-box order-view-box"> 
    <div class="box-hd"> 
     <h1 class="title">订单详情</h1> 
     <div class="more clearfix"> 
      <h2 class="subtitle">订单号：{{$order->order_num}} <span class="tag tag-subsidy"></span> </h2> 
      <div class="actions"> 
       <a title="申请售后" href="" class="btn btn-small btn-line-gray">申请售后</a> 
      </div> 
     </div> 
    </div> 
    <div class="box-bd"> 
     <div class="uc-order-item uc-order-item-finish"> 
      <div class="order-detail"> 
       <div class="order-summary"> 
        <div class="order-status">
        	<span style="color:#ff6700;">{{$order->status}}</span>
         <span class="tag tag-package">包裹1</span> 
        </div> 
       </div> 
       <table class="order-items-table"> 
        <tbody>
        <!-- 订单商品 -->
        @foreach($aa as $val)
         <tr> 
          <td class="col col-thumb"> 
           <div class="figure figure-thumb"> 
            <a target="_blank" href="">
              <!-- 商品图 --> 
              <img src="/uploads/product/{{$val['logo']}}" width="60" height="60" alt="" /> 
            </a> 
           </div> 
          </td> 
          <td class="col col-name"> <p class="name"> <a target="_blank" href="">{{$val['name']}}</a> </p> </td> 
          <td class="col col-price"> <p class="price">{{$val['money']}}元 &times; {{$val['num']}}</p> </td> 
          <td class="col col-actions">
          	<form action="" method="get">
          		<input type="hidden" name="shop_id" value="{{$val['id']}}">
          		<input type="submit" class="btn btn-small btn-line-gray" value="评价">
          	</form>
          </td> 
         </tr>
        @endforeach 
        <!-- end订单商品 -->
         
        </tbody>
       </table> 
      </div> 
      <!-- 订金盲约订单 --> 
      <div id="editAddr" class="order-detail-info"> 
       <h3>收货信息</h3> 
       <table class="info-table"> 
        <tbody>
         <tr> 
          <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th> 
          <td>{{$address->addressname}}</td> 
         </tr> 
         <tr> 
          <th>联系电话：</th> 
          <td>{{$address->addressphone}}</td> 
         </tr> 
         <tr> 
          <th>收货地址：</th> 
          <td>{{$address->areaidpath}} <span>{{$address->useraddress}}</span></td> 
         </tr> 
        </tbody>
       </table> 
       <div class="actions"> 
       </div> 
      </div> 
      <div id="editTime" class="order-detail-info"> 
       <h3>支付方式</h3> 
       <table class="info-table"> 
        <tbody>
         <tr> 
          <th>支付方式：</th> 
          <td>在线支付（支付宝快捷支付）</td> 
         </tr> 
        </tbody>
       </table> 
       <div class="actions"> 
       </div> 
      </div> 
      <div class="order-detail-info"> 
       <h3>发票信息</h3> 
       <table class="info-table"> 
        <tbody>
         <tr> 
          <th>发票类型：</th> 
          <td>电子发票</td> 
         </tr> 
         <tr> 
          <th>发票内容：</th> 
          <td>购买商品明细</td> 
         </tr> 
         <tr> 
          <th>发票抬头：</th> 
          <td>个人</td> 
         </tr> 
        </tbody>
       </table> 
       <div class="actions"> 
        <a class="btn btn-small btn-line-gray" href="" >查看发票</a> 
        <a class="btn btn-small btn-line-gray" href="" >发票查验</a> 
        <a class="btn btn-small btn-line-gray" href="" >发票换开</a> 
        <a class="btn btn-small btn-line-gray hide" href="">发票物流</a> 
       </div> 
      </div> 
      <div class="order-detail-total"> 
       <table class="total-table"> 
        <!-- 预售 开始支付定金 --> 
        <tbody>
         <tr> 
          <th>商品总价：</th> 
          <td><span class="num">{{$tot}}</span>元</td> 
         </tr> 
         <tr> 
          <th>运费：</th> 
          <td><span class="num">0</span>元</td> 
         </tr> 
         <tr> 
          <th class="total">实付金额：</th> 
          <td class="total"><span class="num">{{$tot}}</span>元</td> 
         </tr> 
        </tbody>
       </table>


       <table class="total-table"> 
        <!-- 预售 开始支付定金 --> 
        <tbody>
         <tr> 
          <td class="total">
			<!--<form action="/receipt" method="post">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{$order->id}}">
          		<input class="jrgwc" style="height: 50px;width: 200px;border:none;background:#ff6700;color:#fff;font-size: 18px;font-weight: bold;cursor:pointer;" type="submit" value="确认收货" />
          	</form>-->

          	<button id="queren" style="height: 50px;width: 200px;border:none;background:#ff6700;color:#fff;font-size: 18px;font-weight: bold;cursor:pointer;" type="submit" name="{{$order->id}}" >确认收货</button>
          </td> 
         </tr> 
        </tbody>
       </table>

       	
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
  <script>
  	$('#queren').click(function(){
  		aa=$(this);
  		id=aa.attr('name');
  		$.get('/receipt',{id:id},function(data){
  			if(data==2){
  				aa.html('待评价');
  			}
  		});
  	});
  </script>
@endsection
@section('title','小米商城-订单详情')