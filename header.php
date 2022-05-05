<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<title><?php get_bloginfo('name'); ?></title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

<?php if (has_nav_menu('iwootheme-primary-menu')) { ?>

	<h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
<?php 
	wp_nav_menu(
	array( 'theme_location'  => 'iwootheme-primary-menu',
               'menu_class'      => 'menu-wrapper',
               'container_class' => '',
               'items_wrap'      => '<nav class="my-2 my-md-0 mr-md-3 %2$s">%3$s</nav>',
	       'fallback_cb'     => false,
	       'walker'		 => new T5_Nav_Menu_Walker_Simple()
	)); ?>

	<a class="btn btn-outline-primary" href="#">Sign up</a>
<?php } ?>
</div>
<div class="container">
