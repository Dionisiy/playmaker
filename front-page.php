<?php
$arr = [
    'post_type' => ['news'],
    'term_id' => 5,
    'posts_per_page' => 5,
];
$top_news_query = new WP_Query($arr);
    get_header();


$args = [
    'post_type' => ['news'],
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1,
];
$news_query = new WP_Query($args);

$result = (array) json_decode($result);


?>
    <!-- Inner Main -->

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
                    <div class="pix-blog blog-home ">
                        <!-- Blog Start -->
                        <div class="tabs horizontal">
                            <header class="pix-heading-title">
                            </header>
                            <div class="tab-content">
                                <div id="blog-headlines2" class="blog-headlines tab-pane fade in active">
                                    <div class="pix-feature">
                                        <?php
                                            $resultApi = getApiByDate();
                                             if ($resultApi["statusCode"] == 200 ):
                                               echo "<h2>Матчи сегодня</h2>";
                                                getTableByDate($resultApi);
                                             endif;
                                        ?>
                                    </div>
                                    <div class="blog-listing-text">
                                        <h2 class="pix-post-title">
                                            Последние новости
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

                                                        <?php
                                                            $categoryData = get_the_category($post->ID);
                                                            $cat_list = get_the_category_list( $separator, $parents, $post_id );
                                                        ?>
                                                        <?php if($categoryData): ?>
                                                            <div class="post_information">
                                                                <ul class="post-options post-categories">
                                                                    <?php foreach ($categoryData as $cat): ?>
                                                                        <li>
                                                                            <a href="/<?php echo $post->post_type ."/".  $cat->slug ?>" rel="category tag">
                                                                                <?php echo $cat->name ?>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
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

                                                        <?php endif; ?>
                                                        <a href="<?php the_permalink(); ?>" class="article-title"><?php the_title() ?></a>
                                                        <div class="text">
                                                            <p><?php echo the_excerpt(); ?></p>
                                                            <div class="blog-bottom">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text">
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
                <div>

                </div>
            </div>

            <?php get_sidebar(); ?>
        </div> <!--  -->
    </div>
    </div>
    <!-- Inner Main -->
    </div>

<?php get_footer(); ?>