<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Reveal Theme
 * @since Reveal Theme 1.0
 */
?>

<div class="wrap">
	<div class="content-area page-content">
		<div class="breadcrumbs"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &raquo; '); ?></div>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php reveal_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'revealpresentation' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'revealpresentation' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'revealpresentation' ),
						get_the_title()
					),
					'<footer class="entry-footer"><span class="edit-link">',
					'</span></footer><!-- .entry-footer -->'
				);
			?>

		</article><!-- #post-## -->
	</div><!-- .content-area -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
