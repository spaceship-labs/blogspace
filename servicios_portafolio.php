<?php
	$imgs = get_img_object($id);
	if($imgs){
		?>  <div class='gallery_portafolio'>
				<div class='big_imgs' style='display:none;'>
					<?php
					$c = 0;
					foreach($imgs as $img){
						if($c>0){
							$title = strtr($title,array('..' => '.</a><a>')) . $puntos;
							echo '<div class="big_img">
								<a class="img" name="' . wp_get_attachment_url($img->ID) . '"></a>
								<p class="title"><a class="blue2">' . strtr($img->post_title,array('..' => '.</a><a>')) . '</a></p>
								<a class="text">' . $img->post_content . '</a></div>';
						}
						$c++;
					}
					?>
				</div>
				<a href='#' class='arrow left ready'><div class='hover'></div><div class='hover1'></div></a>
				<a href='#' class='arrow right ready'><div class='hover'></div><div class='hover1'></div></a>
				
				<div class='arrow_support left'></div>
				<div class='arrow_support right'></div>
			<div class='screen'><div class='reel'>
				<div class='page on'><div class='row'>
					<?php
						$first = "first";
						$page = 1;
						$items_number = (count($imgs) - 1);// dividido entre dos porque se omiten los impares ya que serán las grandes
						$c = 0;
						$cc = 0;
						$row = 1;
						foreach($imgs as $img){
							if($c>0){
								echo '<div class="wrap_image"><div class="background hover1"></div>';
								echo '<div class="image"><a class="image1" href="#'.$cc.'">' . wp_get_attachment_image($img->ID,'portafolio') . '</a><a class="image2 hover1" href="#'.$cc.'">' . wp_get_attachment_image($img->ID,'portafolio') . '</a></div>';
								//$title = strtr($img->post_title,array('..' => '.</a><a>'));
								$title = $img->post_title;
								$puntos = strlen($title)>40?"...":"";
								$title = substr($title,0,40);
								$title = strtr($title,array('..' => '.</a><a>')) . $puntos;
								echo '<div class="title"><a class="blue2">' . $title . '</a></div></div>';
								
								$close_page = ($row%9 == 0)?"</div><div class='page'>":"";
								$close_row = ($row%3 == 0)?"</div>$close_page<div class='row'>":"";
								$close_row = ($row==$items_number)?"":$close_row;
								echo $close_row;
								$cc++;
								$row++;
							}
							$c++;
						}
					?> 
				</div></div>
			</div></div>
			<?php //aqui vamos a imprimir la paginación de la galería!!! 
				$pages = ceil(($items_number) / 9);?>
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
		</div> <?php
	}
?>
<div class='clear'></div>