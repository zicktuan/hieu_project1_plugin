<section class="page-section">
    <div class="container">

        <div class="tabs">
            <ul class="nav nav-justified-off"><!--
                --><li class=""><?php echo !empty($atts['home_cat_product_title']) ? $atts['home_cat_product_title'] : '' ?></li>
            </ul>
        </div>

        <?php

            $args = array('post_type' => 'nat_product',
                            "order"       => isset($value['order_by']) ? $value['order_by'] : "DESC",
                            "numberposts" => isset($atts['number_post']) ? $atts['number_post'] : 4,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_category',
                                'field' => 'id',
                                'terms' => isset($atts['awe_list_cat']) ? $atts['awe_list_cat'] : 0,
                            ),
                        ),
                    );

            $listPost = get_posts($args);

        ?>

        <div class="tab-content">

            <!-- tab 1 -->
            <?php if(!empty($listPost)): ?>
            <div class="" id="tab-1">
                <div class="row">
                    <?php foreach($listPost as $item):
                        $price = get_post_meta($item->ID, 'gmo_product_price', true);
                        $discount = get_post_meta($item->ID, 'gmo_product_price_discount', true);    
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="<?php echo get_the_permalink($item->ID)?>">
                                    <img src="<?php echo get_the_post_thumbnail_url( $item->ID, 'gmo-thumbnail-165x262' ); ?>" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="<?php echo get_the_permalink($item->ID)?>"><?php echo !empty($item->post_title) ? $item->post_title : ''?></a></h4>
                            
                                <div class="price">
                                    <?php if(empty($discount)):?>
                                    <ins><?php echo number_format($price, 0, '', ',') . 'VNĐ'; ?></ins> 
                                    <?php else:?>
                                    <ins><?php echo number_format($discount, 0, '', ',') . 'VNĐ'; ?></ins> 
                                    <del><?php echo number_format($price, 0, '', ',') . 'VNĐ'; ?></del>
                                    <?php endif ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach?>
                </div>
            </div>
            <?php endif ?>

        </div>

    </div>
</section>