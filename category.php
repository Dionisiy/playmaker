<?php

$arr = [
    'post_type' => ['news'],
    'term_id' => 5,
    'posts_per_page' => 5,
];
$top_news_query = new WP_Query($arr);

$category = get_category(get_query_var('cat'),false);
$this_cat_slug = $category->slug;
$this_cat_name = $category->name;
$arr1 = [
    'post_type' => ['news'],
    'posts_per_page' => -1,
    'category_name' => $this_cat_slug ,
    'publish' => true,
];
$postTypesArray = [
        'teams' => "Команды",
        'translations' => "Трансляции",
        'reviews' => "Обзоры",
        'podcasts' => "Подкасты",
        'news' => "Новости",
    ];
$news_query = new WP_Query($arr1);

//$cat_name = substr_replace($this_cat_name,'и',-1);
//    $cat_name = mb_convert_encoding($cat_name, "UTF-8", "auto");
//    $cat_name = str_replace("?", "", $cat_name);

    $variable =  $_SERVER['REQUEST_URI'];

    $variable = explode("/", $variable);
    if($variable[2] == 'teams'){

        $postType = 'teams';
    }elseif($variable[2] == 'news'){
        $postType = 'news';
    }elseif($variable[2] == 'reviews'){
        $postType = 'reviews';
    }elseif($variable[2] == 'live'){
        $postType = 'translations';
    }
    $args = array(
        'post_type' =>$postType ,
        'category_name' =>$this_cat_slug,
        'publish' => true,
        'paged' => get_query_var('paged'),
    );
    $query = new WP_Query($args);

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
$resultApi =getApi($this_cat_slug);
    get_header();
?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side">
                <div class="subtitle"></div>
                <div class="element_size_100">
                    <div class="pix-blog blog-carousel blog-vertical">
                        <!-- Blog Start -->
                        <header class="pix-heading-title">
                            <h2 class="pix-heading-color pix-section-title"> Топ новостей</h2>
                        </header>
                        <div class=" slick_slider">
                            <?php
                            while ($top_news_query->have_posts()) : $top_news_query->the_post();
                                ?>
                                <article class="" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
                                    <div class="slider_item-wrap"></div>
                                    <img src="<?php the_post_thumbnail_url() ?>">
                                    <div class="caption">
                                        <h2>
                                            <a href="<?php the_permalink(); ?>"><?php echo the_excerpt(); ?></a>
                                        </h2>
                                        <a href="<?php the_permalink(); ?>" class="btnreadmore btn">Читать</a>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            ?>
                        </div>

                    </div>
                </div>
                <div class="element_size_100">
                    <div class="pix-blog blog-home">
                        <!-- Blog Start -->
                        <div class="tabs horizontal">
                            <header class="pix-heading-title">
                            </header>
                            <div class="tab-content">
                                <div id="blog-headlines2" class="blog-headlines tab-pane fade in active">
                                    <div class="pix-feature">
                                        <?php
                                            if ($resultApi and count($resultApi) > 0):
                                        ?>
                                                <table class="standings">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Команда</th>
                                                        <th>И</th>

                                                        <th>Оч</th>
                                                    </tr>
                                                    <?php
                                                        foreach ($resultApi as $team):
                                                    ?>
                                                            <?php if($team['Scope'] == "Total"): ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php
                                                                        echo $team['Order'];
                                                                        ?>
                                                                    </td>
                                                                    <td style="text-align:left;">
                                                                        <?php
                                                                            $name = str_replace('FC', '', $team['Name']);
                                                                            echo $name;
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        echo $team['Games'];
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        echo $team['Points'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                </table>

                                                <div class="standings_more">
                                                    <a href="/standings/standing-<?php echo $this_cat_slug ?>" class="more"> Смотреть таблицу</a>
                                                </div>
                                        <?php
                                            endif;
                                        ?>
                                    </div>
                                    <div class="blog-listing-text">
                                        <h2 class="pix-post-title">
                                            Лента новостей
                                        </h2>
                                        <?php
                                            while ($news_query->have_posts()) : $news_query->the_post();
                                        ?>
                                            <article class="front_page-article">
                                                <div class="title_block">
                                                    <a href="<?php the_permalink(); ?>" class="">
                                                        <img src="<?php the_post_thumbnail_url() ?>">
                                                    </a>
                                                    <div class="title_block--links">
                                                         <span class='px-comments'>
                                                             <span>
                                                                <?php echo getPostViews(get_the_ID()); ?>
                                                            </span>
                                                            <svg id="icon-views-mini" viewBox="0 0 32 32" width="100%" height="100%">
                                                                <path d="M31.86 15.26c-0.2-0.46-4.68-11.26-15.86-11.26s-15.68 10.8-15.86 11.26c-0.087 0.216-0.138 0.467-0.138 0.73s0.051 0.514 0.143 0.743c0.175 0.447 4.535 11.267 15.855 11.267s15.66-10.8 15.86-11.24c0.092-0.222 0.146-0.48 0.146-0.75s-0.054-0.528-0.151-0.763zM16 24c-4.418 0-8-3.582-8-8s3.582-8 8-8c4.418 0 8 3.582 8 8s-3.582 8-8 8z"></path>
                                                                <path d="M22 16c0 3.314-2.686 6-6 6s-6-2.686-6-6c0-3.314 2.686-6 6-6s6 2.686 6 6z"></path>
                                                            </svg>
                                                        </span>
                                                        <?php
                                                        $categoryData = get_the_category($post->ID);
                                                        $cat_list = get_the_category_list( $separator, $parents, $post_id );
                                                        ?>
                                                        <?php if($categoryData): ?>
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
                                                        <a href="<?php the_permalink(); ?>" class="article-title"><?php the_title() ?></a>
                                                    </div>
                                                </div>

                                                <div class="text">
                                                    <p><?php echo the_excerpt(); ?></p>
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
                <?php

                $res = getCompetitionDetails($this_cat_slug);
                var_dump($res);

                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>