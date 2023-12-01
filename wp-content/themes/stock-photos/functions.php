<?php
/**
 * Stock Photos functions and definitions
 *
 * @package Stock Photos
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
/* Breadcrumb Begin */
function stock_photos_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'stock_photos_setup' ) ) :

function stock_photos_setup() {

	$GLOBALS['content_width'] = apply_filters( 'stock_photos_content_width', 640 );
	
    load_theme_textdomain( 'stock-photos', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('stock-photos-homepage-thumb',240,145,true);
	
   	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'stock-photos' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),
			'sidebar-2' => array(
				'text_business_info',
			),
			'sidebar-3' => array(
				'text_about',
				'search',
			),
			'footer-1' => array(
				'text_about',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'text_business_info',
			),
			'footer-4' => array(
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
		),

		'theme_mods' => array(
			'stock_photos_call' => __('9874563210', 'stock-photos' ),
			'stock_photos_mail' => __('example@gmail.com', 'stock-photos' ),
			'stock_photos_time' => __('Mon to Fri 8:00am-5:00pm', 'stock-photos' ),
			'stock_photos_request_btn_text' => __('Request A Rate', 'stock-photos' ),
			'stock_photos_request_btn_url' => '#',
			'stock_photos_facebook_url' => 'www.facebook.com',
			'stock_photos_twitter_url' => 'www.twitter.com',
			'stock_photos_google_url' => 'www.googleplus.com',
			'stock_photos_linkdin_url' => 'www.linkedin.com',
			'stock_photos_youtube_url' => 'www.youtube.com',
			'stock_photos_footer_copy' => __('By ThemesCaliber', 'stock-photos' )
		),

		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Menu', 'stock-photos' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
    ));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', stock_photos_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'stock_photos_activation_notice' );
	}	

}
endif;
add_action( 'after_setup_theme', 'stock_photos_setup' );

