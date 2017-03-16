<?php 
// change navigation menu urls from default to #/some-url - only html anchors using
function reveal_change_menu($items) {
	if(is_home())	{
		// varDump($items);
		foreach($items as $key => $item) {
		    $item->url = "#/section" .  $key;
		    $item->attr_title = "section" .  $key;
		}
	}
  return $items;
}
// add_filter('wp_nav_menu_objects', 'reveal_change_menu');


function reveal_posts_attrs($counter) {
	
	// echo "data-autoslide='" . (2000 * ($counter + 1)) . "' ";

	// styles
	echo "style='";

	// $display_menu = esc_html( of_get_option('reveal_display_navigation', 0) );
	// $display_menu == 0 ? $margin_top = '0' : $margin_top = '100px';
	// $margin_top = 0;
	// echo "margin-top: " . $margin_top . "; "; // move section when main navigation is displayed or not (see Appearance->Theme Options->Navigation Settings->Always display top navigation)

	if ( !empty(rwmb_meta( 'reveal_background_color' )) ) :
		echo "background-color: " . esc_html(rwmb_meta( 'reveal_background_color' )) . "; ";
	endif;   
	if ( !empty(rwmb_meta( 'reveal_background_image' )) ) :

		$img = rwmb_meta( 'reveal_background_image' );
		$img = array_values($img);

		$bg_image = esc_html($img[0]['full_url']);
		echo "background-image: url(" . $bg_image . "); background-repeat: no-repeat; background-size: cover; background-position: center;";
	endif;
	echo "'";//style ends

	// data-autoslide
	if ( 
		!empty( esc_html( of_get_option('reveal_enable_autoslide') ) ) && 
		!empty( rwmb_meta( 'reveal_autoslide_time' ) ) 
		) {
		echo 'data-autoslide="' . ( intval( rwmb_meta( 'reveal_autoslide_time' ) ) * 1000 ) . '"';
	}
}


function reveal_getFrameSrc($html_code) {
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

function reveal_strip_empty_tags($html) {

$pattern = '/<(\w+)\b(?:\s+[\w\-.:]+(?:\s*=\s*(?:"[^"]*"|"[^"]*"|[\w\-.:]+))?)*\s*\/?>\s*<\/\1\s*>/';
// $pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";  //use this pattern to remove any empty tag

//$pattern = "/<p[^>]*><\\/p[^>]*>/"; 
$html =  preg_replace($pattern, '', $html);
varDump($html);

return $html;
// output
//abc<p>dd</p><b>non-empty</b>
}