<?php
/*
Template Name: servicios
*/
?>
<?php get_header(); ?>
<div class='container services'>
	<?php include('servicios_header.php'); ?>
	<div class='content'>
		<div class='top'></div>
		<div class='middle'>
		<?php
				/*Tenemos que obtener el nombre de la página para poder cargar el correcto template*/
		if ( have_posts() ) {
		while ( have_posts() ){ the_post(); 
			$title = get_query_var('name');
			$id = get_the_ID();
		?>
			<div class='tabs'>
				<div class='options <?php echo ($title!='asesoria' && $title!='marketing' && $title!='outsourcing')?'':'ocenter'; ?>'>
					<a class='on blue2' href='#' name='descripcion'>Descripci&oacute;n</a>
					<?php if($title!='asesoria' && $title!='marketing' && $title!='outsourcing'){ ?>
						<a href='#' name='portafolio'>Portafolio</a>
					<?php } ?>
				</div>
				<div class='division'>
					<div class='select <?php echo ($title!='asesoria' && $title!='marketing' && $title!='outsourcing')?'':'ocenter' ?>'></div>
				</div>
			</div>
			<div class="title_service_mobile seccion">
				<h3><a href="#" class="blue2"><?php the_title(); ?></a></h3>
				<p><?php the_content(); ?></p>
				<div class="options-mobile">
					<ul>
						<?php if($title!='asesoria' && $title!='marketing' && $title!='outsourcing'){ ?>
							<li class="on blue2" name="descripcion"><a href="#">Descripci&oacute;n</a></li>
							<li name='portafolio'><a href="#">Portafolio</a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="clear"></div>		
			</div>	
			<div class='clear'></div>
			<?php
				/*Tenemos que obtener el nombre de la página para poder cargar el correcto template*/
				//if ( have_posts() ) {
					//while ( have_posts() ){ the_post();
						if($title == 'servicios' || $title == 'diseno')
							include('servicios_default.php');
						else
							include('servicios_'.$title.'.php');
					}
				}
			?>
		</div>
		<div class='bottom'></div>
	</div>
	
</div>

<?php get_footer(); ?>