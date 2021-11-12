<?php
namespace GMO\Shortcode\Home;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeCatProduct extends AbstractShortcode
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
        return 'home_cat_product';
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
        $listItems = vc_param_group_parse_atts( $atts['items'] );
        ob_start();
        include $this->parent->locateTemplate('home/shortcode-cat-product.tpl.php');
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
        $argsCat = [];
        $terms = get_terms( array(
            'taxonomy' => 'product_category',
            'hide_empty' => false,
        ) );
        if( !empty($terms) ) {
            foreach($terms as $term ) {
                $cats = [];
                $cats['label'] = $term->name;
                $cats['id'] = $term->term_id;
                $argsCat[] = $cats;
            }
        }
        $params = array(
            array(
                'type'       => 'textfield',
                'param_name' => 'home_cat_product_title',
                'heading'    => esc_html__('Tiêu đề', 'GMO'),
            ),
            array(
                "type"       => "dropdown",
                "param_name" => "awe_list_cat",
                "heading"    => esc_html__("Danh mục", "bookawesome"),
                "value"      => $argsCat
            ),
            array(
                'type'       => 'textfield',
                'param_name' => 'number_post',
                'heading'    => esc_html__('Số bài hiển thị', 'bookawesome'),
                'std'        => '3'
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => __('Sắp xếp theo'),
                'param_name'  => 'order_by',
                'admin_label' => true,
                'value'       => array(
                    'Tăng dần'   => 'ASC',
                    'Giảm dần'  => 'DESC',
                )
            ),
        );

        return array(
            'name'        => esc_html__('Sản phẩm theo danh mục', 'my-theme'),
            'description' => esc_html__('Trang chủ', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
