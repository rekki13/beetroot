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

;
/**
 * @beetroot_footer_TagFooterInner
 */
add_action( 'footer_parts', 'beetroot_footer_TagFooterInner', 30 );
function beetroot_footer_TagFooterInner() {
	$footer_sidebars = [ 'first', 'second', 'third' ];
	?>
    <div class="container my-5 py-5">
        <div class="row footer__row justify-content-between">
            <div class="col-5 left">
                <div class="row left__menu">
					<?php
					foreach ( $footer_sidebars as $sidebar ):
						if ( function_exists( 'dynamic_sidebar' )
						     && is_active_sidebar( 'beetroot-footer-'
						                           . $sidebar )
						):
							?>
                            <div class="col-4">
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
            <!-- container -->
			<?php
			if ( function_exists( 'dynamic_sidebar' )
			     && is_active_sidebar( 'beetroot-footer-fourth' )
			):
				?>
                <div class="col-5 right">
					<?php
					dynamic_sidebar( 'beetroot-footer-fourth' );
					?>
                </div>
			<?php endif ?>

        </div>
        <!-- end left -->
        <!-- end container -->

        <!-- end container -->

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
