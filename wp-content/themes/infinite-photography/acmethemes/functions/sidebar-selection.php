<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Infinite Photography 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('infinite_photography_sidebar_selection') ) :
	function infinite_photography_sidebar_selection( ) {
		wp_reset_postdata();
		$infinite_photography_customizer_all_values = infinite_photography_get_theme_options();
		global $post;
		if(
			isset( $infinite_photography_customizer_all_values['infinite-photography-sidebar-layout'] ) &&
			(
				'left-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-sidebar-layout'] ||
				'both-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-sidebar-layout'] ||
				'middle-col' == $infinite_photography_customizer_all_values['infinite-photography-sidebar-layout'] ||
				'no-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-sidebar-layout']
			)
		){
			$infinite_photography_body_global_class = $infinite_photography_customizer_all_values['infinite-photography-sidebar-layout'];
		}
		else{
			$infinite_photography_body_global_class= 'right-sidebar';
		}

		if ( infinite_photography_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'infinite_photography_sidebar_layout', true );
				$infinite_photography_wc_single_product_sidebar_layout = $infinite_photography_customizer_all_values['infinite-photography-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$infinite_photography_body_classes = $post_class;
					} else {
						$infinite_photography_body_classes = $infinite_photography_wc_single_product_sidebar_layout;
					}
				}
				else{
					$infinite_photography_body_classes = $infinite_photography_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $infinite_photography_customizer_all_values['infinite-photography-wc-shop-archive-sidebar-layout'] ) ){
					$infinite_photography_archive_sidebar_layout = $infinite_photography_customizer_all_values['infinite-photography-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $infinite_photography_archive_sidebar_layout ||
						'left-sidebar' == $infinite_photography_archive_sidebar_layout ||
						'both-sidebar' == $infinite_photography_archive_sidebar_layout ||
						'middle-col' == $infinite_photography_archive_sidebar_layout ||
						'no-sidebar' == $infinite_photography_archive_sidebar_layout
					){
						$infinite_photography_body_classes = $infinite_photography_archive_sidebar_layout;
					}
					else{
						$infinite_photography_body_classes = $infinite_photography_body_global_class;
					}
				}
				else{
					$infinite_photography_body_classes= $infinite_photography_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout'] ||
					'left-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout'] ||
					'both-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout'] ||
					'middle-col' == $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout'] ||
					'no-sidebar' == $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout']
				){
					$infinite_photography_body_classes = $infinite_photography_customizer_all_values['infinite-photography-front-page-sidebar-layout'];
				}
				else{
					$infinite_photography_body_classes = $infinite_photography_body_global_class;
				}
			}
			else{
				$infinite_photography_body_classes= $infinite_photography_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'infinite_photography_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$infinite_photography_body_classes = $post_class;
				} else {
					$infinite_photography_body_classes = $infinite_photography_body_global_class;
				}
			}
			else{
				$infinite_photography_body_classes = $infinite_photography_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $infinite_photography_customizer_all_values['infinite-photography-archive-sidebar-layout'] ) ){
				$infinite_photography_archive_sidebar_layout = $infinite_photography_customizer_all_values['infinite-photography-archive-sidebar-layout'];
				if(
					'right-sidebar' == $infinite_photography_archive_sidebar_layout ||
					'left-sidebar' == $infinite_photography_archive_sidebar_layout ||
					'both-sidebar' == $infinite_photography_archive_sidebar_layout ||
					'middle-col' == $infinite_photography_archive_sidebar_layout ||
					'no-sidebar' == $infinite_photography_archive_sidebar_layout
				){
					$infinite_photography_body_classes = $infinite_photography_archive_sidebar_layout;
				}
				else{
					$infinite_photography_body_classes = $infinite_photography_body_global_class;
				}
			}
			else{
				$infinite_photography_body_classes= $infinite_photography_body_global_class;
			}
		}
		else {
			$infinite_photography_body_classes = $infinite_photography_body_global_class;
		}
		return $infinite_photography_body_classes;
	}
endif;