<?php
namespace GMO\Taxonomies;

class LocationTaxonomie extends AbstractTaxonomies {

	protected $taxonomie = 'location';

	protected $argsPostType = ['gmo_job'];

	public function __construct(){
		parent::__construct();
	}

	public function labels(){
		return array(
			'name'              => _x( 'Địa điểm', 'taxonomy general name', 'GMO' ),
			'singular_name'     => _x( 'Địa điểm', 'taxonomy singular name', 'GMO' ),
			'search_items'      => __( 'Tìm kiếm địa điểm', 'GMO' ),
			'all_items'         => __( 'Tất cả địa điểm', 'GMO' ),
			'parent_item'       => __( 'Parent Location', 'GMO' ),
			'parent_item_colon' => __( 'Parent Location:', 'GMO' ),
			'edit_item'         => __( 'Edit Location', 'GMO' ),
			'update_item'       => __( 'Update Location', 'GMO' ),
			'add_new_item'      => __( 'Add New Location', 'GMO' ),
			'new_item_name'     => __( 'New Location Name', 'GMO' ),
			'menu_name'         => __( 'Địa điểm', 'GMO' ),
		);
	}

	public function argsRegister(){
		return array(
			'hierarchical'      => true,
			'labels'            => $this->labels(),
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'location' ),
		);
	}

	public function taxonomieName(){
		return $this->taxonomie;
	}
}
