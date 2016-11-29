<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo C('COMM_TITLE');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/Public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/admin/fonts/font-awesome.min.css">

    <!-- Font Awesome -->

    <!-- Theme style -->
    <link rel="stylesheet" href="/Public/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/Public/admin/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>

                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>

                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>

                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/Public/admin/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo (session('name')); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/Public/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">个人资料</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo U('Login/logout');?>" class="btn btn-default btn-flat">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header><!--/HEADER -->
<!--/HEADER -->
<style type="text/css">

    .wminimize:hover {
        text-decoration: none;
    }

    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
        padding: 8px;
        line-height: 1.428571429;
        vertical-align: top;
        border-top: 0px solid #DDD;
    }
    .collapsed .expander{
        background-image:url('/Public/admin/img/toggle-collapse-dark.png');
    }
    .expander .expander{
        background-image:url('/Public/admin/img/toggle-expand-dark.png');
    }

</style>
<!-- PAGE -->

<!-- SIDEBAR -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/Public/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo (session('name')); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">菜单</li>
            <li <?php if( CONTROLLER_NAME == 'Index'): ?>class="active treeview" <?php else: ?> class=" treeview"<?php endif; ?>>
                <a href="<?php echo U('Index/index');?>">
                    <i class="fa fa-dashboard"></i> <span>首页</span>
                </a>

            </li>
            <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($openFirstId == $vo['id']): ?>class="active treeview" <?php else: ?> class=" treeview"<?php endif; ?>>
                    <a href="#">
                        <i class="fa <?php echo ($vo["icon"]); ?>"></i>
                        <span><?php echo ($vo["title"]); ?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if($v['id'] == $open): ?>class="active"<?php endif; ?>><a href="<?php echo ($v["urls"]); ?>"><i class="fa fa-circle-o"></i> <?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside><!--/HEADER -->
