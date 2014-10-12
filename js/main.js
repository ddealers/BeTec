$(document).ready(function(){
	//===== Init Skrollr =====
	var s = skrollr.init({
		smoothScrolling: true,
		mobileDeceleration: 0.004,
		constants:{
			sparkles: '0p'
		}
	});
	skrollr.menu.init(s);

	//===== Container Auto Height =====
	function updateContainer(){
		$('div.container').height($(window).height());
	}
	$(window).on('resize', updateContainer);
	updateContainer();

	//===== Calendar =====
	var index = 0;
	setCalendarDay(0);

	$(".calendar .next").on("click", function(e){
		e.preventDefault();
		prev = index;
		index++;
		if(index > 2){
			index = 0;
		}
		setCalendarDay(index);
	});
	$(".calendar .prev").on("click", function(e){
		e.preventDefault();
		prev = index;
		index--;
		if(index < 0){
			index = 2;
		}
		setCalendarDay(index);
	});

	function setCalendarDay(next){
		$(".titles p").hide();
		$(".days .day").hide();

		var n = $(".titles p").eq(next),
			nd = $(".days .day").eq(next);
		
		n.show();
		nd.show();
		
		TweenMax.from(n, 0.3, {opacity: 0, y: -10});
		TweenMax.from(nd, 0.3, {opacity: 0, y: -10});
	}

	//===== Tables =====
	var sx = 1366 / $(window).width();
	var sy = 864 / $(window).height();
	$("table.jueves").css({width: 850 * sx, height: 130 * sy});
	$("table.viernes").css({width: 1020 * sx, height: 440 * sy});
});