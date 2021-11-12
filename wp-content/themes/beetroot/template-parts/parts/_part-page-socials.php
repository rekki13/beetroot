<?php
//print_r($args);
$alt_color = $args['alt_colors'];


// Check value exists.
if ( have_rows( 'socials', 'theme_settings' ) ):
	while ( have_rows( 'socials', 'theme_settings' ) ) : the_row();

		foreach ( $args['social_name'] as $key => $social ):
			if ( get_row_layout() == $social ):
				$icon     = get_sub_field( 'icon' );
				$icon_alt = get_sub_field( 'alter_icon' );
				$link     = get_sub_field( 'link' );
				if ( $icon && $icon_alt == 'image/png' ):
					echo( '<a href="' . $link . '" target="_blank"><img src="'
					      . $icon['icon']['url']
					      . '"alt="'
					      . $icon['icon']['alt']
					      . '"></a>' );
				else:
					if ( $alt_color ):
						$svg = file_get_contents( $icon_alt['url'] );
						icons_alternative_color( $svg );
					else:
						$svg = file_get_contents( $icon['url'] );
						icons_alternative_color( $svg );

					endif;
					echo( '<a href="' . $link . '" target="_blank">' . $svg
					      . '</a>' );
				endif;

			endif;

		endforeach;// Case: Paragraph layout.
	endwhile;
endif;
?>


