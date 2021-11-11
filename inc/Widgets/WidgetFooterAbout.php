<?php

namespace GMO\Widgets;

class WidgetFooterAbout extends AbstractWidget
{
    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'awesome_footer_about', 'Awesome Footer About' );
    }

    function widget( $args, $instance ) {
        include $this->locateTemplate('widgetFooter/WidgetFooterAbout.tpl.php');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['desc'] = sanitize_text_field($new_instance['desc']);
        $instance['fb'] = sanitize_text_field($new_instance['fb']);
        $instance['pin'] = sanitize_text_field($new_instance['pin']);
        $instance['ins'] = sanitize_text_field($new_instance['ins']);
        $instance['twitter'] = sanitize_text_field($new_instance['twitter']);
        return $instance;
    }

    function form( $instance ) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $desc = !empty($instance['desc']) ? $instance['desc'] : '';
        $fb = !empty($instance['fb']) ? $instance['fb'] : '';
        $pin = !empty($instance['pin']) ? $instance['pin'] : '';
        $ins = !empty($instance['ins']) ? $instance['ins'] : '';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
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

        <p>
            <label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook:', 'bookawesome'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('fb'); ?>"
                   name="<?php echo $this->get_field_name('fb'); ?>" type="text"
                   value="<?php echo esc_attr($fb); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ins'); ?>"><?php _e('Instagram:', 'bookawesome'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('ins'); ?>"
                   name="<?php echo $this->get_field_name('ins'); ?>" type="text"
                   value="<?php echo esc_attr($ins); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'bookawesome'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>"
                   name="<?php echo $this->get_field_name('twitter'); ?>" type="text"
                   value="<?php echo esc_attr($twitter); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('pin'); ?>"><?php _e('Pinterest:', 'bookawesome'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pin'); ?>"
                   name="<?php echo $this->get_field_name('pin'); ?>" type="text"
                   value="<?php echo esc_attr($twitter); ?>"/>
        </p>

        <?php
    }
}
