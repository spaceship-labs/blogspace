<?php get_header(); ?>
<div class="container blog">
	<h1 class='title blue'>Blog</h1>
	<div class="posts">
		
		<div id="fb-root"></div>
				<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=276670679108085";
							fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
		
		<?php
		while (have_posts()) : the_post();
			$post_id=($post->ID);
			$notice_id=get_the_ID();
		?> 
			<div class='post individual'>
			<?php $url = get_permalink(); ?>
				<h2 class='white'><?php the_title();?><a href="<?php the_permalink(); ?>" ></a></h2> 
				<?php 
					//obteniendo el nombre completo del usuario que ha subido el post
					
				?>
				<div class='post_info white'><a class='date white'>DATE: <?php the_time('M. jS, Y'); ?></a> | Author: <?php the_author_meta('first_name', $post->post_author) ?> <?php the_author_meta('last_name', $post->post_author) ; ?>
				
				</div>
				<div class='social'><?php //if(function_exists('fbshare_manual')) echo fbshare_manual(); ?>
				<div class='facebookShareButtom'><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a>
						<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
				</div>
				
				<div id='twitter_'>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink() ?>" data-text="<?php the_title();?>" data-lang="es">Twittear</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
				<div id='google_plus'>
				<g:plusone size="medium"></g:plusone>
					<script type="text/javascript">
						(function() {
							var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							po.src = 'https://apis.google.com/js/plusone.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						})();
					</script>
				</div></div>
				<div class="clear"></div>
			<?php
			the_content();?>
				<div class="clear"></div>
				<div class="tags white">
			<?php
					echo 'Posted in ' . get_the_category_list(',','',get_the_ID());
					echo get_the_tag_list('<a class="title"> | Tagged </a>',',','');
				echo '</div>';//cerramos tags
			echo '</div>';//cerramos el post
		endwhile;
		?>
		<div class='facebook_container'>
			
				<div class="fb-comments" data-href='<?php echo $url; ?>' data-num-posts="2" data-width="599"></div>
		</div>
	</div>

	<?php get_sidebar(); ?>
<?php get_footer(); ?>