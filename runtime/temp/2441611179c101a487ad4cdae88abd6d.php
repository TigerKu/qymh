<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"/www/wwwroot/47.95.115.143/application/index/view/index/index.html";i:1559612814;s:68:"/www/wwwroot/47.95.115.143/application/index/view/common/header.html";i:1560754594;s:68:"/www/wwwroot/47.95.115.143/application/index/view/common/footer.html";i:1558603758;}*/ ?>
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
    <div class="swiper-container" id="swiper1">
        <div class="swiper-wrapper">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): ?>
            <div class="swiper-slide">
                    <a href="/index.php/index/index/joinus.html">
                        <img src="<?php echo $vo['thumb']; ?>" class="banner-img" alt="">
                    </a>
                </div>
            <?php else: ?>
            <div class="swiper-slide"><img src="/public/pc/img/banner1.png" class="banner-img" alt=""></div>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>


    </div>
</section>
<!-- <section>
        <div class="about-us">
            <div class="about-left">
                <img src="<?php echo $abouts['document']; ?>" alt="">
            </div>
            <div class="about-right">
                <div class="about-right-tit"><span>关于我们</span>/ABOUT US</div>
                <div class="about-right-con">
                   <?php echo $abouts['content']; ?>
                </div>
                <div class="about-right-more">
                    <a href="<?php echo url('Index/about'); ?>">查看更多</a>
                </div>
            </div>
        </div>
    </section> -->

<section>
    <div class="index-wrap">
        <h2 class="index-title-h2">人力资源外包服务专家</h2>
        <h4 class="index-title-h4">上海隆晟专注于人力资源外包领域，是中国知名的人力资源外包服务机构。</h4>
        <div class="index-data-img">

            <div class="data data1">
                <span>1,500+</span>
            </div>
            <div class="data data2">
                <span>30,000+</span>
            </div>
            <div class="data data3">
                <span>23,000+</span>
            </div>
            <div class="data data4">
                <span>5,000+</span>
            </div>

        </div>
    </div>
</section>


<style>
    .index-wrap {
        width: 1200px;
        margin: 0 auto 70px;
    }

    .index-title-h2 {
        font-size: 30px;
        color: #333;
        padding-top: 70px;
        font-weight: bold;
        text-align: center;
    }

    .index-title-h4 {
        font-size: 16px;
        color: #333;
        text-align: center;
        padding-top: 15px;
        font-weight: bold;
    }

    .index-data-img {
        position: relative;
        width: 100%;
        height: 135px;
        background: url(/public/pc/img/index-data-img.jpg) 117px bottom no-repeat;
    }

    .index-data-img .data {
        position: relative;
        width: 244px;
        height: 80px;
        float: left;
        overflow: hidden;
    }

    .index-data-img .data1 {
        margin-left: 117px;
    }

    .index-data-img .data2 {
        margin-left: 6px;
    }

    .index-data-img .data3 {
        margin-left: 40px;
    }

    .index-data-img .data4 {
        margin-left: 12px;
    }

    .data span {
        position: absolute;
        left: 0;
        bottom: 0;
        display: inline-block;
        width: 100%;
        height: 80px;
        line-height: 100px;
        letter-spacing: -4px;
        font-weight: bold;
        /* background-position: left bottom; */
        /* background-repeat: no-repeat; */
        font-size: 52px;
        color: #D72D40;
    }
