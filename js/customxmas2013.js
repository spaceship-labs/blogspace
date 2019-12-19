var filled_areas = new Array();
var min_x = 0;
var max_x = 900;
var min_y = 0;
var max_y = 600;
var restart;
/*$(function(){
	$.fn.supersized.options = {  
		min_width		    :   1600,	//Min width allowed (in pixels)
		min_height		    :   1500,	//Min height allowed (in pixels)
		vertical_center		: 	0,
		slides : [
			{image : background_image }
		]
	};
    $('#supersized').supersized(); 
});*/
$(document).ready(function(){
	$('html').css('margin','0!important');
	for(i=0;i<30;i++){
		x = i%4;
		$('#stars').append("<div class='star star"+x+" animate-opacity animated opacity'></div>");
	}
	max_x = $(window).width();
	max_y = $(window).height() * .7;
	$('.star').removeClass('on');
	if( $(window).width() > 430 ){
		restart = setTimeout(function(){ resetstars() },500);
	}
	/*$('.cube .cube-left').load(function(){
		$(this).addClass('on');
	});
	$('.cube .cube-right').load(function(){
		$(this).addClass('on');
	});*/
	/*$('.cube .cube-center').load(function(){
		$('.cube .cube-animate').css('background-image',"url("+$(this).attr('src')+")");
		$('.cube .cube-animate').addClass('on');
	});*/
});
$( window ).resize(function() {
	if( $(window).width() > 430 ){
		max_x = $(window).width();
		max_y = $(window).height() - 70;
		clearTimeout(restart);
		$('.star').removeClass('on');
		filled_areas = new Array();
		restart = setTimeout(function(){ resetstars() },1000);
	}else{
		$('.star').removeClass('on');
	}
});
function resetstars(){
	$('.star').each(function() {
		var rand_x=0;
		var rand_y=0;
		var area;
		do {
			rand_x = Math.round(min_x + ((max_x - min_x)*(Math.random() % 1)));
			rand_y = Math.round(min_y + ((max_y - min_y)*(Math.random() % 1)));
			area = {x: rand_x, y: rand_y, width: $(this).width(), height: $(this).height()};
		} while(check_overlap(area));
		filled_areas.push(area);
		$(this).css({left:rand_x, top: rand_y});
	});
	$('.star').addClass('on');
}
function check_overlap(area) {
    for (var i = 0; i < filled_areas.length; i++) {
        check_area = filled_areas[i];
        var bottom1 = area.y + area.height;
        var bottom2 = check_area.y + check_area.height;
        var top1 = area.y;
        var top2 = check_area.y;
        var left1 = area.x;
        var left2 = check_area.x;
        var right1 = area.x + area.width;
        var right2 = check_area.x + check_area.width;
        if (bottom1 < top2 || top1 > bottom2 || right1 < left2 || left1 > right2) {
            continue;
        }
        return true;
    }
    return false;
}