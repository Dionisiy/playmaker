<?php
    get_header();
    $categoryData = get_the_category($post->ID);

    $args = [
        'type'         => 'post',
        'child_of'     => '',
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'DESC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'taxonomy'     => 'category',
        'pad_counts'   => false,
    ];
    $countries = get_categories($args);
?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side">
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();
                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */

                // Previous/next post navigation.
                // twentyfourteen_post_nav();
                ?>
                <div>
                    <div class='subtitle'>
                        <h1 class='pix-page-title'>
                            <?php
                            echo get_the_title( $post );
                            ?>
                        </h1>

                    </div>
                    <div class="blog blog_detail">
                        <article>
                            <div class="pix-content-wrap">
                                <div class="detail_text bezbrp">
                                    <ul class="post-options post-categories">
                                        <li class="featured">
                                            Опубликовано:
                                        </li>
                                        <li>
                                            <time datetime="<?php echo $post->post_date_gmt ?>"><?php echo $post->post_date_gmt ?></time>
                                        </li>
                                        <li>
                                            <span>in</span> <a href="/country/<?php echo get_post_type($post) ?>/<?php echo $categoryData[0]->slug ?>" rel="tag"> | <?php echo $categoryData[0]->name ?></a>
                                        </li>
                                        <li class="views">
                                            <span>
                                                 <?php echo getPostViews(get_the_ID()); ?>
                                                 <?php echo  get_post_meta ($post->ID,'post_meta_name',true) ?>
                                            </span>

                                            <svg id="icon-views-mini" viewBox="0 0 32 32" width="100%" height="100%">
                                                <path d="M31.86 15.26c-0.2-0.46-4.68-11.26-15.86-11.26s-15.68 10.8-15.86 11.26c-0.087 0.216-0.138 0.467-0.138 0.73s0.051 0.514 0.143 0.743c0.175 0.447 4.535 11.267 15.855 11.267s15.66-10.8 15.86-11.24c0.092-0.222 0.146-0.48 0.146-0.75s-0.054-0.528-0.151-0.763zM16 24c-4.418 0-8-3.582-8-8s3.582-8 8-8c4.418 0 8 3.582 8 8s-3.582 8-8 8z"></path>
                                                <path d="M22 16c0 3.314-2.686 6-6 6s-6-2.686-6-6c0-3.314 2.686-6 6-6s6 2.686 6 6z"></path>
                                            </svg>
                                        </li>
                                    </ul>
                                    <p>
                                        <?php
                                        echo apply_filters( 'the_content', get_the_content() );
                                        ?>
                                    </p>
                                </div>
                                <!-- Share Post -->
                                <div class="share-post">
                                    <ul class="social-network">
                                        <a class="addthis_button_compact btn share-now pix-bgcolr" href="#"><i class="fa fa-share-square-o"></i>Share Now</a>
                                    </ul>
                                </div>
                                <!-- Share Post Close -->
                            </div>
                        </article>

                    </div>
                    <?php

                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    endwhile; ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div><!-- row -->
    </div><!-- container -->
<?php
get_footer();
?>