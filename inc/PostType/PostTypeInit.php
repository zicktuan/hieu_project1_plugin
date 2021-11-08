<?php
namespace GMO\PostType;

use GMO\PostType\ProductPostType;

/**
 * @author Nguyen Anh Tuan
 * @version 1.0
 * @package PostType
 * 
 * Register post type for theme gmo
 */
class PostTypeInit {

	public function __construct(){
		new ProductPostType;
	}
}