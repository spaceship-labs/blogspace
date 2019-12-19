<div class='container home'>
	<div class='gallery'>
		<div class='screen'>
		<div class='menu'><div class='contenido'>
			<div class='item on ready'><a class='on light_efect' href='#'><span class='aux'></span><span class='hover h'></span><span class='hover1 h'></span><span class='hover2 h'></span></a></div>
			<div class='item ready'><a class='light_efect' href='#'><span class='aux'></span><span class='hover h'></span><span class='hover1 h'></span><span class='hover2 h'></span></a></div>
			<div class='item ready'><a class='light_efect' href='#'><span class='aux'></span><span class='hover h'></span><span class='hover1 h'></span><span class='hover2 h'></span></a></div>
		</div></div>
		<div class='reel'>
			<div class='item on fade_orbit'>
				<div class="column orbit">
					<script type='text/javascript'>
					$(document).ready(function(){
						$('.orbita').hide().fadeIn(1300);
					});
					</script>
					<div class='orbita'></div>
					<div class='satellite'><a href='/servicios/diseno/'><img alt="" src=" <?php echo get_bloginfo('template_directory')?>/img/home/print.png" /></a></div>
					<div class='satellite'><a href='/servicios/diseno/'><img alt="" src=" <?php echo get_bloginfo('template_directory')?>/img/home/IMAC.png" /></a></div>
					<br/><div class="contenido"><a class="text"><span>Spaceship Labs</span>, dise&ntilde;o de paginas web, aplicaciones m&oacute;viles, dise&ntilde;o gr&aacute;fico y software en general.</a></div>
					<div class='satellite'><a href='/servicios/software/'><img alt="" src=" <?php echo get_bloginfo('template_directory')?>/img/home/iphone.png" /></a></div>
					<div class='satellite'><a href='/servicios/software/'><img alt="" src=" <?php echo get_bloginfo('template_directory')?>/img/home/ipad.png" /></a></div>
				</div>
			</div>
			<div class='item'>
				<div class='kristal'>
					<?php 
						$args=array("numberposts"=>1,'orderby'=>'post_date','tag'=>'home' );
						$posts = get_posts($args);
						$p = false;
						$i = 1;
						if($posts){
							$p = true;
							$i++;
							foreach($posts as $post){
								$ID_exclude = $post->ID;
								echo '<div class="center">';
									echo '<div class="center_rotate"></div>';
									echo '<h4 class="blue2">LOADING_</h4><h3>SpaceshipLabsNews</h3>';
									echo '<div class="newCenter">';
										//$puntos = strlen($post->post_title)>35?"...":"";
										//$title = substr($post->post_title,0,35) . $puntos;
										$title = $post->post_title.'';
										echo '<h2> <a href="'.get_permalink($post->ID).'"> 1. ' .$title  . '</a></h2>';
										echo '<a class="read-more" href="'.get_permalink($post->ID).'">...Seguir leyendo</a>';
									echo '</div>';//newCenter end
								echo '</div>';
							}
						}
						$num_posts = $p?4:5;
						$args=array("numberposts"=>$num_posts,'orderby'=>'post_date','exclude'=>$ID_exclude);
						$posts = get_posts($args);
						if($posts){
							foreach($posts as $post){
								echo $p?'<div class="new new'.$i.'">':'<div class="center">';
									echo $p?'<div class="small_rotate"></div>':'<div class="center_rotate"></div>';
									echo $p?'':'<h4 class="blue2">LOADING_</h4><h3>SpaceshipLabsNews</h3>';
									if($p && ($i==2 || $i==5)){
										$puntos = strlen($post->post_title)>50?"...":"";
										$title = substr($post->post_title,0,50) . $puntos;
									}else{
										$puntos = strlen($post->post_title)>27?"...":"";
										$title = substr($post->post_title,0,27) . $puntos;
									}
									echo '<div class="newCenter">';
										echo '<h2> <a href="'.get_permalink($post->ID).'"> '. $i .'. ' .$title  . '</a></h2>';
										echo '<a class="read-more" href="'.get_permalink($post->ID).'">...Seguir leyendo</a>';
									echo '</div>';
								echo '</div>';
								$i++;
								$p=true;
							}
						}
					?>
				</div>
			</div>
			<?php //aquí vamos a imprimir la galería principal que por ahora estará repetida por falta de contenido :(
				$on = '';
				for($a=0;$a<1;$a++){
					?><div class='item <?php echo $on ?> '><?php
						//column left
						echo '<div class="column left">';
							for($i=1;$i<=4;$i++){
								echo '<div class="logo"><a class="light_efect" href="#"><span class="hover">
										<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />
									 </span><span class="hover1">
										<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />
									 </span></a></div>';
							}
						echo '</div>';//column end
						//column center
						echo '<div class="column center">';
							echo '<br/><div class="contenido"><a href="/clientes/" class="text"><span>Empresas</span> que confian en nosotros para lograr sus objetivos.</a></div>';
						echo '</div>';//column end
						//column right
						echo '<div class="column right">';
							for($i=5;$i<=8;$i++){
								echo '<div class="logo light_efect"><a class="light_efect" href="#"><span class="hover">
										<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />
									 </span><span class="hover1">
										<img alt="" src="' . get_bloginfo('template_directory') . '/img/home/logo'.$i.'_sprite.png" />
									 </span></a></div>';
							}
						echo '</div>';//column end
					?></div><?php
					$on = '';
				}
			?>
		</div></div>
	</div>
</div>
<?php include('container_small.php') ?>

