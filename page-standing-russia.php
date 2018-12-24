<?php
$arr = [
    'post_type' => ['news'],
    'term_id' => 5,
    'posts_per_page' => 5,
];
$top_news_query = new WP_Query($arr);
get_header();

$resultApi = getApi('russia');

?>
    <!-- Inner Main -->

    <div class="container">
        <div class="row">
            <div class="col-md-9 left-side">
                <table class="standings">
                    <tr>
                        <th>#</th>
                        <th>Команда</th>
                        <th>И</th>
                        <th>В</th>
                        <th>Н</th>
                        <th>П</th>
                        <th>Оч</th>
                    </tr>
                    <?php
                    if ($resultApi):
                        foreach ($resultApi as $team):
                            ?>
                            <?php if($team['Scope'] == "Total"): ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $team['Order'];
                                    ?>
                                </td>
                                <td>
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
                                        echo $team['Wins'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $team['Losses'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $team['Draws'];
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
                    endif;
                    ?>
                </table>
                <div class="standings_more">
                    <a onclick="goBack()" class="more">Вернуться к чемпионатам</a>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div> <!--  -->
    </div>
    </div>
    <!-- Inner Main -->
    </div>

<?php get_footer(); ?>