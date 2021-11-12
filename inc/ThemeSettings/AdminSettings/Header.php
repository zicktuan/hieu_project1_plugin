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
			],
			[
				'id'          => 'gmo_header_phone',
				'label'       => 'Số điện thoại',
				'type'        => 'text',
				'section'     => 'header',
			],
			[
				'id'          => 'gmo_header_email',
				'label'       => 'Email',
				'type'        => 'text',
				'section'     => 'header',
			],
			[
				'id'       => 'gmo_job_social',
				'label'    => __( 'Danh sách mạng xã hội', 'GMO' ),
				'type'     => 'list-item',
				'section'  => 'header',
				'settings' => [
					[
						'id'    => 'url',
						'label' => __('Đường dẫn', 'GMO'),
						'type'  => 'text',
					],
					[
						'id'    => 'icon',
						'label' => __('Icon', 'GMO'),
						'type'  => 'text',
						'std' => '<i class="fa fa-facebook"></i>'
					]

				],
			],
		];
	}
}