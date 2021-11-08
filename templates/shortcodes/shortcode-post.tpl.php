<section class="page-section">
            <div class="container">
                <?php if (!empty($atts['sc_post_url'])) :?>
                <a class="btn btn-theme btn-title-more btn-icon-left" href="<?php echo $atts['sc_post_url']?>"><i class="fa fa-file-text-o"></i>See All Posts</a>
                <?php endif ?>
                <h2 class="block-title"><span><?php echo !empty($atts['sc_post_title'] ) ? $atts['sc_post_title'] : '' ?></span></h2>
                <div class="row">
                    <?php if(!empty($posts)): ?>
                    <?php foreach($posts as $post): ?>
                    <div class="col-md-6">
                        <div class="recent-post">
                            <div class="media">
                                <a class="pull-left media-link" href="#">
                                    <img class="media-object" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'gmo-thumbnail-170x120' ); ?>" alt="">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="<?php echo get_the_permalink($post->ID)?>"><?php echo !empty($post->post_title) ? $post->post_title : '' ?></a>
                                    </h4>
                                    <?php echo wp_trim_words($post->post_content, 20, '...')?>
                                    <div class="media-meta">
                                        <?php echo date('d M Y', strtotime($post->post_date))?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php endif ?>
                    
                </div>
            </div>
        </section>