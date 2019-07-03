<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Ajax post请求方式 </title>
	<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
</head>
<body>
	<button>获取Ajax响应数据</button>

</body>
<script type="text/javascript">
// Laravel 框架里post请求Ajax的时候，有自己专门独特的csrf保护
//通过jquery类库 将meta标签里的token字符串写入到请求标头里
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	// alert($);
	$("button").click(function(){
		//Ajax 请求数据
		$.post("/doajaxpost",{},function(data){
			alert(data);
		});
	});
</script>
</html>