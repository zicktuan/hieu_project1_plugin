<?php
namespace GMO\Shortcode;

use GMO\Shortcode\AbstractShortcode;

class ShortCodePost extends AbstractShortcode
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
        return 'post_sc';
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
        $args = array(
            'numberposts' => isset($atts['sc_post_number']) ? $atts['sc_post_number'] : 4,
            'post_type'   => 'post',
            'sort_order'  => isset($atts['order_by']) ? $atts['order_by'] : "DESC",
        );

        $posts = get_posts($args);
        ob_start();
        include $this->parent->locateTemplate('shortcode-post.tpl.php');
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
                'param_name' => 'sc_post_title',
                'heading'    => esc_html__('Tiêu đề', 'GMO'),
            ],
            [
                'type'       => 'textfield',
                'param_name' => 'sc_post_url',
                'heading'    => esc_html__('See All Post url', 'GMO'),
            ],

            [
                'type'       => 'textfield',
                'param_name' => 'sc_post_number',
                'heading'    => esc_html__('Số bài viết hiển thị', 'GMO'),
            ],
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
            'name'        => esc_html__('Bài viết', 'my-theme'),
            'description' => esc_html__('Chung', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
