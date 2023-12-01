<?php
/**
 * @package Stock Photos
 * @subpackage stock-photos
 * @since stock-photos 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses stock_photos_header_style()
*/

function stock_photos_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'stock_photos_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 600,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'stock_photos_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'stock_photos_custom_header_setup' );

if ( ! function_exists( 'stock_photos_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see stock_photos_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'stock_photos_header_style' );
function stock_photos_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$stock_photos_custom_css = "
        .slider-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}
		@media screen and (max-width: 575px){
			.slider-header{
				background-size: auto;
			}
		}
		";
	   	wp_add_inline_style( 'stock-photos-basic-style', $stock_photos_custom_css );
	endif;
}
endif; // stock_photos_header_style
