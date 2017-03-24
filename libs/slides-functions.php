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

function getFrameSrc($html_code) {
	$allowed_html = array(
		'iframe' => array(
			'src' => true,
		),
		'div' => array(),
	); 
	$videoEmbed = wp_kses( $html_code, $allowed_html );
	$doc = new DOMDocument();
	$doc->loadHTML($videoEmbed);

	$embed_src = $doc->getElementsByTagName('iframe')->item(0)->getAttribute('src');
	$embed_src = esc_url( $embed_src );
	
	return $embed_src;
}


function check_if_has_categories_for_slides() {

	if (is_category()) :
		// определяем текущую категорию из меню и выбираем слайды только текущей категории
		$category = get_category( get_query_var( 'cat' ) );
		$slides_cat_id = $category->cat_ID;
	 	// если использовать 'category__in' а не 'cat', то дочерние категории не будут выбираться
		$slides_loop = new WP_Query( array( 'post_type' => 'slides', 'category__in' => $slides_cat_id, 'posts_per_page' => -1, 'order' => 'asc' ) );
		
		if ($slides_loop->have_posts()) {
			return $slides_cat_id;
		} else {
			return false;
		}
	endif;
}