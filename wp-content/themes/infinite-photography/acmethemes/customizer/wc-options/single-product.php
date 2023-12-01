<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'infinite-photography-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'infinite-photography' ),
	'panel'          => 'infinite-photography-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'infinite_photography_theme_options[infinite-photography-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['infinite-photography-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'infinite_photography_sanitize_select'
) );
$choices = infinite_photography_sidebar_layout();
$wp_customize->add_control( 'infinite_photography_theme_options[infinite-photography-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'infinite-photography' ),
	'section'   => 'infinite-photography-wc-single-product-options',
	'settings'  => 'infinite_photography_theme_options[infinite-photography-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );