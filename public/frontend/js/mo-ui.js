/*tab*/
$(function(){
	$('.tab-bar li').click(function(){
		$(this).addClass("current").siblings().removeClass();
		$(".tab-panel > .tab-content").eq($(".tab-bar li").index(this)).show().siblings().hide();
	});

	$('.be_careful').hover(function(){
		$(this).next().show();
	},function(){
		$('.be_careful').next().hide();
	});

});
/*
$(document).ready(function(){
	$('input').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue',
		increaseArea: '20%' // optional
	});
});
*/
jQuery.mouifold = function(obj,obj_c,speed,obj_type,Event){
	if(obj_type == 2){
		$(obj+":first").find("b").html("-");
		$(obj_c+":first").show()}
	$(obj).bind(Event,function(){
		if($(this).next().is(":visible")){
			if(obj_type == 2){
				return false}
			else{
				$(this).next().slideUp(speed).end().removeClass("selected");
				$(this).find("b").html("+")}
		}
		else{
			if(obj_type == 3){
				$(this).next().slideDown(speed).end().addClass("selected");
				$(this).find("b").html("-")}else{
				$(obj_c).slideUp(speed);
				$(obj).removeClass("selected");
				$(obj).find("b").html("+");
				$(this).next().slideDown(speed).end().addClass("selected");
				$(this).find("b").html("-")}
		}
	})
}

/*设为首页*/
function setHome(obj){
	try{obj.style.behavior="url(#default#homepage)";obj.setHomePage(webSite)}
	catch(e){
		if(window.netscape){
			try {
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")
			}catch(e){
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入\"about:config\"并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。")
			}
			var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
			prefs.setCharPref('browser.startup.homepage',url)
		}
	}
}

/*添加收藏*/
function addFavorite(name,site){
	try{window.external.addFavorite(site,name)}
	catch(e){
		try{window.sidebar.addPanel(name,site,"")}
		catch(e){alert("加入收藏失败，请使用Ctrl+D进行添加")}
	}
}