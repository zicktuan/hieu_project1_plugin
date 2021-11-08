<?php if(!empty($listItems[0])):?>
<section class="page-section no-padding-top">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <?php foreach($listItems as $item):?>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="<?php echo !empty($item['icon']) ? $item['icon'] : ''?>"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo !empty($item['title']) ? $item['title'] : ''?></h4>
                            <?php echo !empty($item['desc']) ? $item['desc'] : ''?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif ?>