// Dashboard Theme Notification
function stock_photos_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'stock-photos' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our Stock Photos theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'stock-photos' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=stock_photos_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'stock-photos' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function stock_photos_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'stock-photos' ),
		'description'   => __( 'Appears on blog page sidebar', 'stock-photos' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'stock-photos' ),
		'description'   => __( 'Appears on page sidebar', 'stock-photos' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'         => __( 'Third Column Sidebar', 'stock-photos' ),
		'description' => __( 'Appears on page sidebar', 'stock-photos' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$stock_photos_widget_areas = get_theme_mod('stock_photos_footer_widget_layout', '4');
	for ($i=1; $i<=$stock_photos_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'stock-photos' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'stock-photos' ),
		'description'   => __( 'Appears on shop page', 'stock-photos' ),	
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'stock-photos' ),
		'description'   => __( 'Appears on shop page', 'stock-photos' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'stock_photos_widgets_init' );

/* Theme Font URL */
function stock_photos_font_url() {
	$font_url = '';
	$font_family = array(
    'ABeeZee:ital@0;1',
	'Abril+Fatfac',
	'Acme',
	'Anton',
	'Architects+Daughter',
	'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	'Alfa+Slab+One',
	'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	'Bangers',
	'Boogaloo',
	'Bad+Script',
	'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Bree+Serif',
	'BenchNine:wght@300;400;700',
	'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Cardo:ital,wght@0,400;0,700;1,400',
	'Courgette',
	'Cherry+Swash:wght@400;700',
	'Comfortaa:wght@300;400;500;600;700',
	'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Cookie',
	'Coming+Soon',
	'Chewy',
	'Days+One',
	'Dosis:wght@200;300;400;500;600;700;800',
	'Economica:ital,wght@0,400;0,700;1,400;1,700',
	'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Fredoka+One',
	'Fjalla+One',
	'Francois+One',
	'Frank+Ruhl+Libre:wght@300;400;500;700;900',
	'Gloria+Hallelujah',
	'Great+Vibes',
	'Handlee',
	'Hammersmith+One',
	'Heebo:wght@100;200;300;400;500;600;700;800;900',
	'Inconsolata:wght@200;300;400;500;600;700;800;900',
	'Indie+Flower',
	'IM+Fell+English+SC',
	'Julius+Sans+One',
	'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Lobster',
	'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
	'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
	'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
	'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
	'Monda:wght@400;700',
	'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Marck+Script',
	'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
	'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Overpass+Mono:wght@300;400;500;600;700',
	'Oxygen:wght@300;400;700',
	'Orbitron:wght@400;500;600;700;800;900',
	'Patua+One',
	'Pacifico',
	'Padauk:wght@400;700',
	'Playball',
	'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
	'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
	'Permanent+Marker',
	'Poiret+One',
	'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Quicksand:wght@300;400;500;600;700',
	'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
	'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	'Russo+One',
	'Righteous',
	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Satisfy',
	'Slabo+13px',
	'Slabo+27px',
	'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	'Shadows+Into+Light+Two',
	'Shadows+Into+Light',
	'Sacramento',
	'Shrikhand',
	'Staatliches',
	'Tangerine:wght@400;700',
	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	'Unica+One',
	'VT323',
	'Varela+Round',
	'Vampiro+One',
	'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
	'ZCOOL+XiaoWei'
	);
	
	$fonts_url = add_query_arg( array(
	'family' => implode( '&family=', $font_family ),
	'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function stock_photos_scripts() {
	wp_enqueue_style( 'stock-photos-font', stock_photos_font_url(), array() );
	wp_enqueue_style( 'stock-photos-block-patterns-style-frontend', get_theme_file_uri('/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'stock-photos-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'stock-photos-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'stock-photos-block-style', get_template_directory_uri().'/css/block-style.css' );
    
    // Body
    $stock_photos_body_color = get_theme_mod('stock_photos_body_color', '');
    $stock_photos_body_font_family = get_theme_mod('stock_photos_body_font_family', '');
    $stock_photos_body_font_size = get_theme_mod('stock_photos_body_font_size', '');
	// Paragraph
    $stock_photos_paragraph_color = get_theme_mod('stock_photos_paragraph_color', '');
    $stock_photos_paragraph_font_family = get_theme_mod('stock_photos_paragraph_font_family', '');
    $stock_photos_paragraph_font_size = get_theme_mod('stock_photos_paragraph_font_size', '');
	// "a" tag
	$stock_photos_atag_color = get_theme_mod('stock_photos_atag_color', '');
    $stock_photos_atag_font_family = get_theme_mod('stock_photos_atag_font_family', '');
	// "li" tag
	$stock_photos_li_color = get_theme_mod('stock_photos_li_color', '');
    $stock_photos_li_font_family = get_theme_mod('stock_photos_li_font_family', '');
	// H1
	$stock_photos_h1_color = get_theme_mod('stock_photos_h1_color', '');
    $stock_photos_h1_font_family = get_theme_mod('stock_photos_h1_font_family', '');
    $stock_photos_h1_font_size = get_theme_mod('stock_photos_h1_font_size', '');
	// H2
	$stock_photos_h2_color = get_theme_mod('stock_photos_h2_color', '');
    $stock_photos_h2_font_family = get_theme_mod('stock_photos_h2_font_family', '');
    $stock_photos_h2_font_size = get_theme_mod('stock_photos_h2_font_size', '');
	// H3
	$stock_photos_h3_color = get_theme_mod('stock_photos_h3_color', '');
    $stock_photos_h3_font_family = get_theme_mod('stock_photos_h3_font_family', '');
    $stock_photos_h3_font_size = get_theme_mod('stock_photos_h3_font_size', '');
	// H4
	$stock_photos_h4_color = get_theme_mod('stock_photos_h4_color', '');
    $stock_photos_h4_font_family = get_theme_mod('stock_photos_h4_font_family', '');
    $stock_photos_h4_font_size = get_theme_mod('stock_photos_h4_font_size', '');
	// H5
	$stock_photos_h5_color = get_theme_mod('stock_photos_h5_color', '');
    $stock_photos_h5_font_family = get_theme_mod('stock_photos_h5_font_family', '');
    $stock_photos_h5_font_size = get_theme_mod('stock_photos_h5_font_size', '');
	// H6
	$stock_photos_h6_color = get_theme_mod('stock_photos_h6_color', '');
    $stock_photos_h6_font_family = get_theme_mod('stock_photos_h6_font_family', '');
    $stock_photos_h6_font_size = get_theme_mod('stock_photos_h6_font_size', '');
    $stock_photos_theme_color = get_theme_mod('stock_photos_theme_color', '');

	$stock_photos_custom_css ='
	    body{
		    color:'.esc_html($stock_photos_body_color).'!important;
		    font-family: '.esc_html($stock_photos_body_font_family).'!important;
		    font-size: '.esc_html($stock_photos_body_font_size).'px !important;
		}
		p,span{
		    color:'.esc_attr($stock_photos_paragraph_color).'!important;
		    font-family: '.esc_attr($stock_photos_paragraph_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_paragraph_font_size).'!important;
		}
		a{
		    color:'.esc_attr($stock_photos_atag_color).'!important;
		    font-family: '.esc_attr($stock_photos_atag_font_family).';
		}
		li{
		    color:'.esc_attr($stock_photos_li_color).'!important;
		    font-family: '.esc_attr($stock_photos_li_font_family).';
		}
		h1{
		    color:'.esc_attr($stock_photos_h1_color).'!important;
		    font-family: '.esc_attr($stock_photos_h1_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_attr($stock_photos_h2_color).'!important;
		    font-family: '.esc_attr($stock_photos_h2_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_attr($stock_photos_h3_color).'!important;
		    font-family: '.esc_attr($stock_photos_h3_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_attr($stock_photos_h4_color).'!important;
		    font-family: '.esc_attr($stock_photos_h4_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_attr($stock_photos_h5_color).'!important;
		    font-family: '.esc_attr($stock_photos_h5_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_attr($stock_photos_h6_color).'!important;
		    font-family: '.esc_attr($stock_photos_h6_font_family).'!important;
		    font-size: '.esc_attr($stock_photos_h6_font_size).'!important;
		}

		.button-section a.sell-btn,.primary-navigation ul li a:before,.primary-navigation ul ul a,#choices-section .tab button.tablinks.active ,.footertown input[type="submit"],input[type="submit"],.footertown th ,.footertown .tagcloud a:hover,.metabox,#comments input[type="submit"].submit,#comments a.comment-reply-link,.woocommerce span.onsale,.woocommerce #respond input#submit,  .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button.alt,.woocommerce button.button,.woocommerce a.button,nav.woocommerce-MyAccount-navigation ul li,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce-product-search button[type="submit"],.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,#main .tc-single-category a ,.read-btn a.blogbutton-small,#sidebar th,#sidebar input[type="submit"],#sidebar .tagcloud a:hover,.blog .navigation .nav-previous a, .blog .navigation .nav-next a, .archive .navigation .nav-previous a, .archive .navigation .nav-next a, .search .navigation .nav-previous a, .search .navigation .nav-next a,.pagination a:hover, .page-links a:hover,.pagination .current, .page-links .current,#main .bradcrumbs a,#main .bradcrumbs span,.services-box .tc-category a,.services-box .me-2:before,#main .wp-block-button a,.wp-block-search__button,.wp-block-tag-cloud a:hover, .footertown .wp-block-tag-cloud a:hover{
		    background-color:'.esc_attr($stock_photos_theme_color).';
		}

		.primary-navigation a:hover,.scrollup,.scrollup:focus,.scrollup:hover,.footertown .widget ul li a:hover,.footertown .widget h3,.footertown a.rsswidget,.topbox i:hover,#sidebar ul li a:hover,.services-box .metabox a:hover, .entry-date:hover i,
			.entry-author:hover a, .entry-author:hover i,.fas .fa-comments:hover a, .fas .fa-comments:hover i,.calendar_wrap a,.calendar_wrap td a,.entry-summary a,.entry-summary span,.woocommerce .star-rating span,.wp-calendar-nav a, .wp-block-latest-comments__comment-meta a,.footertown .widget h2, .footertown .wp-block-search__label,.wp-calendar-table td a{
		    color:'.esc_attr($stock_photos_theme_color).';
		}

		.primary-navigation ul ul,#choices-section .tab button.tablinks.active ,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,#sidebar h3, #sidebar h2, #sidebar .wp-block-search__label,.wp-block-tag-cloud a:hover, .footertown .wp-block-tag-cloud a:hover,.footertown .tagcloud a:hover,#sidebar .tagcloud a:hover{
		   border-color:'.esc_attr($stock_photos_theme_color).';
		}

		.woocommerce-message{
		   border-top-color:'.esc_attr($stock_photos_theme_color).';
		}

		@media screen and (max-width: 1000px){
			 .site_header,.side-menu,.menubox.nav{
			    background-color:'.esc_attr($stock_photos_theme_color).';
			}
		}

		';
	wp_add_inline_style( 'stock-photos-basic-style',$stock_photos_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'stock-photos-basic-style',$stock_photos_custom_css );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js' );
	wp_enqueue_script( 'stock-photos-custom-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if (is_page_template( 'page-template/custom-frontpage.php' )) {
		wp_enqueue_script( 'stock-photos-slider-jquery', get_template_directory_uri() . '/js/category-slider.js', array('jquery') );
	}
}
add_action( 'wp_enqueue_scripts', 'stock_photos_scripts' );

// URL DEFINES
define('STOCK_PHOTOS_SITE_URL',__('https://www.themescaliber.com/themes/free-stock-photo-wordpress-theme/','stock-photos'));
define('STOCK_PHOTOS_FREE_THEME_DOC',__('https://themescaliber.com/demo/doc/free-stock-photos/','stock-photos'));
define('STOCK_PHOTOS_SUPPORT',__('https://wordpress.org/support/theme/stock-photos/','stock-photos'));
define('STOCK_PHOTOS_REVIEW',__('https://wordpress.org/support/theme/stock-photos/reviews/','stock-photos'));
define('STOCK_PHOTOS_BUY_NOW',__('https://www.themescaliber.com/themes/stock-photography-wordpress-theme/','stock-photos'));
define('STOCK_PHOTOS_LIVE_DEMO',__('https://www.themescaliber.com/stock-photography-pro/','stock-photos'));
define('STOCK_PHOTOS_PRO_DOC',__('https://themescaliber.com/demo/doc/stock-photography-pro/','stock-photos'));
define('STOCK_PHOTOS_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','stock-photos'));

function stock_photos_credit_link() {
    echo "<a href=".esc_url(STOCK_PHOTOS_SITE_URL)." target='_blank'>".esc_html__('Stock Photos WordPress Theme','stock-photos')."</a>";
}

/*radio button sanitization*/

function stock_photos_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/**
 * Enqueue block editor style
 */
function stock_photos_block_editor_styles() {
	wp_enqueue_style( 'stock-photos-font', stock_photos_font_url(), array() );
	wp_enqueue_style( 'stock-photos-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'stock_photos_block_editor_styles' );

/* Excerpt Limit Begin */
function stock_photos_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'stock_photos_loop_columns');
if (!function_exists('stock_photos_loop_columns')) {
	function stock_photos_loop_columns() {
		$columns = get_theme_mod( 'stock_photos_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'stock_photos_shop_per_page', 9 );
function stock_photos_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'stock_photos_product_per_page', 9 );
	return $cols;
}

function stock_photos_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function stock_photos_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'stock_photos_post_navigation' ) ) {
	function stock_photos_post_navigation() {
		$stock_photos_pagination_type = get_theme_mod( 'stock_photos_post_navigation_type', 'numbers' );
		if ( $stock_photos_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'prev_text'          => __( 'Previous page', 'stock-photos' ),
	            'next_text'          => __( 'Next page', 'stock-photos' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'stock-photos' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';

/* Block Pattern */
require get_template_directory() . '/block-patterns.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

function stock_photos_taxonomy_add_custom_field() {
    ?>
    <div class="form-field term-image-wrap">
        <label for="cat-image"><?php echo esc_html( 'Image', 'stock-photos' ); ?></label>
        <p><a href="#" class="stock_photos_upload_image_button button button-secondary"><?php echo esc_html('Upload Image', 'stock-photos'); ?></a></p>
        <input type="text" name="category_image" id="cat-image" value="" size="40" />
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'stock_photos_taxonomy_add_custom_field', 10, 2 );
 
function stock_photos_taxonomy_edit_custom_field($term) {
    $image = get_term_meta($term->term_id, 'category_image', true);
    ?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="category_image"><?php echo esc_html( 'Image', 'stock-photos' ); ?></label></th>
        <td>
            <p><a href="#" class="stock_photos_upload_image_button button button-secondary"><?php echo esc_html('Upload Image', 'stock-photos'); ?></a></p><br/>
            <input type="text" name="category_image" id="cat-image" value="<?php echo esc_attr($image); ?>" size="40" />
        </td>
    </tr>
    <?php
}
add_action( 'category_edit_form_fields', 'stock_photos_taxonomy_edit_custom_field', 10, 2 );

function stock_photos_include_script() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'stock-photos-script', get_stylesheet_directory_uri() . '/js/category.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'stock_photos_include_script' );

function stock_photos_save_taxonomy_custom_meta_field( $term_id ) {
    if ( isset( $_POST['category_image'] ) ) {
        update_term_meta($term_id, 'category_image', wp_unslash( $_POST['category_image']));
    }
}  
add_action( 'edited_category', 'stock_photos_save_taxonomy_custom_meta_field', 10, 2 );  
add_action( 'create_category', 'stock_photos_save_taxonomy_custom_meta_field', 10, 2 );
