<?php

/* CUSTOM FUNCTIONS
---------------------------------------------------------------------- */
	
	// Load theme styles
	function load_theme_styles() {
		// Load LESS stylesheet -- uncomment if using LESS compiler or WP-LESS plugin
		wp_register_style('less-styles', get_template_directory_uri()  . '/less/main.less', array(), null);
		wp_enqueue_style('less-styles');

		// Load main stylesheet (Use if not using LESS)
		// wp_register_style('theme-style', get_stylesheet_uri());
		// wp_enqueue_style('theme-style');		
	}
	add_action( 'wp_enqueue_scripts', 'load_theme_styles' );
	
	// Load custom login page styles
	function custom_login_styles() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/custom-login.css" />';
	}
	add_action('login_head', 'custom_login_styles');	
	
	// Load theme scripts
	function load_theme_scripts() {
		// Load Modernizr
		wp_register_script('modernizer', get_template_directory_uri()  . '/js/libs/modernizr-2.6.2.min.js', array(), '20130217', false);
		wp_enqueue_script('modernizer');
		// Load js plugins
		wp_register_script('plugins', get_template_directory_uri()  . '/js/plugins.js', array(), '20130217', true);
		wp_enqueue_script('plugins');
		// Load js functions
		wp_register_script('functions', get_template_directory_uri()  . '/js/functions.js', array(), '20130217', true);
		wp_enqueue_script('functions');						
	}
	add_action( 'wp_enqueue_scripts', 'load_theme_scripts' );
		
	// Add post thumbnail support and declare image sizes
	add_theme_support('post-thumbnails');
	/* add_image_size( 'handle', width, height, crop ); view params at: http://codex.wordpress.org/Function_Reference/add_image_size */
	
	
/* BOILERPLATE FUNCTIONS - *DO NOT EDIT*
---------------------------------------------------------------------- */

	// Load latest version of jQuery *and avoid duplicate loading of library
	if (!function_exists('core_mods')) {
		function core_mods() {
			if (!is_admin()) {
				function theme_enqueue_jquery() {
					wp_deregister_script('jquery');
					wp_register_script('jquery',  "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", array(), null, true);
					wp_enqueue_script('jquery');
				}
			add_action('wp_enqueue_scripts', 'theme_enqueue_jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');

	// Register sidebars if applicable
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => __('Sidebar Widgets','html5reset' ),
			'id'   => 'sidebar-widgets',
			'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));
	}

	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);  

	// Clean up the title and meta title tags in the head
	function custom_title( $title, $sep ) {
		global $paged, $page;
		if ( is_feed() )
			return $title;
		$title .= get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );	
		return $title;
	}
	add_filter( 'wp_title', 'custom_title', 10, 2 );		

	// Custom pagination for blog index
	function pagination($prev = '&laquo;', $next = '&raquo;') {
	  global $wp_query, $wp_rewrite;
	  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	  $pagination = array(
		  'base' => @add_query_arg('paged','%#%'),
		  'format' => '',
		  'total' => $wp_query->max_num_pages,
		  'current' => $current,
		  'prev_text' => __($prev),
		  'next_text' => __($next),
		  'type' => 'plain'
	);
	  if( $wp_rewrite->using_permalinks() )
	  	$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	  if( !empty($wp_query->query_vars['s']) )
	  	$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

	  echo paginate_links( $pagination );
	}

	// Enqueue custom comments layout
	function custom_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; 
		include('comments-template.php');
	}	

	// Copyright formula
	function copyright($first_year) {
		$this_year = date('Y');
		if($first_year == $this_year) {
			return $this_year;
		} else {
			return $first_year . '-' . $this_year;
		}
	}

	// Add 3.1 post format theme support.
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));

	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();	

?>