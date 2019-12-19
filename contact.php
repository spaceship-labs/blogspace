<?php
/*
Template Name: contact
*/
?>
<?php get_header(); ?>
<div class='container'>
	<div class='contact content'>
		<h1 class='blue'>Contacto</h1>
		<!--<p>Send us an intergalactic life signal... or just contact us through this simple email form and we will make sure to reply in less than 24 hours.</p>-->
		<p>Envíanos una señal de vida intergaláctica... o simplemente envíanos un email del siguiente formulario y te responderenos en menos de 24 hrs.</p>
		<form action='#' method='POST' class='contact principal'>
			<div class='column'>
				<img class='mail_big' alt='' src='<?php bloginfo('template_directory') ?>/img/contact/icon.png' />
				<a class='white'>Tiene alguna duda?</a>
				<h3 class='blue'>Envíenos <span class='white'>un mensaje</span></h3>
				<div class='clear'></div>
				<p><input class='check-field focus white' type="text" placeholder="Nombre" title="Nombre" name="first_name"/>
					<!--<span class='input focus'></span>
					<span class='input focus1'></span>-->
				</p>
				<p><input class='check-field focus white' type="text" placeholder="Email" title="Email" id="email" name="email"/>
					<!--<span class='input focus'></span>
					<span class='input focus1'></span>-->
				</p>
				<p><textarea class='check-field focus white' placeholder="Mensaje"  title="" name="contact_content"></textarea>
				<!--<span class='input focus'></span>
				<span class='input focus1'></span>-->
				</p>
				<p><input type="submit" class="submit" name="submit"  value="Enviar Email" /></p>
				<div class="clear hidden"></div>
					<!--<span class='input hover'></span>
					<span class='input hover1'></span></p>-->
				<a class='result_message'></a>
				
				<div class='nave'>
					<div class='circulo'>
						<img src='<?php bloginfo('template_directory') ?>/img/contact/nave.png' alt='nave'/>
					</div>
					<p class='blue'>MENSAJE ENVIADO</p>
				</div>
			</div>
			
				

		
			<div class='column'>
				<div class='row location'>
					<img alt='' src='<?php bloginfo('template_directory') ?>/img/contact/checkpoint.png' />
					<div class='data'>
						<p>Oficinas en</p>
						<h3 class='blue'><?php echo 'Canc&uacute;n, M&eacute;xico'; ?> </h3>
					</div>
				</div>
				<div class='row email'>
					<img alt='' src='<?php bloginfo('template_directory') ?>/img/contact/mail.png' />
					<div class='data'>
						<p>Envíanos un mail</p>
						<p class='blue'><?php echo get_the_author_meta( 'user_email', 2 ) ?></p>
					</div>
				</div><div class="clear"></div>
				<div class='row phone'>
					<img alt='' src='<?php bloginfo('template_directory') ?>/img/contact/phone.png' />
					<div class='data'>
						<p>Teléfono: <?php echo get_option('tel') ?></p>
					</div>
				</div><div class="clear"></div>
				<div class='row twitter'>
					<a href='<?php echo get_option('twitter') ?>'><img alt='' src='<?php bloginfo('template_directory') ?>/img/contact/twitter.png' /></a>
					<div class='data'>
						<p>Síguenos en Twitter</p>
						<p class='blue'><a class='blue' href='<?php echo get_option('twitter') ?>'>@spaceshiplabs</a></p>
					</div>
				</div><div class="clear"></div>
				<div class='row facebook'>
					<img alt='' src='<?php bloginfo('template_directory') ?>/img/contact/fb.png' />
					<div class='data'>
						<p>Regálanos un like</p>
						<p><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FSpaceshiplabs&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=276670679108085" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px;" allowTransparency="true"></iframe></p>
					</div>
				</div><div class="clear"></div>
			</div>
		</form>
		<div class='clear'></div>
	</div>
</div>
<?php include('container_small.php') ?>

<?php get_footer(); ?>
