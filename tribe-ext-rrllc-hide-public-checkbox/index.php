<?php
/**
 * Plugin Name:     Events Tickets Extension: Hide Public Attendance Checkbox
 * Description:     This plugin hides the checkbox for the RSVP tickets from view.
 * Version:         1.1.0
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

//Taken from: https://gist.github.com/andrasguseo/29903a974cb84060957881c17613c278#file-change-wording-with-context-php
function tribe_custom_theme_text_with_context ( $translation, $text, $context, $domain ) {
 
	// Put your custom text here in a key => value pair
	// Example: 'Text you want to change' => 'This is what it will be changed to'
	// The text you want to change is the key, and it is case-sensitive
	// The text you want to change it to is the value
	// You can freely add or remove key => values, but make sure to separate them with a comma
	// This example changes the label "Venue" to "Location", and "Related Events" to "Similar Events"
	$custom_text = array(
		'Event ends on' => 'Last day to register',
	);
	
	// If this text domain starts with "tribe-", "the-events-", or "event-" and we have replacement text
    	if( (strpos($domain, 'tribe-') === 0 || strpos($domain, 'the-events-') === 0 || strpos($domain, 'event-') === 0) && array_key_exists($translation, $custom_text) ) {
		$translation = $custom_text[$translation];
	}
    return $translation;
}
add_filter('gettext_with_context', 'tribe_custom_theme_text_with_context', 21, 4);
