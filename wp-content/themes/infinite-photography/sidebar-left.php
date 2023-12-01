<?php
/**
 * The sidebar containing the left widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Infinite Photography
 */
if ( ! is_active_sidebar( 'infinite-photography-sidebar-left' ) ) {
	return;
}
$sidebar_layout = infinite_photography_sidebar_selection();
if( $sidebar_layout == "left-sidebar" || $sidebar_layout == "both-sidebar"  ) : ?>
    <div id="secondary-left" class="widget-area sidebar secondary-sidebar float-right" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'infinite-photography-sidebar-left' );; ?>
        </div>
    </div>
<?php endif;