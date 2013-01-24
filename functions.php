<?php

//include_once 'custom/debug.php';
include_once 'vendors/WPAlchemy/MetaBox.php';
include_once 'vendors/wp-no-category-base/no-category-base.php';
include_once 'custom/register_metaboxes.php';
//include_once 'custom/custom_gallery_shortcode.php';
include_once 'custom/custom_post_type_messages.php';
include_once 'custom/map_mata_cap.php';
include_once 'custom/create_custom_post_types.php';

//theme thumbnails
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 570, 139, true ); //this is the same as project-index
add_image_size('slider', 960, 414, true);
add_image_size('featured', 294, 220, true);
add_image_size('inline-thumbnail', 162, 108, true);
add_image_size('inline-large', 572, 381, false);
add_image_size('project-index', 570, 139, true);
add_image_size('resources-index', 107, 98, true);


add_action('init', 'my_init');
function my_init()
{
	if (is_admin())
	{
    //this is for custom metabox styling
    define('_TEMPLATEURL',WP_CONTENT_URL.'/themes/'.basename(TEMPLATEPATH));
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

// miscellaneous fucntions //
////////////////////////////

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

//this is for allowing unity project uploads
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


?>
