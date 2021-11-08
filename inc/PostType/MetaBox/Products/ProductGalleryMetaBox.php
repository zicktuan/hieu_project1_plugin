<?php

namespace GMO\PostType\MetaBox\Products;

use GMO\PostType\MetaBox\AbstractMetaBox;

class ProductGalleryMetaBox extends AbstractMetaBox
{
    protected $useOptionTree = true;

    public function __construct()
    {
        parent::__construct($objectPosttype = '');
    }

    public function register()
    {
    }

    public function output($post)
    {
        $galleryMetaBox = array(
            'id'       => 'awe_product_gallery',
            'title'    => __('product Gallery', 'GMO'),
            'pages'    => array('nat_product'),
            'context'  => 'side',
            'priority' => 'low',
            'fields'   => array(
                array(
                    'id'   => 'product_gallery',
                    'type' => 'gallery',
                ),
            )
        );

        /**
         * Register our meta boxes using the
         * ot_register_meta_box() function.
         */

        ot_register_meta_box($galleryMetaBox);

    }

    public function save($post_id) {
       
    }
}
