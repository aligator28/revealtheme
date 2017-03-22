<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Reveal Theme
 * @since Reveal Theme 1.0
 */


get_header(); 
?>



<?php
global $slides_on_front; // see functions.php
if ($slides_on_front) : 
?>
		<div class="reveal" id="reveal">
			<div class="slides">
				<section>
					<h2 style="display: none"><?php echo __('Title', 'revealpresentation') ?></h2>
<?php
// Start the loop if slides is on front page see Appearance->Theme Options->Advanced Settings->Enable Presentation Slides on Front Page
//if ($slides_on_front) :

	$cat = '';
	if ( !empty(of_get_option('reveal_category_slides_on_front_page')) ) {
		$cat = of_get_option('reveal_category_slides_on_front_page');
	}
	slides_loop($cat);//require 'template-parts/slides-loop.php';

endif; //  $slides_on_front
?>


<?php if (!$slides_on_front) : // default page loop 
	while ( have_posts() ) : the_post();
	// Include the page content template.
	if ( is_front_page() ) {
		get_template_part( 'template-parts/content', 'front-page' );
	}
	else {
		get_template_part( 'template-parts/content', 'page' );
	
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
	// // If comments are open or we have at least one comment, load up the comment template.
	
	// End of the loop.
	endwhile;
endif; // !$slides_on_front 
?>

<?php if ($slides_on_front) : ?>
				</section>
			</div> <!-- .slides -->
		</div> <!-- .reveal -->
<?php endif; ?>

<?php // if (!$slides_on_front) : ?>
<?php // get_sidebar(); ?>
<?php // endif; ?>

<?php get_footer(); ?>
