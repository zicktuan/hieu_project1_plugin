<?php 

namespace GMO\ThemeSettings\AdminSettings;

use GMO\ThemeSettings\SettingFactory;

/**
 * @author lookawesome team
 * @version 1.0
 * @package AdminSettings
 * 
 * Setting General theme setting for theme bookawesome
*/

class Footer extends SettingFactory
{

	public function section(){
		return array(
	        'id'          => 'footer',
	        'title'       => 'Footer Settings',
			'icon' 		  => '<div class="dashicons dashicons-admin-generic"></div>'
	    );
	}

	public function settings(){
		return [
			[
				'id'          => 'gmo_footer_copyright',
				'label'       => 'Copyright',
				'type'        => 'text',
				'section'     => 'footer',
            ],
		];
	}
}