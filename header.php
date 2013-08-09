<!DOCTYPE html>
<!--
----------------------------------------------------------------
      _______________   _______________
     /  __________  /  /  __________  /
    /   /         |/  /   /         |/
   /   /___________  /   /___________
  /____________   / /____________   /
             /   /             /   /
 /|_________/   /  /|_________/   /
/______________/  /______________/  (c) 2013 Scarbrough Studios

----------------------------------------------------------------
-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
  <meta name="description" content="<?php bloginfo('description');?>">
  <meta name="google-site-verification" content="">
	<meta name="author" content="Scarbrough Studios">
	<meta name="Copyright" content="<?php echo ' Copyright' . bloginfo('name') . '. All Rights Reserved.';?>">
  <!-- Viewport setting for responsive layout
  <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=10.0,initial-scale=1.0" />-->
  <!-- Standard viewport setting -->
  <meta name="viewport" id="viewport" content="width=device-width" />
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/ico/apple-touch-icon-57-precomposed.png">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body>
	<!-- HEADER BEGINS -->
	<header id="header">
		<div class="container">
			<nav id="header-nav">
				<div class="navbar">
					<div class="navbar-inner">
						<a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
						<ul class="nav">
							<li class="active"><a href="#">First Menu Item</a></li>
							<li><a href="#">Second Menu Item</a></li>
							<li><a href="#">Third Menu Item</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- HEADER ENDS -->