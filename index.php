<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<div class="container blog">
	<h1 class='title blue'>Blog</h1>
	<div class="posts ListofPosts">
		<?php
		//global $wp_query;
		/*
		global $wp_query;
		$paged = get_query_var('paged')?get_query_var('paged'):get_query_var('page');
		$year = get_query_var('year')!='0'?get_query_var('year'):date('Y');
		//$wp_query->query_vars = array_merge( $wp_query->query_vars, array( 'paged' => $paged,'pagename' => '', 'year'=> $year, 'name' => '' ) );
		//$wp_query->query_vars = array_merge( $wp_query->query_vars, array( 'posts_per_page' => 10 ) );
		if(get_query_var('year')!='0')
			query_posts($wp_query->query_vars);
		else
			query_posts($wp_query);
		*/
		//query_posts($wp_query);
		wp_reset_query();
		while (have_posts()) : the_post();?> 
			<div class='post'>
				<h2 class='white'><a href="<?php the_permalink() ?>" ><?php the_title();?></a> </h2>
				<div class='post_info white'><a class='date white'>DATE: <?php the_time('M. jS, Y'); ?></a> | Author: <?php the_author_meta('first_name', $post->post_author) ?> <?php the_author_meta('last_name', $post->post_author) ; ?>
				</div>
				<div class="clear"></div>
			<?php
			
				$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent='.get_the_ID());
					if (!empty($images)){
						foreach ( $images as $attachment_id => $attachment ) {
							echo '<div class="img"><a href="'.get_permalink( get_the_ID() ).'">'.wp_get_attachment_image($attachment_id,'home_reel').'</a></div>';
							break;
						}
					}
			
				the_excerpt();
			?>
				<a href="<?php the_permalink(); ?>" class="learn-more" ><span class='text'>SEGUIR LEYENDO</span><span class='hover'></span><span class='hover1'></span><span class='focus'></span></a>
				<div class='clear'></div>
				<div class="tags white">
			<?php
					echo 'Posted in ' . get_the_category_list(',','',get_the_ID());
					echo get_the_tag_list('<a class="title"> | Tagged </a>',',','');
				echo '</div>';//cerramos tags
			echo '</div>';//cerramos el post
		endwhile;
		
		//aqui vamos a imprimir la paginacion del blog

		//posts_nav_link();
		
		$big = 999999999; // need an unlikely integer
		echo paginate_links(array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '/page/%#%/',
			'current' => max( 1, $paged ),
			'total' => $wp_query->max_num_pages,
			'prev_text' => '<',
			'next_text' => '>',
			'type' => 'list'
		));
		?>
		
	</div>

	<?php 
	include 'Mobile_Detect.php';
	global $detect;
	$detect = new Mobile_Detect();
	if(!$detect->isMobile()){
		get_sidebar(); 
	}?>
	
<?php get_footer(); ?>
