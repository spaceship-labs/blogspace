<?php
add_filter('wp_list_categories','nuke_title_attribute');
add_action('init','register_menus');
add_theme_support('post-thumbnails');

add_filter('wp_nav_menu_objects', 'add_last_item_class' );
add_filter( 'getarchives_where','takien_archive_where',10,2);

add_image_size('home_reel', 293, 182, true);//gallery products
add_image_size('blog', 599, 300, true);//gallery products
add_image_size('portafolio', 233, 119, true);//gallery portafolio
add_filter( 'query_vars', function( $vars ){
    $vars[] = 'post_parent';
    return $vars;
});

/*	El siguiente filtro y las siguienter funciones estan hechas para agregar unos campos extras a la
	información general de la página, en este caso lo vamos a usar para agregar:
	- Twitter
	- Facebook
	- Teléfono
*/
add_filter('admin_init', 'my_general_settings_register_fields');
function my_general_settings_register_fields(){
    register_setting('general', 'twitter', 'esc_attr');
    add_settings_field('twitter', '<label for="twitter">'.__('Twitter' , 'twitter' ).'</label>' , 'my_general_settings_fields_html_twitter', 'general');

	register_setting('general', 'facebook', 'esc_attr');
    add_settings_field('facebook', '<label for="facebook">'.__('Facebook' , 'facebook' ).'</label>' , 'my_general_settings_fields_html_facebook', 'general');

	register_setting('general', 'tel', 'esc_attr');
    add_settings_field('tel', '<label for="tel">'.__('Teléfono' , 'tel' ).'</label>' , 'my_general_settings_fields_html_tel', 'general');

	register_setting('general', 'address', 'esc_attr');
    add_settings_field('address', '<label for="address">'.__('Dirección' , 'address' ).'</label>' , 'my_general_settings_fields_html_address', 'general');
}
function my_general_settings_fields_html_twitter(){
	$value = get_option( 'twitter', '' );
    echo '<input type="text" id="twitter" name="twitter" value="' . $value . '" />';
}
function my_general_settings_fields_html_facebook(){
	$value = get_option( 'facebook', '' );
    echo '<input type="text" id="facebook" name="facebook" value="' . $value . '" />';
}
function my_general_settings_fields_html_tel(){
	$value = get_option( 'tel', '' );
    echo '<input type="text" id="tel" name="tel" value="' . $value . '" />';
}
function my_general_settings_fields_html_address(){
	$value = get_option( 'address', '' );
    echo '<input type="text" id="address" name="address" value="' . $value . '" />';
}
/*Terminamos de agregar los custom field a general settings*/

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) {
?>
	<h3>Extra profile information</h3>
	<table class="form-table">
		<tr>
			<th><label for="twitter">Twitter</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>
		<tr>
			<th><label for="twitter">Title</label></th>
			<td>
				<input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'title', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Title username.</span>
			</td>
		</tr>

	</table>
<?php }
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'title', $_POST['title'] );
}

function nuke_title_attribute($output) {
$output = preg_replace('/title=\"(.*?)\"/','',$output);
return $output;
}
function custom_excerpt_length( $length ) {
	return 100;
}
function get_img_object($id){
	$media_query = get_children( array('post_parent' => $id, 'post_type' => 'attachment', 'order'=> 'ASC', 'post_mime_type' =>'image','orderby' => 'menu_order') );
	if($media_query)
		return $media_query;
	else
		return false;
}
function get_files($id,$gallery=false){
	$media_query = get_children( array('post_parent' => $id, 'post_type' => 'attachment', 'post_mime_type' =>'application') );
	$url = array();
	$ids = array();
	if($media_query){
		foreach ($media_query as $img) {
			$url[] = wp_get_attachment_url($img->ID);
			$ids[] = $img->ID;
		}
	}
if($gallery){
	echo "<div class='files_gallery'><div class='row'>";
	$row = 1;
	$num_files = count($url);
	$last_item = "";
	for($i = 0; $i <= $num_files-1; $i++){
		$close_row = ($row%3 == 0)?"</div><div class='row'>":"";
		$last_item = ($row%3 == 0)?"last":"";
		$close_row = ($row==$num_files)?"":$close_row;
		echo '<div class="file ' . $last_item . '"><a href="' . $url[$i] . '" ><div class="pdf"></div></a><a href="' . $url[$i] . '">' . get_the_title($ids[$i]) .'</a></div>';
		echo $close_row;
		$row++;
	}
	echo "</div></div>";//cerramos gallery y row
}else{
		if($url[0]){
		for($i=0;$i<=count($url)-1;$i++){
			echo '<div class="file"><a href="' . $url[$i] . '" ><div class="pdf"></div></a><a href="' . $url[$i] . '">' . get_the_title($ids[$i]) .'</a></div>';
		}
		}else{
			echo "<a>No file found!!</a>";
		}
}
}
function register_menus() {
	register_nav_menus(array(
		'header-menu' => __('Header Menu'),
		'footer-menu' => __('Footer Menu'),
	));
}
function practice_box_func($attrs,$content = ""){
	extract(shortcode_atts(array(),$attrs));
	return <<<EOD
		<div class="practice-detail-box">
			$content
		</div>
		<div class="clear"></div>
EOD;
}
function check_child($items,$id){
	foreach($items as $item){
		if($item->menu_item_parent == $id){
			return true;
		}
	}
	return false;
}
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard header">
        <div class='avatar_frame'><?php echo get_avatar( $comment->comment_author_email, 50 ); ?></div>
		<div class='author_info'>
         <?php printf(__('<a class="fn">%s</a> | '), get_comment_author_link()) ?>
		 <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
		 <?php edit_comment_link(__('(Edit)'),'  ','') ?>
		</div>
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=>'<div class="reply_button"></div>'))) ?>
		</div>
      </div>
	  <div class='comment_content'>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>
      <?php comment_text() ?>
	  </div>
     </div>
