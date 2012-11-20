<?php


require_once('FirePHPCore/FirePHP.class.php');
ob_start();
$firephp = FirePHP::getInstance(true);

define('_TEMPLATEURL',WP_CONTENT_URL.'/themes/'.basename(TEMPLATEPATH));

//debug show what template is being used
//add_action('wp_footer', 'show_template');
function show_template() {
    global $template;
    print_r($template);
}



//deactivate WordPress function and activate own function
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'my_gallery_shortcode');

add_editor_style();

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 570, 139, true ); //this is the same as project-index
add_image_size('slider', 960, 414, true);
add_image_size('featured', 294, 220, true);
add_image_size('inline-thumbnail', 162, 108, true);
add_image_size('inline-large', 572, 381, false);
add_image_size('project-index', 570, 139, true);
add_image_size('resources-index', 107, 98, true);



add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['unity3d'] = 'application/vnd.unity';
	
	// add as many as you like
	// and return the new full result
	return $existing_mimes;
}

add_filter( 'pre_get_posts', 'my_get_posts' );
function my_get_posts( $query ) {
	if ( is_home() )
		$query->set( 'post_type', array( 'post', 'page', 'game', 'resource', 'person') );

	return $query;
}


include_once 'vendors/WPAlchemy/MetaBox.php';
include_once 'vendors/wp-no-category-base/no-category-base.php';

include_once 'custom/register_metaboxes.php';



add_action('init', 'my_init');
function my_init()
{
	if (is_admin())
	{
		wp_enqueue_script('custom_js_ui',_TEMPLATEURL .'/custom/js/jquery-ui-1.8.11.custom.min.js',array('custom_js_jquery'));
		wp_enqueue_script('custom_js_timepicker',_TEMPLATEURL .'/custom/js/jquery-ui-timepicker-addon.js',array('custom_js_ui', 'custom_js_jquery'));
		wp_enqueue_script('custom_js_custom',_TEMPLATEURL .'/custom/js/custom.js',array('custom_js_timepicker','custom_js_jquery'),NULL,TRUE);
		wp_enqueue_style('custom_css_daterangepicker',_TEMPLATEURL .'/custom/css/ui-lightness/jquery-ui-1.8.11.custom.css');
		wp_enqueue_style('custom_meta_css', _TEMPLATEURL . '/custom/meta.css');
	}
	
	$menu_locations = array(
			'main-nav' => 'Header',
			'footer-nav' => 'Footer',
	);
	register_nav_menus($menu_locations);
	create_post_types();
}



