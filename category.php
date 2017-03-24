<?php

get_header(); ?>

<?php if ( $slides_cat_id = check_if_has_categories_for_slides() ) : ?>
<div class="reveal">
	<div class="slides">
		<section>
			<h2 style="display: none"><?php echo __('Title', 'revealpresentation') ?></h2>
			<?php slides_loop($slides_cat_id); // see libs/slides-functions.php ?>
		</section>
	</div> <!-- .slides --> 
</div> <!-- .reveal -->



<?php else : ?>

	<?php get_template_part( 'template-parts/category', 'list' ); /* ?>
<div class="wrap">
	<div class="breadcrumbs"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &raquo; '); ?></div>

		<div id="primary" class="content-area">
			<main id="main" class="site-main site-main-single">
				<?php 
				// Check if there are any posts to display
				if ( have_posts() ) : ?>

				<header class="archive-header">
				<h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1>


				<?php
				// Display optional category description
				 if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
				</header>

				<?php

				// The Loop
				while ( have_posts() ) : the_post(); ?>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

				<div class="entry">
				<?php the_content(); ?>

				 <p class="postmetadata"><?php
				  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
				?></p>
				</div>

				<?php endwhile; 

				else: ?>
				<p>Sorry, no posts matched your criteria.</p>


				<?php endif; ?>
				</div>
				</section>
			</main>
		</div><!-- .content-area -->
	</div><!-- .breadcrumbs -->
<?php get_sidebar(); ?>
</div><!-- .wrap -->


<?php */ endif; ?>











<?php get_footer(); ?>
