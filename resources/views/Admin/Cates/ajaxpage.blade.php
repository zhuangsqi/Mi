
		<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">分类名</th>
					<th>Pid</th>
					<th>Path</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cates as $row)
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>{{$row->id}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->pid}}</td>
					<td class="text-l">{{$row->path}}</td>
					<td class="f-14">
						<form action="/admincates/{{$row->id}}" method="post">
						{{method_field("DELETE")}}
						{{csrf_field()}}
							<button title="删除" href="/admincates" onclick="system_category_del(this,'1')" class="ml-5" style="text-decoration:none; float:right;margin-right:30px;"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>	
							<button title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','system-category-add.html','1','700','480')" style="text-decoration:none; float:right;"><i class="Hui-iconfont">&#xe6df;</i></button>
						
					</td>


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>