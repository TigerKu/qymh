<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/wwwroot/47.95.115.143/application/admin/view/index/index.html";i:1560766176;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<LINK rel="Bookmark" href="/favicon.ico" >
	<LINK rel="Shortcut Icon" href="/favicon.ico" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/public/lib/html5.js"></script>
	<script type="text/javascript" src="/public/lib/respond.min.js"></script>
	<script type="text/javascript" src="/public/lib/PIE_IE678.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/public/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/public/lib/Hui-iconfont/1.0.7/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/public/lib/icheck/icheck.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/skin/blue/skin.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="/public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>
			<?php if(!(empty($config['site_name']) || (($config['site_name'] instanceof \think\Collection || $config['site_name'] instanceof \think\Paginator ) && $config['site_name']->isEmpty()))): ?>
			<?php echo $config['site_name']; else: ?>
			后台管理
			<?php endif; ?>
	</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl">
			<a class="logo navbar-logo f-l mr-10 hidden-xs" >
				<strong>
					<?php if(!(empty($config['site_name']) || (($config['site_name'] instanceof \think\Collection || $config['site_name'] instanceof \think\Paginator ) && $config['site_name']->isEmpty()))): ?>
					<?php echo $config['site_name']; ?>后台管理
					<?php else: ?>
					未设置
					<?php endif; ?>
				</strong>
			</a>
			<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="#">MF</a>  <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li><a href="/index.php">网站首页</a></li>
					<!-- <li><a href="<?php echo url('index/delfile'); ?>">清除缓存</a></li> -->
					<li>管理员</li>

					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo $admin_name_nk; ?><i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="personal_info('当前管理员个人信息','<?php echo url('Backend/admin_info'); ?>','400','600')">个人信息</a></li>
							<li><a href="<?php echo url('Login/logout'); ?>">切换账户</a></li>
							<li><a href="<?php echo url('Login/logout'); ?>">退出</a></li>
						</ul>
					</li>
					<!--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>-->
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">

		<!--权限管理说明   1：新增管理 在管理员管理的权限管理内增加相应权限  2：用in_array判断管理名 -->


		<?php if(in_array('首页管理',$manage)): ?>
			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 首页管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('admin/Index/roasting'); ?>" data-title="栏目图" href="javascript:;">栏目图</a></li>
						<li><a _href="<?php echo url('admin/Index/lun'); ?>" data-title="轮播图" href="javascript:;">轮播图</a></li>
						<li><a _href="<?php echo url('admin/Index/logo'); ?>" data-title="logo" href="javascript:;">logo</a></li>
						<li><a _href="<?php echo url('Nav/nav_list',['pid'=>81]); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						<li><a _href="<?php echo url('Nav/nav_category_list',['pid'=>81]); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?>

		   <dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 关于我们<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Nav/nav_list',['pid'=>21]); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						<!-- <li><a _href="<?php echo url('Nav/nav_category_list',['pid'=>83]); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li> -->
					</ul>
				</dd>
			</dl>



			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 解决方案<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Nav/nav_list',['pid'=>74]); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						 <li><a _href="<?php echo url('Nav/nav_category_list',['pid'=>74]); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li> 
					</ul>
				</dd>
			</dl>


			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 新闻中心<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Nav/nav_list',['pid'=>7]); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						<!-- <li><a _href="<?php echo url('Nav/nav_category_list',['pid'=>1]); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li> -->
					</ul>
				</dd>
			</dl>



			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 加入龙晟<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Nav/nav_list',['pid'=>91]); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						<!-- <li><a _href="<?php echo url('Nav/nav_category_list',['pid'=>18]); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li> -->
					</ul>
				</dd>
			</dl>


			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 员工展示<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Nav/nav_list',['pid'=>92]); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						<!-- <li><a _href="<?php echo url('Nav/nav_category_list',['pid'=>83]); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li> -->
					</ul>
				</dd>
			</dl>

			

		




		<?php if(in_array('友情链接',$manage)): ?>
			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 友情链接<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('links/link_list'); ?>" data-title="友情链接" href="javascript:void(0)">友情链接</a></li>
						
					</ul>
				</dd>
			</dl>
		<?php endif; if(in_array('单页面',$manage)): ?>
			<dl id="menu-package">
				<dt><i class="Hui-iconfont">&#xe70d;</i> 导航页面<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('program/program_list'); ?>" data-title="列表" href="javascript:void(0)">列表</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?>





		<!-- <?php if(in_array('专业人员管理',$manage)): ?>
			<dl id="menu-package">
				<dt><i class="Hui-iconfont">&#xe70d;</i>专业人员<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('doc/doc_list'); ?>" data-title="专业列表" href="javascript:void(0)">专业人员列表</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?> -->





		<!-- <?php if(in_array('文章管理',$manage)): ?>
			<dl id="menu-pages">
				<dt><i class="Hui-iconfont">&#xe687;</i> 文章管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Nav/nav_list'); ?>" data-title="文章列表" href="javascript:void(0)">文章列表</a></li>
						<li><a _href="<?php echo url('Nav/nav_category_list'); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?>
 -->

		<!-- <dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 我们的客户<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('links/link_list'); ?>" data-title="我们的客户" href="javascript:void(0)">我们的客户</a></li>
						
					</ul>
				</dd>
			</dl>
 -->

		<!-- <?php if(in_array('友情链接',$manage)): ?> -->
			
		<!-- <?php endif; ?> -->



		<!-- 
		<dl id="menu-pages">
			<dt><i class="Hui-iconfont">&#xe70d;</i> 荣誉证书管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('admin/Links/link_list'); ?>" data-title="证书列表" href="javascript:void(0)">证书列表</a></li>
				</ul>
			</dd>
		</dl> -->


		<?php if(in_array('联系我们',$manage)): ?>
			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe692;</i> 公司信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('admin/index/contact_way'); ?>" data-title="公司信息" href="javascript:void(0)">公司信息</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?>

		<!-- <?php if(in_array('管理员管理',$manage) || $admin_name_nk=='admin'): ?>
			<dl id="menu-admin">
				<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('Backend/admin_list'); ?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
						<li><a _href="<?php echo url('Backend/admin_power'); ?>" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
						<li><a _href="<?php echo url('Backend/admin_log'); ?>" data-title="管理员日志" href="javascript:void(0)">管理员日志</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?>
 -->
		<?php if(in_array('系统管理',$manage)): ?>
			<dl id="menu-system">
				<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo url('System/index'); ?>" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
					</ul>
				</dd>
			</dl>
		<?php endif; ?>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo url('Index/welcome'); ?>"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
	/*用户添加*/
	function member_add(title,url,w,h){
		layer_show(title,url,w,h);
	}
	/*管理员个人信息*/
	function personal_info(title,url,w,h){
		layer_show(title,url,w,h);
	}
</script>

</body>
</html>