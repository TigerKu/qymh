<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/wwwroot/47.95.115.143/application/admin/view/login/login.html";i:1559806308;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>
    <?php if(!(empty($config['site_name']) || (($config['site_name'] instanceof \think\Collection || $config['site_name'] instanceof \think\Paginator ) && $config['site_name']->isEmpty()))): ?>
    <?php echo $config['site_name']; else: ?>
    后台管理
    <?php endif; ?>
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
  <link href="/public/static/h-ui.admin/css/sign_up.css" rel="stylesheet" type="text/css" />
  <style>
    body{
      background-position-y: -115px;
    }
  </style>
</head>

<body>
<h1>
  <?php if(!(empty($config['site_name']) || (($config['site_name'] instanceof \think\Collection || $config['site_name'] instanceof \think\Paginator ) && $config['site_name']->isEmpty()))): ?>
  <?php echo $config['site_name']; else: ?>
  未设置站点名称
  <?php endif; ?>管理登陆
</h1>
<div class="login" style="margin-top:50px;">
  <!--登录-->
  <div class="qlogin" id="qlogin" style="display: block; ">
    <div class="web_login">
      <form name="form2" id="regUser" accept-charset="utf-8" action="<?php echo url('Login/index'); ?>" method="post">
        <ul class="reg_form" id="reg-ul">
          <li>

            <label for="user" class="input-tips2">用户名：</label>
            <div class="inputOuter2">
              <input type="text" id="username" name="username" maxlength="20" class="inputstyle2" />
            </div>

          </li>

          <li>
			<label for="passwd" class="input-tips2">密码：</label>
            <div class="inputOuter2">
				<input type="password" id="passwd" name="password" maxlength="50" class="inputstyle2" />
            </div>

          </li>
          <!--
          <li>
            <label for="qq" class="input-tips2">验证码：</label>
            <div class="inputOuter2">
              <input type="text" id="code" name="code" maxlength="5" class="inputstyle3" />
              <div class="inputstyle4"><IMG onclick="this.src=this.src+'?'+Math.random()" src="<?php echo url('Login/verify'); ?>" width="110px" height="34 px" ></div>
            </div>

          </li>
          -->
         <!--  <li>
            <label for="qq" class="input-tips2"></label>
            <div class="inputOuter2">
				<input type="checkbox" />记住我
            </div>

          </li> -->
          <li>
            <div class="inputArea">
				<input type="submit" id="reg" style="margin-top:10px;margin-left:85px;" class="button_blue" value="立即登录" />
            </div>

          </li>
          <div class="cl"></div>
        </ul>
      </form>

    </div>

  </div>
  <!--登录end-->
</div>
<div class="jianyi">
  <p>
    版权所有
    <a href="#">
      <?php if(!(empty($config['site_name']) || (($config['site_name'] instanceof \think\Collection || $config['site_name'] instanceof \think\Paginator ) && $config['site_name']->isEmpty()))): ?>
      <?php echo $config['site_name']; else: ?>
      未设置站点名称
      <?php endif; ?>
    </a>
  </p>
</div>
</body>
</html>