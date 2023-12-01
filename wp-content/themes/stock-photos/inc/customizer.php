<?php
/**
 * Stock Photos Theme Customizer
 *
 * @package Stock Photos
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function stock_photos_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'stock_photos_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'stock_photos_customize_partial_blogdescription',
		)
	);

	//About Section
		$wp_customize->add_section( 'stock_photos_about_theme' , array(
	    	'title' => esc_html__( 'About Theme', 'stock-photos' ),
	    	'priority' => 10,
		) );

		$wp_customize->add_setting('stock_photos_demo_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('stock_photos_demo_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Demo</h3>Our premium version of Stock Photos has unlimited sections with advanced control fields. Dedicated support and no limititation in any field.<br> <a target='_blank' href='". esc_url('https://www.themescaliber.com/stock-photography-pro/') ." '>View Demo</a>",
			'section'=> 'stock_photos_about_theme'
		));
		
		$wp_customize->add_setting('stock_photos_doc_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('stock_photos_doc_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Documentation</h3>We have well prepared documentation that provides the general guidelines and suggestions needed for this theme.<br> <a target='_blank' href='". esc_url('https://themescaliber.com/demo/doc/free-stock-photos/') ." '>View Documentation</a>",
			'section'=> 'stock_photos_about_theme'
		));

		$wp_customize->add_setting('stock_photos_forum_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('stock_photos_forum_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Support</h3>Regarding any theme issue, we offer 24/7 support. You can get assistance from our support staff in resolving any problem. Please get in touch with us.<br><a target='_blank' href='". esc_url('https://wordpress.org/support/theme/stock-photos/') ." '>Support Forum</a>",
			'section'=> 'stock_photos_about_theme'
		));

	//add home page setting pannel
	$wp_customize->add_panel( 'stock_photos_panel_id', array(
	    'priority' => 20,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'stock-photos' ),
	) );

    $stock_photos_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'stock_photos_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'stock-photos' ),
		'priority'   => 30,
		'panel' => 'stock_photos_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'stock_photos_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_body_color', array(
		'label' => __('Body Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('stock_photos_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
		'stock_photos_body_font_family', array(
		'section'  => 'stock_photos_typography',
		'label'    => __( 'Body Fonts','stock-photos'),
		'type'     => 'select',
		'choices'  => $stock_photos_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('stock_photos_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_body_font_size',array(
		'label'	=> __('Body Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_body_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'stock_photos_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_theme_color', array(
  		'label' => __('Theme Color Option','stock-photos'),
	    'section' => 'stock_photos_typography',
	    'settings' => 'stock_photos_theme_color',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'stock_photos_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_paragraph_color', array(
		'label' => __('Paragraph Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('stock_photos_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_paragraph_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'Paragraph Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	$wp_customize->add_setting('stock_photos_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'stock_photos_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_atag_color', array(
		'label' => __('"a" Tag Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('stock_photos_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_atag_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( '"a" Tag Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'stock_photos_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_li_color', array(
		'label' => __('"li" Tag Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('stock_photos_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_li_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( '"li" Tag Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'stock_photos_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_h1_color', array(
		'label' => __('h1 Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('stock_photos_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_h1_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'h1 Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('stock_photos_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_h1_font_size',array(
		'label'	=> __('h1 Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'stock_photos_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_h2_color', array(
		'label' => __('h2 Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('stock_photos_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_h2_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'h2 Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('stock_photos_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_h2_font_size',array(
		'label'	=> __('h2 Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'stock_photos_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_h3_color', array(
		'label' => __('h3 Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('stock_photos_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_h3_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'h3 Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('stock_photos_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_h3_font_size',array(
		'label'	=> __('h3 Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'stock_photos_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_h4_color', array(
		'label' => __('h4 Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('stock_photos_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_h4_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'h4 Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('stock_photos_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_h4_font_size',array(
		'label'	=> __('h4 Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'stock_photos_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_h5_color', array(
		'label' => __('h5 Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('stock_photos_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_h5_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'h5 Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('stock_photos_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_h5_font_size',array(
		'label'	=> __('h5 Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'stock_photos_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_h6_color', array(
		'label' => __('h6 Color', 'stock-photos'),
		'section' => 'stock_photos_typography',
		'settings' => 'stock_photos_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('stock_photos_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control(
	    'stock_photos_h6_font_family', array(
	    'section'  => 'stock_photos_typography',
	    'label'    => __( 'h6 Fonts','stock-photos'),
	    'type'     => 'select',
	    'choices'  => $stock_photos_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('stock_photos_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('stock_photos_h6_font_size',array(
		'label'	=> __('h6 Font Size','stock-photos'),
		'section'	=> 'stock_photos_typography',
		'setting'	=> 'stock_photos_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'stock_photos_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'stock-photos' ),
		'priority'   => 30,
		'panel' => 'stock_photos_panel_id'
	) );

	$wp_customize->add_setting('stock_photos_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','stock-photos'),
        'section' => 'stock_photos_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','stock-photos'),
            'Contained Layout' => __('Contained Layout','stock-photos'),
            'Boxed Layout' => __('Boxed Layout','stock-photos'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('stock_photos_theme_options',array(
	        'default' => 'Right Sidebar',
	        'sanitize_callback' => 'stock_photos_sanitize_choices'
	) );
	$wp_customize->add_control('stock_photos_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Select Sidebar Layout','stock-photos'),
	        'section' => 'stock_photos_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','stock-photos'),
	            'Right Sidebar' => __('Right Sidebar','stock-photos'),
	            'One Column' => __('One Column','stock-photos'),
	            'Three Columns' => __('Three Columns','stock-photos'),
	            'Four Columns' => __('Four Columns','stock-photos'),
	            'Grid Layout' => __('Grid Layout','stock-photos')
	        ),
	    )
    );

    // Add Settings and Controls for single post Layout
	$wp_customize->add_setting('stock_photos_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	) );
	$wp_customize->add_control('stock_photos_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','stock-photos'),
        'section' => 'stock_photos_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','stock-photos'),
            'Right Sidebar' => __('Right Sidebar','stock-photos'),
            'One Column' => __('One Column','stock-photos'),
        ),
    ));

    $wp_customize->add_setting('stock_photos_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'stock_photos_sanitize_choices',
	));
	$wp_customize->add_control('stock_photos_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'stock-photos'),
		'section'        => 'stock_photos_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'stock-photos'),
			'Right Sidebar' => __('Right Sidebar', 'stock-photos'),
			'One Column'    => __('One Column', 'stock-photos'),
		),
	));

    $wp_customize->add_setting( 'stock_photos_single_page_breadcrumb',array(
		'default' => false,
      	'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','stock-photos' ),
        'section' => 'stock_photos_left_right'
    ));

    $wp_customize->add_setting('stock_photos_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'stock-photos'),
		'section'  => 'stock_photos_left_right',
	)));

	$wp_customize->add_setting('stock_photos_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'stock-photos'),
		'section'  => 'stock_photos_left_right',
	)));

	$wp_customize->add_setting('stock_photos_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'stock-photos'),
		'section'  => 'stock_photos_left_right',
	)));

	$wp_customize->add_setting('stock_photos_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'stock-photos'),
		'section'  => 'stock_photos_left_right',
	)));

	//Header
	$wp_customize->add_section('stock_photos_header',array(
		'title'	=> __('Header','stock-photos'),
		'priority'	=> null,
		'panel' => 'stock_photos_panel_id',
	));

	//Sticky Header
	$wp_customize->add_setting( 'stock_photos_sticky_header',array(
      	'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','stock-photos' ),
        'section' => 'stock_photos_header'
    ));

    $wp_customize->add_setting('stock_photos_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','stock-photos'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'stock_photos_header',
		'type'=> 'number',
	));

	$wp_customize->add_setting('stock_photos_pricing_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('stock_photos_pricing_text',array(
		'label'	=> __('Add Pricing Text','stock-photos'),
		'section'	=> 'stock_photos_header',
		'setting'	=> 'stock_photos_pricing_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('stock_photos_pricing_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('stock_photos_pricing_url',array(
		'label'	=> __('Add Pricing url','stock-photos'),
		'section'	=> 'stock_photos_header',
		'setting'	=> 'stock_photos_pricing_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('stock_photos_sell_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('stock_photos_sell_btn_text',array(
		'label'	=> __('Add Sell Button Text','stock-photos'),
		'section'	=> 'stock_photos_header',
		'setting'	=> 'stock_photos_sell_btn_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('stock_photos_sell_btn_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('stock_photos_sell_btn_url',array(
		'label'	=> __('Add Sell Button url','stock-photos'),
		'section'	=> 'stock_photos_header',
		'setting'	=> 'stock_photos_sell_btn_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('stock_photos_license_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('stock_photos_license_text',array(
		'label'	=> __('Add License Text','stock-photos'),
		'section'	=> 'stock_photos_header',
		'setting'	=> 'stock_photos_license_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('stock_photos_license_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('stock_photos_license_url',array(
		'label'	=> __('Add License url','stock-photos'),
		'section'	=> 'stock_photos_header',
		'setting'	=> 'stock_photos_license_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('stock_photos_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','stock-photos'),
        'section' => 'stock_photos_header',
        'choices' => array(
            'uppercase' => __('Uppercase','stock-photos'),
            'capitalize' => __('Capitalize','stock-photos'),
        ),
	) );

	$wp_customize->add_setting( 'stock_photos_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'stock_photos_sanitize_float',
	) );
	$wp_customize->add_control( 'stock_photos_nav_font_size', array(
		'label' => __( 'Navigation Font Size','stock-photos' ),
		'section'     => 'stock_photos_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('stock_photos_font_weight_menu_option',array(
        'default' => 'Defalt',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
    ));
    $wp_customize->add_control('stock_photos_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','stock-photos'),
        'section' => 'stock_photos_header',
        'choices' => array(
            '100' => __('100','stock-photos'),
            '200' => __('200','stock-photos'),
            '300' => __('300','stock-photos'),
            '400' => __('400','stock-photos'),
            'Defalt' => __('500','stock-photos'),
            '600' => __('600','stock-photos'),
            '700' => __('700','stock-photos'),
            '800' => __('800','stock-photos'),
            '900' => __('900','stock-photos'),
        ),
	) );

    $wp_customize->add_setting('stock_photos_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_menu_color', array(
		'label'    => __('Menu Color', 'stock-photos'),
		'section'  => 'stock_photos_header',
		'settings' => 'stock_photos_menu_color',
	)));

	$wp_customize->add_setting('stock_photos_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'stock-photos'),
		'section'  => 'stock_photos_header',
		'settings' => 'stock_photos_menu_hover_color',
	)));

	$wp_customize->add_setting('stock_photos_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'stock-photos'),
		'section'  => 'stock_photos_header',
		'settings' => 'stock_photos_submenu_menu_color',
	)));

	$wp_customize->add_setting( 'stock_photos_submenu_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_submenu_hover_color', array(
  		'label' => __('Submenu Hover Color', 'stock-photos'),
	    'section' => 'stock_photos_header',
	    'settings' => 'stock_photos_submenu_hover_color',
  	)));

	// Preloader
	$wp_customize->add_setting( 'stock_photos_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','stock-photos' ),
        'section' => 'stock_photos_header'
    ));

    $wp_customize->add_setting('stock_photos_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control( 'stock_photos_preloader_type', array(
		'label' => __( 'Preloader Type','stock-photos' ),
		'section' => 'stock_photos_header',
		'type'  => 'select',
		'settings' => 'stock_photos_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','stock-photos'),
		    'chasing-square' => __('Chasing Square','stock-photos'),
	    ),
	));

	$wp_customize->add_setting( 'stock_photos_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'stock_photos_header',
	    'settings' => 'stock_photos_preloader_color',
  	)));

  	$wp_customize->add_setting( 'stock_photos_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'stock_photos_header',
	    'settings' => 'stock_photos_preloader_bg_color',
  	)));

	// header title
	$wp_customize->add_setting( 'stock_photos_header_title', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'stock_photos_header_title', array(
		'label'   => __( 'Header Title','stock-photos' ),
		'section' => 'header_image',
		'type'    => 'text',
	) );

	// header text
	$wp_customize->add_setting( 'stock_photos_header_text', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'stock_photos_header_text', array(
		'label'   => __( 'Header Text','stock-photos' ),
		'section' => 'header_image',
		'type'    => 'text',
	) );

	// Featured Title
	$wp_customize->add_setting( 'stock_photos_featured_title', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'stock_photos_featured_title', array(
		'label'   => __( 'Featured Title','stock-photos' ),
		'section' => 'header_image',
		'type'    => 'text',
	) );

	//Services
	$wp_customize->add_section('stock_photos_choices_section',array(
		'title'	=> __('Choices Section','stock-photos'),
		'panel' => 'stock_photos_panel_id',
	));

	$wp_customize->add_setting('stock_photos_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('stock_photos_section_title',array(
		'label'	=> esc_html__('Section Title','stock-photos'),
		'section'=> 'stock_photos_choices_section',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('stock_photos_services_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('stock_photos_services_number',array(
		'label'	=> esc_html__('No of Tabs to show','stock-photos'),
		'section'=> 'stock_photos_choices_section',
		'type'=> 'number'
	));	

	$category_post = get_theme_mod('stock_photos_services_number','');
    for ( $j = 1; $j <= $category_post; $j++ ) {
		$wp_customize->add_setting('stock_photos_services_text'.$j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('stock_photos_services_text'.$j,array(
			'label'	=> esc_html__('Tab ','stock-photos').$j,
			'section'=> 'stock_photos_choices_section',
			'type'=> 'text'
		));

		$categories = get_categories();
			$cat_posts = array();
				$i = 0;
				$cat_posts[]='Select';
			foreach($categories as $category){
				if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('stock_photos_services_category'.$j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'stock_photos_sanitize_choices',
		));
		$wp_customize->add_control('stock_photos_services_category'.$j,array(
			'type'    => 'select',
			'choices' => $cat_posts,
			'label' => __('Select Category to display images','stock-photos'),
			'section' => 'stock_photos_choices_section',
		));
	}

	//Blog Post
	$wp_customize->add_section('stock_photos_blog_post',array(
		'title'	=> __('Post Settings','stock-photos'),
		'panel' => 'stock_photos_panel_id',
	));	

	$wp_customize->add_setting('stock_photos_blog_post_alignment',array(
        'default' => 'left',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
    ));
	$wp_customize->add_control('stock_photos_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'stock-photos' ),
        'section' => 'stock_photos_blog_post',
        'choices' => array(
            'left' => __('Left Align','stock-photos'),
            'right' => __('Right Align','stock-photos'),
            'center' => __('Center Align','stock-photos')
        ),
    ));

	$wp_customize->add_setting('stock_photos_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting('stock_photos_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_blog_post',
		'setting'	=> 'stock_photos_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting('stock_photos_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_author_icon',array(
		'label'	=> __('Add Post Author Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_blog_post',
		'setting'	=> 'stock_photos_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting('stock_photos_comment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_comment_icon',array(
		'label'	=> __('Add Post Comment Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_blog_post',
		'setting'	=> 'stock_photos_comment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting('stock_photos_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_time_icon',array(
		'label'	=> __('Add Post Time Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_blog_post',
		'setting'	=> 'stock_photos_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('stock_photos_show_hide_post_categories',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_show_hide_post_categories',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post category','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting('stock_photos_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting( 'stock_photos_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	) );
	$wp_customize->add_control( 'stock_photos_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','stock-photos' ),
		'section' => 'stock_photos_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'stock_photos_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	) );
	$wp_customize->add_control( 'stock_photos_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','stock-photos' ),
		'section' => 'stock_photos_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting('stock_photos_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','stock-photos'),
       'description' => __('Ex: "/", "|", "-", ...','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting('stock_photos_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','stock-photos'),
        'section' => 'stock_photos_blog_post',
        'choices' => array(
            'No Content' => __('No Content','stock-photos'),
            'Full Content' => __('Full Content','stock-photos'),
            'Excerpt Content' => __('Excerpt Content','stock-photos'),
        ),
	) );

    $wp_customize->add_setting( 'stock_photos_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	) );
	$wp_customize->add_control( 'stock_photos_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','stock-photos' ),
		'section'  => 'stock_photos_blog_post',
		'type'  => 'number',
		'settings' => 'stock_photos_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'stock_photos_button_excerpt_suffix', array(
		'default'   => __('[...]','stock-photos' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'stock_photos_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','stock-photos' ),
		'section'     => 'stock_photos_blog_post',
		'type'        => 'text',
		'settings' => 'stock_photos_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'stock_photos_post_button_text', array(
		'default'   => esc_html__('Read More','stock-photos' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'stock_photos_post_button_text', array(
		'label' => esc_html__('Post Button Text','stock-photos' ),
		'section'     => 'stock_photos_blog_post',
		'type'        => 'text',
		'settings'    => 'stock_photos_post_button_text'
	) );

	$wp_customize->add_setting('stock_photos_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','stock-photos'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'stock_photos_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('stock_photos_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','stock-photos'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'stock_photos_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'stock_photos_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	) );
	$wp_customize->add_control('stock_photos_button_border_radius', array(
        'label'  => __('Button Border Radius','stock-photos'),
        'type'=> 'number',
        'section'  => 'stock_photos_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting( 'stock_photos_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'stock_photos_sanitize_choices'
    ));
    $wp_customize->add_control( 'stock_photos_post_blocks', array(
        'section' => 'stock_photos_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'stock-photos' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'stock-photos' ),
            'Without box' => __( 'Without box', 'stock-photos' ),
    )));

    $wp_customize->add_setting('stock_photos_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','stock-photos'),
       'section' => 'stock_photos_blog_post'
    ));

    $wp_customize->add_setting( 'stock_photos_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'stock_photos_sanitize_choices'
    ));
    $wp_customize->add_control( 'stock_photos_post_navigation_type', array(
        'section' => 'stock_photos_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'stock-photos' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'stock-photos' ),
            'next-prev' => __( 'Next/Prev Button', 'stock-photos' ),
    )));

    $wp_customize->add_setting( 'stock_photos_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'stock_photos_sanitize_choices'
    ));
    $wp_customize->add_control( 'stock_photos_post_navigation_position', array(
        'section' => 'stock_photos_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'stock-photos' ),
        'choices' => array(
            'top'  => __( 'Top', 'stock-photos' ),
            'bottom' => __( 'Bottom', 'stock-photos' ),
            'both' => __( 'Both', 'stock-photos' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('stock_photos_single_post',array(
		'title'	=> __('Single Post Settings','stock-photos'),
		'panel' => 'stock_photos_panel_id',
	));	

	$wp_customize->add_setting( 'stock_photos_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','stock-photos' ),
        'section' => 'stock_photos_single_post'
    ));

	$wp_customize->add_setting('stock_photos_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_single_postdate_icon',array(
		'label'	=> __('Add Sigle Post Date Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_single_post',
		'setting'	=> 'stock_photos_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_single_postauthor_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_single_postauthor_icon',array(
		'label'	=> __('Add Sigle Post Author Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_single_post',
		'setting'	=> 'stock_photos_single_postauthor_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_single_postcomment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_single_postcomment_icon',array(
		'label'	=> __('Add Sigle Post Comment Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_single_post',
		'setting'	=> 'stock_photos_single_postcomment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_single_post_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_single_post_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_single_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new stock_photos_Icon_Changer(
        $wp_customize,'stock_photos_single_posttime_icon',array(
		'label'	=> __('Add Sigle Post Time Icon','stock-photos'),
		'transport' => 'refresh',
		'section'	=> 'stock_photos_single_post',
		'setting'	=> 'stock_photos_single_posttime_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Feature Image','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

     $wp_customize->add_setting( 'stock_photos_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'stock_photos_sanitize_float',
	) );
	$wp_customize->add_control( 'stock_photos_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','stock-photos' ),
		'section'     => 'stock_photos_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'stock_photos_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'stock_photos_sanitize_float',
	));
	$wp_customize->add_control('stock_photos_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','stock-photos' ),
		'section' => 'stock_photos_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('stock_photos_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','stock-photos'),
       'description' => __('Ex: "/", "|", "-", ...','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

	$wp_customize->add_setting('stock_photos_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
 	));
 	$wp_customize->add_control('stock_photos_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','stock-photos'),
		'section' => 'stock_photos_single_post'
	));

	$wp_customize->add_setting('stock_photos_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_category_color', array(
		'label'    => __('Category Color', 'stock-photos'),
		'section'  => 'stock_photos_single_post',
	)));

	$wp_customize->add_setting('stock_photos_category_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_category_background_color', array(
		'label'    => __('Category Background Color', 'stock-photos'),
		'section'  => 'stock_photos_single_post',
	)));

    $wp_customize->add_setting('stock_photos_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting( 'stock_photos_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	) );
	$wp_customize->add_control( 'stock_photos_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'stock-photos'),
		'section' => 'stock_photos_single_post',
		'type' => 'number',
		'settings' => 'stock_photos_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('stock_photos_comment_title',array(
       'default' => __('Leave a Reply','stock-photos'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_comment_submit_text',array(
       'default' => __('Post Comment','stock-photos'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting('stock_photos_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','stock-photos'),
       'section' => 'stock_photos_single_post'
    ));

    $wp_customize->add_setting( 'stock_photos_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	) );
	$wp_customize->add_control( 'stock_photos_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','stock-photos' ),
		'section' => 'stock_photos_single_post',
		'type' => 'number',
		'settings' => 'stock_photos_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'stock_photos_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'stock_photos_sanitize_choices'
    ));
    $wp_customize->add_control( 'stock_photos_post_order', array(
        'section' => 'stock_photos_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'stock-photos' ),
        'choices' => array(
            'categories' => __('Categories', 'stock-photos'),
            'tags' => __( 'Tags', 'stock-photos' ),
    )));

    //404 page settings
	$wp_customize->add_section('stock_photos_404_page',array(
		'title'	=> __('404 & No Result Page Settings','stock-photos'),
		'priority'	=> null,
		'panel' => 'stock_photos_panel_id',
	));

	$wp_customize->add_setting('stock_photos_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','stock-photos'),
       'section' => 'stock_photos_404_page'
    ));

    $wp_customize->add_setting('stock_photos_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','stock-photos'),
       'section' => 'stock_photos_404_page'
    ));

    $wp_customize->add_setting('stock_photos_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','stock-photos'),
       'section' => 'stock_photos_404_page'
    ));

    $wp_customize->add_setting('stock_photos_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','stock-photos'),
       'section' => 'stock_photos_404_page'
    ));

    $wp_customize->add_setting('stock_photos_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('stock_photos_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','stock-photos'),
       'section' => 'stock_photos_404_page'
    ));

    $wp_customize->add_setting('stock_photos_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
	));
	$wp_customize->add_control('stock_photos_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','stock-photos'),
      	'section' => 'stock_photos_404_page',
	));

	//Footer
	$wp_customize->add_section('stock_photos_footer_section',array(
		'title'	=> __('Footer Section','stock-photos'),
		'priority'	=> null,
		'panel' => 'stock_photos_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'stock_photos_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'stock_photos_customize_partial_stock_photos_show_back_to_top',
		)
	);

	$wp_customize->add_setting('stock_photos_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
	));
	$wp_customize->add_control('stock_photos_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','stock-photos'),
      	'section' => 'stock_photos_footer_section',
	));

	$wp_customize->add_setting('stock_photos_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Stock_Photos_Icon_Changer(
        $wp_customize, 'stock_photos_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','stock-photos'),
		'section'	=> 'stock_photos_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('stock_photos_scroll_icon_font_size',array(
		'default'=> 18,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Font Size','stock-photos'),
		'section'=> 'stock_photos_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('stock_photos_scroll_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_scroll_icon_color', array(
		'label'    => __('Back To Top Icon Color', 'stock-photos'),
		'section'  => 'stock_photos_footer_section',
	)));

	$wp_customize->add_setting('stock_photos_back_to_top_text',array(
		'default'	=> __('Back to Top','stock-photos'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('stock_photos_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','stock-photos'),
		'section'	=> 'stock_photos_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('stock_photos_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','stock-photos'),
        'section' => 'stock_photos_footer_section',
        'choices' => array(
            'Left' => __('Left','stock-photos'),
            'Right' => __('Right','stock-photos'),
            'Center' => __('Center','stock-photos'),
        ),
	) );

	$wp_customize->add_setting( 'stock_photos_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','stock-photos' ),
      'section' => 'stock_photos_footer_section'
    ));

	$wp_customize->add_setting('stock_photos_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_footer_background_color', array(
		'label'    => __('Footer Background Color', 'stock-photos'),
		'section'  => 'stock_photos_footer_section',
	)));

	$wp_customize->add_setting('stock_photos_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'stock_photos_footer_background_img',array(
        'label' => __('Footer Background Image','stock-photos'),
        'section' => 'stock_photos_footer_section'
	)));

	$wp_customize->add_setting('stock_photos_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'stock_photos_sanitize_choices',
    ));
    $wp_customize->add_control('stock_photos_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'stock-photos'),
        'section'     => 'stock_photos_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'stock-photos'),
        'choices' => array(
            '1'     => __('One', 'stock-photos'),
            '2'     => __('Two', 'stock-photos'),
            '3'     => __('Three', 'stock-photos'),
            '4'     => __('Four', 'stock-photos')
        ),
    ));

    $wp_customize->add_setting('stock_photos_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','stock-photos'),
    'section' => 'stock_photos_footer_section',
    'choices' => array(
    	'Left' => __('Left','stock-photos'),
        'Center' => __('Center','stock-photos'),
        'Right' => __('Right','stock-photos')
      ),
	) );

	$wp_customize->add_setting('stock_photos_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','stock-photos'),
    'section' => 'stock_photos_footer_section',
    'choices' => array(
    	'Left' => __('Left','stock-photos'),
        'Center' => __('Center','stock-photos'),
        'Right' => __('Right','stock-photos')
        ),
	) );

    $wp_customize->add_setting( 'stock_photos_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','stock-photos' ),
      'section' => 'stock_photos_footer_section'
    ));

    $wp_customize->add_setting('stock_photos_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','stock-photos'),
        'section' => 'stock_photos_footer_section',
        'choices' => array(
            'Left' => __('Left','stock-photos'),
            'Right' => __('Right','stock-photos'),
            'Center' => __('Center','stock-photos'),
        ),
	) );

	$wp_customize->add_setting('stock_photos_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_copyright_color', array(
		'label'    => __('Copyright Color', 'stock-photos'),
		'section'  => 'stock_photos_footer_section',
	)));

	$wp_customize->add_setting('stock_photos_copyright__hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_copyright__hover_color', array(
		'label'    => __('Copyright Hover Color', 'stock-photos'),
		'section'  => 'stock_photos_footer_section',
	)));

	$wp_customize->add_setting('stock_photos_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'stock_photos_sanitize_float',
	));	
	$wp_customize->add_control('stock_photos_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','stock-photos'),
		'section'	=> 'stock_photos_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('stock_photos_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'stock_photos_sanitize_float',
	));	
	$wp_customize->add_control('stock_photos_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','stock-photos'),
		'section'	=> 'stock_photos_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'stock_photos_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'stock_photos_customize_partial_stock_photos_footer_copy',
		)
	);
	
	$wp_customize->add_setting('stock_photos_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('stock_photos_footer_copy',array(
		'label'	=> __('Copyright Text','stock-photos'),
		'section'	=> 'stock_photos_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('stock_photos_copyright_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'stock_photos_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'stock-photos'),
		'section'  => 'stock_photos_footer_section',
	)));

	//Mobile Media Section
	$wp_customize->add_section( 'stock_photos_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'stock-photos' ),
		'priority'   => null,
		'panel' => 'stock_photos_panel_id'
	) );

	$wp_customize->add_setting('stock_photos_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Stock_Photos_Icon_Changer(
        $wp_customize, 'stock_photos_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','stock-photos'),
		'section'	=> 'stock_photos_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'stock_photos_menu_color_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stock_photos_menu_color_setting', array(
  		'label' => __('Menu Icon Color Option', 'stock-photos'),
		'section' => 'stock_photos_mobile_media_options',
		'settings' => 'stock_photos_menu_color_setting',
  	)));

	$wp_customize->add_setting('stock_photos_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Stock_Photos_Icon_Changer(
        $wp_customize, 'stock_photos_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','stock-photos'),
		'section'	=> 'stock_photos_mobile_media_options',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('stock_photos_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
	));
	$wp_customize->add_control('stock_photos_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','stock-photos'),
      	'section' => 'stock_photos_mobile_media_options',
	));

	$wp_customize->add_setting( 'stock_photos_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','stock-photos' ),
        'section' => 'stock_photos_mobile_media_options'
    ));

    $wp_customize->add_setting( 'stock_photos_responsive_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_responsive_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Sticky header','stock-photos' ),
        'section' => 'stock_photos_mobile_media_options'
    ));

    $wp_customize->add_setting( 'stock_photos_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','stock-photos' ),
      'section' => 'stock_photos_mobile_media_options'
    ));

	//Woocommerce Section
	$wp_customize->add_section( 'stock_photos_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'stock-photos' ),
		'priority'   => null,
		'panel' => 'stock_photos_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'stock_photos_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'stock_photos_sanitize_choices',
	) );

	$wp_customize->add_control('stock_photos_products_per_row', array(
		'label' => __( 'Product per row', 'stock-photos' ),
		'section'  => 'stock_photos_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('stock_photos_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'stock_photos_sanitize_float'
	));	
	$wp_customize->add_control('stock_photos_product_per_page',array(
		'label'	=> __('Product per page','stock-photos'),
		'section'	=> 'stock_photos_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('stock_photos_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','stock-photos'),
       'section' => 'stock_photos_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('stock_photos_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'stock_photos_sanitize_choices',
	));
	$wp_customize->add_control('stock_photos_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'stock-photos'),
		'section'        => 'stock_photos_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'stock-photos'),
			'Right Sidebar' => __('Right Sidebar', 'stock-photos'),
		),
	));

	// single product page sidebar
	$wp_customize->add_setting( 'stock_photos_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ) );
    $wp_customize->add_control('stock_photos_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','stock-photos'),
		'section' => 'stock_photos_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('stock_photos_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'stock_photos_sanitize_choices',
	));
	$wp_customize->add_control('stock_photos_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'stock-photos'),
		'section'        => 'stock_photos_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'stock-photos'),
			'Right Sidebar' => __('Right Sidebar', 'stock-photos'),
		),
	));

	$wp_customize->add_setting('stock_photos_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','stock-photos'),
       'section' => 'stock_photos_woocommerce_options',
    ));

    $wp_customize->add_setting('stock_photos_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','stock-photos'),
       'section' => 'stock_photos_woocommerce_options',
    ));

    $wp_customize->add_setting('stock_photos_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','stock-photos'),
       'section' => 'stock_photos_woocommerce_options',
    ));

	$wp_customize->add_setting( 'stock_photos_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control( 'stock_photos_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('stock_photos_woocommerce_product_border',array(
       'default' => true,
       'sanitize_callback'	=> 'stock_photos_sanitize_checkbox'
    ));
    $wp_customize->add_control('stock_photos_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','stock-photos'),
       'section' => 'stock_photos_woocommerce_options',
    ));

	$wp_customize->add_setting( 'stock_photos_woocommerce_product_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_product_padding_right',array(
		'default' => 10,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control( 'stock_photos_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('stock_photos_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'stock_photos_sanitize_choices'
	));
	$wp_customize->add_control('stock_photos_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','stock-photos'),
        'section' => 'stock_photos_woocommerce_options',
        'choices' => array(
            'left' => __('Left','stock-photos'),
            'right' => __('Right','stock-photos'),
        ),
	) );

	$wp_customize->add_setting( 'stock_photos_woocommerce_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control( 'stock_photos_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_woocommerce_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'stock_photos_product_sale_font_size',array(
		'default' => '',
		'sanitize_callback' => 'stock_photos_sanitize_float'
	));
	$wp_customize->add_control('stock_photos_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','stock-photos' ),
		'type' => 'number',
		'section' => 'stock_photos_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'stock_photos_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Stock_Photos_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
		
		// Register custom section types.
		$manager->register_section_type( 'Stock_Photos_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Stock_Photos_Customize_Section_Pro(
				$manager,
				'stock_photos_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Stock Pro Theme', 'stock-photos' ),
					'pro_text' => esc_html__( 'Go Pro','stock-photos' ),
					'pro_url'  => esc_url( 'https://www.themescaliber.com/themes/stock-photography-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'stock-photos-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'stock-photos-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Stock_Photos_Customize::get_instance();