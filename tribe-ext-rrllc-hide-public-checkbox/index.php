<?php
/**
 * Plugin Name:     Events Tickets Extension: Hide Public Attendance Checkbox
 * Description:     This plugin hides the checkbox for the RSVP tickets from view.
 * Version:         1.0.0
 * Extension Class: Tribe__Extension__RRLLC__Hide__Public__Checkbox
 * Author:          Robotic Rice LLC
 * Author URI:      http://roboticrice.com/
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

// Do not load directly.
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// Do not load unless Tribe Common is fully loaded.
if ( ! class_exists( 'Tribe__Extension' ) ) {
    return;
}

if ( ! class_exists( 'tribe-ext-rrllc-hide-public-checkbox' ) ) {
    /*ensure we don't accidentally crash the entire website... again.*/

    /**
	 * Taken from https://stackoverflow.com/questions/10897755/add-css-to-php-wordpress-plugin
	 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
	 */
	add_action( 'wp_enqueue_scripts', 'tribe_ext_rrllc_hide_public_checkbox' );

	/**
	 * Enqueue plugin style-file
	 */
	function tribe_ext_rrllc_hide_public_checkbox() {
	    // Respects SSL, Style.css is relative to the current file
	    wp_register_style( 'tribe-ext-rrllc-hide-public-checkbox', plugins_url('tribe-ext-rrllc-hide-public-checkbox.css', __FILE__) );
	    wp_enqueue_style( 'tribe-ext-rrllc-hide-public-checkbox' );
	}
} else {
	die( '-2' );
}