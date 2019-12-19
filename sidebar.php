<?php //get_sidebar(); ?>
<div class='lateral'>
		<div class='top'></div>
		<div class='middle'>
			<?php
				$args=array('order' => 'DESC',"numberposts"=>6,'orderby'=>'post_date');
				$posts = get_posts($args);
				if($posts){
					echo "<h2 class='blue'>Posts Recientes:</h2><ul class='recientes'>";
					foreach($posts as $post){ 
						$puntos = strlen($post->post_title)>35?"...":"";
					?>
						<li>
							<a class='white' href='/<?php echo $post->post_name ?>'>

							<img alt='icon' src='<?php bloginfo('template_directory')?>/img/home/circle_over.png' />
							<?php 	
								$thumb = false;
								$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent='.get_the_ID());
								if (!empty($images)){
									foreach ( $images as $attachment_id => $attachment ) {

										echo wp_get_attachment_image($attachment_id);
										$thumb = true;
										break;
									}
								}
								if(!$thumb)
									echo "<img alt='logo' src='",bloginfo('template_directory'),"/img/logo_spl.png' />";
								?>
								

									<div><?php echo substr($post->post_title,0,55). $puntos ?>
									</div>
							</a><!--<div class="separator"></div>-->
						</li>
					<?php
					}
					echo '</ul>';
				}
			?>


<h2 class='blue archivos'>Categorias:</h2>
	 <?php echo"<ul>"; wp_list_categories('title_li=0'); echo"</ul>"; ?> 

	
 



			<h2 class='blue archivos'>Archivo:</h2>
			<?php 
	 //get_filePrices();
	add_filter( 'getarchives_where','takien_archive_where',10,2);
	$args = array(
		'type'  => 'yearly',
		'format'=> 'custom',
		'after' => '#',
		'before'=> '',
		'echo'  => 0
	);
	$years = wp_get_archives($args);
	$years = explode('#',$years);
	echo '<ul>';
	foreach($years as $year){
		if(strlen($year)>10){
			$year = explode('>',$year);
			$year = $year[1];
			$year = explode('<',$year);
			$year = $year[0];
			$args = array(
				'type'  => 'monthly',
				'format'=> 'custom',
				'after' => '<div class="background"></div>
				<div class="shadow"></div>
				<div class="division"></div></li>',
				'before'=> '<li> <a>></a>',
				'echo'  => 0,
				'year'  => $year
			);
			echo "<li> <a href='" . site_url('/' . $year . '/', 'http') . "'>>" . $year . '</a>';
			echo '<div class="background"></div>
				<div class="shadow"></div>
				<div class="division"></div>
				<div class="arrow close"></div>';
			echo '<ul>' . wp_get_archives($args) . '</ul>';
			echo '</li>';
		}
	}
	echo '<ul>';
	?>
	<div class='clear'></div>
		</div>
		<div class='bottom'></div>
		<div class='top'></div>
		<div class='middle'>
			<div class='title white'>
				<h1>Facebook</h1>
				<a>S&iacute;guenos a trav&eacute;s de facebook</a>
			</div>
			<!--<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FSpaceshiplabs%2F235948669775586&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowTransparency="true"></iframe>-->
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2Fspaceshiplabs%2F412945705366&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowTransparency="true"></iframe>
		</div>
		<div class='bottom'></div>
	</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
