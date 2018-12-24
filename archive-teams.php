<?php
$query = $wp_query;
if (!empty($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER['QUERY_STRING'], $get_array);
        $arr = [
            'post_type' => ['teams'],
            
        ];
        if (isset($query->query['paged'])) {
            $arr['paged'] = $query->query['paged'];
        }
        $query = new WP_Query($arr);
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
    $countries = get_categories($args);
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
            <ul class="nav navbar-nav">
                <?php if ($countries) : ?>
                    <?php foreach ($countries as $country) :
                        if ($country->category_parent == 0 ):

                            $termchildren = get_terms( 'category', array( 'parent' => $country->cat_ID, 'hide_empty' => false ) );
                            ?>
                            <li>
                                <a href="/teams/<?= $country->slug ?>">
                                    <?= $country->name ?>
                                </a>
                                <?php if($termchildren): ?>

                                    <ul class="sub-menu champs">
                                        <?php
                                        $categories = get_categories();
                                        foreach ($termchildren as $child) : ?>
                                            <li class='menu-item menu-item-type-post_type menu-item-object-page'>
                                                <a href='/teams/<?php echo $child->slug ?>'> <?php echo $child->name ?> </a>
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
                <?php

                // Start the Loop.
                    while ( $query->have_posts() ) : $query->the_post();
                        ?>
                       <div class="col-md-8 blog--content">
                            <div class="post--item">
                                <div class="post--img"> <img sr alt="" class="img-responsive center-block"> </div>
                                <div class="post--content-border">
                                    <div class="post--title">
                                        <h2><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post)?></a></h2>
                                    </div>
                                    <div class="post--meta">
                                    </div>
                                    <div class="post--except">
                                        <p><?php echo the_excerpt(); ?></p>
                                    </div>
                                    <div class="post--except-footer"> 
                                        <a href="<?php echo get_permalink($post->ID)?>" class="more"><i class="fa fa-angle-double-right"></i>READ MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                       </div>
                        <?php
                    endwhile;
                ?>
                <?php 
              $args = array(
                    'show_all'     => false, // показаны все страницы участвующие в пагинации
                    'end_size'     => 1,     // количество страниц на концах
                    'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => __('« Previous'),
                    'next_text'    => __('Next »'),
                    'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                    'screen_reader_text' => __( 'Posts navigation' ),
                );
                echo get_the_posts_pagination($args);
            ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php
    get_footer();
?>