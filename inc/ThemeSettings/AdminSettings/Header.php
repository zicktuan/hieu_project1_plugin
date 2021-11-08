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

class Header extends SettingFactory
{

	public function section(){
		return array(
	        'id'          => 'header',
	        'title'       => 'Header Settings',
			'icon' 		  => '<div class="dashicons dashicons-admin-generic"></div>'
	    );
	}

	public function settings(){
		return [
			[
				'id'          => 'gmo_header_logo',
				'label'       => 'Header logo',
				'type'        => 'upload',
				'section'     => 'header',
				'desc'        => 'Thay đổi logo phần header',
			]
		];
	}
}