<?php

	require_once ( get_stylesheet_directory() . '/theme-options.php' );

	add_filter('show_admin_bar', '__return_false');

	if (!is_admin() ) add_action( 'wp_enqueue_scripts', 'finecreations_add_scripts', 11 );
	function finecreations_add_scripts() {

		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
		wp_register_script( 'production-js', get_template_directory_uri() . '/assets/js/build/production.js', array(), '', true );
		wp_register_script( 'js-isotope', get_template_directory_uri() . '/assets/js/plugins/isotope.js', array('jquery'), '', true );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'js-isotope' );
		wp_enqueue_script( 'production-js' );

	}

	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');

	function cc_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );

	function your_function_name() {
		add_theme_support( 'menus' );
	}
	add_action( 'after_setup_theme', 'your_function_name' );

	function exclude_post_categories($excl=''){
	   $categories = get_the_category($post->ID);
	      if(!empty($categories)){
	      	$exclude=$excl;
	      	$exclude = explode(",", $exclude);
	      	foreach ($categories as $cat) {
	      		$html = '';
	      		if(!in_array($cat->cat_ID, $exclude)) {
	      		$html .= '<p' . get_category_link($cat->cat_ID) . '" ';
	      		$html .= 'title="' . $cat->cat_name . '">' . $cat->cat_name . '</p>';
	      		echo $html;
	      		}
		      }
	      }
	}

	function post_excerpt_length($length) {
		return 30;
	}
	add_filter('excerpt_length', 'post_excerpt_length');

	function link_excerpt_more($more) {
		return;
	}
	add_filter('excerpt_more', 'link_excerpt_more');

	if ( function_exists( 'add_theme_support') ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 200 );
	}

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'portfolio', 250, 250 );
		add_image_size( 'blog', 250, 150 );
	}

	if ( function_exists('register_sidebar')) {
		register_sidebar(array(
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
	}
?>