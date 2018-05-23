<?php
/**
 * The sidebar for WooCommerce shop pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package polestar
 * @license GPL 2.0
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) return;
if ( is_product() ) return;
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-shop' ); ?>
</aside><!-- #secondary -->
