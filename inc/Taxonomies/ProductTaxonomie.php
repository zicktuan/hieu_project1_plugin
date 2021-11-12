<?php
namespace GMO\Taxonomies;

class ProductTaxonomie extends AbstractTaxonomies {

	protected $taxonomie = 'product_category';

	protected $argsPostType = ['nat_product'];

	public function __construct(){
		parent::__construct();
	}

	public function labels(){
		return array(
			'name'              => _x( 'Product category', 'taxonomy general name', 'GMO' ),
			'singular_name'     => _x( 'Product category', 'taxonomy singular name', 'GMO' ),
			'search_items'      => __( 'Tìm kiếm danh mục sản phẩm', 'GMO' ),
			'all_items'         => __( 'Tất cả danh mục sản phẩm', 'GMO' ),
			'parent_item'       => __( 'Parent Product category', 'GMO' ),
			'parent_item_colon' => __( 'Parent Product category:', 'GMO' ),
			'edit_item'         => __( 'Edit Product category', 'GMO' ),
			'update_item'       => __( 'Update Product category', 'GMO' ),
			'add_new_item'      => __( 'Add New Product category', 'GMO' ),
			'new_item_name'     => __( 'New Product category Name', 'GMO' ),
			'menu_name'         => __( 'Product category', 'GMO' ),
		);
	}

	public function argsRegister(){
		return array(
			'hierarchical'      => true,
			'labels'            => $this->labels(),
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product_category' ),
		);
	}

	public function taxonomieName(){
		return $this->taxonomie;
	}
}
