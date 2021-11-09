<?php
defined( 'ABSPATH' ) || exit;
/**
 * The footer for our theme
 * @package beetroot
 */
?>
</main>
<!-- END CONTENT-->

</div>
<!-- end wrapper -->

<?php
/**
 * footer_parts hook
 *
 * @hooked beetroot_footer_TagFooterForm - 10
 * @hooked beetroot_footer_TagFooterOpen - 20
 * @hooked beetroot_footer_TagFooterInner - 30
 * @hooked beetroot_footer_TagFooterClose - 100
 *
 */
do_action('footer_parts');
?>

</div>
<!-- end container -->

<?php wp_footer(); ?>

</body>
</html>
