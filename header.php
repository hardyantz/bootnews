<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	</div>
	
	<div class="collapse navbar-collapse">
		
		
			<?php $nav_results = wp_nav_menu( array( 'theme_location' => 'primary', 'echo' => false  ) ); echo str_replace(array('<div class="menu">', '<ul>','</div>'), array('','<ul class="nav navbar-nav">',''), $nav_results); ?>
			<!--<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>-->
			
		
		<?php get_search_form(); ?>
		
	</div>
</div>

