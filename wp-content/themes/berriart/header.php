<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', Berriart::LANG_DOMAIN ), max( $paged, $page ) );

	?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        
        <?php wp_head(); ?>
</head>
<body>
    <div class="fixed">
        <header class="top-bar">
            <ul>
                <li class="name"><h1><a href="<?php echo icl_get_home_url(); ?>"><span>&lt;?</span> berri<span>art</span></a></h1></li>
                <li class="toggle-topbar"><a href="#"></a></li>
            </ul>
            <div>
                <div class="left">
                    <p><?php _e('Web Development With Free Software', Berriart::LANG_DOMAIN); ?></p>
                </div>
                <nav>
                    <ul class="right">
                        <li class="has-dropdown">
                            <a href="#">Categories</a>
                            <ul class="dropdown">
                              <li><a href="#">Dropdown Link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact Me</a></li>
                        <li><a href="http://www.albertovarelasanchez.com/"><?php _e('My Resume', Berriart::LANG_DOMAIN); ?></a></li>
                        <li><a href="#">About This Blog</a></li>
                        <?php $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str'); ?>
                        <?php if('es' == ICL_LANGUAGE_CODE): ?>
                            <li><a href="<?php echo $languages['en']['url']; ?>">English?</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo $languages['es']['url']; ?>">¿Español?</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
    </div>