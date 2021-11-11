<?php
/*
 * Partial: Page Testimonials
 */
//print_r($args); // выведет hello
$id        = $args->ID;
$name      = $args->post_title;
$content   = $args->post_content;
$position  = get_field( 'position', $id );
$thumbnail = get_the_post_thumbnail( $id );

$icon_arrow = get_stylesheet_directory() . '/assets/images/icons/e-arrow.svg';
$icon_quote = get_stylesheet_directory() . '/assets/images/icons/e-quote.svg';
?>
<div class="card swiper-slide border-0">
    <div class="card-body p-0 ps-5">
        <span class="card-title  position-absolute start-0"><i class="icon  icon-quote"><?= file_get_contents( $icon_quote ); ?>
            </i>
        </span>
        <div class="template-demo">
            <p><?= $content ?></p>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-4"><?= $thumbnail ?>
            </div>
            <div class="col-sm-10 col-md-8">
                <div class="profile">
                    <h4 class="cust-name"><?= $name ?></h4>
                    <p class="cust-profession m-0"><?= $position ?></p>
                    <a href="#"><?= __( 'Read the story ' ) ?><i class="icon icon-arrow d-inline-block"><?= file_get_contents($icon_arrow)?></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
