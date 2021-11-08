<?php if(!empty($atts['about_title'])): ?>
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1><?php echo $atts['about_title'] ?></h1>
            </div>
            <ul class="breadcrumb"></ul>
        </div>
    </section>
<?php endif ?>

        <!-- PAGE -->
<section class="page-section color">
    <div class="container">

        <p class="text-center lead">
            <?php echo !empty($atts['about_desc']) ? $atts['about_desc'] : '' ?>
        </p>
        <hr class="page-divider"/>
        <div class="row">
            <?php if(!empty($listItems[0])):?>
                <?php foreach($listItems as $item):?>
                <div class="col-md-3">
                    <div class="thumbnail thumbnail-team no-border no-padding">
                        <div class="media">
                            <img class="img-circle" src="<?php echo !empty($item['img']) ? wp_get_attachment_url($item['img']) : '' ?>" alt=""/>
                        </div>
                        <div class="caption">
                            <h4 class="caption-title">
                                <?php echo !empty($item['title']) ? $item['title'] : '' ?>
                                <small><?php echo !empty($item['sub_title']) ? $item['sub_title'] : '' ?></small>
                            </h4>
                            <ul class="social-icons">
                                <?php echo !empty($item['fb']) ? '<li><a href="'.$item['fb'].'" class="facebook"><i class="fa fa-facebook"></i></a></li>' : '' ?>
                                <?php echo !empty($item['tw']) ? '<li><a href="'.$item['fb'].'" class="twitter"><i class="fa fa-twitter"></i></a></li>' : '' ?>
                                <?php echo !empty($item['ig']) ? '<li><a href="'.$item['fb'].'" class="instagram"><i class="fa fa-instagram"></i></a></li>' : '' ?>
                                <?php echo !empty($item['pinterest']) ? '<li><a href="'.$item['fb'].'" class="pinterest"><i class="fa fa-pinterest"></i></a></li>' : '' ?>
                            </ul>
                            <div class="caption-text">
                                <?php echo !empty($item['desc']) ? $item['desc'] : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>

    </div>
</section>
        <!-- /PAGE -->