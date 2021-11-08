<?php
namespace GMO\Shortcode;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeAbout extends AbstractShortcode
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
        return 'about_user';
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
        include $this->parent->locateTemplate('about/shortcode-about.tpl.php');
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
            [
                'type'       => 'textfield',
                'param_name' => 'about_title',
                'heading'    => esc_html__('Tiêu đề', 'GMO'),
            ],
            [
                'type'       => 'textarea',
                'param_name' => 'about_desc',
                'heading'    => esc_html__('Mô tả', 'GMO'),
            ],
            
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
                        'type'       => 'textarea',
                        'param_name' => 'desc',
                        'heading'    => esc_html__('Mô tả', 'GMO'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'fb',
                        'heading'    => esc_html__('Đường dẫn facebook', 'GMO'),
                        'value'      => '#'
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'tw',
                        'heading'    => esc_html__('Đường dẫn twitter', 'GMO'),
                        'value'      => '#'
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'ig',
                        'heading'    => esc_html__('Đường dẫn instagram', 'GMO'),
                        'value'      => '#'
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'pinterest',
                        'heading'    => esc_html__('Đường dẫn pinterest', 'GMO'),
                        'value'      => '#'
                    ),
                )
            ),
        );

        return array(
            'name'        => esc_html__('Giới thiệu thành viên', 'my-theme'),
            'description' => esc_html__('Giới thiệu', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
