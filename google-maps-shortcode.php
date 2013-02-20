<?php
	/*
		Plugin Name: Google Maps Shortcode
		Plugin URI: http://jeffreymills.net/plugins/googleMapsShortcode
		Description: Allows you to place a personalized Google Map in your posts with a shortcode
		Author: Jeffrey Mills
		Version: 0.1-alpha
		Author URI: http://jeffreymills.net
	*/
	wp_enqueue_script('googlemaps','https://maps.googleapis.com/maps/api/js?sensor=false');

	function addMap($atts) {
		extract(shortcode_atts(array(
			'location' => '1600 Pennsylvania Ave, Washington DC',
			'title' => 'THIS IS SPARTA!'
		), $atts ));
		ob_start();
		// include map file here
		include('map.php');
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('googlemap','addMap');
?>