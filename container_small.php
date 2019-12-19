<div class='container small'>
<?php 
			//$parent = 5;
			//$imgs = get_img_object($id);
			//if($imgs){
				?> <div class='down_gallery'>
				<a href='#' class='arrow left ready'><div class='hover'></div><div class='hover1'></div></a>
				<a href='#' class='arrow right ready'><div class='hover'></div><div class='hover1'></div></a>
				<div class="light glow"></div>
					<div class='screen'><div class='reel'>
						<?php
							$first = "first";
							$page = 1;
							//$items_number = count($imgs)*2;//by 2 for test
							$items_number = 3;//by 2 for test
							$pages_display = array('Marketing','Diseno','Software','OutSourcing','News','Blog de noticias');
							$c = 0;
							//foreach($imgs as $img){
							$on = 'on';
							foreach($pages_display as $page_){
								$p = get_page_by_title($page_);
								if($p){
								$imgs = get_img_object($p->ID);
								if($imgs){
								foreach($imgs as $img){if($c<1){
								echo '<div class="item '. $first .' ready '.$on.'">';
									echo '<h1>' . $img->post_title . '</h1><div class="light content"></div><div class="light content aux"></div>';
									//echo '<p class="subtitle">' . $img->post_excerpt . '</p>';
									//echo '<div class="image"><a class="image1" href="'. wp_get_attachment_url($img->ID) .'">' . wp_get_attachment_image($img->ID,'home_reel') . '</a><a class="image2" href="'. wp_get_attachment_url($img->ID) .'">' . wp_get_attachment_image($img->ID,'home_reel') . '</a></div>';
									echo '<div class="image"><a class="image1" href="'. get_permalink($p->ID) .'">' . wp_get_attachment_image($img->ID,'home_reel') . '</a><a class="image2" href="'. get_permalink($p->ID) .'">' . wp_get_attachment_image($img->ID,'home_reel') . '</a></div>';
									echo '<p>' . $img->post_content. '</p>';
								echo '</div>';//end item div
								$close_page = ($page%3 == 0)?"</div><div class='page'>":"";
								$close_page = ($page==$items_number)?"":$close_page;
								$page++;
								//echo $close_page;
								$first = '';
								$on = '';
								}$c++;
								}
								$c=0;
								}//if imgs
								}//if p
							}//foreach end
							?> 
						
					</div></div>
				</div> <?php
			//}
		?>
</div>
