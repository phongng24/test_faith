<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'infinite-photography-wc-panel', array(
	'priority'       => 100,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'WooCommerce Options', 'infinite-photography' )
) );

/*
* file for shop archive
*/
require_once infinite_photography_file_directory('acmethemes/customizer/wc-options/shop-archive.php');

/*
* file for single product
*/
require_once infinite_photography_file_directory('acmethemes/customizer/wc-options/single-product.php');