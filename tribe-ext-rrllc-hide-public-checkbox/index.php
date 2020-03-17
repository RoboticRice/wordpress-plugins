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

//Taken from: https://theeventscalendar.com/knowledgebase/k/public-attendee-list/#hide
add_filter( 'tribe_tickets_plus_hide_attendees_list_optout', '__return_true' );