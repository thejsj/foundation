<!DOCTYPE html>
<!--[if lt IE 7]>                 <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>                    <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>                   <html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>                   <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->         <html class="no-js" lang="en"> <!--<![endif]-->

<head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <?php echo(is_search()) ? '<meta name="robots" content="noindex, nofollow" />' : ''; ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
        <meta name="description" content="<?php bloginfo('description');?>">
        <meta name="google-site-verification" content="">
        <meta name="author" content="Scarbrough Studios">
        <meta name="Copyright" content="<?php echo ' Copyright' . bloginfo('name') . '. All Rights Reserved.';?>">
        <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=10.0,initial-scale=1.0" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
</head>
<body>
        <div class="page">
                <!-- Header Begins -->
                <header id="header">
                        <div class="container">
                                <h1><a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
                                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                        </div>
                </header>
                <!-- Header Ends -->