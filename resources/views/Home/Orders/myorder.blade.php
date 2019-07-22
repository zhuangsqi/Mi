@extends('Home.HomePublic.user')
@section('user')
  <div class="uc-box uc-main-box"> 
   <div class="uc-content-box order-list-box"> 
    <div class="box-hd"> 
     <div class="more clearfix"> 
      <ul class="filter-list J_orderType"> 
       <li class="first active"><a href="" data-type="0">全部有效订单</a></li> 
       <li><a id="J_unpaidTab" href="" data-type="7">待支付</a></li> 
       <li><a id="J_sendTab" href="" data-type="8">待收货</a></li> 
       <li><a href="" data-type="20">订单回收站</a></li> 
      </ul> 
      <form id="J_orderSearchForm" class="search-form clearfix" action="#" method="get"> 
       <label for="search" class="hide">站内搜索</label> 
       <input class="search-text" type="search" id="J_orderSearchKeywords" name="keywords" autocomplete="off" placeholder="输入商品名称、商品编号、订单号" /> 
       <input type="submit" class="search-btn iconfont" value="" /> 
      </form> 
     </div> 
    </div> 
    <div class="box-bd"> 
     <div id="J_orderList">
      <ul class="order-list"> 
      @foreach($aa as $val)
       <li class="uc-order-item uc-order-item-finish"> 
        <div class="order-detail"> 
         <div class="order-summary"> 
          <div class="order-status">
            <span style="color:#ff6700;">{{$val['status']}}</span>
          </div> 
         </div> 
         <table class="order-detail-table"> 
          <thead> 
           <tr>

            <th class="col-main"> 
              订单号：<a href="">{{$val['order_num']}}</a>
              <span class="sep">|</span>支付宝支付（APP）</p> 
            </th> 
            <th class="col-sub"> 
            </th>

           </tr> 
          </thead> 

          <tbody> 
           <tr> 
            <td class="order-items"> 
             <ul class="goods-list">
              
              <li> 
                <div class="figure figure-thumb"> 
                  <a href=""> <img src="/uploads/product/{{$val['logo']}}" width="80" height="80" /> </a> 
                </div> 
                <p class="name"> 
                  <a href="">{{$val['name']}}</a> 
                </p> 
                <p class="price">{{$val['money']}}元 &times; <span>{{$val['num']}}</span></p> 
              </li>
              <li>
                更多请查看订单详情!
              </li>
              
             </ul> 
            </td> 
            <td class="order-actions">
            <form action="/orderdetail" method="get">
              <input type="hidden" name="order_id" value="{{$val['order_id']}}">
              <input type="submit" class="btn btn-small btn-line-gray" value="订单详情">
            </form> 
              <a class="btn btn-small btn-line-gray" href="">申请售后</a> 
            </td> 
           </tr> 
          </tbody> 



         </table> 
        </div> 
      </li>
      @endforeach
      </ul>
     </div>   
    </div> 
   </div> 
  </div>
@endsection
@section('title','小米商城-我的订单')