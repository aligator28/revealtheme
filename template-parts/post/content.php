<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url('<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : the_post_thumbnail_url( 'large' ); else: echo get_template_directory_uri().'/images/overview_bg.png'; endif; ?>')">
	<?php
		if ( is_sticky() && is_home() ) :
	?>
	<i class="icofont icofont-tack-pin"></i>
	<?php		//echo reveal_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						reveal_posted_on();
					else :
						echo reveal_time_link();
						reveal_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			// $content = get_the_content();
			// echo wp_trim_words( strip_shortcodes( $content ), '15', $more = '...' );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php reveal_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
