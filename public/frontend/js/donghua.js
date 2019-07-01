$(document).ready(function() {
		//网站类型
		$('.kuai').hover(function() {
			$(this).addClass('hover1');
		}, function() {
			$(this).removeClass('hover1');
		});
		//案例展示
		$('.anli_kuai_top').hover(function() {
			$(this).children(".mengce").show();
		}, function() {
			$(this).children(".mengce").hide();
		});
		$('.anli_kuai_bottom').hover(function() {
			$(this).children(".mengce").show();
		}, function() {
			$(this).children(".mengce").hide();
		});
		//关于我们的“更多按钮”
		$('.gengduo').hover(function() {
			$(this).removeClass('wow bounceInUp');
			$(this).addClass('wobble animated');
		}, function() {
			$(this).removeClass('wobble animated');
		});
		//网站建设
		$('.donghua1').hover(function() {
			$(this).addClass('chanpinzhanshi');
		}, function() {
			$(this).removeClass('chanpinzhanshi');

		});
	}

)

<!--左侧-->

$(document).ready(function() {
	$(".gy_top_right_buttom_kuai").hover(function() {
		$(this).find("p").addClass("ziti2");
		$(this).find("h3").addClass("ziti2");
		$(this).stop().animate({
			left: '-20px',
		}, 400);
	});
	$(".gy_top_right_buttom_kuai").mouseleave(function() {
		$(this).find("p").removeClass("ziti2");
		$(this).find("h3").removeClass("ziti2");
		$(this).stop().animate({
			left: '0px',
			color: '#fff',
		}, 400);
	});

	$(".san1").hover(function() {
		$(this).stop().animate({
			left: '-20px',

		}, 400);
		$(this).children(".my-kefu-main").css("background", "#000000");
	});
	$("ul li").mouseleave(function() {
		$(this).stop().animate({
			left: '0px'
		}, 100);
		$(this).children(".my-kefu-main").css("background", "#5fc6ef");
	});
});

$(document).ready(function() {
	$(".my-kefu-tel").hover(function() {
		$(this).stop().animate({
			left: '-150px'
		}, 400);
		$(this).children(".my-kefu-tel-main").css("background", "#000000");
	});

	$(".my-kefu-tel").mouseleave(function() {
		$(this).stop().animate({
			left: '0px'
		}, 100);
		$(this).children(".my-kefu-tel-main").css("background", "#5fc6ef");
	});

	$(".head2 .navigation ul li a").hover(
		function() {
			$(this).siblings(".xian").show();
		},
		function() {
			$(this).siblings(".xian").hide();
		},
	)
	//	$('.head2 .navigation ul li a').hover(function() {
	//			$(this).siblings(".xian").show();
	//		}, function() {
	//			$(this).siblings(".xian").hide();
	//	});

	//客服案例
	$('.mengceng_000').hover(function() {
		$(this).stop().animate({
			opacity: 1
		}, 500);
	});

	$(".mengceng_000").mouseleave(function() {
		$(this).stop().animate({
			opacity: 0
		}, 500);
	});
});

$('.kuai:eq(0)').hover(
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_xx.png");
	},
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_xx1.png");
	}
);
$('.kuai:eq(1)').hover(
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_sy.png");
	},
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_sy1.png");
	}
);
$('.kuai:eq(2)').hover(
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_ds.png");
	},
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_ds1.png");
	}
);

$('.kuai:eq(3)').hover(
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_dq.png");
	},
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_dq1.png");
	}

);

$('.kuai:eq(4)').hover(

	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_dn.png");
	},
	function(e) {
		var choose_name_1 = $(this).find("img");
		$(choose_name_1).attr("src", "img/xf_dn1.png");
	}
);

<!--案例展示轮播js-->
//导航向下移动时
$(window).scroll(function() {
	
	//tab切换
	
	// 滚动条距离顶部的距离 大于 200px时
	if($(window).scrollTop() >= 50) {
		$(".head2").stop();
		$(".head2 .logo img").stop();
		$(".head2 .tel").stop();
		$(".head2").addClass('daohang1');
		$(".head2").removeClass('daohang2');
		$(".head2").animate({
			height: '66px',
			opacity: '0.9',
		}, 500);
		$(".head2 .logo img").animate({
			width: '66px',
			height: '66px',
			top: '0px'
		}, 500);
		$(".head2 .tel").animate({
			top: '2px',
		}, 500);

	} else if($(window).scrollTop() <= 0) {
		$(".head2").stop();
		$(".head2 .logo img").stop();
		$(".head2 .tel").stop();
		$(".head2").addClass('daohang2');
		$(".head2").removeClass('daohang1');
		$(".head2").animate({
			height: '100px',
			opacity: '1',
		}, 500);
		$(".head2 .logo img").animate({
			width: '90px',
			height: '90px',

			top: '4px',
		}, 500);
		$(".head2 .tel").animate({
			top: '19px',
		}, 500);
	}
});

//当悬浮到导航上去后

var ccc = $(".anli_kuai").length / 2;
var str = ccc + "";
if(str.indexOf(".") == -1) {
	var zhengshu = parseInt(str);

	$(".abac").eq(zhengshu - 1).css("overflow", "auto");
	$(".abac").eq(zhengshu - 1).css("float", "initial");
} else {
	var zhengshu = parseInt(str);
	$(".abac").eq(zhengshu).css("overflow", "auto");
	$(".abac").eq(zhengshu).css("float", "initial");
}