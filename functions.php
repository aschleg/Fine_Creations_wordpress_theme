<?php

	require_once ( get_stylesheet_directory() . '/theme-options.php' );
	require_once ( get_stylesheet_directory() . '/global/wp_bootstrap_navwalker.php' );

	add_filter('show_admin_bar', '__return_false');

	if (!is_admin() ) add_action( 'wp_enqueue_scripts', 'finecreations_add_scripts', 11 );
	function finecreations_add_scripts() {

		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
		wp_enqueue_script( 'jquery' );

		wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/build/bootstrap.min.js', array( 'jquery' ), '', all );
		wp_enqueue_script( 'bootstrap' );

		wp_deregister_script( 'plugins');
		wp_register_script( 'plugins', get_template_directory_uri() . '/assets/js/build/plugins.min.js', array('jquery'), '', all );
		wp_enqueue_script( 'plugins');

		wp_register_script( 'production-js', get_template_directory_uri() . '/assets/js/build/production.min.js', array('jquery'), '', all );
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


	add_action( 'after_setup_theme', 'menu_setup' );
	if( !function_exists( 'menu_setup' ) ):
		function menu_setup() {
			register_nav_menu( 'main_nav', __( 'Primary navigation', 'fc' ) );
		}
	endif;

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
		return 50;
	}
	add_filter('excerpt_length', 'post_excerpt_length');

	function link_excerpt_more($more) {
		return;
	}
	add_filter('excerpt_more', 'link_excerpt_more');

	if ( function_exists( 'add_theme_support') ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 800, 600 );
	}

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'portfolio', 350, 350 );
		add_image_size( 'front-blog-thumb', 400, 400 );
		add_image_size( 'blog', 500, 300 );
		add_image_size( 'article', 800, 600 );
		add_image_size( 'skills', 32, 32 );
	}

	if ( function_exists('register_sidebar')) {
		register_sidebar(array(
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
	}

/************************************************CREATE PORTFOLIO CUSTOM POST TYPE***************************************/

	add_action('init', 'create_portfolio');
	function create_portfolio() {
		$labels = array(
			'name' 					=> _x('Portfolio', 'post type general name'),
			'singular_name' 		=> _x('Portfolio', 'post type singular name'),
			'add_new' 				=> _x('Add New', 'portfolio'),
			'add_new_item' 			=> __('Add New Portfolio Item'),
			'edit_item' 			=> __('Edit Item'),
			'new_item' 				=> __('New Item'),
			'view_item' 			=> __('View Item'),
			'search_items' 			=> __('Search Items'),
			'not_found' 			=> __('No items found'),
			'not_found_in_trash' 	=> __('No items found in Trash'),
			'parent_item_colon' 	=> ''
		);
		$args = array(
			'labels' 			=> $labels,
			'public' 			=> true,
			'show_ui' 			=> true,
			'query_var' 		=> true,
			'rewrite' 			=> true,
			'capability_type' 	=> 'post',
			'hierarchical' 		=> false,
			'menu_position' 	=> null,
			'menu_icon'			=> 'dashicons-portfolio',
			'supports' 			=> array('title', 'editor', 'thumbnail', 'comments')
		);
		register_post_type('portfolio', $args);
	}
		register_taxonomy( "portfolio-categories",
		array( "portfolio" ),
		array( "hierarchical" 			=> true,
					"labels" 			=> array('name'=>"Creative Fields", 'add_new_item'=>'Add New Field'),
					"singular_label" 	=> __( "Field" ),
					"rewrite" 			=> array( 'slug' => 'fields',
					'with_front' 		=> false)
				)
		);

	function portfolio_icons() {
		?>
		<style type="text/css" media="screen">
			#menu-posts-portfolio .wp-menu-image {
				background: url(<?php bloginfo('template_url') ?>/assets/Pages_Add.png) no-repeat 6px -17px !important;
			}
			#menu-posts-portfolio:hover .wp-menu-image,
			#menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
				background-position: 6px 7px !important;
			}
		</style>
	<?php }

/************************************************CREATE SKILLS CUSTOM POST TYPE***************************************/

	add_action('init', 'custom_skills');
	function custom_skills() {
		$labels = array(
			'name' => _x( 'Skills', 'post type general name' ),
			'singular_name' => _x( 'Skill', 'post type singular name' ),
			'add_new' => _x( 'Add New', 'skill' ),
			'add_new_item' => __( 'Add New Skill' ),
			'edit_item' => __( 'Edit Skill' ),
			'new_item' => __( 'New Skill' ),
			'all_items' => __( 'All Skills' ),
			'view_item' => __( 'View Skill' ),
			'search_items' => __( 'Search Skills' ),
			'not_found' => __( 'No skills found' ),
			'not_found_in_trash' => __( 'No skills found in trash'),
			'parent_item_colon' => '',
			'menu_item' => 'Skills'
		);
		$args = array(
			'labels' => $labels,
			'description' => 'Your skills and competencies',
			'public' => true,
			'menu_position' => 5,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
			'menu_icon' => 'dashicons-art',
			'has_archive' => true
		);
		register_post_type( 'skills', $args );
	}

	add_filter( 'post_updated_messages', 'update_skills_message' );
	function update_skills_message( $messages ) {
		global $post, $post_ID;
		$messages['skill'] = array(
			0 => '',
			1 => sprintf( __('Skill updated. <a href="%s">View Skill</a>'), esc_url( get_permalink($post_ID) ) ),
			2 => __('Custom field updated.'),
			3 => __('Custom field deleted.'),
			4 => __('Skill updated.'),
			5 => isset($_GET['revision']) ? sprintf( __('Skill restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __('Skill published. <a href="%s">View Skill</a>'), esc_url( get_permalink($post_ID) ) ),
			7 => __('Skill saved.'),
			8 => sprintf( __('Skill submitted <a target="_blank" href="%s">Preview skill</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( __('Skill scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview skill</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( __('Skill draft updated. <a target="_blank" href="%s">Preview skill</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		return $messages;
	}

	add_action( 'init', 'skill_taxonomies', 0 );
	function skill_taxonomies() {
		$labels = array(
			'name' => _x( 'Skill Categories', 'taxonomy general name' ),
			'singular_name' => _x( 'Skill Category', 'taxonomy singular name' ),
			'search_items' => __( 'Search Skill Categories' ),
			'all_items' => __( 'All Skill Categories' ),
			'parent_item' => __( 'Parent Skill Category' ),
			'parent_item_colon' => __( 'Parent Skill Category:' ),
			'edit_item' => __( 'Edit Skill Category' ),
			'update_item' => __( 'Update Skill Category' ),
			'add_new_item' => __( 'Add New Skill Category' ),
			'new_item_name' => __( 'New Skill Category' ),
			'menu_item' => __( 'Skill Categories' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
		);
		register_taxonomy( 'skill_category', 'skill', $args );
	}

?>
