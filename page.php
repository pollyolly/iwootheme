<?php
get_header();
echo "page.php";
?>
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_format() );
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;
?>
<?php
		var_dump(get_post_format());
get_sidebar();
get_footer();


