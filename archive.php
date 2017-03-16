<?php get_header(); ?>
<div class="breadcrumbs"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &raquo; '); ?></div>
<?php
	global $slides_on_front, $counter; // see functions.php
	$counter = 1;

if (!$slides_on_front) : // default page loop 
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'archive' );
		$counter++;

	endwhile;
?>
<?php
	the_posts_pagination( array(
		'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous page', 'revealpresentation' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'revealpresentation' ) . '</span>',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'revealpresentation' ) . ' </span>',
	) );
?>

<?php 
endif; // !$slides_on_front 
?>
<?php get_footer(); ?>