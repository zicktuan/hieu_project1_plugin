<?php

namespace GMO\Classes;

/**
* @package BookAwesomePluginScripts
* @version 1.0
* @author lookawesome team
*
* Class after setup plugin
*/
class BookAwesomePluginScripts
{
	
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this, 'frontendScripts') );
		
		add_action( 'admin_enqueue_scripts', array($this, 'backendScripts') );
	}

    public function backendScripts() {
        global $GMOPlugin;
        wp_enqueue_script( 'gmo-customiez-admin', GMO_BASE_URL_PLUGIN . '/assets/backend/js/widget/customiezLocation.js', ['jquery'], $GMOPlugin->version, true );
    }
}