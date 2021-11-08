<?php
namespace GMO\Shortcode\Home;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeSection1 extends AbstractShortcode
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
        return 'home_section_1';
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
        include $this->parent->locateTemplate('home/shortcode-section_1.tpl.php');
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
                        'type'       => 'attach_image',
                        'param_name' => 'img',
                        'heading'    => esc_html__('Ảnh', 'GMO'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'title',
                        'heading'    => esc_html__('Tiêu đề', 'GMO'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'sub_title',
                        'heading'    => esc_html__('Phụ đề', 'GMO'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'btn_title',
                        'heading'    => esc_html__('Tiêu đề button', 'GMO'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'btn_url',
                        'heading'    => esc_html__('Url button', 'GMO'),
                    ),
                )
            ),

            
        );

        return array(
            'name'        => esc_html__('Section 1', 'my-theme'),
            'description' => esc_html__('Trang chủ', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
