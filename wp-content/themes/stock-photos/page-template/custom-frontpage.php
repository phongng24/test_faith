<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Stock Photos
 */
get_header(); ?>

<main id="main" role="main">
  
  <?php if ( get_header_image() ){?>
    <section class="slider-header mb-4">
      <div class="header-content">
        <?php if (get_theme_mod('stock_photos_header_title') != '') { ?>
          <h1><?php echo esc_html(get_theme_mod('stock_photos_header_title')); ?></h1>
        <?php } ?>
        <?php if (get_theme_mod('stock_photos_header_text') != '') { ?>
          <p><?php echo esc_html(get_theme_mod('stock_photos_header_text')); ?></p>
        <?php } ?>
      </div>
      <div class="category-slider">
        <div class="slider-bg"></div>
        <div class="container">
          <?php if (get_theme_mod('stock_photos_featured_title') != '') { ?>
            <strong class="cat-title mx-lg-5"><?php echo esc_html(get_theme_mod('stock_photos_featured_title')); ?></strong>
          <?php }?>
          <div class="owl-carousel">
            <?php
              $args = array(
                'orderby'    => 'title',
                'order'      => 'ASC',
                'hide_empty' => 0,
                'parent'  => 0
              );
              $stock_photos_product_categories = get_terms(  $args );
              $count = count($stock_photos_product_categories);
              if ( $count > 0 ){
                foreach ( $stock_photos_product_categories as $stock_photos_product_category ) {
                    $ecommerce_cat_id   = $stock_photos_product_category->term_id;
                  $cat_link = get_category_link( $ecommerce_cat_id );
                  $thumbnail_id = get_term_meta($ecommerce_cat_id, 'category_image', true); // Get Category Thumbnail
                  if ($stock_photos_product_category->category_parent == 0) {
                    ?>
                    <div class="cat-box">
                      <?php
                      if ( $thumbnail_id ) {
                        echo '<img class="thumb_img" src="' . esc_url( $thumbnail_id ) . '" alt="" />';
                      }?>
                      <a href="<?php echo esc_url(get_term_link( $stock_photos_product_category ) ); ?>">
                      <?php echo esc_html( $stock_photos_product_category->name ); ?></a></div>
                  <?php }
                }
              }
            ?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'stock_photos_before_services' ); ?>

  <section id="choices-section" class="py-4">
  	<div class="container">
      <?php if (get_theme_mod('stock_photos_section_title') != '') { ?>
        <h2 class="text-center"><?php echo esc_html(get_theme_mod('stock_photos_section_title')); ?></h2>
      <?php } ?>
      <div class="choices-box">
        <div class="tab text-center mt-3 mb-5">
          <?php
            $category_post = get_theme_mod('stock_photos_services_number', '');
            for ( $j = 1; $j <= $category_post; $j++ ){ ?>
            <button class="tablinks" onclick="stock_photos_project_tab(event, '<?php $main_id = get_theme_mod('stock_photos_services_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?> ')">
            <?php echo esc_html(get_theme_mod('stock_photos_services_text'.$j)); ?></button>
          <?php }?>
        </div>

        <?php for ( $j = 1; $j <= $category_post; $j++ ){ ?>
          <div id="<?php $main_id = get_theme_mod('stock_photos_services_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?>"  class="tabcontent mt-3">
            <div class="row">
              <?php
              $stock_photos_catData = get_theme_mod('stock_photos_services_category'.$j);
              if($stock_photos_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html( $stock_photos_catData ,'stock-photos')));
                $bgcolor = 1; ?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-lg-4 col-md-6">
                    <?php if(has_post_thumbnail()) {?>
                      <div class="box mb-4">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                      </div>
                    <?php }?>
                  </div>
                <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
                wp_reset_postdata();
              } ?>
            </div>
          </div>
        <?php }?>
      </div>
  	</div>
  </section>

  <?php do_action( 'stock_photos_after_product' ); ?>

  <div id="content-ma">
  	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
</main>

<?php get_footer(); ?>