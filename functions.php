<?php

/* Custom Styles and Scripts
---------------------------------------------------------------------- */
	
	// Load theme styles
	function load_theme_styles() {
		// Load traditional styles -- Comment each of these out if you choose to use LESS
		wp_register_style('main', get_template_directory_uri()  . '/css/main.css', array(), null);
		wp_enqueue_style('main');
	}
	add_action( 'wp_enqueue_scripts', 'load_theme_styles' );
	
	// Load custom login page styles
	function custom_login_styles() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/custom-login.css" />';
	}
	add_action('login_head', 'custom_login_styles');	
	
	// Load theme scripts
	function load_theme_scripts() {
		// Load Header Script (Codekit Compiled File)
		wp_register_script('header', get_template_directory_uri()  . '/js/header.js', array(), '20130217', false);
		wp_enqueue_script('header');
		// Load Footer Script (Codekit Compiled File)
		wp_register_script('footer', get_template_directory_uri()  . '/js/footer.js', array(), '20130217', false);
		wp_enqueue_script('footer');			
	}
	add_action( 'wp_enqueue_scripts', 'load_theme_scripts' );
		
	// Add post thumbnail support and declare image sizes
	add_theme_support('post-thumbnails');
	/* add_image_size( 'handle', width, height, crop ); view params at: http://codex.wordpress.org/Function_Reference/add_image_size */
	
	
/* Boilerplate Functions (Do Not Edit)
---------------------------------------------------------------------- */

	// Clean up the <head>
	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');

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

	// Copyright formula
	function copyright($first_year) {
		$this_year = date('Y');
		if($first_year == $this_year) {
			return $this_year;
		} else {
			return $first_year . '-' . $this_year;
		}
	}

/* Theme Functions
---------------------------------------------------------------------- */
	
	// Register Menu
	register_nav_menu( 'primary', 'Primary Menu' );

	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));

	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();	


/* Dependencies
---------------------------------------------------------------------- */

// Register Custom Navigation Walker
require_once('classes/wp_bootstrap_navwalker.php');

?>
