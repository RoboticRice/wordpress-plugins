<?php
/**
 * Plugin Name:     Events Tickets Extension: Hide Public Attendance Checkbox
 * Description:     This plugin hides the checkbox for the RSVP tickets from view. Currently does nothing.
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

/*extension code format inspired by https://wordpress.org/support/topic/change-default-ticket-quantity/ */
class Tribe__Extension__RRLLC__Hide__Public__Checkbox extends Tribe__Extension {

    private static $version = "1.0.0";

    /**
     * Setup the Extension's properties.
     *
     */
    public function construct() {
        $this->add_required_plugin( 'Tribe__Tickets__Main', '4.11.3' );
    }

    /**
     * Taken from https://stackoverflow.com/questions/10897755/add-css-to-php-wordpress-plugin
	 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
	 */
    public function init() {
        add_action( 'wp_enqueue_scripts', 'tribe_ext_rrllc_hide_public_checkbox' );
    }

	/**
	 * Enqueue plugin style-file
	 */
	public function tribe_ext_rrllc_hide_public_checkbox() {
	    // Respects SSL, Style.css is relative to the current file
	    wp_register_style( 'tribe-ext-rrllc-hide-public-checkbox', plugins_url('tribe-ext-rrllc-hide-public-checkbox.css', __FILE__) );
	    wp_enqueue_style( 'tribe-ext-rrllc-hide-public-checkbox' );
	}

	/**
	 * Check if the current post is a valid post type for tickets
	 *
	 * Taken from official plugin "Events Tickets Extension: Set default quantity of tickets to 1"
	 * https://wordpress.org/support/topic/change-default-ticket-quantity/
	 * @since 1.0.0
	 *
	 * @return bool
	 * 
	 * Currently Unused... planned for future update.
	 */
/*	function is_valid_post_type() {
*		// bail out if not on a Single Event page
*		if ( ! is_single()  ) {
*			return false;
*		}
*
*		if ( ! class_exists( 'Tribe__Tickets__Main' ) ) {
*			return false;
*		}
*
*		if ( ! in_array( get_post_type(), Tribe__Tickets__Main::instance()->post_types() ) ) {
*			return false;
*		}
*
*		return true;
*	}
*/
}