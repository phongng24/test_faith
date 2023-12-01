<?php
if ( ! function_exists( 'infinite_photography_gutenberg_setup' ) ) :
	/**
	 * Making theme gutenberg compatible
	 */
	function infinite_photography_gutenberg_setup() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'infinite_photography_gutenberg_setup' );

function infinite_photography_dynamic_editor_styles(){

	$infinite_photography_customizer_all_values = infinite_photography_get_theme_options();

	$custom_css = '';

	$custom_css .= "
            .edit-post-visual-editor, 
			.edit-post-visual-editor p {
               color: #666;
            }";

	$custom_css .= "
	        .wp-block .wp-block-heading h1, 
	        .wp-block .wp-block-heading h1 a,
	        .wp-block .wp-block-heading h2,
	        .wp-block .wp-block-heading h2 a,
	        .wp-block .wp-block-heading h3, 
	        .wp-block .wp-block-heading h3 a,
	        .wp-block .wp-block-heading h4, 
	        .wp-block .wp-block-heading h4 a,
	        .wp-block .wp-block-heading h5, 
	        .wp-block .wp-block-heading h5 a,
	        .wp-block .wp-block-heading h6,
	        .wp-block .wp-block-heading h6 a{
	            color: 3a3a3a;
	        }";

	if( isset($infinite_photography_customizer_all_values['infinite-photography-link-color'])){
        $infinite_photography_link_color               = esc_attr( $infinite_photography_customizer_all_values['infinite-photography-link-color'] );
        $custom_css .= "
	        .wp-block a{
	            color: {$infinite_photography_link_color};
	        }";
    }
    if( isset($infinite_photography_customizer_all_values['infinite-photography-link-hover-color'])){
        $infinite_photography_link_hover_color         = esc_attr( $infinite_photography_customizer_all_values['infinite-photography-link-hover-color'] );
        $custom_css .= "
	        .wp-block a:hover,
	        .wp-block a:active,
	        .wp-block a:focus{
	            color: {$infinite_photography_link_hover_color};
	        }";
    }


    return wp_strip_all_tags( $custom_css );
}

/**
 * Enqueue block editor style
 */
function infinite_photography_block_editor_styles() {
	wp_enqueue_style( 'infinite_photography-googleapis', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i', array(), null );
	wp_enqueue_style( 'infinite_photography-block-editor-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-edit.css', false, '1.0' );

	/**
	 * Styles from the customizer
	 */
	wp_add_inline_style( 'infinite_photography-block-editor-styles', infinite_photography_dynamic_editor_styles() );
}
add_action( 'enqueue_block_editor_assets', 'infinite_photography_block_editor_styles',99 );

function infinite_photography_gutenberg_scripts() {
	wp_enqueue_style( 'infinite_photography-block-front-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-front.css', false, '1.0' );
	wp_style_add_data( 'infinite_photography-block-front-styles', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'infinite_photography_gutenberg_scripts' );