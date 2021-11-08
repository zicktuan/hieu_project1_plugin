<?php

namespace GMO\Widgets;

class WidgetFooterTags extends AbstractWidget
{
    function __construct()
    {
        // Instantiate the parent object
        parent::__construct(false, 'Awesome Footer Tag');
    }

    function widget($args, $instance)
    {
        include $this->locateTemplate('widgetFooter/WidgetsFooterTags.tpl.php');
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number_post'] = (int) $new_instance['number_post'];

        return $instance;
    }

    function form($instance)
    {
        $title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$numberPost = isset( $instance['number_post'] ) ? ( $instance['number_post'] ) : 5;

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'GMO'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
			<label for="<?php echo $this->get_field_id( 'number_post' ); ?>"><?php _e( 'Number of posts to show:', 'GMO' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number_post' ); ?>" name="<?php echo $this->get_field_name( 'number_post' ); ?>" type="number" step="1" min="1" value="<?php echo $numberPost; ?>" size="3" />
		</p>
        <?php
    }
}
