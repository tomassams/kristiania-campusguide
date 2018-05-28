<?php
/*
Plugin Name: Responsive Image Maps
Plugin URI: http://philipnewcomer.net/wordpress-plugins/responsive-image-maps/
Description: Makes image maps responsive by packaging the RWD Image Maps jQuery plugin for use in WordPress.
Version: 1.4
Author: Philip Newcomer
Author URI: http://philipnewcomer.net
License: GPL2
*/

/*  Copyright 2014 Philip Newcomer (email: contact@philipnewcomer.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function pn_rim_enqueue_scripts()
{
	wp_enqueue_script( 'jQuery.rwd_image_maps', plugins_url( 'jquery.rwdImageMaps.min.js', __FILE__ ), array( 'jquery' ), '1.5', true );
}
add_action( 'wp_enqueue_scripts', 'pn_rim_enqueue_scripts' );

function pn_rim_header_scripts()
{ ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('img[usemap]').rwdImageMaps();
	});
</script>
<style type="text/css">
	img[usemap] { max-width: 100%; height: auto; }
</style>
<?php }
add_action( 'wp_head', 'pn_rim_header_scripts' );
