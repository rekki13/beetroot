<?php
defined( 'ABSPATH' ) || exit;
/**
 * @beetroot_header_TagHeaderOpen
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderOpen', 10 );
function beetroot_header_TagHeaderOpen() {
	?>
    <!-- HEADER -->
    <div class="container">


	<?php
}

/**
 * @beetroot_header_TagHeaderInner
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderInner', 20 );
function beetroot_header_TagHeaderInner() {
	?>
        <header class="d-flex flex-wrap justify-content-between header py-3">

	        <?= the_custom_logo() ?>

	        <?php
	        /*
			 * Args Nav Menu
			 */
	        $args = array(
		        'theme_location'  => 'menu-1',
		        'container'       => 'nav',
		        'container_class' => 'header__menu',
		        'menu_class'      => 'header__menu-list nav nav-pills h-100 d-flex align-items-center',
		        'add_li_class'  => 'nav-item',
		        'link_class' => 'nav-link',

	        );
	        wp_nav_menu( $args );
	        ?>
        </header>
	<?php
}

;
/**
 * @beetroot_header_TagHeaderClose
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderClose', 30 );
function beetroot_header_TagHeaderClose() {
	?>
    </div>
    <!-- END HEADER -->
	<?php
}

;
