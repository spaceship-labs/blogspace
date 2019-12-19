<?php
/*
Template Name: Navidad 2013
*/
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="icon" href="<?php bloginfo('template_directory') ?>/img/favicon.ico" />
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/xmas2013.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">var background_image = "<?php bloginfo('template_directory') ?>/img/navidad/fondo.jpg" </script>
	
	<title>Spaceship Labs - Diseño de páginas web, aplicaciones móviles, Diseño Gráfico y Software en General</title>
	<meta name="Description" content="Tienes alguna idea innovadora, y quieres invertir en internet ? cuenta con nosotros para llevarla a cabo. Tenemos la experiencia y las herramientas para que tu proyecto sea todo un éxito." />
	 <?php wp_head(); ?> 
</head>
<body>
<?php 
	$array = array(
		'arenas',
		'cardigan',
		'ecm',
		'endless',
		'generacion',
		'hurricane',
		'imco',
		'iyh',
		'juicebox',
		'kiwi',
		'kino',
		'laconfiteria',
		'laplayita',
		'loma',
		'mimbu',
		'mirasart',
		'mte',
		'musa',
		'tripxit',
		'ultimate',
		'vitravel',
		'warm',
		'yellow'
		);
	if( isset( $_GET['c'] ) ){
		$image = isset(  $array[trim($_GET['c'])] ) ? $_GET['c'] : '' ;
		if( in_array( $_GET['c'] , $array ) )
			$image = $_GET['c'];
		else
			header('Location: ' . get_permalink( the_id() ));
			//echo "ñalal";
			//header('Location: ' . get_permalink( the_id() ));
	}else{
		$image = 'spaceship';
	}
?>
<div id="supersized"></div>
<div id="stars"></div>
<div id="wrap"><div id="main" class="clearfix"><div id="topBackRepeat">
	<div class='lateral left'></div>
	<div class='lateral right'></div>
	<div id="content">
		<div class='container'>
			<img class='complete' alt='SpaceshipLabs' src='<?php bloginfo('template_directory') ?>/img/navidad/feliz_navidad.png' />
			<div class='cube'>
				<img class='cube-left on animated aatranslate animate-opacity' alt='Spaceshiplabs' src='<?php bloginfo('template_directory') ?>/img/navidad/cubo_izq.png' />
				<img class='cube-right on animated aatranslateup animate-opacity' alt='Spaceshiplabs' src='<?php bloginfo('template_directory') ?>/img/navidad/cubo_der.png' />
				<img class='cube-center' alt='Spaceshiplabs' src='<?php bloginfo('template_directory') ?>/img/navidad/nieve.png' />
				<div class='cube-animate on walk-cycle'>
					
				</div>
				<img  class='logocliente' alt='SpaceshipLabs' src='<?php bloginfo('template_directory') ?>/img/navidad/clientes/<?=$image?>.png' />
			</div>
			<img  class='complete' alt='SpaceshipLabs' src='<?php bloginfo('template_directory') ?>/img/navidad/gracias.png' />
			<a href='/' class='space_logo'>
				<img  class='logo' class='animate-opacity' alt='SpaceshipLabs' src='<?php bloginfo('template_directory') ?>/img/navidad/space_brillo.png' />
			</a>
		</div>
	</div>
</div></div></div>
<div id='footer' >
	<p>Moviendo al mundo através de software</p>
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.js' type='text/javascript'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/customxmas2013.js' type='text/javascript'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/supersized.3.1.3.core.min.js' type='text/javascript'></script>
	<audio autoplay loop>
		<source src="<?php bloginfo('template_directory') ?>/audio/xmas.wav" type="audio/mpeg">
		<source src="<?php bloginfo('template_directory') ?>/audio/xmas.mp3" type="audio/mpeg">
	</audio>
</div>
</body>
</html>