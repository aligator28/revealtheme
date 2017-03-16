<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<?php global $slides_on_front; ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) 
			&& !$slides_on_front 
			&& get_post_type() != 'slides'  
		) : ?>
	<aside id="secondary" class="sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
