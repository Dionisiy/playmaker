<?php
$query = $wp_query;

if (!empty($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER['QUERY_STRING'], $get_array);
    $parametr = get_parameter_checker($get_array);

    if ($parametr) {
        $arr = [
            'post_type' => ['translations'],
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
get_header();

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

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="">
            <button type="button" class="navbar-toggle cs-click-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav">
                <?php if ($countries) : ?>
                    <?php foreach ($countries as $country) :
                        if ($country->category_parent == 0 ):
                            $termchildren = get_terms( 'category', array( 'parent' => $country->cat_ID, 'hide_empty' => false ) );
                            ?>
                            <li>
                                <a href="/translations/<?= $country->slug ?>">
                                    <?= $country->name ?>
                                </a>
                                <?php if($termchildren): ?>

                                    <ul class="sub-menu champs">
                                        <?php
                                        $categories = get_categories();
                                        foreach ($termchildren as $child) : ?>
                                            <li class='menu-item menu-item-type-post_type menu-item-object-page'>
                                                <a href='/translations/<?php echo $child->slug ?>'> <?php echo $child->name ?> </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
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
                                    <h2 class="pix-heading-color pix-section-title">Все трансляции</h2>
                                </header>
                                <div class="tab-content">
                                    <div id="blog-headlines2" class="blog-headlines tab-pane fade in active">
                                        <div class="pix-blog blog-medium ">
                                            <?php
                                                while ($query->have_posts()) : $query->the_post();
                                            ?>
                                                <article class=" post type-post status-publish format-standard has-post-thumbnail hentry category-boxing category-football tag-golf tag-kick tag-player tag-sports">
                                                    <figure>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_url() ?>"></a>
                                                    </figure>
                                                    <div class="text">
                                                        <?php
                                                        $cat = get_the_category($post_id);

                                                        foreach ($cat as $c):
                                                            ?>
                                                            <ul class="post-categories">
                                                                <li>
                                                                    <a href="http://cheatsport.test/<?php echo $post->post_type ?>/<?php echo $c->slug ?>" rel="category tag">
                                                                        <?php echo $c->name ?>
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                            <?php
                                                        endforeach;
                                                        ?>

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