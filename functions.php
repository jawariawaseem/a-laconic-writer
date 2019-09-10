<?php

//CACHE clean
flush_rewrite_rules( false );


// adding css and js files 

function lw_setup(){
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono&display=swap');
	wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime());
	wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
	wp_enqueue_script('my-custom-script', get_template_directory_uri() .'/js/my-custom-script.js', array('jquery'), null, true);

}

add_action('wp_enqueue_scripts','lw_setup');

// adding theme support

function lw_init(){
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support('html5',
		array('comment-list','comment-form','search-form')
	);
}

add_action('after_setup_theme','lw_init');

//project post types

function lw_custom_post_type(){
	register_post_type('gallery', array(
		'rewrite' => array('slug' => 'gallery'),
		'labels' => array(
			'name' => 'Gallery',
			'singular_name' => 'Picture',
			'add_new_item' => 'Add New Picture',
			'edit_item' => 'Edit Picture'
		),
		'menu-icon' => 'dashicons-clipboard',
		'public' => true,
		'has_archives' => true,
		'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'comments')
	));
}

add_action('init', 'lw_custom_post_type');

//sidebar

function lw_widgets(){
	register_sidebar(
		array(
			'name' => 'Main Sidebar',
			'id' => 'main_sidebar',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		)
	);
}

add_action('widgets_init', 'lw_widgets');

function search_filter($query){
	if($query->is_search()){
		$query->set('post_type', array('post', 'gallery'));
	}
}

add_filter('pre_get_posts', 'search_filter');
function wpse8170_loop() {
	global $wp_query;
	$loop = 'notfound';

	if ( $wp_query->is_page ) {
		$loop = is_front_page() ? 'front' : 'page';
	} elseif ( $wp_query->is_home ) {
		$loop = 'home';
	} elseif ( $wp_query->is_single ) {
		$loop = ( $wp_query->is_attachment ) ? 'attachment' : 'single';
	} elseif ( $wp_query->is_category ) {
		$loop = 'category';
	} elseif ( $wp_query->is_tag ) {
		$loop = 'tag';
	} elseif ( $wp_query->is_tax ) {
		$loop = 'tax';
	} elseif ( $wp_query->is_archive ) {
		if ( $wp_query->is_day ) {
			$loop = 'day';
		} elseif ( $wp_query->is_month ) {
			$loop = 'month';
		} elseif ( $wp_query->is_year ) {
			$loop = 'year';
		} elseif ( $wp_query->is_author ) {
			$loop = 'author';
		} else {
			$loop = 'archive';
		}
	} elseif ( $wp_query->is_search ) {
		$loop = 'search';
	} elseif ( $wp_query->is_404 ) {
		$loop = 'notfound';
	}

	return $loop;
}