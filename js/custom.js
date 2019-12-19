var small_gallery = {};
var gallery = {};
//var intId;
var left=false;
var right=false;
var scroll_desactive = false;
var base = 0;
var permiso_scroll = true;
//var bigimg_index;
var permiso = true;
var banner_timer;
var hover_t = true;
$(function(){
	$.fn.supersized.options = {  
		min_width		    :   1600,	//Min width allowed (in pixels)
		min_height		    :   1500,	//Min height allowed (in pixels)
		vertical_center		: 	0,
		slides : [
			{image : background_image }
		]
	};
    $('#supersized').supersized(); 
});
$(document).ready(function(){
	/*Responsive features en el load*/
	var windowSize = $(window).width();
	if(windowSize < 1090){
		unwrapGalleries();
	}

	/*Mobile menu button*/
	$('#header .boxButtons .button.iconMenu').click(function(e){
		$('#header .button.iconMenu').toggleClass('on');
		$('#header .unete').removeClass('on');
		$('#header .menuMobile').slideToggle(0,function(){
			$(this).attr('style', '').toggleClass('on');
		});
	});

	$('#header .boxButtons .button.search').click(function(e){
		$('#header .menuMobile').removeClass('on');
		$('#header .button.iconMenu').toggleClass('on');
		$('#header .unete').slideToggle(0,function(){
			$(this).attr('style', '').toggleClass('on');
		});
	});

	$('#header .nested-trigger').click(function(e){
		e.preventDefault();
		$('#header li .nested').slideToggle(0,function(){
			$(this).attr('style', '').toggleClass('on');
		});
	});

	//Contenedores para video en responsive
	$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap('<div class="video-container">');
	
	//Up arrow
	$('.up-arrow a').click(function(e){
    	e.preventDefault();
    	$('html,body').animate({ scrollTop: 0 }, 'slow');
  	});

  	/*Media queries*/
  	$(window).resize(function(){
		windowSize = $(window).width();
		if(windowSize < 1090){
			unwrapGalleries();
		}
		else{
			wrapGalleries();			
		}

	});




	/*Home item img hover*/
	$('.container.home .gallery .screen .item .satellite a img').on({
		mouseenter: function(e) {
			e.preventDefault();
			$(this).animate({scale: '1.1'}, {queue: false, duration: 900});
			//$(this).transition({ scale: 1.1 },900);
		},
		mouseleave: function(e) {
			$(this).animate({scale: '1.0'}, {queue: false, duration: 900});
			//$(this).transition({ scale: 1.0 },900);
	}});
	/*Home circle rotate*/
	rotate($('.container.home .gallery .screen .item .kristal .center .center_rotate'));
	$('.kristal .new').hover(function (e){
		permiso = false;
		$(this).find('.small_rotate').css('display','none').queue("fx", []).stop().fadeIn(900,function(){
			$(this).queue("fx", []).stop().animate({opacity:'1'},400);
			$(this).animate({rotate: '+=10deg'}, 200,function(){
				permiso = true;
				rotate($(this));
			});
		});
	},function (e) {
		e.stopPropagation();
		permiso = true;
		rotate($('.container.home .gallery .screen .item .kristal .center .center_rotate'));
		$(this).find('.small_rotate').queue("fx", []).stop().fadeOut(900,function(){
			$(this).css('opacity','1');
		});
	});
	
	/*Manejaremos el portafolio popup*/
	$('.gallery_portafolio .wrap_image .image a').on('click',function(e){
		if($(window).width() > 1090){
			e.preventDefault();
			var index = parseInt($(this).attr('href').replace('#',''));
			console.log('index: ' + index);
			$('.gallery_portafolio .big_imgs .big_img.on').removeClass('on');
			img = $('.gallery_portafolio .big_imgs .big_img').eq(index).addClass('on');
			img_b = $('.gallery_portafolio .big_imgs .big_img').eq(index-1);
			img_a = $('.gallery_portafolio .big_imgs .big_img').eq(index+1);
			console.log(img.text());
			$("#overlay").fadeIn(400,'swing',function(){
				$("#overlay").css("display","table");
				$("#overlay .cell").fadeIn(300,'swing',function(){
					contenido.find('.info').animate({bottom:'0px'},400).delay(600).animate({bottom:'-95px'},400);
				}).css('display','table-cell');
			});
			$('.gallery_portafolio .arrow,.gallery_portafolio .arrow_support').hide();
			contenido = $('#overlay .box .content');
			contenido.find('.reel').css('width','2600px').html('').append('<div class="wrap_img"><img src="' + img.find('.img').attr('name') + '" /></div>');
			//bigimg_index = 1;
			if (img_a.html() != '')
				contenido.find('.reel').append('<div class="wrap_img"><img src="' + img_a.find('.img').attr('name') + '" /></div>');
			if (img_b.html() != '')
				contenido.find('.reel').prepend('<div class="wrap_img"><img src="' + img_b.find('.img').attr('name') + '" /></div>').css('left','-855px');
			
			contenido.find('.screen').find('.info').remove();
			contenido.find('.screen').append('<div class="info"><h2>' + img.find('.title').html() + '</h2><p>' + img.find('.text').text() + '<p></div>');
		}
		
	});
	$('#overlay .box .content .frame').on({
		mouseenter: function(e) {
			e.preventDefault();
			$('#overlay .box .content .screen .info').queue("fx", []).stop().animate({bottom:'0'},400);
		},
		mouseleave: function(e) {
			$('#overlay .box .content .screen .info').queue("fx", []).stop().animate({bottom:'-95px'},400);
	}});
	$('#overlay .clickarea').click(function(e){
		$(this).parent().parent().fadeOut(400,'swing');
		$('.gallery_portafolio .arrow,.gallery_portafolio .arrow_support').show();
		$("#overlay .cell").fadeOut(200,'swing');
	});
	$('#overlay .close').click(function(e){
		e.preventDefault();
		$('#overlay').fadeOut(400,'swing');
		$('.gallery_portafolio .arrow,.gallery_portafolio .arrow_support').show();
		$("#overlay .cell").fadeOut(200,'swing');
	});
	/**Overlay arrows
		Se va a manejar diferente que las otras galerías, conforme se vayan dando clic se va a agregar y a quitar una
		img, veamos como funciona y si no se queda lento**/
	$('#overlay .arrow').on('click',function(e){
		e.preventDefault();
		if($(this).hasClass('ready')){
			$(this).removeClass('ready')
			index = $('.gallery_portafolio .big_imgs .big_img.on').index();
			total = $('.gallery_portafolio .big_imgs .big_img').length;
			
			img = $('.gallery_portafolio .big_imgs .big_img').eq(index);
			contenido = $('#overlay .box .content');
			
			if($(this).hasClass('left')){
				index = (index-1 >= 0)?index - 1:total - 1;
				img = $('.gallery_portafolio .big_imgs .big_img').eq(index);
				$('#overlay .box .content .screen .reel .wrap_img').eq(2).remove();
				
				index = (index-1 >= 0)?index - 1:total - 1;
				img2 = $('.gallery_portafolio .big_imgs .big_img').eq(index);
				contenido.find('.reel').prepend('<div class="wrap_img"><img src="' + img2.find('.img').attr('name') + '" /></div>');
				
				contenido.find('.reel').css('left','-1710px').animate({left:"-855px"},900,function(){ //.css('left','-855px')
					$('#overlay .arrow').addClass('ready');
					$('.gallery_portafolio .big_imgs .big_img.on').removeClass('on');
					img.addClass('on');
				});
				contenido.find('.screen').find('.info').remove();
				contenido.find('.screen').append('<div class="info"><h2>' + img.find('.title').text() + '</h2><p>' + img.find('.text').text() + '<p></div>');
				contenido.find('.info').animate({bottom:'0px'},400).delay(600).animate({bottom:'-95px'},400);
			}else{
				console.log('derecha');
				index = (index+1 < total)?index + 1: 0;
				console.log('index: ' + index);
				img = $('.gallery_portafolio .big_imgs .big_img').eq(index);
				contenido.find('.reel').animate({left:"-1710px"},1100,function(){
					$('#overlay .arrow').addClass('ready');
					$('#overlay .box .content .screen .reel .wrap_img').eq(0).remove();
					//nuevo agregado!!! poner la siguiente img
					index = (index+1 < total)?index + 1: 0;
					img2 = $('.gallery_portafolio .big_imgs .big_img').eq(index);
					contenido.find('.reel').append('<div class="wrap_img"><img src="' + img2.find('.img').attr('name') + '" /></div>');
					//contenido.find('.reel').css('left','0');
					contenido.find('.reel').css('left','-855px');
					$('.gallery_portafolio .big_imgs .big_img.on').removeClass('on');
					img.addClass('on');
				});
				contenido.find('.screen').find('.info').animate({bottom:'-94px'},300,function(){
					$(this).remove();
					contenido.find('.screen').append('<div class="info"><h2>' + img.find('.title').text() + '</h2><p>' + img.find('.text').text() + '<p></div>');
					contenido.find('.info').animate({bottom:'0px'},400).delay(600).animate({bottom:'-95px'},400);
				});
				
			}
		}
	});

	//aqui vamos a manejar el url en caso de que se entre a ver el portafolio (si es que hay portafolio).
	var hashes = window.location.href.split('#');
	if(hashes[1] && hashes[1]=='!portafolio'){
		permiso_scroll = false;
		index = 1;
		offset = index * 550;
		$('.tabs .division .select').queue("fx", []).stop().animate({left:offset+"px"},500);
		$('.tabs .options a.on').removeClass('on').removeClass('blue2');
		$('.tabs .options a').eq(index).addClass('on').addClass('blue2');

		$('.options-mobile li.on').removeClass('on').removeClass('blue2');
		$('.options-mobile li').eq(index).addClass('on').addClass('blue2');

		$('.container.services .content .middle .center').removeClass('on');
		$('.container.services .content .middle .center').eq(index).addClass('on');
	}

	/*moviendo arrows portafólio*/
	var timer = window.setTimeout(function () {
		move_arrows('left');
		move_arrows_overlay('left');
	}, 100);
	var timer = window.setTimeout(function () {
		move_arrows('right');
		move_arrows_overlay('right');
	}, 100);
	/*Contact form footer and contact page*/
	$('form.contact').submit(function(e) {
		e.preventDefault();
		var aux = $(this).hasClass('footer')?'.footer':'.principal';
		var aux2 = $(this).hasClass('footer')?'_footer':'';
		var name= $("form.contact"+aux+" input[name='first_name"+aux2+"']").val();
		var email = $("form.contact"+aux+" input[name='email"+aux2+"']").val();
		var content = $("form.contact"+aux+" textarea[name='contact_content"+aux2+"']").val();
		//spaceship.proyects.
		$.post("http://spaceshiplabs.com/wp-content/themes/spaceship/contact_function.php", { name: name,email: email, content: content },function(data){
			$('a.result_message').text(data).css('display','block').delay(7000).queue(function() {
				$(this).hide();
				$(this).css('display','none');
			});
			if(data == 'success' && aux=='.principal'){
				$('.nave').toggle(800,function(){
					$(this).animate({bottom:700},2000,function(){
						$(this).css({bottom:0,display:'none'});
					})
				});
			}
		});
	});
	/*Background images move with scrolling*/
	$(window).scroll(function(e){
		var x = $(this).scrollTop();
		var winH = $('html').height();
		var MAXTOP = $('#wrap').height() - 300;
		var top = 360;
		var newTop = 0;
		newTop = parseInt(x / 1.1) + top;
		diferencia = Math.abs(newTop - $('#big_rock').position().top);
		//console.log('big: ' + newTop + '/' + newTop*3.5 + '/' + diferencia);
		diferencia = diferencia<250?diferencia*2:diferencia;
		$('#big_rock').queue("fx", []).stop().animate({top:newTop + 'px'},diferencia*7.5);//1.5
		//________________________________________________________
		top = 203;
		newTop = parseInt(x / 1.5) + top;
		diferencia  = Math.abs(newTop - $('#med_rock').position().top);
		//console.log('med: ' + newTop + '/' + newTop*4.2 + '/' + diferencia);
		diferencia = diferencia<250?diferencia*2:diferencia;
		$('#med_rock').queue("fx", []).stop().animate({top:newTop + 'px'},diferencia*8.2);//1.2
		//________________________________________________________
		top = 330;
		newTop = parseInt(x / 2) + top;
		diferencia  = Math.abs(newTop - $('#spaceship').position().top);
		//console.log('space: ' + newTop + '/' + newTop*3.7 + '/' + diferencia);
		diferencia = diferencia<250?diferencia*2:diferencia;
		$('#spaceship').queue("fx", []).stop().animate({top:newTop + 'px'},diferencia*5.7);//1.7
		//________________________________________________________
		top = 740;
		newTop = parseInt(x / 1.2) + top;
		diferencia  = Math.abs(newTop - $('#sma_rock').position().top);
		//console.log('small: ' + newTop + '/' + newTop*3.7 + '/' + diferencia);
		diferencia = diferencia<250?diferencia*2:diferencia;
		$('#sma_rock').queue("fx", []).stop().animate({top:newTop + 'px'},diferencia*9.7);//1.7
		//console.log();
	});
	/*copy all galeries on screen*/
	copy_galleries();
	/*Check for empty and full input text*/
	$(".check-field").addClass("empty");
	$(".check-field").focus(function(e){
		if($(this).hasClass("empty")){
			$(this).val("").addClass("full");
		}
		if($(this).hasClass("label")){
			$(this).prev().addClass("hidden");
		}
	}).focusout(function(e){
		var val = $.trim($(this).val());
		if(val == ""){
			$(this).val($(this).attr("title"));
			$(this).addClass("empty").removeClass("full");
			if($(this).hasClass("label")){
				$(this).prev().removeClass("hidden");
			}
		}else{
			$(this).addClass("full").removeClass("empty");
		}
	});
	$(document).keydown(function(e){
		switch(e.keyCode){
		case 35: // end
			menu = $('.container.services .content .middle .menu');
			lastSeccion = $('.container.services .content .middle .center .seccion').eq($('.container.services .content .middle .center .seccion').length - 1).offset().top
			contentOffset = $('.container.services .content').offset().top;
			menu.removeClass('fixed');
			menu.css('top',( lastSeccion - contentOffset + 42 ) + 'px');
			change_menuitem(-1);
			break;
		case 36: // home
			menu = $('.container.services .content .middle .menu');
			menu.removeClass('fixed');
			menu.css('top','42px');
			change_menuitem(-1);
			$('.container.services .content .center .seccion').removeClass('passed_d').removeClass('passed_u');
			break;
		}
	});
	/*Menú secciones*/
	$(window).scroll(function(e){
		windowOffset = $(window).scrollTop();
		if(contentOffset = $('.container.services .content').offset() && permiso_scroll){
		contentOffset = $('.container.services .content').offset().top;
		contentHeight = $('.container.services .content').height();
		direction = (windowOffset >= base)?'down':'up';
		base = windowOffset;
		menu = $('.container.services .content .middle .menu');
		if(windowOffset >= contentOffset){
			var end = contentOffset + contentHeight - 500;
			if(windowOffset >= end){
				if(menu.hasClass('fixed')){
					menu.removeClass('fixed');
					menu.css('top',( windowOffset - contentOffset + 42 ) + 'px');
					change_menuitem(-1);
				}
			}else{
				if(!menu.hasClass('fixed'))
					menu.addClass('fixed');
			}
		}else{
			if(menu.hasClass('fixed')){
				menu.removeClass('fixed');
				menu.css('top','42px');
				change_menuitem(-1);
				menu.find('.item.on').removeClass('on');
			}
		}
		if(!scroll_desactive){
			secciones = $('.container.services .content .center .seccion');
			var x = 0;
			secciones.each(function(index){
				thisoffset = $(this).offset()
				if(direction=='down' && (windowOffset+150) > thisoffset.top && !$(this).hasClass('passed_d')){
					console.log('down ' + index);
					$('.container.services .content .center .seccion.on').removeClass('on');
					$(this).addClass('passed_d').removeClass('passed_u').addClass('on');
					change_menuitem(index);
				}else if(direction=='up' && windowOffset > (thisoffset.top-$(this).height()) && windowOffset < end && windowOffset < (thisoffset.top + $(this).height()-150) && !$(this).hasClass('passed_u')){
					$('.container.services .content .center .seccion.on').removeClass('on');
					$(this).addClass('passed_u').removeClass('passed_d').addClass('on');
					change_menuitem(index);
				}
			});
			
		}
		}
	});
	$('#content .container.services .content .middle .menu .left a.ico').on('click',function(e){
		e.preventDefault();
		if($(this).hasClass('ready')){
			$('#content .container.services .content .middle .menu .left a.ico').removeClass('ready');
			obj = $(this);
			seccion = $(this).attr('href');
			position = $(seccion).offset();
			scroll_desactive = false;
			$('html, body').animate({scrollTop : position.top + 10},1300,function(){
				scroll_desactive=false;
				$('#content .container.services .content .middle .menu .left a.ico').addClass('ready');
			});
		}
	});

	
	$('.tabs').hover(function (e){
		var select = $(this).find('.select');
		if($(this).find('.options a').size()>1){
			$('.tabs').mousemove(function(e){
				e.stopPropagation();
				if(e.clientX - $(this).offset().left - (select.width()/2) > 0 && e.clientX < ($(this).offset().left + $(this).width()) - (select.width()/2)){
					$(".tabs .options a").unbind('mouseenter mouseleave');
					offset = e.clientX - $(this).offset().left - (select.width()/2);
					//select.css('left',offset + 'px');
					duration_t = (hover_t)?500:0;
					console.log(duration_t);
					select.animate({left:offset + 'px'},{duration:duration_t,queue:false});
					console.log(e.clientX + ' / ' + offset);
				}else{
					$('.tabs .options a').hover(function (e){
						offset = $(this).index() * 550;
						if(!$(this).hasClass('on'))
							$('.tabs .division .select').animate({left:offset + 'px'},{duration:500,queue:false});
					},function (e) {});
				}
				hover_t = false;
			});
		}
	},function (e) {
		e.stopPropagation();
		offset = $('.tabs .options a.on').index() * 550;
		$('.tabs .division .select').queue("fx", []).stop().animate({left:offset+"px"},500);
		hover_t = true;
	});
	$('.tabs .options a , .options-mobile li').on('click',function(e){
		e.preventDefault();
		permiso_scroll = $(this).index()>0?false:true;
		if(!$(this).hasClass('on')){
			url = window.location.href.split('#')[0] + "#!";
			window.location.replace(url + $(this).attr('name'));
			index = $(this).index();
			$('.tabs .options a.on , .options-mobile li').removeClass('on').removeClass('blue2');
			$(this).addClass('on').addClass('blue2');
			$('.container.services .content .middle .center').removeClass('on');
			$('.container.services .content .middle .center').eq(index).addClass('on');
		}
	});
	/*Fadein and FadeOut on hover elemets*/
	$('input.hover,.submit').hover(function (e){
		//$(this).next().fadeOut('slow',function(e){$(this).css('opacity','1')});
		$(this).next().next().fadeIn('slow');
	},function (e) {
		e.stopPropagation();
		//$(this).next().queue("fx", []).stop().css('opacity','1').fadeIn('slow');
		$(this).next().next().queue("fx", []).stop().css('opacity','1').fadeOut('slow',function(e){$(this).css('opacity','1')});
	});
	/*Fadein, Fadeout and move left from light glow on gallery down*/
	$('#content .container .down_gallery .item.ready').hover(function (e){
		DG_mouseenter($(this));
	},function (e) {
		e.preventDefault();
		e.stopPropagation();
		DG_mouseleave($(this));
	});
	$('input.focus, textarea.focus').focus(function(e){
		$(this).parent().find('span.focus').fadeOut('slow',function(e){$(this).css('opacity','1')});
		$(this).parent().find('span.focus1').fadeIn('slow');
	}).focusout(function(e){
		e.stopPropagation();
		$(this).parent().find('span.focus').queue("fx", []).stop().css('opacity','1').fadeIn('slow');
		$(this).parent().find('span.focus1').queue("fx", []).stop().css('opacity','1').fadeOut('slow',function(e){$(this).css('opacity','1')});
	});
	$('.light_efect.on').find('.hover').fadeOut('slow',function(e){$(this).css('opacity','1')});
	$('.light_efect.on').find('.hover2').fadeIn('slow');
	$('.light_efect,.logo.hover,.item.hover,#footer .column.social .row,.down_gallery .arrow,.gallery_portafolio .wrap_image,.gallery_clientes .wrap_image,.gallery_portafolio .arrow,.gallery_clientes .arrow,.learn-more').hover(function (e){//#footer column.social row item.image
		if(!$(this).hasClass('on')){
			//$(this).find('.hover').queue("fx", []).stop().css('opacity','1').fadeOut('slow',function(e){$(this).css('opacity','1')});
			$(this).find('.hover1').fadeIn('slow');
			$(this).find('.light').css('opacity','1').queue("fx", []).stop().animate({left:"-66px"},100).fadeIn('fast');
		}
		if($(this).parent().hasClass('services_header')){		
			$('.services_header .screen .reel .item.on').queue("fx", []).stop().fadeOut('fast',function(){$(this).css('opacity','1')}).removeClass('on');
			$('.services_header .screen .reel .item').eq($(this).index()).css('opacity','1').queue("fx", []).stop().fadeIn('slow').addClass('on');
		}
			
	},function (e) {
		if(!$(this).hasClass('on')){
			e.stopPropagation();
			$(this).find('.hover1').queue("fx", []).stop().fadeOut('slow',function(e){$(this).css('opacity','1');});
			$(this).find('.light').queue("fx", []).stop().animate({left:"-10px"},100).fadeOut('slow',function(e){$(this).css('opacity','1')});
		}
		if($(this).parent().hasClass('services_header')){
			var index = $('.logo.hover.on').index();
			$('.services_header .screen .reel .item.on').queue("fx", []).stop().fadeOut('fast',function(){$(this).css('opacity','1')}).removeClass('on');
			$('.services_header .screen .reel .item').eq(index).css('opacity','1').queue("fx", []).stop().fadeIn('slow').addClass('on');
		}
	});
	/*Click on lateral menu to togle*/
	$('.lateral ul li a[href],.lateral ul li ul li').on('click',function(e){
		e.stopPropagation();
	});
	$('.lateral ul li').on('click',function(e){
		e.preventDefault();
		$(this).children("ul").slideToggle("fast","swing");
	});
	/*
		------------------------------------------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------------------------------------------
															Menú de la galería del home
		------------------------------------------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------------------------------------------
	*/
	banner_timer = setInterval("change_banner_home()",13000);
	$('#content .container .gallery .screen .menu .contenido .item').on('click',function(e){
		e.preventDefault();
	});
	$('#content .container .gallery .screen .menu .contenido .item.ready').on('click',function(e){
		e.preventDefault();
		if($(this).hasClass('ready') && !$(this).hasClass('on')){
			$('#content .container .gallery .screen .menu .contenido .item').removeClass('ready');
			index = $(this).index();
			change_gallery_reel_FADE(index,'#content .container .gallery .screen .reel','#content .container .gallery .screen .menu .contenido .item');
			last = $('#content .container .gallery .screen .menu .contenido .item.on');
			last.removeClass('on').children().removeClass('on');
			last.children().find('.hover2').fadeOut('slow',function(e){$(this).css('opacity','1')});
			last.children().find('.hover').fadeIn('slow');
		
			$(this).addClass('on').children().addClass('on');
			$(this).children().find('.hover1').fadeOut('slow',function(e){$(this).css('opacity','1')});
			$(this).children().find('.hover2').fadeIn('slow');
		}
	});
	$('#footer .container .column.map .row .item').on({
		mouseover: function(e) {
			if(!$(this).hasClass('ready') && !$(this).hasClass('nada')){
				$(this).addClass('ready');
				var img = $(this).find('img');
				img.animate({left:"-51px"},400);
			}
		},
		mouseout: function(e) {
			var item = $(this);
			if($(this).hasClass('ready') && !$(this).hasClass('nada')){
				var img = $(this).find('img');
				item.addClass('nada');
				img.animate({left:"0px"},300,function(e){
					item.removeClass('ready');
					item.removeClass('nada');
				});
			}
		}
	});
	$('#footer .container .column.us .row').on({
		mouseenter: function(e) {
			e.preventDefault();
			if(!$(this).hasClass('ready') && !$(this).hasClass('nada')){
				$(this).addClass('ready');
				var img = $(this).children('.item').children();
				img.animate({left:"-51px"},400);
			}
		},
		mouseleave: function(e) {
			e.preventDefault();
			var item = $(this);
			if($(this).hasClass('ready') && !$(this).hasClass('nada')){
				var img = $(this).children('.item').children();
				$(this).addClass('nada');
				img.animate({left:"0px"},300,function(e){
					item.removeClass('ready');
					item.removeClass('nada');
				});
			}
		}});
	/* ---------------------------------------------------------------------------------------------------------------------------------------
														Small gallery control
	---------------------------------------------------------------------------------------------------------------------------------------*/
	$(".container.small .down_gallery .arrow").on("click", function(e){
		e.preventDefault();
		if($(this).hasClass('ready')){
			$('.container.small .down_gallery .arrow').removeClass('ready');
			var new_index;
			if($(this).hasClass('left')){
				change_smallgallery_reel('left');
			}else{
				change_smallgallery_reel('right');
			}
			
		}
	});
	$('.menu_gallery .contenido .item a').on('click',function(e){ //2 parent para llevar a la galería
		e.preventDefault();
		var index_actual = $('.menu_gallery .contenido .item.on').index();
		var index_new = $(this).parent().index();
		console.log(index_actual + '/' + index_new);
		var direccion = (index_new > index_actual)?'right':'left';
		
		if(index_new != index_actual){
			var gal_parent = '.' + $(this).parent().parent().parent().parent().attr('class');
			$(gal_parent + ' .arrow').removeClass('ready');
			var pageL = $(gal_parent + ' .screen .reel .page').length;
			var pageOn = $(gal_parent + ' .screen .reel .page.on').index();
			var new_index;
			if(direccion == 'left'){
				new_index = (pageOn - 1 >= 0)?pageOn - 1:pageL - 1;
				if(new_index==pageL - 1){
					clone('left',$(gal_parent + ' .screen .reel'),'gallery',gallery);
					new_index = gallery.num_pages-1;
				}
				move_left(new_index,gal_parent);
			}else{
				new_index = (pageOn + 1 <= pageL - 1)?pageOn + 1:0;
				if(new_index==0){
					clone('right',$(gal_parent + ' .screen .reel'),'gallery',gallery);
					new_index = pageOn + 1;
				}
				//aqui vamos a expandir la sig pag, alinear a la derecha y luego moverlos a la izq
				move_right(new_index,gal_parent);
			}
			/*Aqui vamos a cambiar los items de las galerías (los puntitos azules)*/
			var gal_menu = $(gal_parent + ' .menu_gallery .contenido');
			
			index_aux = (new_index <  gallery.num_pages)?new_index:new_index%gallery.num_pages;
			last = gal_menu.find('.item.on');
			last.removeClass('on').children().removeClass('on');
			last.children().find('.hover2').fadeOut('slow',function(e){$(this).css('opacity','1')});
			last.children().find('.hover').fadeIn('slow');
			
			actual = gal_menu.find('.item').eq(index_aux);
			actual.addClass('on').children().addClass('on');
			actual.children().find('.hover1').fadeOut('slow',function(e){$(this).css('opacity','1')});
			actual.children().find('.hover2').fadeIn('slow');
		}

	});
	$('.container.services .middle .center .gallery_portafolio .arrow,.gallery_clientes .arrow').on('click',function(e){
		e.preventDefault();
		if($(this).hasClass('ready')){
			var gal_parent = '.' + $(this).parent().attr('class');
			$(gal_parent + ' .arrow').removeClass('ready');
			var pageL = $(gal_parent + ' .screen .reel .page').length;
			var pageOn = $(gal_parent + ' .screen .reel .page.on').index();
			var new_index;
			if($(this).hasClass('left')){
				new_index = (pageOn - 1 >= 0)?pageOn - 1:pageL - 1;
				if(new_index==pageL - 1){
					clone('left',$(gal_parent + ' .screen .reel'),'gallery',gallery);
					new_index = gallery.num_pages-1;
				}
				move_left(new_index,gal_parent);
			}else{
				new_index = (pageOn + 1 <= pageL - 1)?pageOn + 1:0;
				if(new_index==0){
					clone('right',$(gal_parent + ' .screen .reel'),'gallery',gallery);
					new_index = pageOn + 1;
				}
				//aqui vamos a expandir la sig pag, alinear a la derecha y luego moverlos a la izq
				move_right(new_index,gal_parent);
			}
			/*Aqui vamos a cambiar los items de las galerías (los puntitos azules)*/
			var gal_menu = $(gal_parent + ' .menu_gallery .contenido');
			
			index_aux = (new_index <  gallery.num_pages)?new_index:new_index%gallery.num_pages;
			last = gal_menu.find('.item.on');
			last.removeClass('on').children().removeClass('on');
			last.children().find('.hover2').fadeOut('slow',function(e){$(this).css('opacity','1')});
			last.children().find('.hover').fadeIn('slow');
			
			actual = gal_menu.find('.item').eq(index_aux);
			actual.addClass('on').children().addClass('on');
			actual.children().find('.hover1').fadeOut('slow',function(e){$(this).css('opacity','1')});
			actual.children().find('.hover2').fadeIn('slow');
		}
	});
	
});
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------Funtions-----------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
/*Clona las galerías disponibles para poder hacerlas infinitas*/
function clone(direccion,reel,gallery,array_aux){
	//alert(array_aux.num_pages_actual);
	array_aux.num_pages_actual = array_aux.num_pages_actual + array_aux.num_pages;
	width_mult = array_aux.screen_width;
	reel.css('width', (array_aux.num_pages_actual * width_mult + 940) + 'px');
	if(direccion=='left'){//prepend
		reel.prepend(array_aux.gallery);
		//ahora debemos de cambiar la posición del reel
		var offset = width_mult * array_aux.num_pages * -1;
		reel.css('left',+ offset + "px");
	}else{ //append
		reel.append(array_aux.gallery);
	}
	/*hover again*/
	$('#content .container .down_gallery .item.ready').hover(function (e){
		DG_mouseenter($(this));
	},function (e) {
		e.stopPropagation();
		DG_mouseleave($(this));
	});
	/*hover*/
	$('.gallery_portafolio .wrap_image,.gallery_clientes .wrap_image').hover(function (e){
		if(!$(this).hasClass('on')){
			$(this).find('.hover1').fadeIn('slow');
			$(this).find('.light').queue("fx", []).stop().animate({left:"-66px"},100).fadeIn('fast');
		}
	},function (e) {
		if(!$(this).hasClass('on')){
			e.stopPropagation();
			$(this).find('.hover1').queue("fx", []).stop().fadeOut('slow',function(e){$(this).css('opacity','1')});
			$(this).find('.light').queue("fx", []).stop().animate({left:"-10px"},100).fadeOut('slow',function(e){$(this).css('opacity','1')});
		}
	});
}
/*Como su nombre lo dice copia el contenido de las galerias a una variable como objeto por si es necesario más adelante
  también remueve las páginas seleccionadas para que no haya confusiones después 
  obtiene el número de páginas dentro de la galería para así determinar el ancho de screen cada vez que se clone
  */
