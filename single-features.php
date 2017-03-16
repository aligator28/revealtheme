<?php get_header(); ?>
<div class="breadcrumbs"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &raquo; '); ?>
</div>

<header class="entry-header archive-single-header">
	<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	?>
</header><!-- .entry-header -->

<article class="archive-entry">
	<div class="archive-item archive-left" style="background-image: url(<?php echo get_the_post_thumbnail() !== '' ? the_post_thumbnail_url( 'full' ) : get_stylesheet_directory_uri() . '/images/map_bg2.png' ; ?>)">
	</div>
	<div class="archive-item archive-right">
		<div class="archive-entry-content">
			<?php echo $post->post_content; ?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->

<?php get_footer(); ?>