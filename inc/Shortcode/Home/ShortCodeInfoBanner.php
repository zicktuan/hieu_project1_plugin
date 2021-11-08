<?php
namespace GMO\Shortcode\Home;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeInfoBanner extends AbstractShortcode
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
        return 'home_info_banner';
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
        include $this->parent->locateTemplate('home/shortcode-info-banner.tpl.php');
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
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List Item', 'GMO' ),
                'params'     => array(
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'title',
                        'heading'    => esc_html__('Tiêu đề', 'GMO'),
                    ),
                    array(
                        'type'       => 'textarea',
                        'param_name' => 'desc',
                        'heading'    => esc_html__('Mô tả', 'GMO'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'icon',
                        'heading'    => esc_html__('Icon', 'GMO'),
                        'description' => 'Điền class thẻ i vào, ví dụ: fa fa-gift'
                    ),
                )
            ),
        );

        return array(
            'name'        => esc_html__('Info Banner', 'my-theme'),
            'description' => esc_html__('Trang chủ', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
