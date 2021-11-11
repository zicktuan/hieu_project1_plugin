<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h1><?php echo !empty($atts['contact_title']) ? $atts['contact_title'] : ''?></h1>
        </div>
    </div>
</section>

<section class="page-section no-padding no-bottom-space">
    <div class="container full-width">

        <!-- Google map -->
        <!-- <div class="google-map"> -->
            <?php if(!empty($atts['about_url_map'])):?>
        <iframe src="<?php echo $atts['about_url_map'] ?>" style="width: 100%; height: 500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                <?php endif ?>
            <!-- <div id="map-canvas"></div> -->
        <!-- </div> -->
        <!-- /Google map -->

    </div>
</section>