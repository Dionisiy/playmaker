<?php
$match_day_args = array(
    'post_type' => 'translations',
    'tag_id' => 10,
    'publish' => true,
    'posts_per_page' => 1,
    'orderby' => 'date',
    'paged' => get_query_var('paged'),
);
$match_day_query = new WP_Query( $match_day_args );
?>
    <?php
        while ( $match_day_query->have_posts() ) :
            $match_day_query->the_post();
            $str= get_the_content();
            preg_match_all('/src="([^"]+)"/i', $str, $matches);
            $img_urls = $matches[1];
            $metas = get_post_meta( $post->ID );
        ?>
            <div class="widget widget_countdown translation">
                <div class="countdown-section" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
                    <div class="slider_item-wrap"></div>
                    <!-- Pix Label Strat -->
                    <div class="pix-label">
                        <span class="pix-tittle">Match Day</span>
                        <time>
                            <?php echo $metas["start_date"][0] ?>
                        </time>
                    </div>
                    <!-- Pix Label Strat -->
                    <div class="text">
                        <div class="pix-sc-team">
                            <?php
                            if($img_urls):
                                ?>
                                <ul>
                                    <?php
                                    foreach ($img_urls as $img_url):
                                        ?>
                                        <li>
                                            <figure>
                                                <img alt="" src="<?php echo $img_url; ?>" data-pagespeed-url-hash="">
                                            </figure>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                                <?php
                            endif;
                            ?>
                            <div class="pix-sc-team-info">
                                <p>
                                    <?php the_title();?>
                                </p>
                                <p class="time-sec"><?php echo $metas["start_place"][0] ?></p>
                            </div>
                        </div>
                        <div class="pix-cont-title">
                            <h2 class="pix-section-title">
                                <span>Начало: <?php echo $metas['start_time'][0] ?></span>
                            </h2>
                        </div>
                        <div class="defaultCountdown" id="defaultCountdowny18"></div>

                    </div>
                </div>
            </div>
    <?php
        endwhile;
    ?>