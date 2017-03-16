<?php
/**
 * Template part for displaying features
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage RevealPresentation
 * @since 1.0
 * @version 1.0
 */

global $counter;

if ($counter % 2 != 0) :
?>
<article class="archive-entry">
	<div class="archive-item archive-left" style="background-image: url(<?php echo get_the_post_thumbnail() !== '' ? the_post_thumbnail_url( 'full' ) : get_stylesheet_directory_uri() . '/images/map_bg2.png' ; ?>)">
	</div>
	<div class="archive-item archive-right">
		<div class="archive-entry-content">
			<header class="entry-header">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>
			</header><!-- .entry-header -->
			<?php 
				// if ( !empty( rwmb_meta('reveal_short_description') ) ) : echo wp_kses_post( rwmb_meta('reveal_short_description') ); 
				// endif; 
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
<?php else : ?>
<article class="archive-entry">
	<div class="archive-item archive-right">
		<div class="archive-entry-content">
			<header class="entry-header">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>
			</header><!-- .entry-header -->
			<?php 
				// if ( !empty( rwmb_meta('reveal_short_description') ) ) : echo wp_kses_post( rwmb_meta('reveal_short_description') ); 
				// endif; 
			?>
		</div><!-- .entry-content -->
	</div>
	<div class="archive-item archive-left" style="background-image: url(<?php echo get_the_post_thumbnail() !== '' ? the_post_thumbnail_url( 'full' ) : get_stylesheet_directory_uri() . '/images/map_bg2.png' ; ?>)">
	</div>

</article><!-- #post-## -->

<?php endif; ?>

