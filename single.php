<?php
get_header();
$categoryData = get_the_category($post->ID);

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
                                    <ul class="post-options">

                                        <li>
                                            <span>in</span> <a href="/<?php echo get_post_type($post) ?>/<?php echo $categoryData[0]->slug ?>" rel="tag"> | <?php echo $categoryData[0]->name ?></a>
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