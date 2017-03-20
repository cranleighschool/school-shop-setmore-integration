<?php
/*
Plugin Name: School Shop Setmore Integration
Plugin URI: http://www.cranleigh.org
Description: This plugin puts a bit of integration into the website for Setmore and the School Shop.
Author: Fred Bradley
Version: 1.1.0
Author URI: http://fred.im/
*/

class cs_setmore {
        public $add_script;


        function __construct() {
                add_shortcode("school-shop-book-now", array($this, 'handle_shortcode'));

                add_action('init', array($this, 'register_script'));
                add_action('wp_footer', array($this, 'print_script'));

        }

		function handle_shortcode($atts) {
			$this->add_script = true;
			/*if (time() < strtotime("April 19") && time() < strtotime("October 1")):
				return '<div class="alert alert-warning">Sorry, our Online Booking module is only available during the Summer Term and Summer Holidays. Please call the School Shop for any enquiries.</div>';
			endif;

			// Actual shortcode handling here
*/
			return '<center><br /><a id="Setmore_button_iframe" style="float:none" href="https://my.setmore.com/shortBookingPage/4596b048-5959-4bde-9669-c30f963b5f71"><img border="none" src="https://my.setmore.com/images/bookappt/SetMore-book-button.png" alt="Book an appointment with Cranleigh School Shop using SetMore" /></a><br />&nbsp;</center>';
			}

		function register_script() {
                wp_register_script('setmore_script', 'https://my.setmore.com/js/iframe/setmore_iframe.js', array('jquery'), time(), true);
        }

		function print_script() {
                if (!$this->add_script)
                        return;

                wp_print_scripts('setmore_script');

        }

}
new cs_setmore();
//cs_setmore::init();

