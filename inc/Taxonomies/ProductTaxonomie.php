<?php
namespace GMO\Taxonomies;

class ProductTaxonomie extends AbstractTaxonomies {

	protected $taxonomie = 'product';

	protected $argsPostType = ['nat_product'];

	public function __construct(){
		parent::__construct();
	}

	public function labels(){
		return array(
			'name'              => _x( 'Product', 'taxonomy general name', 'GMO' ),
			'singular_name'     => _x( 'Product', 'taxonomy singular name', 'GMO' ),
			'search_items'      => __( 'Tìm kiếm sản phẩm', 'GMO' ),
			'all_items'         => __( 'Tất cả sản phẩm', 'GMO' ),
			'parent_item'       => __( 'Parent Product', 'GMO' ),
			'parent_item_colon' => __( 'Parent Product:', 'GMO' ),
			'edit_item'         => __( 'Edit Product', 'GMO' ),
			'update_item'       => __( 'Update Product', 'GMO' ),
			'add_new_item'      => __( 'Add New Product', 'GMO' ),
			'new_item_name'     => __( 'New Product Name', 'GMO' ),
			'menu_name'         => __( 'Product', 'GMO' ),
		);
	}

	public function argsRegister(){
		return array(
			'hierarchical'      => true,
			'labels'            => $this->labels(),
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product' ),
		);
	}

	public function taxonomieName(){
		return $this->taxonomie;
	}
}
