<?php 

namespace GMO\ThemeSettings\AdminSettings;

use GMO\ThemeSettings\SettingFactory;
use GMO\Help\Job\JobSetting;

/**
 * @author lookawesome team
 * @version 1.0
 * @package AdminSettings
 * 
 * Setting General theme setting for theme bookawesome
*/

class General extends SettingFactory
{

	public function section(){
		return array(
	        'id'          => 'general',
	        'title'       => 'General Settings',
			'icon' 		  => '<div class="dashicons dashicons-admin-generic"></div>'
	    );
	}

	public function settings(){
		$this->vttd();

		return $this->fieldsSettings;
	}

	public function vttd() {
		$settings = [
			[
				'id'          => 'gmo_general_blog_setting',
				'label'       => 'Shop setting',
				'type'        => 'tab',
				'section'     => 'general',
			],
			[
                'id'       => 'product_slider',
                'label'    => __( 'List Image slider', 'GMO' ),
                'desc'     => ' ',
                'type'     => 'list-item',
                'section'  => 'general',
                'settings' => [ 
                    [
                        'id'      => 'img',
                        'label'   => __( 'Image', 'GMO' ),
                        'type'    => 'upload',
                    ],
					[
                        'id'      => 'sub_title',
                        'label'   => __( 'Phụ đề', 'GMO' ),
                        'type'    => 'text',
                    ],
					[
                        'id'      => 'url',
                        'label'   => __( 'Đường dẫn đến trang Shop', 'GMO' ),
                        'type'    => 'text',
                    ],
					
				]
			],
			[
                'id'      => 'gmo_job_page_list',
                'label'   => __( 'Page show danh sách job', 'GMO' ),
                'desc'    => '',
                'type'    => 'select',
                'section' => 'general',
                'choices' => JobSetting::getInstance()->getListPage(),
            ],
			[
				'id'          => 'gmo_general_product_item_per_post',
				'label'       => 'Số bài viết muốn hiển thị trên 1 trang',
				'type'        => 'text',
				'desc'		  => 'Số bài viết hiển thị trên trang vị trí tuyển dụng',
				'section'     => 'general',
			],
		];

		$this->setListSettings($settings);
	}
}