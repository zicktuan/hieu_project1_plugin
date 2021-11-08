<?php
namespace GMO\Taxonomies;

class SpecializedTaxonomie extends AbstractTaxonomies {

	protected $taxonomie = 'specialized';

	protected $argsPostType = ['gmo_job'];

	public function __construct(){
		parent::__construct();
	}

	public function labels(){
		return array(
			'name'              => _x( 'Lĩnh vực', 'taxonomy general name', 'GMO' ),
			'singular_name'     => _x( 'Lĩnh vực', 'taxonomy singular name', 'GMO' ),
			'search_items'      => __( 'Tìm kiếm lĩnh vực', 'GMO' ),
			'all_items'         => __( 'Tất cả lĩnh vực', 'GMO' ),
			'parent_item'       => __( 'Parent Specialized', 'GMO' ),
			'parent_item_colon' => __( 'Parent Specialized:', 'GMO' ),
			'edit_item'         => __( 'Edit Specialized', 'GMO' ),
			'update_item'       => __( 'Update Specialized', 'GMO' ),
			'add_new_item'      => __( 'Add New Specialized', 'GMO' ),
			'new_item_name'     => __( 'New Specialized Name', 'GMO' ),
			'menu_name'         => __( 'Lĩnh vực', 'GMO' ),
		);
	}

	public function argsRegister(){
		return array(
			'hierarchical'      => true,
			'labels'            => $this->labels(),
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'specialized' ),
		);
	}

	public function taxonomieName(){
		return $this->taxonomie;
	}
}
