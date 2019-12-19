		<div class="up-arrow"><a href="#"><img src='<?php bloginfo('template_directory') ?>/img/up.png'></a></div>

	</div>
</div></div></div>
<div id="footer"><div class='gradiente left'></div><div class='gradiente rigth'></div><div class='content'><div class="container">
	<div class='column map'>
		<h3 class='title'>Mapa del Sitio</h3>
		<div class='row'>
		<?php 
		$row = 1;
		$num_files = 12;
		$last_item = "";
		$location = get_bloginfo('template_directory');
		$links = array('Home'=>'/','Diseño'=>'/servicios/diseno/','Software'=>'/servicios/software/','Marketing'=>'/servicios/marketing/','Outsourcing'=>
						'/servicios/outsourcing/','Asesoria'=>'/servicios/asesoria/','','Blog'=>'/blog/',
						'','Clientes'=>'/clientes/','Contacto'=>'/contacto/','Facebook'=>'http://www.facebook.com/Spaceshiplabs');
		$i= 1;
		foreach($links as  $title =>$link){
			$close_row = ($row%4 == 0)?"</div><div class='row'>":"";
			$last_item = ($row%4 == 0)?"last":"";
			$close_row = ($row==$num_files)?"":$close_row;
			$href = $link!=''?'href="'.$link.'"':'';
			echo '<div class="item"><a  '.$href.' title="'.$title.'"><img src="' . $location . '/img/footer/ic' . $i++ . '_sprite.png" alt="" /></a></div>';
			echo $close_row;
			$row++;
		}
		?>
		</div>
	</div>
	<div class='column us'>
		<h3 class='title'>Nosotros</h3>
			<?php 
				$array = array(2, 3, 4);
				foreach ($array as $valor) {
					echo "<div class='row'>";//<div class='item image'>
					/*if(userphoto_exists($valor))
						userphoto($valor);
					else
						echo get_avatar($valor, 50);*/
					//echo "</div>";
					echo "<div class='profile_data'>";
					echo "<p class='blue'>" . get_the_author_meta( 'title', $valor ) . '</p>';
					echo "<p>" . get_the_author_meta( 'user_email', $valor ) . '</p>';
					echo "<p>" . get_the_author_meta( 'twitter', $valor ) . '</p>';
					echo "</div></div>";
				}
			?>
	</div>
	
	<div class='column social'>
		<h3 class='title'>Síguenos</h3>
		<?php 
			error_reporting(0);
			$social[1]->s = "admin_email";$social[1]->label = "Envíanos un Mail";
			$social[2]->s = "tel";$social[2]->label = "Teléfono";
			$social[3]->s = "twitter";$social[3]->label = "Twitter";$social[3]->text = "Spaceshiplabs";
			$social[4]->s = "facebook";$social[4]->label = "Facebook";$social[4]->text = "Spaceshiplabs";
			for($i=1;$i<5;$i++){
				echo "<div class='row " . $social[$i]->s . " ' name='" . $social[$i]->s . "'><div class='item image'>";
				if($i == 3){
					$img = '<img class="hover1" src="' . $location . '/img/footer/icn' . $i . '_ft_sprite.png" alt="" /><img class="hover" src="' . $location . '/img/footer/icn' . $i . '_ft_sprite.png" alt="" />';
				}else{
					$img = '<img class="hover" src="' . $location . '/img/footer/icn' . $i . '_ft_sprite.png" alt="" /><img class="hover1" src="' . $location . '/img/footer/icn' . $i . '_ft_sprite.png" alt="" />';
				}
				if($i == 4 || $i == 3)
					echo '<a href="'. get_option ( $social[$i]->s , '') .'">' . $img . '</a>';
				else
					echo $img;
				echo "</div><div class='profile_data'>";
					if($i == 4 || $i == 3){
						echo "<p class='blue'><a class='blue' href='" . get_option ( $social[$i]->s , '') . "'>" . $social[$i]->label . '</a></p>';
						echo '<p><a href="' . get_option ( $social[$i]->s , '') . '">' . $social[$i]->text . '</a></p>';
					}else{
						echo "<p class='blue'>" . $social[$i]->label . '</p>';
						if($i==1)
							echo '<p>' . get_the_author_meta ( 'user_email' , 2) . '</p>';
						else
							echo '<p>' . get_option ( $social[$i]->s , '') . '</p>';
					}
				echo "</div>";
				echo "</div>";
			}
		?>
	</div>
	
	<div class='column big'>
		<h3 class='title'>Contáctanos</h3>
		<a href='/'><img src='<?php echo $location ?>/img/footer/spaceship_logo_footer.png' alt='' class='img_footer' /></a>
		<p class='blue'>Ubicación</p>
		<?php 
			echo '<p>' . get_option( 'address', '' ) . '</p>'
		?>
		<form action='#' method='post' class='contact footer'>
			<div class='left'>
				<p><label>Nombre:</label></p>
				<p><input class='check-field focus' type="text" value="Nombre" title="Nombre" name="first_name_footer"/>
					<span class='input focus'></span>
					<span class='input focus1'></span>
				</p>
				<p><label>Email:</label></p>
				<p><input class='check-field focus' type="text" value="Email" title="Email" name="email_footer"/>
					<span class='input focus'></span>
					<span class='input focus1'></span>
				</p>
				<a class='result_message'></a>
			</div>
			<div class='right'><p><textarea class='check-field focus' title=" " name="contact_content_footer"></textarea>
				<span class='input focus'></span>
				<span class='input focus1'></span>
				</p>
				<p> <input type="submit" class="submit" name="submit"  value="Enviar Email" />
					<span class='input hover'></span>
					<span class='input hover1'></span>
					<span class='input hover2'></span>
				</p></div>
		</form>
	</div>

	<div class="menuFooterMobile">
		<ul>
			<li><a href="https://www.facebook.com/Spaceshiplabs">Like us en Facebook</a></li>
			<li><a href="https://twitter.com/spaceshiplabs">Siguenos en Twitter</a></li>
			<li><a href="/contacto">Contáctanos</a></li>
		</ul>
	</div>
	
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-4129226-6']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	
</div></div></div>
 <?php wp_footer(); ?> 
</body>
</html>