</style>
<section class="weserver-bg">
    <div class="weserver">
        <div class="weserver-tit">
            <span>我们的服务领域</span>
            <span>为企业量身定制"多元化"，综合性解决方案，提供全方位或个性化服务</span>
        </div>
        <div class="myswiper">
            <div class="swiper-container" id="swiper2">
               
                <div class="swiper-wrapper">
                     <?php if(count($server)/4>0): ?>
                        <div class="swiper-slide">
                            <ul class="server-ul">
                                <?php if(is_array($server) || $server instanceof \think\Collection || $server instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($server) ? array_slice($server,0,4, true) : $server->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ser): $mod = ($i % 2 );++$i;?>
                                    <li class="server-item">
                                        <a href="/index.php/index/index/lists_nav/category_id/<?php echo $ser['category_id']; ?>">
                                            <img src="<?php echo $ser['document']; ?>" alt="" class="server-item-img">
                                            <div class="server-item-tit"><?php echo $ser['title']; ?></div>
                                            <div class="server-item-con"><?php echo $ser['profile']; ?></div>
                                        </a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                     <?php endif; if(count($server)/4>1): ?>
                        <div class="swiper-slide">
                            <ul class="server-ul">
                                <?php if(is_array($server) || $server instanceof \think\Collection || $server instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($server) ? array_slice($server,4,4, true) : $server->slice(4,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ser): $mod = ($i % 2 );++$i;?>
                                    <li class="server-item">
                                        <a href="/index.php/index/index/lists_nav/category_id/<?php echo $ser['category_id']; ?>">
                                            <img src="<?php echo $ser['document']; ?>" alt="" class="server-item-img">
                                            <div class="server-item-tit"><?php echo $ser['title']; ?></div>
                                            <div class="server-item-con"><?php echo $ser['profile']; ?></div>
                                        </a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                     <?php endif; if(count($server)/4>2): ?>
                        <div class="swiper-slide">
                            <ul class="server-ul">
                                <?php if(is_array($server) || $server instanceof \think\Collection || $server instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($server) ? array_slice($server,8,4, true) : $server->slice(8,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ser): $mod = ($i % 2 );++$i;?>
                                    <li class="server-item">
                                        <a href="/index.php/index/index/lists_nav/category_id/<?php echo $ser['category_id']; ?>">
                                            <img src="<?php echo $ser['document']; ?>" alt="" class="server-item-img">
                                            <div class="server-item-tit"><?php echo $ser['title']; ?></div>
                                            <div class="server-item-con"><?php echo $ser['profile']; ?></div>
                                        </a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                     <?php endif; ?>






                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="server-more">
            <a href="/index.php/index/index/lists_nav/category_id/74.html">查看更多</a>
        </div>
    </div>
</section>
<section>
    <div class="news-cneter">
        <div class="news-tit">
            <div class="news-tit-con">
                <span>新闻中心</span>
                <span>NEWS CENTER</span>
            </div>
            <div class="news-subhead">分享创造价值，记录企业发展脚步</div>
        </div>
        <div class="news-con">
            <ul>

                <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ne): $mod = ($i % 2 );++$i;?>
                <li class="news-mod">
                    <a href="<?php echo url('index/detail_nav',['nav_id'=>$ne['nav_id']]); ?>">
                        <img src="<?php echo $ne['document']; ?>" alt="" class="news-img">
                        <div class="news-name"><?php echo $ne['title']; ?></div>
                        <div class="news-time"><?php echo date(('Y-m-d'),$ne['inputtime']); ?></div>
                        <div class="news-msg"><?php echo $ne['profile']; ?></div>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class='news-more'>
            <a href="<?php echo url('Index/news'); ?>">查看更多</a>
        </div>
    </div>
</section>
<section class="case-bg">
    <div class="case">
        <div class="news-tit">
            <div class="news-tit-con">
                <span>外包案例</span>
                <span>OUTSOURCING CASE</span>
            </div>
            <div class="news-subhead" style="color:#fff;">用户的利益高于一切，携手隆晟、共创辉煌</div>
        </div>
        <div class="case-con">
            <ul>
                <?php if(is_array($doc) || $doc instanceof \think\Collection || $doc instanceof \think\Paginator): $i = 0; $__LIST__ = $doc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
                        <li class="case-mod">
                            <a href="<?php echo url('index/detail_nav',['nav_id'=>$d['nav_id']]); ?>">
                                <img src="<?php echo $d['document']; ?>" alt="" class="case-img">
                                <!-- <div class="case-name"><?php echo $d['title']; ?></div>
                                <div class="case-msg"><?php echo $d['profile']; ?></div> -->
                            </a>
                        </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="customer">
        <div class="news-tit">
            <div class="news-tit-con">
                <span>我们的客户</span>
                <span>OUR CUSTOMERS</span>
            </div>
            <div class="news-subhead">全心全力服务好我们的每一个客户，选择隆晟，享受高品质服务。</div>
        </div>
        <div class="customer-con">
            <ul>

                <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?>
                <li class="customer-mod">
                    <a href="<?php echo $li['link_url']; ?>">
                        <img src="<?php echo $li['thumb']; ?>" alt="" class="customer-img">
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
    </div>
</section>
<link rel="stylesheet" href="/public/pc/css/lanren.css">
<link rel="stylesheet" href="/public/pc/css/animate.css">
<div id="floatDivBoxs">
    <div class="floatShadow">
        <div style="border: 1px solid #333;">
            <div class="floatDtt">
                <span style="font-size: 12px;">在线服务热线</span>
                <p style="font-size: 18px;"><?php echo $re['phone']; ?></p>
            </div>
            <ul class="floatDqq">
                
                <?php if(is_array($qq) || $qq instanceof \think\Collection || $qq instanceof \think\Paginator): $i = 0; $__LIST__ = $qq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$q): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a target="_blank" href="tencent://message/?uin=<?php echo $q['QQ']; ?>&Site=sc.chinaz.com&Menu=yes">
                            <img src="/public/pc/img/qq.png" align="absmiddle">
                            <span class="contact-title" style="display: block;"><?php echo $q['facsimile']; ?><em><?php echo $q['mobile']; ?></em></span>
                            <span class="contact-mobile" style="display: none;">联系电话：<em><?php echo $q['phone']; ?></em></span>
                        </a>
                    </li>
               <?php endforeach; endif; else: echo "" ;endif; ?>


            </ul>
        </div>

        <dl id="toTop" class="toTop">
            <dd>返回顶部</dd>
        </dl>
    </div>
</div>

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

<script src="/public/pc/js/swiper.js"></script>
<script src="/public/pc/js/jquery.js"></script>
<script>
    var mySwiper = new Swiper('#swiper1', {
        direction: 'horizontal', // 垂直切换选项
        loop: true, // 循环模式选项
        // 如果需要分页器
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
        },
    })
    var mySwiper2 = new Swiper('#swiper2', {
        direction: 'horizontal', // 垂直切换选项
        loop: true, // 循环模式选项
        autoplay: {
            delay: 3000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
    // 关于我们文本溢出隐藏
    if (document.querySelector('.about-right-con>p').offsetHeight > document.querySelector('.about-right-con')
        .offsetHeight) {
        document.querySelector('.about-right-con').className += ' mytextover'
    }
</script>
<script type="text/javascript">
    $("#toTop").click(function() {
        // console.log(111)
        $('body,html').animate({
            scrollTop: 0
        },
        1000);
        return false;
    });
    $('.floatDqq>li').hover(function () {
        $(this).find('.contact-mobile').css('display', 'block');
        $(this).find('.contact-title').css('display', 'none');
        $(this).find('img').addClass('animated');
        $(this).find('img').addClass('swing');
    }, function () {
        $(this).find('.contact-mobile').css('display', 'none');
        $(this).find('.contact-title').css('display', 'block');
        $(this).find('img').removeClass('swing');
    })
</script>