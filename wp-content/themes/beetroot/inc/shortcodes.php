<?php
add_shortcode( 'footer_fourth_element', 'footer_fourth_element' );
function footer_fourth_element() {
	ob_start();
	get_template_part( 'template-parts/parts/footer/col','4' );
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}
