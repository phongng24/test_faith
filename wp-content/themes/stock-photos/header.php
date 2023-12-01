<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ma">
 *
 * @package Stock Photos
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="main-bodybox">
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('stock_photos_preloader_hide',false)!= '' || get_theme_mod('stock_photos_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'stock_photos_preloader_type','center-square') == 'center-square'){ ?>
	    <div class='preloader'>
		    <div class='preloader-squares'>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
		    </div>
			</div>
    <?php }else if(get_theme_mod( 'stock_photos_preloader_type') == 'chasing-square') {?>    
      <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
    <?php }?>
	<?php }?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'stock-photos' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content ', 'stock-photos' );?></span></a>
		<div id="header">
	  	<div class="topbar">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-lg-3 col-md-5 align-self-center">
	  					<div class="logo text-md-start text-center">
				     	 	<?php if ( has_custom_logo() ) : ?>
			     	    	<div class="site-logo"><?php the_custom_logo(); ?></div>
		            <?php endif; ?>
		            <?php if( get_theme_mod( 'stock_photos_site_title',true) != '') { ?>
			            <?php $blog_info = get_bloginfo( 'name' ); ?>
			            <?php if ( ! empty( $blog_info ) ) : ?>
				            <?php if ( is_front_page() && is_home() ) : ?>
				              <h1 class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				            <?php else : ?>
				              <p class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				            <?php endif; ?>
			            <?php endif; ?>
				        <?php }?>
				        <?php if( get_theme_mod( 'stock_photos_site_tagline',false) != '') { ?>
			            <?php
			            $description = get_bloginfo( 'description', 'display' );
			            if ( $description || is_customize_preview() ) :
			            ?>
				            <p class="site-description">
				              <?php echo esc_html($description); ?>
				            </p>
			            <?php endif; ?>
				        <?php }?>
					    </div>
	  				</div>
	  				<div class="col-lg-6 col-md-12 align-self-center d-md-flex order-lg-1 order-md-2 my-lg-0 my-4">
			      	<div class="image-cat position-relative">
				        <button class="product-btn"><i class="far fa-images me-2"></i><?php esc_html_e('All Images','stock-photos'); ?><i class="fas fa-caret-down ms-2"></i></button>
				        <div class="product-cat">
				          <?php
				            $args = array(
				              //'number'     => $number,
				              'orderby'    => 'title',
				              'order'      => 'ASC',
				              'hide_empty' => 0,
				              'parent'  => 0
				              //'include'    => $ids
				            );
				            $product_categories = get_terms( $args );
				            $count = count($product_categories);
				            if ( $count > 0 ){
			                foreach ( $product_categories as $product_category ) {
			                  $product_cat_id   = $product_category->term_id;
			                  $cat_link = get_category_link( $product_cat_id );
			                  if ($product_category->category_parent == 0) { ?>
					                <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
					                <?php
					              }
		                		echo esc_html( $product_category->name ); ?></a></li>
		                		<?php
	                		}
		              	}
				          ?>
			        	</div>
			      	</div>
	  					<div class="header-search">
	  						<?php get_search_form(); ?>
	  					</div>
	  				</div>
	  				<div class="col-lg-3 col-md-7 align-self-center order-lg-2 order-md-1">
	  					<div class="pricing-account text-md-end text-center">
		  					<?php if(get_theme_mod('stock_photos_pricing_text') != '' || get_theme_mod('stock_photos_pricing_url') != ''){ ?>
		  						<a href="<?php echo esc_url(get_theme_mod('stock_photos_pricing_url')); ?>" class="pricing"><?php echo esc_html(get_theme_mod('stock_photos_pricing_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('stock_photos_pricing_text')); ?></span></a>
		  					<?php }?>
		  					<?php if(class_exists('woocommerce')){ ?>
		  						<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="myaccount"><i class="far fa-user"></i><span class="screen-reader-text"><?php esc_html_e('My Account','stock-photos'); ?></span></a>
		  					<?php }?>
		  				</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="menu-section">
	  		<div class="row me-0">
	  			<div class="col-lg-8 col-md-6 align-self-center">
	  				<div class="menubox <?php if( get_theme_mod( 'stock_photos_sticky_header', false) != '' || get_theme_mod('stock_photos_responsive_sticky_header',false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
							<?php  ?>
						   	<div class="toggle-menu responsive-menu text-end">
	               	<button role="tab" onclick="stock_photos_menu_open()"><i class="<?php echo esc_html(get_theme_mod('stock_photos_responsive_open_menu_icon','fas fa-bars'));?> py-1 px-2"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','stock-photos'); ?></span></button>
	             	</div>
	             	<div id="menu-sidebar" class="nav side-menu ms-xl-5">
	                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'stock-photos' ); ?>">
	                  <?php 
	                    wp_nav_menu( array( 
	                      'theme_location' => 'primary',
	                      'container_class' => 'main-menu-navigation clearfix' ,
	                      'menu_class' => 'clearfix',
	                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 p-0">%3$s</ul>',
	                      'fallback_cb' => 'wp_page_menu',
	                    ) ); 
	                  ?>
	                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="stock_photos_menu_close()"><i class="<?php echo esc_html(get_theme_mod('stock_photos_responsive_close_menu_icon','fas fa-times'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','stock-photos'); ?></span></a>
	                </nav>
	            	</div>
	          	<?php ?>
	          </div>
					</div>
					<div class="col-lg-4 col-md-6 align-self-center">
						<div class="button-section me-xl-5 pe-md-5 text-md-end text-center">
							<?php if(get_theme_mod('stock_photos_sell_btn_text') != '' || get_theme_mod('stock_photos_sell_btn_url') != ''){ ?>
	  						<a href="<?php echo esc_url(get_theme_mod('stock_photos_sell_btn_url')); ?>" class="sell-btn me-xl-5 me-3"><?php echo esc_html(get_theme_mod('stock_photos_sell_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('stock_photos_sell_btn_text')); ?></span></a>
	  					<?php }?>
	  					<?php if(get_theme_mod('stock_photos_license_text') != '' || get_theme_mod('stock_photos_license_url') != ''){ ?>
	  						<a href="<?php echo esc_url(get_theme_mod('stock_photos_license_url')); ?>" class="license-btn"><?php echo esc_html(get_theme_mod('stock_photos_license_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('stock_photos_license_text')); ?></span></a>
	  					<?php }?>
						</div>
					</div>
	  		</div>
	  	</div>
		</div>
	</header>