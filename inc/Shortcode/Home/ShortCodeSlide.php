<?php
namespace GMO\Shortcode\Home;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeSlide extends AbstractShortcode
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
        return 'home_slide';
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
        include $this->parent->locateTemplate('home/shortcode-slide.tpl.php');
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
        $params = [
            [
                'type'       => 'textfield',
                'param_name' => 'home_slider_title',
                'heading'    => esc_html__('Tiêu đề', 'GMO'),
            ],
            [
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List Item', 'GMO' ),
                'params'     => [
                    [
                        'type'       => 'attach_image',
                        'param_name' => 'img',
                        'heading'    => esc_html__('Ảnh', 'GMO'),
                    ],
                    [
                        'type'       => 'textfield',
                        'param_name' => 'url',
                        'heading'    => esc_html__('Url', 'GMO'),
                    ]
                ]
            ]
        ];

        return array(
            'name'        => esc_html__('Slide', 'my-theme'),
            'description' => esc_html__('Trang chủ', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
