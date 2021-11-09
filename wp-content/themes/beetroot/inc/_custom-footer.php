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
	?>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <!-- container -->
            <div class="col">
                <div class="p-3 border bg-light">Custom column padding
                </div>
            </div>
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="mailSubscribe">Subscribe to news</label>
                        <input type="email" class="form-control" id="mailSubscribe" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
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
