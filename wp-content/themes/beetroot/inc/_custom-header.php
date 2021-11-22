<?php
defined( 'ABSPATH' ) || exit;
/**
 * @beetroot_header_TagHeaderOpen
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderOpen', 10 );
function beetroot_header_TagHeaderOpen() {
	?>
    <!-- HEADER -->
    <div class="header__wrapper bg-white">
    <div class="container">

	<?php
}

/**
 * @beetroot_header_TagHeaderInner
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderInner', 20 );
function beetroot_header_TagHeaderInner() {
	$icon_list = get_stylesheet_directory() . '/assets/images/icons/e-list.svg';

	?>
    <header class="d-flex flex-wrap justify-content-between header py-3">
        <div class="col-1 header__left">
			<?= the_custom_logo() ?>
        </div>
        <div class="col header__right d-flex align-content-center">
            <button id="navbar-toggler" class="navbar-toggler" type="button"
                    data-toggle="collapse"
                    data-target="#topnavbar" aria-controls="topnavbar"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><?= file_get_contents( $icon_list ); ?></span>
            </button>
            <div id="topnavbar" class="collapse navbar-collapse">
                <div class="wrapper">
					<?php
					/**
					 * Args Nav Menu
					 */
					$args = array(
						'theme_location'  => 'menu-1',
						'container'       => 'nav',
						'container_class' => 'header__menu',
						'menu_class'      => 'header__menu-list nav nav-pills h-100 d-flex',
						'add_li_class'    => 'nav-item',
						'link_class'      => 'nav-link',

					);
					wp_nav_menu( $args );
					?>
                </div>
            </div>
        </div>

    </header>

	<?php
}

/**
 * @beetroot_header_TagHeaderClose
 */
add_action( 'header_parts', 'beetroot_header_TagHeaderClose', 30 );
function beetroot_header_TagHeaderClose() {
	?>
    </div>
    </div>
	<?php
}

;
