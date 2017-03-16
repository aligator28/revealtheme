<?php
// varDump(get_the_category());

function slides_loop($slides_cat_id = null) {
	global $slides_loop;

 	// если использовать 'category__in' а не 'cat', то дочерние категории не будут выбираться
	$slides_loop = new WP_Query( array( 'post_type' => 'slides', 'category__in' => $slides_cat_id, 'posts_per_page' => -1, 'order' => 'asc' ) );

	if ($slides_loop->have_posts()) :

		while ( $slides_loop->have_posts() ) : $slides_loop->the_post();

			if ( empty( rwmb_meta('reveal_use_slide') ) 
				&& rwmb_meta('reveal_use_slide') == 0 ) {
				continue;
			}
			get_template_part( 'template-parts/content', 'slides' );

		endwhile;
?>
	<section id="last"></section>
<?php

	else:
		get_template_part( 'template-parts/content', 'none' );
	endif;

	wp_reset_query();
}
