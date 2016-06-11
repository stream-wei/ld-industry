$(function(){
	var timer = null;
	var num = 0;//灵魂所在
	var fnTimer = function(){
		num++;
		if(num == $('.banner ul li').length){
			num = 0;
		}
		$('.banner ul li:eq('+num+')').hide().stop().fadeIn().siblings().hide();
		$('.banner ol li:eq('+num+')').addClass('current').siblings().removeClass('current');
	}
	$('.banner ul li:first').show();
	$('.banner ol li').mouseover(function(e) {
		$(this).addClass('current').siblings().removeClass('current');
		var thisIndex = $(this).index();
		$('.banner ul li:eq('+thisIndex+')').hide().stop().fadeIn().siblings().hide();
		num = thisIndex;
	})
	timer = setInterval(fnTimer,3000);
	$('.banner').mouseover(function(e) {
		clearInterval(timer);
	}).mouseout(function(e) {
		clearInterval(timer);
		timer = setInterval(fnTimer,3000);
	});
})