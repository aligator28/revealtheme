<div class="wrap">
<?php
	!empty( of_get_option('reveal_blog_bg_image') ) ? $blog_bg = esc_html(of_get_option('reveal_blog_bg_image')) : $blog_bg = false;
?>
<div class="wrap-blog <?php if ($blog_bg) : echo "blog-header-bg";endif;?>" <?php if ($blog_bg) : echo 'style="background-image: url(' . $blog_bg . '); background-repeat: no-repeat;"'; endif; ?>>

	<div class="breadcrumbs"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &raquo; '); ?></div>		

		<header class="page-header">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="page-title entry-title"><?php single_post_title(); ?></h1>
		<?php else : ?>
			<h2 class="page-title"><?php esc_html__( 'Posts', 'revealpresentation' ); ?></h2>
		<?php endif; ?>
		<?php
		// Display optional category description
		 if ( category_description() ) : ?>
		<div class="archive-meta category-desc"><?php echo category_description(); ?></div>
		<?php endif; ?>
		</header>

	<div id="primary" class="content-area">
		<div id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-post-format.php (where post-format is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap-blog -->
</div><!-- .wrap -->
<div class="posts-navigation">
<?php
the_posts_pagination( array(
		'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous page', 'revealpresentation' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'revealpresentation' ) . '</span>',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'revealpresentation' ) . ' </span>',
	) );
?>
</div>