<?php
namespace GMO\Shortcode\Home;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeProduct extends AbstractShortcode
{
    public function __construct($self = null) {
        $this->parent = $self;
        add_shortcode($this->get_name(), array($this, 'render'));
        vc_lean_map($this->get_name(), array($this, 'map'));
    }

    /**
     * Get shortcode name.
     *
     * @return string
     */
    public function get_name() {
        return 'home_product';
    }

    /**
     * Shortcode handler.
     *
     * @param array $atts Shortcode attributes.
     *
     * @return string Shortcode output.
     */
    public function render($atts) {
        $atts = vc_map_get_attributes($this->get_name(), $atts);
        $atts = array_map('trim', $atts);
        // $listItems = vc_param_group_parse_atts( $atts['items'] );

        $args = array(
            'numberposts' => isset($atts['number_product']) ? $atts['number_product'] : 4,
            'post_type'   => 'nat_product',
            'sort_order'  => isset($atts['order_by']) ? $atts['order_by'] : "DESC",
        );

        $listPost = get_posts($args);
          
        ob_start();
        include $this->parent->locateTemplate('home/shortcode-product.tpl.php');
        return ob_get_clean();
    }

    /**
     * Get shortcode settings.
     *
     * @return array
     *
     * @see vc_lean_map()
     */
    public function map() {

        $params = array(

            array(
                "type" => "textfield",
                "heading" => __( "Tiêu đề", "GMO" ),
                "param_name" => "product_title",
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Số sản phẩm hiển thị", "GMO" ),
                "param_name" => "number_product",
            ),

            array(
                'type'       => 'dropdown',
                'param_name' => 'order_by',
                'heading'    => esc_html__('Order By', 'GMO'),
                'value'      => array(
                                __('DESC', 'GMO') => 'DESC',
                                __('ASC', 'GMO')  => 'ASC',
                            )
            )
            
            
        );

        return array(
            'name'        => esc_html__('Product', 'my-theme'),
            'description' => esc_html__('Trang chủ', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
