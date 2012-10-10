<?php

class Berriart {
    
    const VERSION = '5';
    const LANG_DOMAIN = 'berriart';
    
    public function __construct() {
        add_action('wp_enqueue_scripts', array(&$this, 'scriptsAndStyles'));
    }
    
    public function scriptsAndStyles() {
        // Scripts
        wp_register_script('foundation-modernizer', get_template_directory_uri() . '/javascripts/foundation/modernizr.foundation.js', array(), '2.6.0');
        wp_register_script('foundation-jquery', get_template_directory_uri() . '/javascripts/foundation/jquery.js', array(), '1.8.1', true);
        wp_register_script('foundation-placeholder', get_template_directory_uri() . '/javascripts/foundation/jquery.placeholder.js', array('foundation-jquery'), '2.0.7', true);
        wp_register_script('berriart', get_template_directory_uri() . '/javascripts/app.js', array('foundation-modernizer', 'foundation-jquery', 'foundation-placeholder'), self::VERSION, true);
        wp_enqueue_script('berriart'); 
        
        /*
         <!-- Included JS Files (Uncompressed) -->
	
	<script src="javascripts/foundation/jquery.foundation.tabs.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.accordion.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.forms.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.topbar.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.reveal.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.tooltips.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.orbit.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.alerts.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.navigation.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.mediaQueryToggle.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.buttons.js"></script>
	
	
  <!-- Application Javascript, safe to override -->
  <script src="javascripts/foundation/app.js"></script>
         */
        
        // Style
        wp_register_style('berriart', get_template_directory_uri() . '/stylesheets/app.css', array(), self::VERSION);
        wp_enqueue_style('berriart');
        
        
    }
}

global $berriart;
$berriart = new Berriart();