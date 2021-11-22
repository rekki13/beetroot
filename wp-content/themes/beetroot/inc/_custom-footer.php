<?php
defined( 'ABSPATH' ) || exit;
/**
 * @beetroot_footer_TagFooterOpen
 */
add_action( 'footer_parts', 'beetroot_footer_TagFooterOpen', 20 );
function beetroot_footer_TagFooterOpen() {
	?>
    <!-- FOOTER -->
    <footer class="footer">

	<?php
}
/**
 * @beetroot_footer_TagFooterInner
 */
add_action( 'footer_parts', 'beetroot_footer_TagFooterInner', 30 );
function beetroot_footer_TagFooterInner() {
	$footer_sidebars = [ 'first', 'second', 'third' ];
	?>
    <div class="container mt-5 pb-5">
        <div class="row footer__row justify-content-between">
            <div class="my-3 col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5 left">
                <div class="row left__menu">
					<?php
					foreach ( $footer_sidebars as $sidebar ):
						if ( function_exists( 'dynamic_sidebar' )
						     && is_active_sidebar( 'beetroot-footer-'
						                           . $sidebar )
						):
							?>
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
								<?php
								dynamic_sidebar( 'beetroot-footer-'
								                 . $sidebar );
								?>
                            </div>
						<?php endif;
					endforeach;

					?>
                </div>
            </div>
			<?php
			if ( function_exists( 'dynamic_sidebar' )
			     && is_active_sidebar( 'beetroot-footer-fourth' )
			):
				?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5 right">
					<?php
					dynamic_sidebar( 'beetroot-footer-fourth' );
					?>
                </div>
			<?php endif ?>

        </div>

    </div>
	<?php
}

;
/**
 * @beetroot_footer_TagFooterClose
 */
add_action( 'footer_parts', 'beetroot_footer_TagFooterClose', 100 );
function beetroot_footer_TagFooterClose() {
	?> </footer>


	<?php
}

;
