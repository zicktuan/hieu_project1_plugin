<?php if(!empty($listItems[0])):?>
<section class="page-section">
    <div class="container">
        <div class="row">
            <?php $i = 0; foreach($listItems as $item): $i++ ?>
                <div class="col-md-6">
                    <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
                        <div class="media">
                            <a class="media-link" href="<?php echo !empty($item['btn_url']) ? $item['btn_url'] : '#' ?>">
                                <div class="img-bg" style="background-image: url('<?php echo !empty($item['img']) ? wp_get_attachment_url($item['img']) : ''?>')"></div>
                                <div class="caption <?php echo ($i == 2) ? 'text-right' : '' ?>">
                                    <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <h2 class="caption-title"><span><?php echo !empty($item['title']) ? $item['title'] : '' ?></span></h2>
                                        <h3 class="caption-sub-title"><span><?php echo !empty($item['sub_title']) ? $item['sub_title'] : '' ?></span></h3>
                                        <span class="btn btn-theme btn-theme-sm"><?php echo !empty($item['btn_title']) ? $item['btn_title'] : '' ?></span>
                                    </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif ?>