<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Stock Photos
 */
?>
    <footer role="contentinfo">
        <?php //Set widget areas classes based on user choice
            $stock_photos_widget_areas = get_theme_mod('stock_photos_footer_widget_layout', '4');
            if ($stock_photos_widget_areas == '3') {
                $cols = 'col-lg-4 col-md-4';
            } elseif ($stock_photos_widget_areas == '4') {
                $cols = 'col-lg-3 col-md-3';
            } elseif ($stock_photos_widget_areas == '2') {
                $cols = 'col-lg-6 col-md-6';
            } else {
                $cols = 'col-lg-12 col-md-12';
            }
        ?>
        <?php if (get_theme_mod('stock_photos_footer_hide_show', true)){ ?>
            <div class="footertown">
                <div class="container">
                    <div class="row">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-1'); ?>
                          </div>
                        <?php endif; ?> 
                        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-2'); ?>
                          </div>
                        <?php endif; ?> 
                        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-3'); ?>
                          </div>
                        <?php endif; ?> 
                        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                          <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-4'); ?>
                          </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if (get_theme_mod('stock_photos_copyright_hide_show', true)) {?>    
            <div id="footer">
            	<div class="container">
                    <p class="mb-0"><?php stock_photos_credit_link(); ?> <?php echo esc_html(get_theme_mod('stock_photos_footer_copy',__('By ThemesCaliber','stock-photos'))); ?> </p>
                </div>
            </div>
        <?php } ?>    
        <?php if( get_theme_mod( 'stock_photos_show_back_to_top',true) != '' || get_theme_mod('stock_photos_responsive_show_back_to_top',true) != '') { ?>
            <?php $stock_photos_scroll_lay = get_theme_mod( 'stock_photos_back_to_top_alignment','Right');
            if($stock_photos_scroll_lay == 'Left'){ ?>
                <a href="#" class="scrollup left"><span><?php echo esc_html( get_theme_mod('stock_photos_back_to_top_text',__('Back to Top', 'stock-photos' )) ); ?><?php if(get_theme_mod('stock_photos_back_to_top_icon') != 'None') {?><i class="<?php echo esc_attr(get_theme_mod('stock_photos_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('stock_photos_back_to_top_text',__('Back to Top', 'stock-photos' )) ); ?></span></a>
            <?php }else if($stock_photos_scroll_lay == 'Center'){ ?>
                <a href="#" class="scrollup center"><span><?php echo esc_html( get_theme_mod('stock_photos_back_to_top_text',__('Back to Top', 'stock-photos' )) ); ?><?php if(get_theme_mod('stock_photos_back_to_top_icon') != 'None') {?><i class="<?php echo esc_attr(get_theme_mod('stock_photos_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('stock_photos_back_to_top_text',__('Back to Top', 'stock-photos' )) ); ?></span></a>
            <?php }else{ ?>
                <a href="#" class="scrollup right"><span><?php echo esc_html( get_theme_mod('stock_photos_back_to_top_text',__('Back to Top', 'stock-photos' )) ); ?><?php if(get_theme_mod('stock_photos_back_to_top_icon') != 'None') {?><i class="<?php echo esc_attr(get_theme_mod('stock_photos_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('stock_photos_back_to_top_text',__('Back to Top', 'stock-photos' )) ); ?></span></a>
            <?php }?>
        <?php }?>
        <?php wp_footer(); ?>
    </footer>
</body>
</html>