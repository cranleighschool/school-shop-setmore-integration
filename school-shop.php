<?php
/*
Plugin Name: School Shop Setmore Integration
Plugin URI: http://www.cranleigh.org
Description: This plugin puts a bit of integration into the website for Setmore and the School Shop.
Author: Fred Bradley
Version: 1
Author URI: http://fred.im/
*/

class cs_setmore {
        static $add_script;

        static function init() {
                add_shortcode("school-shop-book-now", array(__CLASS__, 'handle_shortcode'));

                add_action('init', array(__CLASS__, 'register_script'));
                add_action('wp_footer', array(__CLASS__, 'print_script'));

        }

	static function handle_shortcode($atts) {
                self::$add_script = true;


                // Actual shortcode handling here

                return '<center><br /><a id="Setmore_button_iframe" style="float:none" href="https://my.setmore.com/shortBookingPage/4596b048-5959-4bde-9669-c30f963b5f71"><img border="none" src="https://my.setmore.com/images/bookappt/SetMore-book-button.png" alt="Book an$
        }

	static function register_script() {
                wp_register_script('setmore_script', 'https://my.setmore.com/js/iframe/setmore_iframe.js', array('jquery'), time(), true);
        }

	static function print_script() {
                if (!self::$add_script)
                        return;

                wp_print_scripts('setmore_script');

        }

}
cs_setmore::init();
