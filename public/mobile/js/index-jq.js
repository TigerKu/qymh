$(document).ready(function() {
	//点击菜单出来菜单列表

	var counter = 1;
	$('.tb_right').bind("click", function() {

		counter++ % 2 ?
			(function() {
				event.stopPropagation();
				$(".caidan").show();
				$(".caidan").animate({
					width: '100%',
					height: "100%"
				});
				$("#caidan1").css({
					"transform": "rotate(90deg)"
				});

			}()) :
			(function() {
				$(".caidan").click(function() {
					$(".caidan").animate({
						width: '0%',
						height: "0%"
					});
					$("#caidan1").css({
						"transform": "rotate(180deg)"
					});
				}());

			});
	});

	//点击菜单列表的子元素时  禁止触发隐藏事件
	$(".caidan ul li").click(function(event) {
		event.stopPropagation();
	});

	$("body").click(function() {
		counter = 1;
		$(".caidan").animate({
			width: '0%',
			height: "0%"
		});

		$("#caidan1").css({
			"transform": "rotate(180deg)"
		});
	});
});
//avout轮播
var swiper = new Swiper('.swiper-container', {
	slidesPerView: 5,
	spaceBetween: 50,
	// init: false,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	breakpoints: {
		1024: {
			slidesPerView: 4,
			spaceBetween: 40,
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 30,
		},
		640: {
			slidesPerView: 2,
			spaceBetween: 20,
		},
		320: {
			slidesPerView: 1,
			spaceBetween: 10,
		}
	}
});