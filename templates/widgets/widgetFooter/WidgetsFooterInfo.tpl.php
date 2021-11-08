<?php
$menuID = !empty($instance['menu']) ? $instance['menu'] : '';
$listItems = wp_get_nav_menu_items($menuID);
?>
<div class="widget widget-categories">
<h4 class="widget-title"><?php echo !empty($instance['title']) ? esc_html($instance['title']) : '' ?></h4>
    <ul>
        <?php
            foreach ($listItems as $value) {
                ?>
                <li><a href="<?php echo esc_url($value->url)?>"><?php echo esc_html($value->title)?></span></a></li>
                <?php
            } 
        ?>
    </ul>
</div>


