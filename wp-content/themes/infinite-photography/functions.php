<?php
/**
 * Infinite Photography functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Infinite Photography
 */


/**
 *  Default Theme layout options
 *
 * @since Infinite Photography 1.0.0
 *
 * @param null
 * @return array $infinite_photography_theme_layout
 *
 */
if ( !function_exists('infinite_photography_get_default_theme_options') ) :
    function infinite_photography_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'infinite-photography-enable-feature'       => '',
            'infinite-photography-feature-text'       => __( 'Infinite Photography', 'infinite-photography' ),

            /*header options*/
            'infinite-photography-header-logo'          => '',
            'infinite-photography-header-id-display-opt'=> 'title-and-tagline',
            'infinite-photography-facebook-url'         => '',
            'infinite-photography-twitter-url'          => '',
            'infinite-photography-youtube-url'          => '',
            'infinite-photography-instagram-url'        => '',
            'infinite-photography-google-plus-url'      => '',
            'infinite-photography-pinterest-url'        => '',
            'infinite-photography-enable-social'        => '',
            'infinite-photography-show-search'          => 1,

            /*footer options*/
            'infinite-photography-footer-copyright'     => __( 'All Right Reserved &copy; 2018', 'infinite-photography' ),

            /*layout/design options*/
            'infinite-photography-sidebar-layout'       => 'right-sidebar',
            'infinite-photography-front-page-sidebar-layout'  => 'no-sidebar',
            'infinite-photography-archive-sidebar-layout'  => 'right-sidebar',

            'infinite-photography-header-height'  => '180',

            'infinite-photography-blog-archive-image-size'  => 'post-thumbnail',
            'infinite-photography-blog-archive-click-image-size'  => 'full',

            'infinite-photography-blog-archive-layout'  => 'photography',
            'infinite-photography-primary-color'        => '#04BB9C',
            'infinite-photography-custom-css'           => '',

            /*single related post options*/
            'infinite-photography-show-related'  => 1,
            'infinite-photography-related-title'  => __( 'Related posts', 'infinite-photography' ),
            'infinite-photography-related-post-display-from'  => 'cat',
            'infinite-photography-single-image-size'  => 'full',

            /*theme options*/
            'infinite-photography-search-placeholder'    => __( 'Search', 'infinite-photography' ),
            'infinite-photography-show-breadcrumb'      => '',

            /*woocommerce*/
            'infinite-photography-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
            'infinite-photography-wc-product-column-number'           => 4,
            'infinite-photography-wc-shop-archive-total-product'      => 16,
            'infinite-photography-wc-single-product-sidebar-layout'   => 'no-sidebar',

            /*Reset*/
            'infinite-photography-reset-options'        => '0'

        );
        return apply_filters( 'infinite_photography_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since Infinite Photography 1.0.0
 *
 * @param null
 * @return array infinite_photography_theme_options
 *
 */
if ( !function_exists('infinite_photography_get_theme_options') ) :

    function infinite_photography_get_theme_options() {
        $infinite_photography_default_theme_options = infinite_photography_get_default_theme_options();
        $infinite_photography_get_theme_options = get_theme_mod( 'infinite_photography_theme_options');
        if( is_array( $infinite_photography_get_theme_options ) ){
            return array_merge( $infinite_photography_default_theme_options ,$infinite_photography_get_theme_options );
        }
        else{
            return $infinite_photography_default_theme_options;
        }
    }
endif;

$infinite_photography_saved_theme_options = infinite_photography_get_theme_options();
$GLOBALS['infinite_photography_customizer_all_values'] = $infinite_photography_saved_theme_options;

/**
 * require int.
 */
require_once trailingslashit( get_template_directory() ).'acmethemes/init.php';