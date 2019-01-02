<?php
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 3,
        'category' => 2,
    );
    $news_post = new WP_Query( $args );
    $countries = get_categories();

    get_header();

?>
    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side">

                <?php if ($countries) : ?>
                    <?php foreach ($countries as $country) : ?>
                        <a href="/news/<?= $country->slug ?>">
                            <div class="item">
                                <?= get_term_meta($country->cat_ID, 'cat_meta_cat_logo', true) ?>
                                <p><?= $country->name ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="subtitle"></div>
                    <div class="element_size_100">
                        <div class="element_size_100">
                            <div class="pix-blog blog-home ">
                                <!-- Blog Start -->
                                <div class="tabs horizontal">
                                    <header class="pix-heading-title">
                                        <h2 class="pix-heading-color pix-section-title">Last News</h2>
                                    </header>
                                    <div class="tab-content">
                                        <div id="blog-headlines2" class="blog-headlines tab-pane fade in active">
                                            <div class="pix-blog blog-medium ">

                                                <?php
                                                    while ($news_post->have_posts()) : $news_post->the_post();
                                                ?>

                                                        <article class=" post type-post status-publish format-standard has-post-thumbnail hentry category-boxing category-football tag-golf tag-kick tag-player tag-sports">
                                                            <figure>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_url() ?>"></a>
                                                            </figure>
                                                            <div class="text">
                                                                <ul class="post-options blog-medium-options">
                                                                    <li>
                                                                        <a rel="tag" href="#">метка чемпионата</a>
                                                                    </li>
                                                                </ul>
                                                                <h2 class="pix-post-title">
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h2>
                                                                <p>
                                                                    <?php echo the_excerpt(); ?>
                                                                </p>
                                                                <div class="blog-bottom">
                                                                </div>
                                                            </div>
                                                        </article>


                                                        <?php
                                                endwhile;
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        sport_paging_nav($query);
                    ?>
                </div>

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>

