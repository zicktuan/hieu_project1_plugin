<h4 class="widget-title"><?php echo (isset($instance['title']) && !empty($instance['title'])) ? $instance['title'] : '' ?></h4>
<?php echo (isset($instance['desc']) && !empty($instance['desc'])) ? '<p>'.$instance['desc'].'</p>' : '' ?>
<ul class="social-icons">
    <?php if (!empty($instance['fb'])):?>
        <li><a href="<?php echo $instance['fb'] ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
    <?php endif ?>

    <?php if (!empty($instance['twitter'])):?>
        <li><a href="<?php echo $instance['twitter'] ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
    <?php endif ?>

    <?php if (!empty($instance['ins'])):?>
        <li><a href="<?php echo $instance['ins'] ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
    <?php endif ?>

    <?php if (!empty($instance['pin'])):?>
        <li><a href="<?php echo $instance['pin'] ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
    <?php endif ?>
    
</ul>