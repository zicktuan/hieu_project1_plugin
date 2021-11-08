<?php
namespace GMO\Shortcode;

use GMO\Shortcode\AbstractShortcode;

class ShortCodeContact extends AbstractShortcode
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
        return 'pr1_contact';
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
        ob_start();
        include $this->parent->locateTemplate('contact/shortcode-contact.tpl.php');
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
                'param_name' => 'contact_title',
                'heading'    => esc_html__('Tiêu đề', 'GMO'),
            ],
            [
                'type'       => 'textarea',
                'param_name' => 'about_desc',
                'heading'    => esc_html__('Mô tả', 'GMO'),
            ],
        );

        return array(
            'name'        => esc_html__('Liên hệ', 'my-theme'),
            'description' => esc_html__('Liên hệ', 'GMO'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