<?php }
class MyWalkerPage extends Walker_Page {
	function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul><div class='bottom'></div>\n";
    }
	function start_el(&$output, $page, $depth, $args) {
		if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';
        extract($args, EXTR_SKIP);
        $class_attr = '';
        if ( !empty($current_page) ) {
            $_current_page = get_page( $current_page );
            if ( (isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors)) || ( $page->ID == $current_page ) || ( $_current_page && $page->ID == $_current_page->post_parent ) ) {
                $class_attr = 'sel';
            }
        } elseif ( (is_single() || is_archive()) && ($page->ID == get_option('page_for_posts')) ) {
            $class_attr = 'sel';
        }
        if ( $class_attr != '' ) {
            $class_attr = ' class="' . $class_attr . '"';
        }
		$children = wp_list_pages( array("title_li"=>"","child_of"=>$page->ID,"echo"=>0 ));
		$arrow = ($children)?'<div class="arrow close"></div>':'';
		$arrow = ($depth <2)?$arrow:'';
		$backgraound = "<div class='bullet'></div>" . $arrow;//<li class="separacion"></li>
        $output .= $indent . '<li class="separacion"><img src="'.get_bloginfo('template_directory').'/img/header/dividing.png" alt=""/></li><li class="item_list"' . $class_attr . '><a href="' . get_page_link($page->ID) . '"' . $class_attr . '>' . apply_filters( 'the_title', strtr(strtoupper($page->post_title),array('á'=>'Á','é'=>'É','í'=>'Í','ó'=>'Ó','ú'=>'Ú','ñ'=>'Ñ')), $page->ID ) . '</a>' . $backgraound;

        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;
            $output .= " " . mysql2date($date_format, $time);
        }
    }
}
function takien_archive_where($where,$args){
	$year		= isset($args['year']) 		? $args['year'] 	: '';
	$month		= isset($args['month']) 	? $args['month'] 	: '';
	$monthname	= isset($args['monthname']) ? $args['monthname']: '';
	$day		= isset($args['day']) 		? $args['day'] 		: '';
	$dayname	= isset($args['dayname']) 	? $args['dayname'] 	: '';

	if($year){
		$where .= " AND YEAR(post_date) = '$year' ";
		$where .= $month ? " AND MONTH(post_date) = '$month' " : '';
		$where .= $day ? " AND DAY(post_date) = '$day' " : '';
	}
	if($month){
		$where .= " AND MONTH(post_date) = '$month' ";
		$where .= $day ? " AND DAY(post_date) = '$day' " : '';
	}
	if($monthname){
		$where .= " AND MONTHNAME(post_date) = '$monthname' ";
		$where .= $day ? " AND DAY(post_date) = '$day' " : '';
	}
	if($day){
		$where .= " AND DAY(post_date) = '$day' ";
	}
	if($dayname){
		$where .= " AND DAYNAME(post_date) = '$dayname' ";
	}
	return $where;
}
function page_getimage($id,$index,$size,$gallery = false,$on = "") {
$media_query = get_children( array('post_parent' => $id, 'post_type' => 'attachment', 'post_mime_type' =>'image', 'orderby' => 'menu_order ID') );
$list = array();
$url = array();
if($media_query){
	//$img = array_shift($media_query);
    //$list[] = wp_get_attachment_image($img->ID, $size);
	//$url[] = wp_get_attachment_url($img->ID);
	foreach ($media_query as $img) {
		$list[] = wp_get_attachment_image($img->ID, $size);
		$url[] = wp_get_attachment_url($img->ID);
	}
}
if($gallery){

	echo (count($list)>0)?"<div class='category $on'>":"";
	//echo "<div class='cat_logo'></div>";
	for($i = 0;$i <= count($list)-1;$i++) {
		if(($i==0) && ($index==0)){
			echo "<div class='cat_logo'>";
			//echo $list[$i];
			echo '</div>';
		}else{
			echo $i==0?"<div class='cat_logo'></div>":'';
			?> <div class='wrap_image <?php echo $on; ?> '> <?php
			echo $list[$i];
			?> </div> <?php
			$on = "";
		}

	}
	echo (count($list)>0)?"</div>":"";
}else{
	if($list[$index]){
		echo $list[$index];
	}
}
}

