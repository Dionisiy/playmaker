<?php
    $news_args = array(
        'post_type' => 'translations',
        'term_id' => 6,
        'publish' => true,
        'posts_per_page' => 5,
        'orderby' => 'date',
        'paged' => get_query_var('paged'),
    );
    $news_query = new WP_Query( $news_args );

    $pagename = get_query_var('pagename');
    if ( !$pagename && $id > 0 ) {

        $post = $wp_query->get_queried_object();
        $pagename = $post->post_name;
    }
    $pageArray = explode("-", $pagename);

?>
<aside class="col-md-3 right-side">

    <?php
    if ($pageArray[0] === "standing" ):
        get_template_part('sidebars/sidebar', 'standings');

    ?>
    <?php
        elseif (is_category()) :
            get_template_part( 'sidebars/sidebar', 'matchday' );
            get_template_part( 'sidebars/sidebar', 'category' );
    ?>
    <?php
         else :
            get_template_part( 'sidebars/sidebar', 'matchday' );
    ?>
        <div class="sidebar_wrapper">
            <div class="widget widget-recent-blog">
                <div class="pix-heading-title">
                    <?php if ($news_query->have_posts()): ?>
                        <h2 class="pix-section-title heading-color"> Последние трансляции</h2>
                    <?php endif; ?>
                    <?php
                        while ( $news_query->have_posts() ) : $news_query->the_post();
                    ?>
                            <article>
                                <a class="pix-colrhvr" href="<?php echo get_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="">
                                </a>
                                <h6>
                                    <a href="<?php echo get_permalink(); ?>" class='pix-colrhvr'><?php the_title();?>
                                    </a>
                                </h6>
                                <div class="text">
                                    <?php echo the_excerpt(); ?>
                                </div>
                            </article>
                    <?php
                        endwhile;
                    ?>
                </div>
            </div>
            <div class="widget widget-recent-blog reviews">
            <div class="pix-heading-title">
                <h2 class="pix-section-title heading-color">Последние обзоры</h2>
                <?php
                    $args = array(
                       'post_type' => 'reviews',
                       'publish' => true,
                       'posts_per_page' => 5,
                       'orderby' => 'date',
                       'paged' => get_query_var('paged'),
                    );
                    $news_query = new WP_Query( $args );
                        while ( $news_query->have_posts() ) : $news_query->the_post();
                ?>
                            <article>
                                <a class="pix-colrhvr" href="<?php echo get_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="">
                                </a>
                                <h6>
                                    <a href="<?php echo get_permalink(); ?>" class='pix-colrhvr'><?php the_title();?>
                                    </a>
                                </h6>
                                <div class="text">
                                    <?php echo the_excerpt(); ?>
                                </div>
                            </article>
                <?php
                    endwhile;
                ?>
            </div>
        </div>
        </div>
    <?php
        endif;
    ?>
</aside>