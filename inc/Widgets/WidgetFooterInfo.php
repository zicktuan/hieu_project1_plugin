<?php

namespace GMO\Widgets;

class WidgetFooterInfo extends AbstractWidget
{
    function __construct()
    {
        // Instantiate the parent object
        parent::__construct(false, 'Awesome Footer Info');
    }

    function widget($args, $instance)
    {
        include $this->locateTemplate('widgetFooter/WidgetsFooterInfo.tpl.php');
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['menu'] = sanitize_text_field($new_instance['menu']);

        return $instance;
    }

    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $menu = !empty($instance['menu']) ? $instance['menu'] : '';

        $menus = get_terms('nav_menu', array('hide_empty' => true));
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'GMO'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <label><?php _e('Choose Menu To Display', 'GMO'); ?>:</label>
        <div class="bas-widget-field bas-widget-age">
            <select name="<?php echo $this->get_field_name('menu'); ?>">
                <?php
                for ($i = 0; $i < count($menus); $i++) {
                    ?>
                    <option value="<?php echo esc_attr($menus[$i]->term_id)?>" <?php echo selected($menus[$i]->term_id, $menu)?>><?php echo esc_html($menus[$i]->name)?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <?php
    }
}