<!-- /SIDEBAR -->
<div id="main-content">
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->

    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <!-- PAGE HEADER-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                            <!-- STYLER -->

                            <!-- /STYLER -->
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="<?php echo U('Index/index');?>">首页</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">权限管理</a>
                                </li>
                                <li>节点管理</li>
                                <a href="<?php echo U('Node/add');?>" class="btn btn-primary pull-right ">增加节点 <i class="fa fa-arrow-right"></i></a>
                            </ul>
                            <div class="clearfix">

                            </div>
                            <!-- /BREADCRUMBS -->

                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->
                <!-- SIMPLE STRIPED -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border primary">
                            <div class="box-title">
                                <h4><i class="fa fa-table"></i>节点列表</h4>
                                <div class="tools">

                                    <a href="javascript:;" class="collapse">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="1" rowspan="1">编号</th>
                                        <th >Name</th>
                                        <th >Title</th>
                                        <th >状态</th>
                                        <th >操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr  class="initialized parent collapsed expander" id="tr<?php echo ($val["id"]); ?>">
                                            <td><span style="padding-left: 20px" <?php if($val["show"] == 1): ?>class="expander"<?php endif; ?>   onclick="tr_show(<?php echo ($val["id"]); ?>)"></span><span><?php echo ($val["id"]); ?></span></td>
                                            <td ><?php echo ($val["name"]); ?></td>
                                            <td ><?php echo ($val["title"]); ?></td>
                                            <td >
                                                <?php if($val["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><span class="label label-primary arrow-in adminstatus"><?php echo ($val["nodeStatus"]); ?></span>
                                                <?php else: ?>
                                                    <span class="label label-danger arrow-in arrow-in-right adminstatus"><?php echo ($val["nodeStatus"]); ?></span><?php endif; ?>
                                            </td>
                                            <td >
                                                <a href="<?php echo U('Node/edit',array('id'=>$val['id']));?>" class="fa fa-pencil tip" data-original-title="修改" id="tr<?php echo ($val["id"]); ?>"></a>&nbsp;
                                                <?php if($val["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="禁用"></a>
                                                 <?php else: ?>
                                                    <a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="启用"></a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php if(is_array($val["child"])): $i = 0; $__LIST__ = $val["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr  class="initialized parent collapsed expander show<?php echo ($val["id"]); ?>" style="margin-left: 20px; display:none" id="tr<?php echo ($vo["id"]); ?>">
                                                <td>
                                                    <span style="padding-left: 20px;margin-left: 15px;" <?php if($vo["show"] == 1): ?>class="expander"<?php endif; ?>  onclick="tr_show(<?php echo ($vo["id"]); ?>)"></span><span><?php echo ($vo["id"]); ?></span>
                                                </td>
                                                <td >&nbsp;&nbsp;├─<?php echo ($vo["name"]); ?></td>
                                                <td >&nbsp;&nbsp;├─<?php echo ($vo["title"]); ?></td>
                                                <td >
                                                    <?php if($vo["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><span class="label label-primary arrow-in adminstatus"><?php echo ($vo["nodeStatus"]); ?></span>
                                                     <?php else: ?>
                                                        <span class="label label-danger arrow-in arrow-in-right adminstatus"><?php echo ($vo["nodeStatus"]); ?></span><?php endif; ?>
                                                </td>
                                                <td >
                                                    <a href="<?php echo U('Node/edit',array('id'=>$vo['id']));?>" class="fa fa-pencil tip" data-original-title="修改" id="tr<?php echo ($vo["id"]); ?>"></a>&nbsp;
                                                    <?php if($vo["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="禁用"></a>
                                                    <?php else: ?>
                                                        <a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="启用"></a><?php endif; ?>

                                                </td>
                                            </tr>
                                            <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr  class="initialized parent collapsed expander show<?php echo ($vo["id"]); ?>" style="margin-left: 20px; display:none" id="tr<?php echo ($v["id"]); ?>">
                                                    <td><span style="padding-left: 20px;margin-left: 15px;" <?php if($v["show"] == 1): ?>class="expander"<?php endif; ?> onclick="tr_show(<?php echo ($v["id"]); ?>)""></span><span><?php echo ($v["id"]); ?></span></td>
                                                    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  └─ <?php echo ($v["name"]); ?></td>
                                                    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  └─ <?php echo ($v["title"]); ?></td>
                                                    <td >
                                                        <?php if($v["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><span class="label label-primary arrow-in adminstatus"><?php echo ($v["nodeStatus"]); ?></span>
                                                        <?php else: ?>
                                                            <span class="label label-danger arrow-in arrow-in-right adminstatus"><?php echo ($v["nodeStatus"]); ?></span><?php endif; ?>
                                                    </td>
                                                    <td ><a href="<?php echo U('Node/edit',array('id'=>$v['id']));?>"
                                                            class="fa fa-pencil tip" data-original-title="修改" id="tr<?php echo ($v["id"]); ?>"></a>&nbsp;
                                                        <?php if($v["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><a href="javascript:void(0);" style="cursor: pointer;" class="fa fa-trash-o tip status" data-original-title="禁用"></a>
                                                         <?php else: ?>
                                                            <a href="javascript:void(0);" style="cursor: pointer;" class="fa fa-trash-o tip status" data-original-title="启用"></a><?php endif; ?>

                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /BOX -->
                    </div>
                </div>

                <!-- /BORDERED HOVER -->
            </div>
            <!--/HEADER -->
            <footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.3.3
	</div>
	<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="/Public/admin/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/Public/admin/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="/Public/admin/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/Public/admin/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/Public/admin/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public/admin/js/demo.js"></script>
<script src="/Public/admin/js/admin.js"></script>
<script charset="utf-8" src="/Public/layer/layer.js"></script>
</body>
</html>
            <script type="text/javascript">
                $(function(){
                    $(".status").click(function(){
                        var parent=$(this).parent().parent()
                        var id=parent.find('td:first span').eq(1).html();
                        var msg=$(this).attr("data-original-title");
                        if(msg=="启用") {
                            status="<?=Manager\Model\AuthRuleModel::STATUS_DISABLE?>";
                        }else {
                            status="<?=Manager\Model\AuthRuleModel::STATUS_ENABLE?>";
                        }
                        layer.confirm('你确定要'+msg+"吗？",{
                            btn:[ '确认','取消' ] //按钮
                        },function(){
                            $.post("<?php echo U('Node/del');?>",{ "id":id,"status":status },function( response ){
                                if(response.error==100) {
                                    throwExc(response.message);
                                    return false;
                                }else if(response.error==200) {
                                    showSucc(response.message);
                                    setTimeout("location.reload()",1000);
                                }else {
                                    throwExc(response.info);
                                    return false;
                                }
                            },"json");

                        },function(){
                            layer.msg('取消成功',{
                                time:800, //20s后自动关闭
                            });
                        });

                    });
                })
                function load(){
                    location.reload() ;
                }


                function tr_show(data){
                    var show= $('.show'+data);
                    $("#tr"+data).toggleClass('expander');
                    show.toggle();
                }
            </script>