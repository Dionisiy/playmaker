<?php
get_header();
$args = array(
    'post_type' => 'translations',
    'posts_per_page' => 3,
);
$news_post = query_posts( $args );
$countries = get_categories();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side live_page">

            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>