<?php
/**
 * The template for displaying the footer
 */

?>

<footer id="sn-footer" role="contentinfo" >
<div class="sn-container">
    <div class="sn-row">
        <div class="sn-col-4">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 1") ) : ?>
            <?php endif;?>
        </div>
        <div class="sn-col-4">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 2") ) : ?>
            <?php endif;?>
        </div>
        <div class="sn-col-4">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 3") ) : ?>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="sn-footer-copy">
<div class="sn-container">
<?php echo esc_html__( 'Copyright', 'saeon' ); ?> <?php echo date("Y"); ?> <?php bloginfo( 'title' ); ?> | <?php echo esc_html__( 'Powered by', 'saeon' ); ?> <a href="http://www.saeon.ac.za/" target="_blank">SAEON</a>
</div>
</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>