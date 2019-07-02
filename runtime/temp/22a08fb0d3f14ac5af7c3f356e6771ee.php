<?php /*a:1:{s:63:"E:\PHPTutorial\WWW\noob\application\admin\view\system\logs.html";i:1561981329;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
	<link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
	<!-- Data Tables -->
	<link href="/static/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="/static/admin/css/base.css" rel="stylesheet">
	<link href="/static/admin/css/animate.min.css" rel="stylesheet">
	<link href="/static/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
	<link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/base.css" rel="stylesheet">
</head>
<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>系统日志</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div  class="col-sm-3 m-b-xs">
                <?php if(!(empty($priv) || (($priv instanceof \think\Collection || $priv instanceof \think\Paginator ) && $priv->isEmpty()))): if(is_array($priv) || $priv instanceof \think\Collection || $priv instanceof \think\Paginator): $i = 0; $__LIST__ = $priv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a onclick="<?php echo htmlentities($vo['event']); ?>">
                	<button class="btn <?php echo htmlentities($vo['img']); ?>" type="button">
                	<i class="fa <?php echo htmlentities($vo['icon']); ?>"></i>
                	<?php echo htmlentities($vo['name']); ?>
                	</button>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <span class="simple_tag">没有可操作选项</span>
                <?php endif; ?>
                </div>                                            
                <div class="col-sm-9">                               
                	<form name="admin_list_sea" action="<?php echo url('system/logs'); ?>" class="form-search form-inline" method="post" >
                        <div class="input-group">
                        	<div class="form-group">
                                <input type="text" placeholder="请选择时间范围" name="range" id="range" value="<?php if(!(empty($search["range"]) || (($search["range"] instanceof \think\Collection || $search["range"] instanceof \think\Paginator ) && $search["range"]->isEmpty()))): ?><?php echo htmlentities($search['range']); endif; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="请输入查询关键字" name="keywords" value="<?php if(!(empty($search["keywords"]) || (($search["keywords"] instanceof \think\Collection || $search["keywords"] instanceof \think\Paginator ) && $search["keywords"]->isEmpty()))): ?><?php echo htmlentities($search['keywords']); endif; ?>" class="form-control">
                            </div>   
                            <span class="input-group-btn"> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索</button> 
                            </span>
                        </div>
                	</form>    
				</div>                     
            </div>
            <div class="hr-line-dashed"></div>
            <!--搜索框结束-->
            <div class="example-wrap">
                <div class="example">
                    <table id="cusTable" class="table table-bordered tablelist table-hover">
                        <thead>
							<th>ID</th>
							<th>管理员</th>
							<th>操作</th>
							<th>ip</th>
							<th>时间</th>
                        </thead>
                         <tbody>
                         	<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                         	<tr rel="<?php echo htmlentities($vo['id']); ?>">
                                 <td><?php echo htmlentities($vo['id']); ?></td>
                                 <td><?php echo htmlentities($vo['admin_name']); ?></td>
                                 <td><?php echo htmlentities($vo['info']); ?></td>
                                 <td><?php echo htmlentities($vo['ip']); ?></td>
                                 <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
                             </tr>
                             <?php endforeach; endif; else: echo "" ;endif; ?>
                         </tbody>
                    </table>
                    <?php echo $info->render(); ?>
                </div>
            </div>
            <!-- End Example Pagination -->
        </div>
    </div>
</div>
<!-- End Panel Other -->
</div>

	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js?v=3.3.5"></script>
	<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
	<script src="/static/admin/plugins/layer/layer.js"></script>
	<script src="/static/admin/plugins/laydate/laydate.js"></script>
	<script src="/static/admin/plugins/iCheck/icheck.min.js"></script>
	<script src="/static/admin/js/common.js"></script>
<script>
laydate.render({
	  elem: '#range'
	  ,range: true
	});


$(document).ready(function(){
	$(".i-checks").iCheck({
		checkboxClass:"icheckbox_square-green",
		radioClass:"iradio_square-green",
		})
});


function add(){
	layer_show("添加","<?php echo url('system/button_add'); ?>",800,460);
}

function edit(){
	var id = getid();
	if(id>0){
		layer_show("编辑","<?php echo url('system/button_add'); ?>?id="+id,800,460);
	}else{
		layer_alert('请选择目标');	
	}
}

function del(){
	var ids = getids();
	if(ids != ''){
		parent.layer.confirm('确认要删除吗？',function(index){
			$.getJSON("<?php echo url('system/button_del'); ?>",{'ids':ids},function(res){
				if(res.code == 1){
					warn(res.msg,'success','selfrefresh');
				}else{
					warn(res.msg,'error');
				}
			  });
		});
	}else{
		layer_alert('请选择目标');	
	}
}

</script>
</body>
</html>