<?php

namespace GMO\Widgets;

class WidgetFooterText extends AbstractWidget
{
    function __construct() {
        // Instantiate the parent object
        parent::__construct( false, 'Awesome Footer Text' );
    }

    function widget( $args, $instance ) {
        include $this->locateTemplate('widgetFooter/WidgetFooterText.tpl.php');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['desc'] = sanitize_text_field($new_instance['desc']);
        return $instance;
    }

    function form( $instance ) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $desc = !empty($instance['desc']) ? $instance['desc'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'GMO'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description:', 'GMO'); ?></label>
            <textarea name="<?php echo $this->get_field_name('desc'); ?>" id="" cols="30" rows="10"><?php echo esc_attr($desc); ?></textarea>
        </p>
        <?php
    }
}
