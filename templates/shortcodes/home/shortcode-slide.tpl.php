<?php if(!empty($listItems[0])): ?>

    <section class="page-section">
        <div class="container">
            <h2 class="section-title"><span><?php echo !empty($atts['home_slider_title']) ? $atts['home_slider_title'] : '' ?></span></h2>
            <div class="partners-carousel">
                <div class="owl-carousel" id="partners">
                    <?php foreach($listItems as $item):?>
                        <div>
                            <a href="<?php echo !empty($item['url']) ? $item['url'] : '#' ?>">
                                <img src="<?php echo !empty($item['img']) ? wp_get_attachment_url($item['img']) : ''?>" alt=""/>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

<?php endif ?>