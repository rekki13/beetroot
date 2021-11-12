<?php
$socials    = get_field( 'socials', 'theme_settings' );
$icon_arrow = get_stylesheet_directory() . '/assets/images/icons/e-arrow.svg';

if ( $socials ):
	?>
    <ul class="list-group list-group-horizontal right__socials h-50">
		<?php
		foreach ( $socials as $social ):

			$icon_alt = $social['alter_icon'];
			$link     = $icon_alt['link'];
			$svg      = file_get_contents( $icon_alt['url'] );
			icons_alternative_color( $svg );
			if ( $link && $svg ):
				echo( '<li class="list-group-item border-0 bg-transparent px-2 py-0">' );

				echo( '<a href="' . $link . '" target="_blank">' . $svg
				      . '</a>' );
				echo( '</li>' );
			endif;

		endforeach;
		?></ul>
<?php
endif;
?>
<form class="form-inline emailSubscribe">
    <label for="emailSubscribe__email"
           class="text-uppercase emailSubscribe__label">subscribe to
        news</label>
    <div class="input-group mb-3 border-bottom">

        <input type="email" class="form-control bg-transparent border-0 ps-0 emailSubscribe__email"
               id="emailSubscribe__email"
               aria-describedby="emailHelp" placeholder="Enter email">
        <div class="input-group-append">
            <button class="btn  border-0 p-0" type="submit"
                    id="button-submit-emailSubscribe">
                <i class="icon icon-arrow"><?= file_get_contents( $icon_arrow ) ?></i>
            </button>
        </div>
    </div>
</form>
