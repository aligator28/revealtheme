<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

global $slides_loop;
$counter = $slides_loop->current_post + 1;

global $slides_on_front;
if ($slides_on_front) {
	
	if ($slides_loop) {
		$counter = $slides_loop->current_post + 1;
	}
}

$notes = '';
if ( !empty(rwmb_meta( 'reveal_slide_notes' )) ) :
	$notes = wp_kses_post( rwmb_meta( 'reveal_slide_notes' ) );
endif;
?>

<?php
$video_bg = '';
if ( !empty(rwmb_meta( 'reveal_background_video' )) ) :
	$video_bg = rwmb_meta( 'reveal_background_video' );
	foreach ($video_bg as $video) {
		$video_bg = $video['url'];
	}
endif;

$embed_src = '';
if ( !empty(rwmb_meta('reveal_external_video')) ) {

	$embed_src = reveal_getFrameSrc( rwmb_meta('reveal_external_video') );
}

$autoplay = '';
if ( !empty(rwmb_meta('reveal_autoplay_video')) && rwmb_meta('reveal_autoplay_video') == '1' ) {
	$autoplay = '&autoplay=1';
}

?>

<section class="section" <?php echo "id='section" . $counter . "' "; ?> <?php reveal_posts_attrs($counter); ?> <?php // if ($video_bg) : echo 'data-background-video="' . $video_bg . '"'; endif; ?> data-background-video-muted="true"> 
	<h2 style="display: none"><?php echo __('Title', 'revealpresentation') ?></h2>

<?php /* data-background-video-loop="true" */ ?>
	<?php if ($embed_src != '') : ?>
		<iframe src="<?php echo $embed_src. $autoplay; ?>" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe>
	<?php endif; ?>

	<?php if ($video_bg != '') : ?>
		<video id="fullscreen-video" class="fullscreen-video slides-video stretch" <?php if ($autoplay == '&autoplay=1') : ?>autoplay='true'<?php endif; ?>>
		<?php //poster="<?php echo get_template_directory_uri(); /images/macbook.jpeg" ?>
			<source data-src="<?php echo esc_html($video_bg); ?>" type="video/mp4"></source>
		</video>
	<?php endif;  ?>
	<?php if ($notes) : ?><aside class="notes"><?php echo $notes; ?></aside><?php endif; ?>
	<?php the_content( '', get_the_title() ); ?>
</section>
