<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"/www/wwwroot/47.95.115.143/application/index/view/index/about.html";i:1557392489;s:68:"/www/wwwroot/47.95.115.143/application/index/view/common/header.html";i:1560754594;s:68:"/www/wwwroot/47.95.115.143/application/index/view/common/footer.html";i:1558603758;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/pc/css/header.css">
    <link rel="stylesheet" href="/public/pc/css/swiper.css">
    <link rel="stylesheet" href="/public/pc/css/index.css">
    <link rel="stylesheet" href="/public/pc/css/footer.css">
    <meta name="Keywords" content="<?php echo $config['keywords']; ?>" />
    <meta name="description" content="<?php echo $config['description']; ?>"> 
    <title><?php echo $config['site_title']; ?></title>
</head>
    <script type="text/javascript">
                try {
                    var urlhash = window.location.hash;
                    if(!urlhash.match("fromapp")) {
                        if((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {
                            window.location = "/index.php/mobile";
                        }
                    }
                } catch(err) {}
    </script>
<body>
    <header>
        <div class="top-msg-area">
            <div class="top-msg">
              <!-- <img src="/public/pc/img/logo.png" alt="" class="top-logo"> --> 

                <?php if(!(empty($logo) || (($logo instanceof \think\Collection || $logo instanceof \think\Paginator ) && $logo->isEmpty()))): ?>
                      <img src="<?php echo $logo['thumb']; ?>" alt="" class="top-logo">
                          <?php else: ?>
                       <img src="/public/pc/img/head-logo.png" alt="" class="top-logo">
                <?php endif; ?>

                <ul class="top-msg-list">
                    <li>
                        <img src="/public/pc/img/1.png" alt="">
                        <div class="msg-con">
                            <span>服务热线电话</span>
                            <span><?php echo $re['phone']; ?></span>
                        </div>
                    </li>
                    <li>
                        <img src="/public/pc/img/2.png" alt="">
                        <div class="msg-con">
                            <span>我们的地址</span>
                            <span><?php echo $re['address']; ?></span>
                        </div>
                    </li>
                    <li>
                        <img src="/public/pc/img/3.png" alt="">
                        <div class="msg-con">
                            <span>我们的服务时间</span>
                            <span><?php echo $config['time']; ?></span>
                        </div>
                    </li>
                    <li>
                        <img src="/public/pc/img/3-1.png" alt="">
                        <div class="msg-con">
                            <span>我们邮箱</span>
                            <span><?php echo $re['email']; ?></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="top-nav">
            <ul>        
                <li><a href="/index.php">首页</a></li>
                <li><a href="<?php echo url('Index/about'); ?>">关于我们</a></li>
                <li><a href="<?php echo url('Index/lists_nav',['category_id'=>74]); ?>">解决方案</a></li>
                <li><a href="<?php echo url('Index/news',['category_id'=>7]); ?>">新闻中心</a></li>
                <li><a href="<?php echo url('Index/news',['category_id'=>8]); ?>">慈善公益</a></li>
                <li><a href="<?php echo url('Index/contact'); ?>">联系我们</a></li>
                <li><a href="<?php echo url('Index/joinus'); ?>">加入隆晟</a></li>
                <li><a href="<?php echo url('Index/staff'); ?>">员工展示</a></li>
            </ul>
        </div>
    </header>

    <section>
        <!-- <img src="/public/pc/img/9.png" alt="" class="page-img"> -->
            <img src="<?php if($d['id']==16): ?><?php echo $d['thumb']; endif; ?>" class="page-img">
        
        <div class="page">
            <div class="page-about-title">公司简介</div>
            <div class="page-about-con">
                <?php echo $nav_about['content']; ?>
            </div>
        </div>
    </section>
 
  <footer>
        <!-- <img src="/public/pc/img/footer.png" alt="" class="footer-img"> -->
        <div class="footer-dh">
            精诚专业，为您尽可能争取最大利益！我们的免费咨询热线：<span><?php echo $re['phone']; ?></span>
        </div>
        <div class="footer-area">
            <div class="footer-con">
                <div class="footer-left">
                    <img src="/public/pc/img/logo.png" alt="" class="footer-logo">
                    <!-- <a href="/index.php/index/index/apply.html" class="footer-order">在线预约</a> -->
                </div>
                <div class="footer-mid">
                    <ul>
                        <li><span>联系我们</span>/CONTACT US</li>
                        <li>联系电话 ： <?php echo $re['phone']; ?></li>
                        <li>企业邮箱 ： <?php echo $re['email']; ?></li>
                        <li>公司地址 ： <?php echo $re['address']; ?></li>
                    </ul>
                </div>
                <div class="footer-right">
                    <div class="footer-ewm">
                        <img src="<?php echo $g['thumb']; ?>" alt="">
                        <span>关注微信公众号</span>
                    </div>
                    <div class="footer-ewm">
                        <img src="<?php echo $di['thumb']; ?>" alt="">
                        <span>关注微信订阅号</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="record-msg">
            COPYRIGHT @ 2009-2011,<?php echo $config['icp']; ?>
        </div>
    </footer>
</body>

</html>

