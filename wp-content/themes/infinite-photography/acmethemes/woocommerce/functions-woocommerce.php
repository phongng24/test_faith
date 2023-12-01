<?php

/**
 * Infinite Photography functions.
 * @package Infinite Photography
 * @since 2.0.0
 */

/**
 * check if WooCommerce activated
 */
function infinite_photography_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}
add_action( 'init', 'infinite_photography_remove_wc_breadcrumbs' );
function infinite_photography_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}


/**
 * Woo Commerce Number of row filter Function
 */
if (!function_exists('infinite_photography_loop_columns')) {
	function infinite_photography_loop_columns() {
		$infinite_photography_customizer_all_values = infinite_photography_get_theme_options();
		$infinite_photography_wc_product_column_number = $infinite_photography_customizer_all_values['infinite-photography-wc-product-column-number'];
		if ($infinite_photography_wc_product_column_number) {
			$column_number = $infinite_photography_wc_product_column_number;
		}
		else {
			$column_number = 3;
		}
		return $column_number;
	}
}
add_filter('loop_shop_columns', 'infinite_photography_loop_columns');

function infinite_photography_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$infinite_photography_customizer_all_values = infinite_photography_get_theme_options();
	$infinite_photography_wc_product_total_number = $infinite_photography_customizer_all_values['infinite-photography-wc-shop-archive-total-product'];
	if ($infinite_photography_wc_product_total_number) {
		$cols = $infinite_photography_wc_product_total_number;
	}
	return $cols;
}
add_filter( 'loop_shop_per_page', 'infinite_photography_loop_shop_per_page', 20 );


/*https://gist.github.com/mikejolley/2044109*/
add_filter( 'woocommerce_add_to_cart_fragments', 'infinite_photography_header_add_to_cart_fragment' );
function infinite_photography_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-contents cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'infinite-photography'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'infinite-photography'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}