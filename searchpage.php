<?php
/*
Template Name: Search page
*/
?>
<?php get_header(); ?>
<div class="container body news">
<div class='clear'></div>
	<div class="posts">
		<h3>You are here: Home >> Fashion >> News</h3>
		<?php if ( have_posts() ) { 
			while ( have_posts() ){ the_post(); ?>
			<a href='<?php echo get_permalink(); ?>'><h2><?php the_title();?></h2></a>
			<div class='post_info'><div class='date'><?php the_time('M j'); ?></div> Publicado por <?php echo get_the_author_link(); ?></div>
			<div class="clear"></div>
			<div class='division'></div>
			<div class="clear"></div>
			<?php the_excerpt() ; ?>
			<div class="clear"></div>
			<?php post_get_image(0) ?>
			<div class="dot_line"></div>
			<div class="clear"></div>
		<?php }
			}
			else{
				echo "No posts were found";
			} ?>
	</div>
	<div class='lateral'>
		<div class='subscription'>
			<form action='#' method='post' accept-charset='utf-8' enctype="multipart/form-data">
				<h3><span class='icon1'></span>Monthly Updates<span class='icon_info'></span></h3>
				<p><input type="text" value="First Name" title="First Name" id="first_name" name="first_name"/></p>
				<p><input type="text" value="Last Name" title="Last Name" id="last_name" name="last_name"/></p>
				<p><input type="text" value="Email Address" title="Email Address" id="email" name="email"/></p>
				<p><input type="submit" class="submit" name="submit" id="submit" value="" /></p>
			</form>
		</div>
		<div class='clear'></div>
		<div class='line'></div>
		<div class='clear'></div>
		<?php wp_list_categories(array("title_li" => "", "hide_empty" => false)); ?>
	</div>
<div class='clear'></div>
</div>	
<?php get_footer(); ?>