<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<header class="blog-header video-container">
	<?php 
		if ( !empty(rwmb_meta( 'reveal_blog_header_bg_image' )) ) :
			$header_bg = rwmb_meta( 'reveal_blog_header_bg_image' );
		foreach ($header_bg as $header_bg_image) {
			$header_bg_image = $header_bg_image['full_url'];
		}
	else: $header_bg_image = get_template_directory_uri().'/images/apple.jpg'; 
	endif; ?>
	
		<div class="front-header-bg" style="background-image: url( <?php echo esc_html( $header_bg_image ); ?> )"></div>

	<?php 
	$blog_blockquote = __('Don\'t waste your time', 'revealpresentation');
	if (!empty( of_get_option('reveal_blog_blockquote') )) {
	 $blog_blockquote = esc_html( of_get_option('reveal_blog_blockquote') ); } ?>

	<blockquote class="video-blockquote"><?php echo $blog_blockquote ?></blockquote>

</header> <!-- .blog-header .video-container -->	

<div class="wrap">
<?php !empty( of_get_option('reveal_blog_bg_image') ) ? $blog_bg = esc_html(of_get_option('reveal_blog_bg_image')) : $blog_bg = false;?>
<div class="wrap-blog <?php if ($blog_bg) : echo "blog-header-bg";endif;?>" <?php if ($blog_bg) : echo 'style="background-image: url(' . $blog_bg . '); background-repeat: no-repeat;"'; endif; ?>>

	<div class="breadcrumbs"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &raquo; '); ?></div>		

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title entry-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
		<header class="page-header">
			<h2 class="page-title"><?php esc_html__( 'Posts', 'revealpresentation' ); ?></h2>
		</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-esc_html___.php (where esc_html___ is the Post Format name) and that will be used instead.
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

<?php get_footer();
