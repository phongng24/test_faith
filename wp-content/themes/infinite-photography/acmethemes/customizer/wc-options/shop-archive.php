<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'infinite-photography-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'infinite-photography' ),
	'panel'          => 'infinite-photography-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'infinite_photography_theme_options[infinite-photography-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['infinite-photography-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'infinite_photography_sanitize_select'
) );
$choices = infinite_photography_sidebar_layout();
$wp_customize->add_control( 'infinite_photography_theme_options[infinite-photography-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'infinite-photography' ),
	'section'   => 'infinite-photography-wc-shop-archive-option',
	'settings'  => 'infinite_photography_theme_options[infinite-photography-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'infinite_photography_theme_options[infinite-photography-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['infinite-photography-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'infinite_photography_theme_options[infinite-photography-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'infinite-photography' ),
	'section'   => 'infinite-photography-wc-shop-archive-option',
	'settings'  => 'infinite_photography_theme_options[infinite-photography-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'infinite_photography_theme_options[infinite-photography-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['infinite-photography-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'infinite_photography_theme_options[infinite-photography-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'infinite-photography' ),
	'section'   => 'infinite-photography-wc-shop-archive-option',
	'settings'  => 'infinite_photography_theme_options[infinite-photography-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );