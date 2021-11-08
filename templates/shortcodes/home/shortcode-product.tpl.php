

        <section class="page-section">
            <div class="container">
                <h2 class="section-title"><span><?php echo !empty($atts['product_title']) ? $atts['product_title'] : ''?></span></h2>
                <div class="top-products-carousel">
                    <div class="owl-carousel" id="top-products-carousel">
                    <?php if(!empty($listPost)): ?>
                            <?php foreach( $listPost as $post): 
                                $price = get_post_meta($post->ID, 'gmo_product_price', true);
                                $discount = get_post_meta($post->ID, 'gmo_product_price_discount', true);
                            ?>
                    <div class="thumbnail no-border no-padding">
                        <div class="media">
                            <a class="media-link" data-gal="prettyPhoto" href="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'gmo-thumbnail-165x262' ); ?>" alt=""/>
                                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                            </a>
                        </div>
                        <div class="caption text-center">
                            <h4 class="caption-title">
                                <a href="<?php echo get_the_permalink($post->ID)?>">
                                    <?php echo !empty($post->post_title) ? $post->post_title : ''?>
                                </a>
                            </h4>
                            <div class="price">
                                <ins><?php echo number_format($discount, 0, '', ',') . 'VNĐ'; ?></ins> 
                                <del><?php echo number_format($price, 0, '', ',') . 'VNĐ'; ?></del>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php endif ?>
                    
                    </div>
                </div>
            </div>
        </section>