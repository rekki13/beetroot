<?php
defined( 'ABSPATH' ) || exit;
/**
 * @beetroot_header_TagHeaderOpen
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderOpen', 10 );
function beetroot_header_TagHeaderOpen() {
	?>
    <!-- HEADER -->
    <header class="header ">


	<?php
}

/**
 * @beetroot_header_TagHeaderInner
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderInner', 20 );
function beetroot_header_TagHeaderInner() {
	?>
    <div class="container">
        <div class="row">
            <div class="col">
				<?= the_custom_logo() ?>

            </div>
            <div class="col">

				<?php
				/*
				 * Args Nav Menu
				 */
				$args = array(
					'theme_location'  => 'menu-1',
					'container'       => 'nav',
					'container_class' => 'header__menu',
					'menu_class'      => 'header__menu-list',
				);
				wp_nav_menu( $args );
				?>
                <!-- container -->
            </div>
        </div>

    </div>

	<?php
}

;
/**
 * @beetroot_header_TagHeaderClose
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderClose', 30 );
function beetroot_header_TagHeaderClose() {
	?>

    </header>
    <!-- END HEADER -->
	<?php
}

;
