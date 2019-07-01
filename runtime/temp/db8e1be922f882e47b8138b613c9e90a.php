<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"/www/wwwroot/47.95.115.143/application/index/view/index/contact.html";i:1558603339;s:68:"/www/wwwroot/47.95.115.143/application/index/view/common/header.html";i:1560754594;s:68:"/www/wwwroot/47.95.115.143/application/index/view/common/footer.html";i:1558603758;}*/ ?>
 <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

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
        <!-- <img src="/public/pc/img/15.png" class="page-img" alt=""> -->

                <img src="<?php if($d['id']==17): ?><?php echo $d['thumb']; endif; ?>" class="page-img">

        <div class="page-solu-tit">联系我们</div>
        <div class="page page-contact">
            <div class="page-contact-left">
                <ul>
                    <li>联系电话 ： <?php echo $re['phone']; ?></li>
                    <li>企业邮箱 ： <?php echo $re['email']; ?></li>
                    <li>公司地址 ：<?php echo $re['address']; ?></li>
                </ul>
            </div>
            <div class="page-contact-right" style="width:640px;height:480px;border:#ccc solid 1px;" id="dituContent"></div>
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


<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap() {
        createMap(); //创建地图
        setMapEvent(); //设置地图事件
        addMapControl(); //向地图添加控件
        addMarker(); //向地图中添加marker
    }

    //创建地图函数：
    function createMap() {
        var map = new BMap.Map("dituContent"); //在百度地图容器中创建一个地图
        var point = new BMap.Point(121.331975, 31.24633); //定义一个中心点坐标
        map.centerAndZoom(point, 16); //设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map; //将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent() {
        map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
        map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard(); //启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl() {
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({
            anchor: BMAP_ANCHOR_TOP_LEFT,
            type: BMAP_NAVIGATION_CONTROL_LARGE
        });
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({
            anchor: BMAP_ANCHOR_BOTTOM_RIGHT,
            isOpen: 1
        });
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({
            anchor: BMAP_ANCHOR_BOTTOM_LEFT
        });
        map.addControl(ctrl_sca);
    }

    //标注点数组
    var markerArr = [{
        title: "上海隆晟",
        content: "我的备注",
        point: "121.330124|31.246391",
        isOpen: 0,
        icon: {
            w: 21,
            h: 21,
            l: 0,
            t: 0,
            x: 6,
            lb: 5
        }
    }];
    //创建marker
    function addMarker() {
        for (var i = 0; i < markerArr.length; i++) {
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0, p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point, {
                icon: iconImg
            });
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title, {
                "offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)
            });
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor: "#808080",
                color: "#333",
                cursor: "pointer"
            });

            (function () {
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click", function () {
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open", function () {
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close", function () {
                    _marker.getLabel().show();
                })
                label.addEventListener("click", function () {
                    _marker.openInfoWindow(_iw);
                })
                if (!!json.isOpen) {
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i) {
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title +
            "</b><div class='iw_poi_content'>" + json.content + "</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json) {
        var icon = new BMap.Icon("https://api.map.baidu.com/images/blank.gif", new BMap.Size(json.w, json.h), {
            imageOffset: new BMap.Size(-json.l, -json.t),
            infoWindowOffset: new BMap.Size(json.lb + 5, 1),
            offset: new BMap.Size(json.x, json.h)
        })
        return icon;
    }

    initMap(); //创建和初始化地图
</script>