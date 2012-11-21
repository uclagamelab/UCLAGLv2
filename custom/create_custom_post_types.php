<?php

function create_post_types(){
	create_game_type();
	create_resource_type();
	create_people_type();
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
