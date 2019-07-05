@extends("Admin.Adminpublic.public")
@section("main")
<body>
<nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a></nav>
<table class="table">
  <tbody><tr>
    <td width="200" class="va-t"><ul id="treeDemo" class="ztree"><li id="treeDemo_1" class="level0" tabindex="0" hidefocus="true" treenode=""><span id="treeDemo_1_switch" title="" class="button level0 switch noline_open" treenode_switch=""></span><a id="treeDemo_1_a" class="level0" treenode_a="" onclick="" target="_blank" style="" title="一级分类"><span id="treeDemo_1_ico" title="" treenode_ico="" class="button ico_open" style=""></span><span id="treeDemo_1_span">一级分类</span></a><ul id="treeDemo_1_ul" class="level0 " style="display:block"><li id="treeDemo_2" class="level1" tabindex="0" hidefocus="true" treenode=""><span id="treeDemo_2_switch" title="" class="button level1 switch noline_close" treenode_switch=""></span><a id="treeDemo_2_a" class="level1" treenode_a="" onclick="" target="_blank" style="" title="二级分类"><span id="treeDemo_2_ico" title="" treenode_ico="" class="button ico_close" style=""></span><span id="treeDemo_2_span">二级分类</span></a></li><li id="treeDemo_8" class="level1" tabindex="0" hidefocus="true" treenode=""><span id="treeDemo_8_switch" title="" class="button level1 switch noline_close" treenode_switch=""></span><a id="treeDemo_8_a" class="level1" treenode_a="" onclick="" target="_blank" style="" title="二级分类 1-2"><span id="treeDemo_8_ico" title="" treenode_ico="" class="button ico_close" style=""></span><span id="treeDemo_8_span">二级分类 1-2</span></a></li></ul></li></ul></td>
    <td class="va-t"><iframe id="testIframe" name="testIframe" frameborder="0" scrolling="AUTO" width="100%" height="390px" src="product-category-add.html"></iframe></td>
  </tr>
</tbody></table>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script> 
<script type="text/javascript">
var setting = {
  view: {
    dblClickExpand: false,
    showLine: false,
    selectedMulti: false
  },
  data: {
    simpleData: {
      enable:true,
      idKey: "id",
      pIdKey: "pId",
      rootPId: ""
    }
  },
  callback: {
    beforeClick: function(treeId, treeNode) {
      var zTree = $.fn.zTree.getZTreeObj("tree");
      if (treeNode.isParent) {
        zTree.expandNode(treeNode);
        return false;
      } else {
        demoIframe.attr("src",treeNode.file + ".html");
        return true;
      }
    }
  }
};

var zNodes =[
  { id:1, pId:0, name:"一级分类", open:true},
  { id:11, pId:1, name:"二级分类"},
  { id:111, pId:11, name:"三级分类"},
  { id:112, pId:11, name:"三级分类"},
  { id:113, pId:11, name:"三级分类"},
  { id:114, pId:11, name:"三级分类"},
  { id:115, pId:11, name:"三级分类"},
  { id:12, pId:1, name:"二级分类 1-2"},
  { id:121, pId:12, name:"三级分类 1-2-1"},
  { id:122, pId:12, name:"三级分类 1-2-2"},
];
    
var code;
    
function showCode(str) {
  if (!code) code = $("#code");
  code.empty();
  code.append("<li>"+str+"</li>");
}
    
$(document).ready(function(){
  var t = $("#treeDemo");
  t = $.fn.zTree.init(t, setting, zNodes);
  demoIframe = $("#testIframe");
  //demoIframe.on("load", loadReady);
  var zTree = $.fn.zTree.getZTreeObj("tree");
  //zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
</script>

</body>

@section("title","后台分类的添加")