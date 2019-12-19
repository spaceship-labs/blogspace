<?php
/*
Template Name: clientes
*/
?>
<?php get_header(); ?>
<div class='container'>
	<div class='clientes content'>
		<h1 class='blue'>Clientes</h1>
		<p>Algunas de las empresas que confian en el trabajo de Spaceship Labs.</p>
		<div class='gallery_clientes'>
				<a href='#' class='arrow left ready'><div class='hover'></div><div class='hover1'></div></a>
				<a href='#' class='arrow right ready'><div class='hover'></div><div class='hover1'></div></a>
				
				<div class='arrow_support left'></div>
				<div class='arrow_support right'></div>
			<div class='screen'><div class='reel'>
				<div class='page on'><div class='row'>
					<?php
						$first = "first";
						$page = 1;
						$items_number = 8;
						$row = 1;
						for($i=1;$i<=$items_number;$i++){
								echo '<div class="wrap_image">';
								echo '<div class="image">
										<a class="image1">' . '<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />' . '</a>
										<a class="image2 hover1">' . '<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />' . '</a>
									  </div>';
								echo '</div>';//cerramos wrap
								
								$close_page = ($row%16 == 0)?"</div><div class='page'>":"";
								$close_row = ($row%4 == 0)?"</div>$close_page<div class='row'>":"";
								$close_row = ($row==$items_number)?"":$close_row;
								echo $close_row;
						
								$row++;
								
								/*echo '<div class="wrap_image">';
								echo '<div class="image">
										<a class="image1">' . '<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />' . '</a>
										<a class="image2 hover1">' . '<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />' . '</a>
									  </div>';
								echo '</div>';//cerramos wrap
								
								$close_page = ($row%16 == 0)?"</div><div class='page'>":"";
								$close_row = ($row%4 == 0)?"</div>$close_page<div class='row'>":"";
								$close_row = ($row==$items_number)?"":$close_row;
								echo $close_row;
						
								$row++;
								
								echo '<div class="wrap_image">';
								echo '<div class="image">
										<a class="image1">' . '<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />' . '</a>
										<a class="image2 hover1">' . '<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />' . '</a>
									  </div>';
								echo '</div>';//cerramos wrap
								
								$close_page = ($row%16 == 0)?"</div><div class='page'>":"";
								$close_row = ($row%4 == 0)?"</div>$close_page<div class='row'>":"";
								$close_row = ($row==$items_number)?"":$close_row;
								echo $close_row;
						
								$row++;*/
						}
					?> 
				</div></div>
			</div></div>
			<?php //aqui vamos a imprimir la paginación de la galería!!! 
				$pages = ceil(($items_number) / 16);?>
				<div class='menu_gallery'><div class='contenido' style='width:<?php echo $pages*25; ?>px'>
					<?php //aqui vamos a imprimir la paginación de la galería!!! 
						$on = 'on';
						for($i=0;$i<$pages;$i++){ ?>
							<div class="item <?php echo $on ?> ready"><a href="#" class="<?php echo $on ?> light_efect">
								<span class="aux"></span>
								<span class="hover h"></span>
								<span class="hover1 h"></span>
								<span class="hover2 h"></span>
							</a></div>
						<?php $on = '';}
					?>
				</div></div> <!--Termina el menú-->
		</div>
		<div class='clear'></div>
	</div>
</div>
<?php include('container_small.php') ?>

<?php get_footer(); ?>