if (function_exists('register_sidebar')) {
	
	register_sidebar(array(
		'name' => 'contact',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => 'news',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}




function create_post_types(){
	create_game_type();
	create_resource_type();
	create_people_type();
	// create_context_taxonomy();
}



function create_game_type() {
	
	$capabilities = array(
		'publish_posts' => 'publish_games',
		'edit_posts' => 'edit_games',
		'edit_others_posts' => 'edit_others_games',
		'delete_posts' => 'delete_games',
		'delete_others_posts' => 'delete_others_games',
		'read_private_posts' => 'read_private_games',
		'edit_post' => 'edit_game',
		'delete_post' => 'delete_game',
		'read_post' => 'read_game',
	); 
	
	$labels = array(
		'name' => _x('Games', 'post type general name'),
		'singular_name' => _x('Game', 'post type singular name'),
		'add_new' => _x('Add Game', 'game'),
		'add_new_item' => __('Add New Game'),
		'edit_item' => __('Edit Game'),
		'new_item' => __('New Game'),
		'view_item' => __('View Game'),
		'search_items' => __('Search Game'),
		'not_found' =>  __('No Games found'),
		'not_found_in_trash' => __('No Games found in Trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'_builtin' => false, // It's a custom post type, not built in!
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array("slug" => "game"), // Permalinks format
    'has_archive' => false,
		'register_meta_box_cb' => 'add_game_metaboxes',
		'capability_type' => 'game',
		'capabilities' => $capabilities,
		'hierarchical' => true,
		'supports' => array('title','editor','thumbnail',), 
		'menu_position' => 5,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/star.png',
		'taxonomies' => array('post_tag','category'),
	); 
	register_post_type('game',$args);
}

function create_resource_type() {
	
	$capabilities = array(
		'publish_posts' => 'publish_resources',
		'edit_posts' => 'edit_resources',
		'edit_others_posts' => 'edit_others_resources',
		'delete_posts' => 'delete_resources',
		'delete_others_posts' => 'delete_others_resources',
		'read_private_posts' => 'read_private_resources',
		'edit_post' => 'edit_resources',
		'delete_post' => 'delete_resources',
		'read_post' => 'read_resources',
	); 
	
	$labels = array(
		'name' => _x('Resources', 'post type general name'),
		'singular_name' => _x('Resource', 'post type singular name'),
		'add_new' => _x('Add Resource', 'resource'),
		'add_new_item' => __('Add New Resource'),
		'edit_item' => __('Edit Resource'),
		'new_item' => __('New Resource'),
		'view_item' => __('View Resource'),
		'search_items' => __('Search Resource'),
		'not_found' =>  __('No Resource found'),
		'not_found_in_trash' => __('No Resources found in Trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'_builtin' => false, // It's a custom post type, not built in!
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array("slug" => "resource"), // Permalinks format
    'has_archive' => false,
		'register_meta_box_cb' => 'add_resource_metaboxes',
		'capability_type' => 'resource',
		'capabilities' => $capabilities,
		'hierarchical' => true,
		'supports' => array('title','editor','thumbnail',),
		'menu_position' => 5,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/star.png',
		'taxonomies' => array('post_tag','category'),
		
	); 
	register_post_type('resource',$args);
}

function create_people_type(){
	
	$capabilities = array(
		'publish_posts' => 'publish_people',
		'edit_posts' => 'edit_people',
		'edit_others_posts' => 'edit_others_people',
		'delete_posts' => 'delete_people',
		'delete_others_posts' => 'delete_others_people',
		'read_private_posts' => 'read_private_people',
		'edit_post' => 'edit_person',
		'delete_post' => 'delete_person',
		'read_post' => 'read_person',
	); 
	
	$labels = array(
		'name' => _x('People', 'post type general name'),
		'singular_name' => _x('Person', 'post type singular name'),
		'add_new' => _x('Add Person', 'person'),
		'add_new_item' => __('Add New Person'),
		'edit_item' => __('Edit Person'),
		'new_item' => __('New Person'),
		'view_item' => __('View Person'),
		'search_items' => __('Search People'),
		'not_found' =>  __('No People found'),
		'not_found_in_trash' => __('No People found in Trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'_builtin' => false, // It's a custom post type, not built in!
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array("slug" => "people"), // Permalinks format
		'capability_type' => 'person',
    'has_archive' => false,
		'capabilities' => $capabilities,
		'hierarchical' => true,
		'supports' => array('thumbnail','title'), 
		'menu_position' => 5,
		'taxonomies' => array('post_tag','category'),
		// 'menu_icon' => get_stylesheet_directory_uri() . '/images/star.png',
	); 
	register_post_type('person',$args);
}

function create_context_taxonomy(){
	// Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Context', 'taxonomy general name' ),
    'singular_name' => _x( 'Context', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Contexts' ),
    'popular_items' => __( 'Popular Contexts' ),
    'all_items' => __( 'All Contexts' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Context' ), 
    'update_item' => __( 'Update Context' ),
    'add_new_item' => __( 'Add New Context' ),
    'new_item_name' => __( 'New Context Name' ),
    'separate_items_with_commas' => __( 'Separate contexts with commas' ),
    'add_or_remove_items' => __( 'Add or remove contexts' ),
    'choose_from_most_used' => __( 'Choose from the most used contexts' )
  ); 

  register_taxonomy('context','game',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'context' ),
  ));
}


add_filter('post_updated_messages', 'my_post_updated_messages');
function my_post_updated_messages( $messages ) {
  global $post_ID;

	$messages['game'] = array(
	  0 => '', // Unused. Messages start at index 1.
	  1 => sprintf( __('Game updated. <a href="%s">View Game</a>'), esc_url( get_permalink($post_ID) ) ),
	  2 => __('Custom field updated.'),
	  3 => __('Custom field deleted.'),
	  4 => __('Game updated.'),
	  /* translators: %s: date and time of the revision */
	  5 => isset($_GET['revision']) ? sprintf( __('Game restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	  6 => sprintf( __('Game published. <a href="%s">View Game</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Game saved.'),
	  8 => sprintf( __('Game submitted. <a target="_blank" href="%s">Preview Game</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Game scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Game</a>'),
	    // translators: Publish box date format, see http://php.net/date
	    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Game draft updated. <a target="_blank" href="%s">Preview Game</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	$messages['resource'] = array(
	  0 => '', // Unused. Messages start at index 1.
	  1 => sprintf( __('Resource updated. <a href="%s">View Resource</a>'), esc_url( get_permalink($post_ID) ) ),
	  2 => __('Custom field updated.'),
	  3 => __('Custom field deleted.'),
	  4 => __('Resource updated.'),
	  /* translators: %s: date and time of the revision */
	  5 => isset($_GET['revision']) ? sprintf( __('Resource restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	  6 => sprintf( __('Resource published. <a href="%s">View Resource</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Resource saved.'),
	  8 => sprintf( __('Resource submitted. <a target="_blank" href="%s">Preview Resource</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Resource scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resource</a>'),
	    // translators: Publish box date format, see http://php.net/date
	    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Resource draft updated. <a target="_blank" href="%s">Preview Resource</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	$messages['person'] = array(
	  0 => '', // Unused. Messages start at index 1.
	  1 => sprintf( __('Person updated. <a href="%s">View Person</a>'), esc_url( get_permalink($post_ID) ) ),
	  2 => __('Custom field updated.'),
	  3 => __('Custom field deleted.'),
	  4 => __('Person updated.'),
	  /* translators: %s: date and time of the revision */
	  5 => isset($_GET['revision']) ? sprintf( __('Person restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	  6 => sprintf( __('Person published. <a href="%s">View Person</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Person saved.'),
	  8 => sprintf( __('Person submitted. <a target="_blank" href="%s">Preview Person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Person scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Person</a>'),
	    // translators: Publish box date format, see http://php.net/date
	    date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Person draft updated. <a target="_blank" href="%s">Preview Person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}

function add_help_text($contextual_help, $screen_id, $screen) { 
  //$contextual_help .= var_dump($screen); // use this to help determine $screen->id
  if ('student_project' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a Game:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct class number such as 152B, or 157A.') . '</li>' .
      '<li>' . __('Specify the correct team mebers of the Game.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the Student Project to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of Game blah blah blah.') . '</p>' ;
  }

  if ('book' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a book:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
      '<li>' . __('Specify the correct writer of the book.  Remember that the Author module refers to you, the author of this book review.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the book review to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of books blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}



add_filter( 'map_meta_cap', 'my_map_meta_cap', 10, 4 );
function my_map_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a game, get the post and post type object. */
	if ( 'edit_game' == $cap || 'delete_game' == $cap || 'read_game' == $cap  ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}
	
	/* If editing, deleting, or reading a resource, get the post and post type object. */
	if ( 'edit_resouce' == $cap || 'delete_resource' == $cap || 'read_resouce' == $cap  ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}
	
	if ( 'edit_person' == $cap || 'delete_person' == $cap || 'read_person' == $cap  ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a game, assign the required capability. */
	if ( 'edit_game' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}
	

	
	/* If editing a resource, assign the required capability. */
	if ( 'edit_resource' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}
	

	
	if ( 'edit_person' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a game, assign the required capability. */
	elseif ( 'delete_game' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}
	
	/* If deleting a resource, assign the required capability. */
	elseif ( 'delete_resouce' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}
	
	elseif ( 'delete_person' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private game, assign the required capability. */
	elseif ( 'read_game' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}
	
	/* If reading a private resource, assign the required capability. */
	elseif ( 'read_resouce' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}
	
	elseif ( 'read_person' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

//the own renamed function
function my_gallery_shortcode($attr) {

	global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$output = apply_filters('gallery_style', "
	    <div id='$selector' class='gallery galleryid-{$id}'>");

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
	    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		$output .= "<{$itemtag} class='gallery-item col-{$columns}'>";
	    $output .= "
	        <{$icontag} class='gallery-icon'>
	            $link
	        </{$icontag}>";
	    if ( $captiontag && trim($attachment->post_excerpt) ) {
	        $output .= "
	            <{$captiontag} class='gallery-caption'>
	            " . wptexturize($attachment->post_excerpt) . "
	            </{$captiontag}>";
	    }
	    $output .= "</{$itemtag}>";
	    if ( $columns > 0 && ++$i % $columns == 0 )
	        $output .= '<br />';
	}

	$output .= "</div>\n";

	return $output;
}


//this makes sub-cats use parents template
function load_cat_parent_template(){
  global $wp_query, $firephp;
  if (!$wp_query->is_category) {
    return true;
  }

  // get current category object
  $cat = $wp_query->get_queried_object();

  // trace back the parent hierarchy and locate a template
  while ($cat && !is_wp_error($cat)) {
    $template = TEMPLATEPATH . "/category-{$cat->slug}.php";
    if (file_exists($template)) {
      load_template($template);
      exit;
    }

    $cat = $cat->parent ? get_category($cat->parent) : false;
  }
}
//add_action('template_redirect', 'load_cat_parent_template');


?>
