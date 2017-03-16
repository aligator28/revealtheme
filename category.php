<?php
// определяем текущую категорию из меню и выбираем слайды только текущей категории
$category = get_category( get_query_var( 'cat' ) );
$slides_cat_id = $category->cat_ID;




get_header(); ?>

<div class="reveal">
	<div class="slides">
		<section>
			<h2 style="display: none"><?php echo __('Title', 'revealpresentation') ?></h2>
			<?php slides_loop($slides_cat_id); // see libs/slides-functions.php ?>
		</section>
	</div> <!-- .slides --> 
</div> <!-- .reveal -->

<?php get_footer(); ?>
