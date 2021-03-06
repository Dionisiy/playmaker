<?php
    $query = $wp_query;

    if (!empty($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $get_array);
        $parametr = get_parameter_checker($get_array);

        if ($parametr) {
            $arr = [
                'post_type' => ['reviews'],
                'publish' => true,
                'meta_query' => [
                    $parametr
                ]
            ];
            if (isset($query->query['paged'])) {
                $arr['paged'] = $query->query['paged'];
            }
            $query = new WP_Query($arr);
        } else {
            $query = new WP_Query();
        }
    }

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
    get_header();

?>

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="">
            <button type="button" class="navbar-toggle cs-click-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side">
                <div class="subtitle"></div>
                <div class="element_size_100">
                    <div class="element_size_100">
                        <div class="pix-blog blog-home ">
                            <!-- Blog Start -->
                            <div class="tabs horizontal">
                                <header class="pix-heading-title">
                                    <h2 class="pix-heading-color pix-section-title">Последние обзоры</h2>
                                </header>
                                <div class="tab-content">
                                    <div id="blog-headlines2" class="blog-headlines tab-pane fade in active">
                                        <div class="pix-blog blog-medium ">
                                            <?php
                                            while ($query->have_posts()) : $query->the_post();
//                                                $cat_list = get_the_category_list( $separator, $parents, $post_id );
                                                ?>
                                                <article class=" post type-post status-publish format-standard has-post-thumbnail hentry category-boxing category-football tag-golf tag-kick tag-player tag-sports">
                                                    <figure>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_url() ?>"></a>
                                                    </figure>
                                                    <div class="text">
                                                        <?php
                                                            $categoryData = get_the_category($post->ID);
                                                            if($categoryData):
                                                        ?>
                                                            <ul class="post-options post-categories">
                                                                <?php foreach ($categoryData as $cat): ?>
                                                                    <li>
                                                                        <a href="/<?php echo $post->post_type ."/".  $cat->slug ?>" rel="category tag">
                                                                            <?php echo $cat->name ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <h2 class="pix-post-title">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h2>
                                                        <p>
                                                            <?php echo the_excerpt(); ?>
                                                        </p>
                                                        <div class="blog-bottom">
                                                             <span class='px-comments'>
                                                                 <span>
                                                                    <?php echo getPostViews(get_the_ID()); ?>
                                                                </span>
                                                                <svg id="icon-views-mini" viewBox="0 0 32 32" width="100%" height="100%">
                                                                    <path d="M31.86 15.26c-0.2-0.46-4.68-11.26-15.86-11.26s-15.68 10.8-15.86 11.26c-0.087 0.216-0.138 0.467-0.138 0.73s0.051 0.514 0.143 0.743c0.175 0.447 4.535 11.267 15.855 11.267s15.66-10.8 15.86-11.24c0.092-0.222 0.146-0.48 0.146-0.75s-0.054-0.528-0.151-0.763zM16 24c-4.418 0-8-3.582-8-8s3.582-8 8-8c4.418 0 8 3.582 8 8s-3.582 8-8 8z"></path>
                                                                    <path d="M22 16c0 3.314-2.686 6-6 6s-6-2.686-6-6c0-3.314 2.686-6 6-6s6 2.686 6 6z"></path>
                                                                </svg>
                                                            </span>
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