<?php
/**
 * The template part for displaying slider
 *
 * @package Stock Photos
 * @subpackage stock_photos
 * @since Stock Photos 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="services-box my-3">    
      <?php if(has_post_thumbnail() && get_theme_mod( 'stock_photos_feature_image_hide',true) != '') { ?>
        <div class="service-image">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php  the_post_thumbnail(); ?>
            <span class="screen-reader-text"><?php the_title(); ?></span>
          </a>
        </div>
      <?php }?>
      <div class="lower-box">
        <div class="tc-category">
         <?php the_category(); ?>
        </div>
        <h2 class="py-3"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
        <?php if(get_the_excerpt()) { ?>
          <p><?php $stock_photos_excerpt = get_the_excerpt(); echo esc_html( stock_photos_string_limit_words( $stock_photos_excerpt, esc_attr(get_theme_mod('stock_photos_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('stock_photos_button_excerpt_suffix','[...]') ); ?></p>
        <?php }?>
        <?php if ( get_theme_mod('stock_photos_post_button_text','Read More') != '' ) {?>
          <div class="read-btn mt-4">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('stock_photos_post_button_text',__( 'Read More','stock-photos' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('stock_photos_post_button_text',__( 'Read More','stock-photos' )) ); ?></span>
            </a>
          </div>
        <?php }?>
      </div>
    </div>
  </article>
</div>