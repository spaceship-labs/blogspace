<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8 " />
	<link rel="icon" href="<?php bloginfo('template_directory') ?>/img/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Orienta&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script type="text/javascript">var background_image = "<?php bloginfo('template_directory') ?>/img/home/background.png" </script>
	<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" />
	
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.js' type='text/javascript'></script>
	
	
	
<script src="<?php bloginfo('template_directory') ?>/js/jquery-css-transform.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jQueryRotatee.js" type="text/javascript"></script>

	
	<script src='<?php bloginfo('template_directory') ?>/js/custom.js' type='text/javascript'></script>
	<!--<script src='<?php //bloginfo('template_directory') ?>/js/jquery.ui.js' type='text/javascript'></script>-->
	<script src='<?php bloginfo('template_directory') ?>/js/supersized.3.1.3.core.min.js' type='text/javascript'></script>
	
	
	
	
	



	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/supersized.core.css" type="text/css" media="screen" />
	
	<!--[if IE 7]>
		<link href="<?php bloginfo( 'template_directory' ); ?>/css/ie7.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
		if(get_post_type($post->ID) == 'post'){
			while (have_posts()) : the_post();
				?><title><?php the_title()?></title>
				<meta name="Description" content="<?php 
					$excerpt = get_post_meta($post->ID, 'meta', true);
					echo trim(get_the_excerpt());
					?>">
				<?php
			endwhile;
		}else{
			echo '<title>Spaceship Labs - Diseño de páginas web, aplicaciones móviles, Diseño Gráfico y Software en General</title>
				<meta name="Description" content="Tienes alguna idea innovadora, y quieres invertir en internet ? cuenta con nosotros para llevarla a cabo. Tenemos la experiencia y las herramientas para que tu proyecto sea todo un éxito." >';
		}
	?>
	 <?php wp_head(); ?> 
</head>
<body>
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
			<a href='/'><img src='<?php bloginfo('template_directory') ?>/img/logo_spl.png' alt='' class='logo'></a>
			<a class='slogan'><?php echo get_bloginfo ( 'description' ); ?> </a>
			<div class='unete'>
				<a class='phone'><?php echo get_option( 'tel','' ); ?></a>
				<div class='clear'></div>
				<form class='unete_form' action='#' method='POST'>
					<div class='light'></div>
					<input type="text" name="correo" id="correo" class="check-field unfocus" value="" title="escribe tu correo electrónico" />
					<input type="submit" alt="Unete" value='ÚNETE' class='submit' />
					<div class='Shover1'></div>
					<div class='Shover2'></div>
				</form>
			</div>
			<div class='clear'></div>
			<div class='menu'><div class='menu_left'></div><ul class='m'><div class='selector'><div class='left'></div><div class='center'></div><div class='right'></div></div>
				<?php 
				$array = array(5, 10, 12, 8, 16);// 14,   ---> , 20
				while ( have_posts() ){ the_post(); $id = get_the_ID();}
				$parents = get_post_ancestors( $post->ID );
				$new_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
				$new_id = get_post_type($new_id) == 'post'?8:$new_id;
				foreach ($array as $valor) {
					$parent = $valor;
					$MyWalker = new MyWalkerPage();
					$children = wp_list_pages( array('depth'=>2,"title_li"=>"","child_of"=>$parent,"echo"=>0,"sort_column"=>"menu_order",'walker'=>$MyWalker, ));
					$on = $new_id==$valor?'on':'';
					if ($children) {
						if($valor==10)
							echo "<li class='parent $on'><a>" . strtr(strtoupper(get_the_title($parent)),array('á'=>'Á','é'=>'É','í'=>'Í','ó'=>'Ó','ú'=>'Ú',)) . "</a><ul><div class='top'></div>" . $children . "<div class='bottom'></div></ul></li>";
						else
							echo "<li class='parent $on'><a href = '" . get_page_link($parent) ."'>" . strtr(strtoupper(get_the_title($parent)),array('á'=>'Á','é'=>'É','í'=>'Í','ó'=>'Ó','ú'=>'Ú',)) . "</a><ul><div class='top'></div>" . $children . "<div class='bottom'></div></ul></li>";
					}else{
						echo "<li class='single $on'><div class='left'></div><div class='right'></div><a href = '" . get_page_link($parent) ."'>" . strtr(strtoupper(get_the_title($parent)),array('á'=>'Á','é'=>'É','í'=>'Í','ó'=>'Ó','ú'=>'Ú',)) . "</a></li>";
					}
				}
				?>
		</ul><div class='menu_right'></div></div>
		</div>
	</div>
	<div id="content">
		<div id='big_rock' class='fly'></div>
		<div id='med_rock' class='fly'></div>
		<div id='sma_rock' class='fly'></div>
		<div id='spaceship' class='fly'></div>
		