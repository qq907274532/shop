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
    <link rel="stylesheet" href="/Public/admin/iCheck/all.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/Public/admin/css/skins/_all-skins.min.css">
    <script src="/Public/admin/jQuery/jQuery-2.2.0.min.js"></script>
    <link href="/Public/admin/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/admin/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/admin/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/admin/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" ></script>

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
<!-- Left side column. contains the logo and sidebar -->
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb pull-left" >
            <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">权限管理</a></li>
            <li class="active">管理员管理</li>

        </ol>
        <div class="form-group pull-right">
            <a href="<?php echo U('AdminUser/add');?>" class="btn btn-primary  ">增加管理员 <i class="fa fa-arrow-right"></i></a>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">管理员列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>管理员名称</th>
                                <th>状态</th>
                                <th>权限组</th>
                                <th class="hidden-480">创建时间</th>
                                <th class="hidden-480">更新时间</th>
                                <th>操作</th>
                            </tr>
                            <?php if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($v["id"]); ?></td>
                                    <td><?php echo ($v["username"]); ?></td>
                                    <td>
                                        <?php if($v["status"] == Manager\Model\AdminUserModel::STATUS_ENABLE): ?><span class="label label-primary "><?php echo ($v["statusName"]); ?></span>
                                            <?php else: ?>
                                            <span class="label  label-danger  "><?php echo ($v["statusName"]); ?></span><?php endif; ?>
                                    </td>
                                    <td class="hidden-480"> <span class="badge badge-purple"><?php echo ($v["name"]); ?></span></td>
                                    <td class="hidden-480"><?php echo ($v["create_time"]); ?></td>
                                    <td class="hidden-480"><?php echo ($v["update_time"]); ?></td>
                                    <td>
                                        <a href="<?php echo U('AdminUser/modifyPassword',array('id'=>$v['id']));?>" class="fa fa-sun-o tip" data-toggle="tooltip" data-placement="top" title="修改密码" ></a>
                                        <a href="<?php echo U('AdminUser/edit',array('id'=>$v['id']));?>" class="fa fa-pencil tip" data-toggle="tooltip" data-placement="top" title="修改" ></a>

                                        <?php if($v["status"] == Manager\Model\AdminUserModel::STATUS_ENABLE): ?><a href="javascript:;" class="fa fa-trash-o tip checkStatus" data-toggle="tooltip" data-placement="top" title="禁用" > </a>
                                            <?php else: ?>
                                            <a href="javascript:;" class="fa fa-trash-o tip checkStatus" data-toggle="tooltip" data-placement="top" title="启用" > </a><?php endif; ?>
                                     </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?php echo ($data["page"]); ?>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
<script src="/Public/admin/iCheck/icheck.min.js"></script>
<script charset="utf-8" src="/Public/layer/layer.js"></script>

</body>
</html><!--/HEADER -->
<script type="text/javascript">
    $(".checkStatus").click(function(){
        var id=$(this).parent().parent().find("td:eq(0)").html();
        var msg=$(this).attr("data-original-title");
        var status;
        if(msg=='禁用') {
            status=1;
        }else {
            status=2;
        }
        layer.confirm('你确定要'+msg+"吗？", {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                url: "<?php echo U('AdminUser/del');?>",
                type: "POST",
                data :{ "id":id,"status":status },
                dataType: "json",
                success:function(response){
                    if(response.error==100) {
                        throwExc(response.message);
                        return false;
                    }else if(response.error==200){
                        showSucc(response.message);
                        setTimeout("load()",1000);
                    }
                },
                error:function(response){
                    throwExc(response.responseText);
                    return false;
                }
            })
        }, function(){
            layer.msg('取消操作', {
                time: 800, //20s后自动关闭
            });
        });

    });

    function load(){
        location.reload() ;
    }
</script>