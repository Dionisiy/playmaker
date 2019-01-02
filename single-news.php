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
                                    <img src="<?php the_post_thumbnail_url() ?>">
                                    <ul class="post-options post-categories">
                                        <li class="featured">
                                            Опубликовано:
                                        </li>
                                        <li>
                                            <time datetime="<?php echo $post->post_date_gmt ?>"><?php echo $post->post_date_gmt ?></time>
                                        </li>
                                        <li>
                                            <a href="/<?php echo get_post_type($post) ?>/<?php echo $categoryData[0]->slug ?>" rel="tag"> <?php echo $categoryData[0]->name ?></a>
                                        </li>
                                        <li class="views">
                                            <span>
                                                 <?php echo getPostViews(get_the_ID()); ?>
                                                 <?php echo setPostViews(get_the_ID()); ?>
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
                                <div class="back_to_previous">

                                    <button type="submit" class="back_to" onClick="history.back()">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" version="1.1">
                                            <g id="surface1">
                                                <path style=" fill:#DFF0FE;" d="M 20.5 34.5 L 20.5 30.5 L 27 30.5 C 31.136719 30.5 34.5 27.136719 34.5 23 C 34.5 18.863281 31.136719 15.5 27 15.5 L 10.5 15.5 L 10.5 21.835938 L 1.726563 13.5 L 10.5 5.164063 L 10.5 11.5 L 27 11.5 C 33.339844 11.5 38.5 16.660156 38.5 23 C 38.5 29.339844 33.339844 34.5 27 34.5 Z "></path>
                                                <path style=" fill:#4788C7;" d="M 10 6.328125 L 10 12 L 27 12 C 33.066406 12 38 16.933594 38 23 C 38 29.066406 33.066406 34 27 34 L 21 34 L 21 31 L 27 31 C 31.410156 31 35 27.410156 35 23 C 35 18.589844 31.410156 15 27 15 L 10 15 L 10 20.671875 L 2.453125 13.5 L 10 6.328125 M 11 4 L 1 13.5 L 11 23 L 11 16 L 27 16 C 30.867188 16 34 19.132813 34 23 C 34 26.867188 30.867188 30 27 30 L 20 30 L 20 35 L 27 35 C 33.628906 35 39 29.628906 39 23 C 39 16.371094 33.628906 11 27 11 L 11 11 Z "></path>
                                            </g>
                                        </svg>
                                      Вернуться Назад
                                    </button>
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