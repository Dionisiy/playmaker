<?php

$variable =  $_SERVER['REQUEST_URI'];
$variable = explode("/", $variable);
if($variable[3] == 'teams'){
    $post_type = 'teams';
}elseif($variable[3] == 'news'){
    $post_type = 'news';
}elseif($variable[3] == 'reviews'){
    $post_type = 'reviews';
}elseif($variable[3] == 'live'){
    $post_type = 'translations';
}
$this_cat_slug = $variable[2];
$args = array(
    'post_type' =>$post_type ,
     'category_name' =>$this_cat_slug
);
$query = new WP_Query($args);
	get_header();
    var_dump($this_cat_slug);

?>
    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side">
                <div class="element_size_100">
                    <div class="element_size_100">
                        <div class="pix-blog blog-home ">
                            <!-- Blog Start -->
                            <div class="tabs horizontal">
                                <header class="pix-heading-title">
                                    <h2 class="pix-heading-color pix-section-title">Последние новости футбола</h2>
                                </header>
                                <div class="tab-content">
                                    <div id="blog-headlines2" class="blog-headlines tab-pane fade in active">
                                        <div class="pix-blog blog-medium">
                                            <?php
                                            while ($query->have_posts()) : $query->the_post();
//                                                    $cat_list = get_the_category_list( $separator, $parents, $post_id );
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
                                                                            <a href="/country/<?php echo $post->post_type ."/".  $cat->slug ?>" rel="category tag">
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
                </div>
                <?php
                    sport_paging_nav($query);
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>