<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php bloginfo('template_directory') ?>/img/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Orienta&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'/>

	<script type="text/javascript">var background_image = "<?php bloginfo('template_directory') ?>/img/home/background.png" </script>

	<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/supersized.core.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/animate.min.css" type="text/css" media="screen" />

	
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.1.10.1.min.js' type='text/javascript'></script>
	<script src="<?php bloginfo('template_directory') ?>/js/jQueryRotatee.js" type="text/javascript"></script>
	<script src='<?php bloginfo('template_directory') ?>/js/custom.js' type='text/javascript'></script>
	<!--<script src='<?php //bloginfo('template_directory') ?>/js/jquery.ui.js' type='text/javascript'></script>-->
	<script src='<?php bloginfo('template_directory') ?>/js/supersized.3.1.3.core.min.js' type='text/javascript'></script>
	<script src="<?php bloginfo('template_directory') ?>/js/jquery.scrolling-parallax.js" type="text/javascript"></script>
	
	
	<!--[if IE 7]>
		<link href="<?php bloginfo( 'template_directory' ); ?>/css/ie7.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<?php //if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
		/*if(get_post_type($post->ID) == 'post'){
			while (have_posts()) : the_post();
				?><title><?php the_title()?></title>
				<meta name="Description" content="<?php 
					$excerpt = get_post_meta($post->ID, 'meta', true);
					echo trim(get_the_excerpt());
					?>">
				<?php
			endwhile;
		}else{*/
			echo '<title>Spaceship Labs Dev - Diseño de páginas web, aplicaciones móviles, Diseño Gráfico y Software en General</title> <meta name="Description" content="Tienes alguna idea innovadora, y quieres invertir en internet ? cuenta con nosotros para llevarla a cabo. Tenemos la experiencia y las herramientas para que tu proyecto sea todo un éxito." />';
	?>
	 <?php wp_head();?>

</head>
<body>
<div id="mobileBg"></div>
<div id="supersized"></div>
<div id='overlay'>
	<div class="cell">
		<div class='clickarea'></div>
		<div class='box'>
			<a class='close' href='#'></a>
			<div class='content'>
				<div class='screen'><div class='reel'></div></div>
				<div class='frame'></div>
				<a href='#' class='arrow left ready'><div class='hover'></div><div class='hover1'></div></a>
				<a href='#' class='arrow right ready'><div class='hover'></div><div class='hover1'></div></a>
				<div class='arrow_support left'></div>
				<div class='arrow_support right'></div>
			</div>
		</div>
	</div>
</div>
<div id="wrap"><div id="main" class="clearfix"><div id="topBackRepeat">
	<div id="header">
		<div class='container'>
			<div class="logo"><a href='/'><img src='<?php bloginfo('template_directory') ?>/img/logo_spl.png' alt=''/></a></div>
			<ul class="menu">
				<li><a href="#">SERVICIOS</a>
					<ul>
						<li><a href="/servicios/diseno">Diseño</a></li>
						<li><a href="/servicios/software">Software</a></li>
						<li><a href="/servicios/marketing">Marketing</a></li>
						<li><a href="/servicios/outsourcing">Outsourcing</a></li>
						<li><a href="/servicios/asesoria">Asesoría</a></li>
					</ul>
				</li>
				<li><a href="/clientes">CLIENTES</a></li>
				<li><a href="/blog">BLOG</a></li>
				<li><a href="/contacto">CONTACTO</a></li>

			</ul>
			<div class="boxButtons">
				<a href="#" class="button fb"></a>
				<a href="#" class="button tw"></a>
				<a href="#" class="button search"></a>
				<a href="#" class="button iconMenu">
					<span></span>
					<span></span>
					<span></span> 
				</a>
				<div class="clear"></div>
			</div>
			<div class="clear hidden"></div>
			<div class='unete animated fadeInDown'>
				<form class='unete_form' action='#' method='POST'>
					<input type="text" name="correo" id="correo" class="check-field unfocus" value="" title="Escribe tu correo electrónico" />
					<input type="submit" alt="Unete" value='ÚNETE' class='submit' />
					<div class="clear"></div>
				</form>
			</div>
			<div class="clear"></div>
			<div class="menuMobile animated fadeInDown">
				<!--<div class="blueSquare"><span></span></div><div class="clear"></div>-->
				<ul>
					<li><a href="/servicios-mobile" class="nested-trigger">Servicios</a>
						<ul class="nested animated">
							<li><a href="/servicios/diseno">Diseño</a></li>
							<li><a href="/servicios/software">Software</a></li>
							<li><a href="/servicios/marketing">Marketing</a></li>
							<li><a href="/servicios/outsourcing">Outsourcing</a></li>
							<li><a href="/servicios/asesoria">Asesoría</a></li>
						</ul>
					</li>
					<li><a href="/clientes">Clientes</a></li>
					<li><a href="/blog">Blog</a></li>
					<li><a href="/contacto">Contacto</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="content">
		<div id='big_rock' class='fly'></div>
		<div id='med_rock' class='fly'></div>
		<div id='sma_rock' class='fly'></div>
		<div id='spaceship' class='fly'></div>
