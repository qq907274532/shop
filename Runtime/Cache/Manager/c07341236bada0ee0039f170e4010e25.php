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
            <li><a href="#">节点管理</a></li>
            <li class="active">修改节点</li>

        </ol>
        <div class="form-group pull-right">
            <a href="<?php echo U('Node/index');?>" class="btn btn-primary  "><i class="fa fa-arrow-left"></i> 返回 </a>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->

            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">修改节点</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" role="form" id="myForm">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">请选择父级：</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="pid" id="pid">
                                        <option value="0">请选择父级</option>
                                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v['id'] == $info['pid']): ?>selected=selected<?php endif; ?> ><?php echo ($v["title"]); ?></option>
                                            <?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if( $vo['id'] == $info['pid']): ?>selected=selected<?php endif; ?> > &nbsp;└-<?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">规则名称：</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="规则名称"
                                            value="<?php echo ($info["title"]); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">规则标识：</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" id="name"
                                            placeholder="模块/控制器/方法" value="<?php echo ($info["name"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">URL：</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="url" id='url' value="<?php echo ($info["url"]); ?>"
                                            placeholder="控制器/方法">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ICON图标：</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="icon" id='icon' value="<?php echo ($info["icon"]); ?>"
                                            placeholder="fa-camera">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">排序：</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="sort" id='sort' value="<?php echo ($info["sort"]); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否是菜单：</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="menu" id="menu">
                                        <?php if(is_array($menu)): $k = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>" <?php if($info['menu'] == $k): ?>selected=selected<?php endif; ?>><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-6">
                                    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                                    <div type="text" class="btn btn-primary  " id="submit">提交</div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
                <!-- general form elements disabled -->

                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
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
<script src="/Public/admin/iCheck/icheck.min.js"></script>
<script charset="utf-8" src="/Public/layer/layer.js"></script>
</body>
</html><!--/HEADER -->
<script type="text/javascript">
    $(function(){
        $("#submit").click(function(){
            var name=$("input[name='name']").val();
            var title=$("input[name='title']").val();
            var url=$("input[name='url']").val();
            var status=$("#status").val();
            if($.trim(name)=='') {
                throwExc("规则标识必须填写");
                return false;
            }
            if($.trim(title)=='') {
                throwExc("规则名称必须填写");
                return false;
            }
            URL
            if($.trim(url)=='') {
                throwExc("URL必须填写");
                return false;
            }

            $.post("<?php echo U('Node/edit');?>",$("#myForm").serialize(),function( response ){
                if(response.error==100) {
                    throwExc(response.message);
                    return false;
                }else if(response.error==200) {
                    showSucc(response.message);
                    setTimeout("load()",1000);
                }
            },"json");
        });
    });
    function load(){
        window.location.href="<?php echo U('Node/index');?>";
    }
</script>