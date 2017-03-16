<?php get_header(); ?>

<div class="reveal" id="reveal">
	<div class="slides">
		<section>
			<h2 style="display: none"><?php echo __('Title', 'revealpresentation') ?></h2>
			<?php slides_loop(); // see libs/slides-functions.php ?>
		</section>
	</div> <!-- .slides --> 
</div> <!-- .reveal -->

<?php get_footer(); ?>
