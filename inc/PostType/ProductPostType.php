<?php
namespace GMO\PostType;

use GMO\PostType\MetaBox\Products\ProductMetaBox;
use GMO\PostType\MetaBox\Products\ProductGalleryMetaBox;

class ProductPostType extends AbstractPostType {

	protected $posType = 'nat_product';

	public function __construct(){
		parent::__construct();
		add_action( 'admin_enqueue_scripts', array( $this, 'loadScripts' ) , 1000000000);
		add_action( 'admin_enqueue_scripts', array( $this, 'loadStyles' ) , 1000000000);
	}

	/**
	 * Handle add metabox for post type.
	 * @return void
	 */
	public function metaBox(){
		add_action( 'add_meta_boxes', array(new ProductMetaBox($this), 'register') );
		add_action( 'add_meta_boxes', array(new ProductGalleryMetaBox($this), 'register') );
	}

	public function labels(){
		return array(
			'name'                  => _x( 'Product', 'Product General Name', 'GMO' ),
			'singular_name'         => _x( 'Product', 'Product Singular Name', 'GMO' ),
			'menu_name'             => __( 'Products', 'GMO' ),
			'name_admin_bar'        => __( 'Products', 'GMO' ),
			'archives'              => __( 'Item Archives', 'GMO' ),
			'attributes'            => __( 'Item Attributes', 'GMO' ),
			'parent_item_colon'     => __( 'Parent Item:', 'GMO' ),
			'all_items'             => __( 'All Items', 'GMO' ),
			'add_new_item'          => __( 'Add New Item', 'GMO' ),
			'add_new'               => __( 'Add New', 'GMO' ),
			'new_item'              => __( 'New Item', 'GMO' ),
			'edit_item'             => __( 'Edit Item', 'GMO' ),
			'update_item'           => __( 'Update Item', 'GMO' ),
			'view_item'             => __( 'View Item', 'GMO' ),
			'view_items'            => __( 'View Items', 'GMO' ),
			'search_items'          => __( 'Search Item', 'GMO' ),
			'not_found'             => __( 'Not found', 'GMO' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'GMO' ),
			'featured_image'        => __( 'Featured Image', 'GMO' ),
			'set_featured_image'    => __( 'Set featured image', 'GMO' ),
			'remove_featured_image' => __( 'Remove featured image', 'GMO' ),
			'use_featured_image'    => __( 'Use as featured image', 'GMO' ),
			'insert_into_item'      => __( 'Insert into item', 'GMO' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'GMO' ),
			'items_list'            => __( 'Items list', 'GMO' ),
			'items_list_navigation' => __( 'Items list navigation', 'GMO' ),
			'filter_items_list'     => __( 'Filter items list', 'GMO' )
		);
	}

	public function argsRegister(){
		return array(
			'label'                 => __( 'Product', 'GMO' ),
			'description'           => __( 'Product Description', 'GMO' ),
			'labels'                => $this->labels(),
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'            => array( 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'menu_icon'             => 'dashicons-cart'
		);
	}

	public function postTypeName(){
		return $this->posType;
	}

	// import file javascript
	public function loadScripts(){
		// wp_enqueue_script('hd-posts-type-product-js', GMO_BASE_URL_PLUGIN.'/assets/backend/js/posts-type-product.js', array('jquery'), GMO_BASE_URL_PLUGIN, true);
	}

	// import file css
	public function loadStyles(){
		// wp_enqueue_style('hd-posts-type-product',GMO_BASE_URL_PLUGIN.'/assets/backend/css/posts-type-product.css', GMO_BASE_URL_PLUGIN, true);
	}
}
