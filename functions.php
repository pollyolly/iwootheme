
<?php

function iwootheme_styles(){
	wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css',array(),'1.0');
	wp_enqueue_style('bootstrap-style',get_template_directory_uri().'/theme_assets/css/bootstrap.min.css',array(),'1.0');
}
add_action('wp_enqueue_scripts','iwootheme_styles');

function iwootheme_scripts(){
	remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts');
        remove_action('wp_head', 'wp_enqueue_scripts');

	wp_register_script('popper-script',get_template_directory_uri().'/theme_assets/js/popper.min.js',array(),'1.0');
	wp_register_script('bootstrap-script',get_template_directory_uri().'/theme_assets/js/bootstrap.min.js',array(),'1.0');

	wp_register_script('parent-script',get_template_directory_uri().'/theme_assets/js/script.js',array(),'1.0');

	add_action('wp_footer', 'wp_print_scripts');
        add_action('wp_footer', 'wp_enqueue_scripts');
	add_action('wp_footer', 'wp_print_head_scripts');

	wp_enqueue_script('popper-script');
	wp_enqueue_script('bootstrap-script');
	wp_enqueue_script('parent-script');

}
add_action('wp_enqueue_scripts','iwootheme_scripts');

/* Woocommerce Support */
function woocommerce_support() {
	//add_theme_support('menus');
	//add_theme_support('post-thumbnails');
	//add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
                'single_image_width'    => 300,
                'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
         ),
        ) );

}
add_action( 'after_setup_theme', 'woocommerce_support' );

/*add_filter( 'body_class', 'woocommerceotherpages' );
function woocommerceotherpages( $classes ) {
		if ( is_page_template( 'header.php' )) {
		        $classes[] = 'woocommerce';
	        }
           return $classes;
	  }
 */
if (class_exists('Woocommerce')){
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
}
/* Widgets Footer */
function footer_widgets() {
	register_sidebar( array(
		'name'          => 'Left footer widget',
		'id'            => 'left_footer_widget',
		'before_widget' => '<ul class="list-unstyled text-small">',
		'after_widget'  => '</ul>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => 'Left footer widget 2',
		'id'            => 'left_footer_widget_2',
		'before_widget' => '<ul class="list-unstyled text-small">',
		'after_widget'  => '</ul>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => 'Right footer widget',
		'id'            => 'right_footer_widget',
		'before_widget' => '<ul class="list-unstyled text-small">',
		'after_widget'  => '</ul>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => 'Right footer widget 2',
		'id'            => 'right_footer_widget_2',
		'before_widget' => '<ul class="list-unstyled text-small">',
		'after_widget'  => '</ul>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action('widgets_init','footer_widgets');
/* Menu */
function header_menu() {
	register_nav_menu('iwootheme-primary-menu',__( 'Iwootheme Primary Menu' ));
}
add_action( 'init', 'header_menu' );
function register_navwalker(){
	require_once get_template_directory() . '/class.T5_Nav_Menu_Walker_Simple.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
