<?php

namespace GMO\PostType\MetaBox\Products;

use GMO\PostType\MetaBox\AbstractMetaBox;

class ProductMetaBox extends AbstractMetaBox
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
        $informationMetaBox = [
            'id'       => 'gmo_product_meta_box',
            'title'    => __('Product Meta Box', 'GMO'),
            'desc'     => '',
            'pages'    => ['nat_product'],
            'context'  => 'normal',
            'priority' => 'high',
            'fields'   => [

                [
                    'label' => __( 'General', 'GMO' ),
                    'id'    => 'general',
                    'type'  => 'tab'
                ],
                // [
                //     'label' => __('Ngày hết hạn tuyển dụng', 'GMO'),
                //     'id'    => 'gmo_job_depature',
                //     'type'  => 'date-picker',
                //     'std'   => date('Y-m-d'),
                // ],
                [
                    'id'      => 'gmo_product_price',
                    'label'   => __( 'Giá', 'GMO' ),
                    'type'    => 'text',
                ],
                [
                    'id'      => 'gmo_product_price_discount',
                    'label'   => __( 'Giá khuyến mãi', 'GMO' ),
                    'type'    => 'text',
                ],
            ],
        ];

        /**
         * Register our meta boxes using the
         * ot_register_meta_box() function.
         */

        ot_register_meta_box($informationMetaBox);

    }

    public function save($post_id) {
       
    }
}
