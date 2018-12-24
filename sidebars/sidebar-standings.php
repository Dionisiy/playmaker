<?php
    $pagename = get_query_var('pagename');
    if ( !$pagename && $id > 0 ) {
        // If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
        $post = $wp_query->get_queried_object();
        $pagename = $post->post_name;

    }
    $pageArray = explode("-", $pagename);
    $this_cat_slug = $pageArray[1];

    $standings_arr = [
        'post_type' => ['news'],
        'posts_per_page' => 10,
        'category_name' => $this_cat_slug,
        'paged' => get_query_var('paged'),
        'publish' => true,
        'orderby' => 'date',
    ];

$reviews_query = new WP_Query($standings_arr);

?>
    <div class="sidebar_wrapper">
        <div class="widget widget-recent-blog">
            <div class="pix-heading-title">
                <h2 class="pix-section-title heading-color"> Последние новости <?php echo $this_cat_slug ?> </h2>
                <?php while ( $reviews_query->have_posts() ) : $reviews_query->the_post() ?>
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