function sloganrandom(){

$slogans=array('Hacemos software que funciona','Moviendo al mundo a traves de software','Software y tecnologia');
$aleatorio=mt_rand(0,2);
return $slogans[$aleatorio];

}

function insert_fb_in_head() {
    global $post;
    $default_image= get_bloginfo( 'template_directory' ).'/img/logo-og.png'; //Aquí tienes que poner la ruta de la imagen prefeterminada que se mostrará.
    $p_excerpt = get_the_excerpt();
    echo '<!--Opengraph-->';
    if ( !is_singular()){ //Si no es un post o página
        echo '<meta property="og:title" content="' . get_bloginfo( 'name' ) . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_bloginfo( 'url' ) . '"/>';
        echo '<meta property="og:site_name" content="'.  get_bloginfo( 'name' ) .'"/>';
        echo '<meta property="og:description" content="Tienes alguna idea innovadora, y quieres invertir en internet ? cuenta con nosotros para llevarla a cabo. Tenemos la experiencia y las herramientas para que tu proyecto sea todo un éxito.">';
        echo '<meta property="og:image" content="' . $default_image . '"/>';
        echo '<!--End opengraph-->';
        return;
    }

    while (have_posts()) :
	  the_post();
      $p_excerpt = get_the_excerpt();
      echo '<meta property="og:title" content="' . get_the_title() . ' | '. get_bloginfo( 'name' ) .'"/>';
      echo '<meta property="og:type" content="article"/>';
      echo '<meta property="og:url" content="' . get_permalink() . '"/>';
      echo '<meta property="og:site_name" content="'.  get_bloginfo( 'name' ) .'"/>';
      echo '<meta property="og:description" content="'. $p_excerpt .'"/>';
      if(has_post_thumbnail( $post->ID )) {
          $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
          //echo $thumbnail_src[0];
          echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
      }else{
        echo '<meta property="og:image" content="' . $default_image . '"/>';
      }
      echo '<!--End opengraph-->';
    endwhile;

}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'post'
        )
    );
}

function setUpAttachments($postray, $postdat, $context){
	//$postray['post_meta']['custom_key'] = 'a_key';
	$sizes =  get_intermediate_image_sizes();
	array_push($sizes, 'full');

	$args = array(
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_parent' => $postray['ID']
	);

	$attachments = get_posts( $args );

	//Lista de todos los attachments del post
	$post_attachments = array();
 	if ( $attachments ) {
	  	foreach ( $attachments as $attachment ) {

	  		//Attach que sera llenado con los distintos tamanos de thumbnail
	  		$att = new StdClass();

	    	foreach($sizes as $size){
	      	$img_src = wp_get_attachment_image_src( $attachment->ID, $size );
	      	$att->$size = $img_src;
	      	//$img = array($size => $img_src);
	      	//array_push($att, $img);
	      }

	      array_push($post_attachments, $att);
	    }

	    $postray['attachments'] = $post_attachments;
		$postray['customId'] = $postray['ID'];
 	}

	return $postray;
}

function setUpSecondaryImage($postray, $postdat, $context){
	$sizes =  get_intermediate_image_sizes();
	array_push($sizes, 'full');
	$_id = $postray['ID'];
	$_post_type = 'post';
	$secondary_image_sizes = new StdClass();
	foreach($sizes as $size){
		$secondary = MultiPostThumbnails::get_post_thumbnail_url(
			$_post_type,
			'secondary-image',
			$_id,
			$size
		);
		$secondary_image_sizes->$size = $secondary;
	}
	$postray['secondary_image'] = $secondary_image_sizes;
	return $postray;
}

function prepare_cors(){
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods', 'GET,POST,PUT,HEAD,DELETE,OPTIONS');
	header('Access-Control-Allow-Headers', 'content-Type,x-requested-with');
}
add_action('init','prepare_cors');

add_filter( 'json_prepare_post', 'setUpAttachments' );
add_filter( 'json_prepare_post', 'setUpSecondaryImage' );
add_filter( 'json_serve_request', function( ) {
	//header( 'Access-Control-Allow-Origin: http://staging.spaceshiplabs.divshot.io' );
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods', 'GET,POST,PUT,HEAD,DELETE,OPTIONS');
	header('Access-Control-Allow-Headers', 'content-Type,x-requested-with');
	header( "Access-Control-Expose-Headers: X-WP-Total, X-WP-TotalPages" );
});


/*
header('Access-Control-Allow-Origin: http://localhost:9000');
header('Access-Control-Allow-Origin: http://staging.spaceshiplabs.divshot.io');
*/

add_action( 'send_headers', 'add_header_seguridad' );
function add_header_seguridad() {
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-XSS-Protection: 1;mode=block' );
}
remove_action('wp_head', 'wp_generator');
add_filter('xmlrpc_enabled', '__return_false');
add_filter( 'xmlrpc_methods', function( $methods ){ unset( $methods['pingback.ping'] ); return $methods; });

?>
