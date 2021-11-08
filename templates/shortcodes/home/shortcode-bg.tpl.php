<?php if(!empty($listItems[0])): ?>
<section class="page-section no-padding slider">
    <div class="container full-width">

        <div class="main-slider">
            <div class="owl-carousel" id="main-slider">

                <!-- Slide 1 -->
                <?php 
                    $className = ['', 'alt', 'dark'];
                    $i = 0; foreach($listItems as $item): $i++;
                ?>
                    <div class="item slide<?php echo $i?> <?php echo $className[$i-1]?>">
                        <img class="slide-img" src="<?php echo !empty($item['img']) ? wp_get_attachment_url($item['img']) : '' ?>" alt=""/>
                        <div class="caption">
                            <div class="container">
                                <div class="div-table">
                                    <div class="div-cell">
                                        <div class="caption-content">
                                            <h2 class="caption-title"><?php echo !empty($item['title']) ? $item['title'] : '' ?></h2>
                                            <h3 class="caption-subtitle"><?php echo !empty($item['sub_title']) ? $item['sub_title'] : '' ?></h3>
                                            <p class="caption-text">
                                                <a class="btn btn-theme" href="<?php echo !empty($item['btn_url']) ? $item['btn_url'] : '#' ?>">
                                                    <?php echo !empty($item['btn_title']) ? $item['btn_title'] : '' ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                
               

            </div>
        </div>

    </div>
</section>
<?php endif ?>