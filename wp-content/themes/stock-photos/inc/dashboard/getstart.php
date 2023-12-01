<?php
//about theme info
add_action( 'admin_menu', 'stock_photos_gettingstarted' );
function stock_photos_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'stock-photos'), esc_html__('Get Started', 'stock-photos'), 'edit_theme_options', 'stock_photos_guide', 'stock_photos_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function stock_photos_admin_theme_style() {
   wp_enqueue_style('stock-photos-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'stock_photos_admin_theme_style');

//guidline for about theme
function stock_photos_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'stock-photos' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="stock_photos_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'stock-photos' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="stock_photos_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'stock-photos' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="stock_photos_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'stock-photos' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Stock Photos Theme', 'stock-photos' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( STOCK_PHOTOS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'stock-photos' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'stock-photos'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( STOCK_PHOTOS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'stock-photos'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Stock Photos is an excellent WordPress theme for passionate photographers, photo galleries, Image and laminating studios, photography exhibitions, Stock Photos websites, image marketplace, video marketplace, etc. With a clean and retina-ready layout, you do get a responsive website. Bootstrap-based design works flawlessly on different web browsers thanks to its cross-browser compatibility. A user-friendly interface works very well for obtaining a professional website and gives you SEO-friendly codes to get easily noticed on the search engine results. This elegant and minimal design converges the entire focus of your audience on the key info and gives you websites that are mobile-friendly. There are many personalization options given to you along with color and font choices. The optimized codes result in faster page load time. Call to Action Button (CTA) work in a direction to make the theme more interactive and add more advantage to give you better conversion rates. There are secure and clean codes resulting in a flawless performing website. Social media options are integrated into the theme giving you more exposure and a bigger and better platform to promote the photography services online and reach out to more people. A lot of shortcodes and stunning animations are included in the theme adding more life to the existing design.', 'stock-photos' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Stock Photos Theme Information', 'stock-photos' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( STOCK_PHOTOS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'stock-photos' ); ?></a></p>
				<p><a href="<?php echo esc_url( STOCK_PHOTOS_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'stock-photos' ); ?></a></p>
				<p><a href="<?php echo esc_url( STOCK_PHOTOS_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'stock-photos' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Stock Photos Pro Theme', 'stock-photos' ); ?></h4>
				<P><?php esc_html_e( 'Getting a stock photography website is a good idea to promote your work as well as get some revenue by making some really phenomenal stock pictures available online and for that, there cannot be a better choice than Stock Photography WordPress Theme. A wonderful full-screen slider is made available for projecting amazing photographs and pictures that will catch the audience’s attention right from the very beginning. A lot of social media buttons are made available on the page allowing you to share the blog posts as well as promote the stock images, thus impressing the audience to get your subscription and use your stock photos and images for their projects. Stock Photography WordPress Theme consists of space for contact information as well as adding your logo. With the Call to Action Button (CTA) included, your visitors will get a helping hand for taking the next step of action. This will also positively affect your conversion rates. The layout looks rather impressive on various mobile devices thanks to the responsive design it has got. Stock Photography WordPress Theme is ready to be translated as well which makes it really helpful for you to get readers as well as clients across the world.', 'stock-photos' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'stock-photos' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'stock-photos' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'stock-photos' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'stock-photos' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'stock-photos' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'stock-photos' ); ?></P>
					<a href="<?php echo esc_url( STOCK_PHOTOS_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'stock-photos' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'stock-photos'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'stock-photos' ); ?></P>
					<a href="<?php echo esc_url( STOCK_PHOTOS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'stock-photos'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>