<div class="widget widget-tag-cloud">
    <?php
        $tags = get_tags(array(
            'number' => $instance['number_post'],
            'order' => 'desc',
            'hide_empty' => false
        ));
    ?>
    <h4 class="widget-title"><?php echo !empty($instance['title']) ? esc_html($instance['title']) : '' ?></h4>
    <ul>
        <?php if(!empty($tags[0])):?>
        <?php foreach($tags as $tag): ?>
            <li><a href="#"><?php echo $tag->name?></a></li>
        <?php endforeach ?>
        <?php endif?>
    </ul>
</div>