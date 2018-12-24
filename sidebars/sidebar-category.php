<?php
    $category = get_category(get_query_var('cat'),false);
    $this_cat_slug = $category->slug;
    $this_cat_name = $category->name;
    $arr1 = [
        'post_type' => ['translations'],
        'posts_per_page' => 5,
        'category_name' => $this_cat_slug ,
        'publish' => true,
    ];

    $translations_query = new WP_Query($arr1);

    $arr2 = [
        'post_type' => ['reviews'],
        'posts_per_page' => 5,
        'category_name' => $this_cat_slug ,
        'publish' => true,
    ];

    $reviews_query = new WP_Query($arr2);

    $args = array(
        'post_type' => 'translations',
        'tag_id' => 10,
        'publish' => true,
        'posts_per_page' => 1,
        'orderby' => 'date',
        'paged' => get_query_var('paged'),
    );
    $match_day_query = new WP_Query( $args );

?>
    <div class="sidebar_wrapper">
        <div class="widget widget-recent-blog">
            <div class="pix-heading-title">
                <h2 class="pix-section-title heading-color"> Последние трансляции</h2>
                <?php

                    while ( $translations_query->have_posts() ) :
                        $translations_query->the_post();
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
                    while ( $reviews_query->have_posts() ) :
                        $reviews_query->the_post();
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