function copy_galleries(){
	small_gallery.gallery = $('.container.small .down_gallery .screen .reel');
	small_gallery.num_pages = small_gallery.gallery.find('.page').length;
	small_gallery.num_pages_actual = small_gallery.gallery.find('.page').length;
	small_gallery.num_items = $('.container.small .down_gallery .screen .reel .item').length;
	small_gallery.actual_item = 0;
	//small_gallery.screen_width = 940;
	small_gallery.screen_width = 322;
	small_gallery.gallery.css("width", (small_gallery.screen_width*$('.container.small .down_gallery .screen .reel .item').length) +'px');

	gallery.gallery = $('.container.services .middle .center .gallery_portafolio .screen .reel,.gallery_clientes .screen .reel');
	gallery.num_pages = gallery.gallery.find('.page').length;
	gallery.num_pages_actual = gallery.gallery.find('.page').length;
	//gallery.num_items = $('.container.services .middle .center .gallery_portafolio .screen .reel .item').length;
	//gallery.actual_item = 0;
	gallery.screen_width = 914;
	gallery.gallery.css("width", (gallery.screen_width*$('.container.services .middle .center .gallery_portafolio .screen .reel .page,.gallery_clientes .screen .reel .page').length) +'px');
	
	small_gallery.gallery = (small_gallery.gallery.html()!=null)?small_gallery.gallery.html().replace('page on','page'):null;
	gallery.gallery = (gallery.gallery.html()!=null)?gallery.gallery.html().replace('page on','page'):null;
}
function change_gallery_reel(index,left,reel,screen,callback){
	var offset;
	if(left){
		$(reel + " .page.on").removeClass('on');
		$(reel + " .page").eq(index).addClass('on');
		offset = index * screen;
		$(reel).animate({left:offset+"px"},1000,function(){
			$('.arrow').addClass('ready')
		});
		
	}else{
		$(reel + " .item.on").removeClass('on');
		$(reel + " .item").eq(index).addClass('on');
		offset = index * -1070;
		$(reel).animate({left:offset+"px"},1200);
	}
}
function change_gallery_reel_FADE(index,reel,active){
		clearInterval(banner_timer);
		var current_index =  $(reel + " .item.on").index();
		//console.log('banner:' . banner_timer);
		var orientation = index > current_index?'right':'left';
		if(index==1)
			$('.item .kristal .new,.item .kristal .newCenter h2,.item .kristal .newCenter .read-more').removeClass('visible');
		else if(index==2)
			hideicons();
		else if(index==0)
			$('.item .orbit .satellite a').animate({scale: '1.1'}, {queue: false, duration: 0});
		if(orientation == 'right'){
			$(reel + " .item.on").fadeOut('slow',function(){
				$(this).removeClass('on');
			});
			$(reel + " .item").eq(index).css('left','1070px').fadeIn(2000,function(){
				$(this).addClass('on');
			});
			$('.orbita').fadeOut(400);
			flag = true;
			$(reel).animate({left:'-1070px'},
			{
			duration: 1700,
			step: function(now, fx){
				if(now < -400 && index==2 && flag){
					movehomeLogs(active);
					flag = false;
				}
			},
			complete: function(){
				$(reel + " .item").eq(index).css('left','0');
				$(reel).css('left','0');
				if(index==1)
					newshomeMove(active);
				if(index==2)
					$('.container.home .gallery .screen .reel .item').eq(2).find('.contenido').children('a').animate({bottom:'0'},600,function(){});
				//------------------------------------------------------------------------------------------------------------------------------------
				//banner_timer = setInterval("change_banner_home()",13000);
			}});
		}else{
			$(reel).css('left','-1070px');
			$(reel + " .item.on").css('left','1070px').fadeOut('slow',function(){
				$(this).removeClass('on');
			});
			$(reel + " .item").eq(index).css('left','0').fadeIn(2000,function(){
				$(this).addClass('on');
			});
			$(reel).animate({left:'0'},1700,function(){
				if($(reel + " .item").eq(index).hasClass('fade_orbit'))
					$(reel + " .item.fade_orbit").find('.orbita').fadeIn(1300,function(){$(active).addClass('ready');});
				if(index==1)
					newshomeMove(active);
				if(index==0){
					$('.item .orbit .satellite a').animate({scale: '1'}, {queue: false, duration: 900,complete:function(){}});
				}
				//------------------------------------------------------------------------------------------------------------------------------------
				//banner_timer = setInterval("change_banner_home()",13000);
			});
		}
			
}
//aqui vamos a mover los iconos de home para luego moverlos nuevamente a su posición original
function hideicons(){
	var logos = $('.container.home .gallery .screen .item').find('.logo');
	logos.find('.hover1').css('display','block');
	logos.eq(0).css('right','-110px');
	logos.eq(1).css('right','-350px');
	logos.eq(2).css('right','-420px');
	logos.eq(3).css('right','-270px');
	logos.eq(4).css('right','-110px');
	logos.eq(5).css('right','-420px');
	logos.eq(6).css('right','-290px');
	logos.eq(7).css('right','-180px');
	$('.container.home .gallery .screen .reel .item').eq(2).find('.contenido').find('a').css('bottom','-90px');
}
function movehomeLogs(active){
	$('.container.home .gallery .screen .item').find('.logo').animate({right:'0'},600,function(){
		$('.container.home .gallery .screen .item .logo .hover1').queue("fx", []).stop().fadeOut('slow',function(){
			$(this).css('opacity','1');
			$(active).addClass('ready');
			//banner_timer = setInterval("change_banner_home()",13000);
		});
	});
}
//aqui vamos a hacer que parezcan las noticias
function newshomeMove(active){
	$('.item .kristal .center .newCenter h2,.item .kristal .center .newCenter .read-more').css('bottom','-60px')
	$('.item .kristal .new2').css('left','-450px');$('.item .kristal .new3').css('left','-340px');$('.item .kristal .new4').css('right','-380px');$('.item .kristal .new5').css('right','-480px');
	$('.item .kristal .new,.item .kristal .newCenter h2,.item .kristal .newCenter .read-more').addClass('visible');
	$('.item .kristal .new2,.item .kristal .new3').animate({left:'0'},700,function(){
		$(active).addClass('ready');
		//banner_timer = setInterval("change_banner_home()",13000);
	});
	$('.item .kristal .new4,.item .kristal .new5').animate({right:'10px'},700);
	$('.item .kristal .newCenter h2,.item .kristal .newCenter .read-more').animate({bottom:'0'},600);
}
function DG_mouseenter(item){
	if (!$('.container.small .down_gallery .arrow').hasClass('ready') && item.index()>0)
		offset = (item.index()-1) * 304;
	else
		offset = item.index() * 304;
	$('#content .container .down_gallery .light.glow').animate({left:offset+"px"},10).animate({top:'-145px'},40).fadeIn('slow');
	item.find('.light.content').fadeOut('slow',function(e){$(this).css('opacity','1')});
	item.find('.light.content.aux').fadeIn('slow');
	//item.find('.image1').fadeOut('slow',function(e){$(this).css('opacity','1')});
	item.find('.image2').fadeIn('slow');
}
function DG_mouseleave(item){
	item.find('.light.content').queue("fx", []).stop().css('opacity','1').fadeIn('fast');
	item.find('.light.content.aux').fadeOut('fast',function(e){$(this).css('opacity','1')});
	$('#content .container .down_gallery .light.glow').queue("fx", []).stop().fadeOut('fast',function(e){
		$(this).css({top :'-52px',opacity: '1'});
	});
	//item.find('.image1').queue("fx", []).stop().css('opacity','1').fadeIn('slow');
	item.find('.image2').queue("fx", []).stop().css('opacity','1').fadeOut('slow',function(e){$(this).css('opacity','1')});
}
function change_menuitem(index){
	if($('#content .container.services .content .middle .menu .left .item.on').index() != index){
		$('#content .container.services .content .middle .menu .left .item.on').find('.hover1').queue("fx", []).stop().css('opacity','1').fadeOut('slow',function(e){$(this).css('opacity','1')});
		$('#content .container.services .content .middle .menu .left .item.on').find('.light').queue("fx", []).stop().css('opacity','1').fadeOut('slow',function(e){$(this).css('opacity','1')});
	}
	if(index>=0){
		$('#content .container.services .content .middle .menu .left .item.on').removeClass('on');
		$('#content .container.services .content .middle .menu .left .item').eq(index).addClass('on')
		$('#content .container.services .content .middle .menu .left .item').eq(index).find('.hover1').fadeIn('slow');
		$('#content .container.services .content .middle .menu .left .item').eq(index).find('.light').css('opacity','1').queue("fx", []).stop().animate({left:"-66px"},100).fadeIn('slow');
	}
}
function move_left(index_p,gal_parent){
	var page = $(gal_parent + ' .screen .reel .page').eq(index_p);
	change_gallery_reel(index_p,true,gal_parent + ' .screen .reel',-914);
	page.find(".wrap_image").addClass('change_left');
	page.find(".wrap_image").css('left','-200px');
	var offset_aux = (gal_parent=='.gallery_portafolio')?303:225;
	page.find(".row").each(function() {
		var index_aux = (gal_parent=='.gallery_portafolio')?2:3;
			$(this).find(".wrap_image").reverse().each(function(index){
				var offset = index_aux * offset_aux;
				$(this).delay(150*index).animate({left:(offset+30)+"px"},900,function(){
					$(this).animate({left:offset+"px"},100);
				});
				index_aux = index_aux - 1;
			});
	});
}
function move_right(index_p,gal_parent){
	var page = $(gal_parent + ' .screen .reel .page').eq(index_p);
	page.css('width','1110px');
	page.find(".wrap_image").removeClass('change_left');
	page.find(".wrap_image").addClass('change');
	page.find(".wrap_image").css('left','1000px');
	change_gallery_reel(index_p,true,gal_parent + ' .screen .reel',-914);
	var offset_aux = (gal_parent=='.gallery_portafolio')?303:225;
	page.find(".row").each(function() {
			$(this).find(".wrap_image").each(function(index){
				var offset = index * offset_aux;
				$(this).delay(150*index).animate({left:(offset-30)+"px"},900,function(){
					$(this).animate({left:offset+"px"},100,function(){
						$(this).removeClass('change');
						$(this).css({left:'0px'});
					});
				});
			});
	});
	page.css('width','914px');
}
function move_arrows(w){
	var gal = $('.container.services .middle .center .gallery_portafolio').length>0?'.container.services .middle .center .gallery_portafolio':'.container .gallery_clientes';
	if(w == 'left'){
		$(gal + ' .arrow.left').animate({top:'270px'},2600,function(){
			$(gal + ' .arrow_support.left').animate({top:'289px'},2200);
			$(gal + ' .arrow.left').animate({top:'220px'},2600,function(){
				move_arrows('left');
			});
		});
		$(gal + ' .arrow_support.left').animate({top:'329px'},2200);
	}else{
		$(gal + ' .arrow.right').animate({top:'270px'},2600,function(){
			$(gal +' .arrow_support.right').animate({top:'289px'},2200);
			$(gal + ' .arrow.right').animate({top:'220px'},2600,function(){
				move_arrows('right');
			});
		});
		$(gal + ' .arrow_support.right').animate({top:'329px'},2200);
	}
}
function move_arrows_overlay(w){
	var gal = '#overlay';
	if(w == 'left'){
		$(gal + ' .arrow.left').animate({top:'270px'},2600,function(){
			$(gal + ' .arrow_support.left').animate({top:'289px'},2200);
			$(gal + ' .arrow.left').animate({top:'220px'},2600,function(){
				move_arrows_overlay('left');
			});
		});
		$(gal + ' .arrow_support.left').animate({top:'329px'},2200);
	}else{
		$(gal + ' .arrow.right').animate({top:'270px'},2600,function(){
			$(gal +' .arrow_support.right').animate({top:'289px'},2200);
			$(gal + ' .arrow.right').animate({top:'220px'},2600,function(){
				move_arrows_overlay('right');
			});
		});
		$(gal + ' .arrow_support.right').animate({top:'329px'},2200);
	}
}
jQuery.fn.reverse = [].reverse;
function rotate(circle){
//console.log('rotate' + $('.container.home .gallery .screen .item .kristal .center .center_rotate').size());
	circle.animate({rotate: '+=10deg'}, 200,function(){
		if(permiso)
			rotate(circle);
	});
}
function change_smallgallery_reel(orientation){
	var item = $('.container.small .down_gallery .screen .reel .item');
	var L = $('.container.small .down_gallery .screen .reel .item').length;
	if(L>3){
		if(orientation=='left'){
			$('.container.small .down_gallery .screen .reel').prepend($('.container.small .down_gallery .screen .reel .item:last'));
			$('.container.small .down_gallery .screen .reel').css('left','-304px');
			$('.container.small .down_gallery .screen .reel').animate({left:'0'},600,function(){
				$('.container.small .down_gallery .arrow').addClass('ready');
			});
		}else{
			$('.container.small .down_gallery .screen .reel').animate({left:'-304px'},600,function(){
				$('.container.small .down_gallery .screen .reel').append($('.container.small .down_gallery .screen .reel .item:first'));
				$('.container.small .down_gallery .screen .reel').css('left','0');
				$('.container.small .down_gallery .arrow').addClass('ready');
			});
		}
	}
}
function change_banner_home(){
		var index = $("#content .container .gallery .screen .menu .contenido .item.on").index() + 1;
		$('#content .container .gallery .screen .menu .contenido .item').removeClass('ready');
		index = index >= $("#content .container .gallery .screen .menu .contenido .item").length ? 0 : index;
		change_gallery_reel_FADE(index,'#content .container .gallery .screen .reel','#content .container .gallery .screen .menu .contenido .item');
		
		last = $('#content .container .gallery .screen .menu .contenido .item.on');
			last.removeClass('on').children().removeClass('on');
			last.children().find('.hover2').fadeOut('slow',function(e){$(this).css('opacity','1')});
			last.children().find('.hover').fadeIn('slow');
		
			$('#content .container .gallery .screen .menu .contenido .item').eq(index).addClass('on').children().addClass('on');
			$('#content .container .gallery .screen .menu .contenido .item').eq(index).children().find('.hover1').fadeOut('slow',function(e){$(this).css('opacity','1')});
			$('#content .container .gallery .screen .menu .contenido .item').eq(index).children().find('.hover2').fadeIn('slow');
}

function unwrapGalleries(){
	if($('.gallery_portafolio .row').length > 0){
		$('.wrap_image').unwrap();
	}
}

function wrapGalleries(){
	if($('.gallery_portafolio .row').length <= 0){
		console.log("exito");
	    var divs = $(".page > .wrap_image");
	    for(var i = 0; i < divs.length; i+=3) {
	      divs.slice(i, i+3).wrapAll("<div class='row'></div>");
	    }
	}
}