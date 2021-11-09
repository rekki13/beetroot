<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beetroot
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?= body_class() ?> >
<?php
/**
 * header_parts hook
 *
 * @hooked beetroot_header_TagHeaderOpen - 10
 * @hooked beetroot_header_TagHeaderInner - 20
 * @hooked beetroot_header_TagHeaderClose - 30
 *
 */
do_action('header_parts');
?>
<!-- container -->
<div id="container">

    <!-- wrapper -->
    <div class="wrapper">


        <!-- CONTENT -->
        <main id="fullpage">
