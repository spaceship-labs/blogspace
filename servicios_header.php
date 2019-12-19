<div class='services_header'>
	<?php 
		$current_page = $wp_query->post;
		$array = array('Diseno','Software','Marketing','OutSourcing','Asesoria');
		$on = 'on';
		$c = 0;
		$c_aux = 0;
		foreach ($array as $valor) {
			$page = get_page_by_title($valor);
			if($current_page->post_title != 'Servicios'){
				$on = $current_page->ID == $page->ID?'on':'';
				$c = $current_page->ID == $page->ID?$c_aux:$c;
			}
			$a = get_permalink($page->ID);
			echo '<a class="logo hover ' . $on . '" href="' . $a . '"><span class="logos ' . $valor . ' hover"></span><span class="logos ' . $valor . ' hover1"></span><span class="aux"></span></a>';
			$on = '';
			$c_aux++;
		}
		?><div class='screen'><div class='reel' style='<?php //echo 'left:' . $c*(-835) . 'px'; ?>'><?php
		$on = 'on';
		foreach ($array as $valor) {
			$page = get_page_by_title($valor);
			$on = $current_page->ID == $page->ID?'on':'';
			echo '<div class="item ' . $on . '"><h2 class="blue2">' . $page->post_title . '</h2>';
			echo '<p>' . $page->post_content . '</p></div>';
			$on = '';
		}
		?></div></div><?php
	?>
</div>