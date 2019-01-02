<?php

function custom_field_key_arr()
{
    return [];
}

function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');
// фильтр передает переменную $template - путь до файла шаблона.
// Изменяя этот путь мы изменяем файл шаблона.
add_filter('template_include', 'my_template');
function my_template( $template ) {

    # аналог второго способа
    // если это страница со слагом portfolio, используем файл шаблона page-portfolio.php
    // используем условный тег is_page()
    if( is_page('portfolio') ){
        if ( $new_template = locate_template( array( 'page-portfolio.php' ) ) )
            return $new_template ;
    }

    # шаблон для группы рубрик
    // этот пример будет использовать файл из папки темы tpl_special-cats.php, 
    // как шаблон для рубрик с ID 9, названием "Без рубрики" и слагом "php"
    if( is_category( array( 9, 'Без рубрики', 'php') ) ){
        return get_stylesheet_directory() . '/tpl_special-cats.php';
    }

    # шаблон для записи по ID
    // файл шаблона расположен в папке плагина /my-plugin/site-template.php
    global $post;
    // if( $post->ID == 12 ){
    //     return wp_normalize_path( WP_PLUGIN_DIR ) . '/my-plugin/site-template.php';
    // }

    # шаблон для страниц произвольного типа "book"
    // предполагается, что файл шаблона book-tpl.php лежит в папке темы
    // global $post;
    // if( $post->post_type == 'book' ){
    //     return get_stylesheet_directory() . '/book-tpl.php';
    // }

    return $template;

}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

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

// Добавление кастомных постов для команд
// 

add_action('init', 'teams_init');
function teams_init()
{
    $labels = [
        'name' => 'Команды',
        'singular_name' => 'Команда',
        'add_new' => 'Добавить команду',
        'add_new_item' => 'Добавление команды',
        'edit_item' => 'Редактирование команды',
        'new_item' => 'Новая команда',
        'view_item' => 'Смотреть команду',
        'search_items' => 'Искать команду',
        'not_found' => 'Не найдено запрашиваемой команды',
        // 'not_found_in_trash' => 'В корзине не найдено запрашиваемой команды',
    ];

    $args = [
        'label' => 'Команда',
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 5,
        'has_archive' => true,
        'taxonomies' => ['post_tag', 'category'],
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        ]
    ];
    register_post_type('teams', $args);
}

// Добавление кастомных постов для команд

add_action('init', 'news_init');
function news_init()
{
    $labels = [
        'name' => 'Новости',
        'singular_name' => 'Новость',
        'add_new' => 'Добавить Новость',
        'add_new_item' => 'Добавление новость',
        'edit_item' => 'Редактирование новость',
        'new_item' => 'Новый новость',
        'view_item' => 'Смотреть новость',
        'search_items' => 'Искать новость',
        'not_found' => 'Не найдено запрашиваемого новости',
        // 'not_found_in_trash' => 'В корзине не найдено запрашиваемого чемпионата',
    ];

    $args = [
        'label' => 'Новость',
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-id',
        'menu_position' => 6,
        'has_archive' => true,
        'taxonomies' => ['post_tag', 'category'],
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        ]
    ];
    register_post_type('news', $args);
}

// Добавление кастомных постов для обзоров

add_action('init', 'reviews_init');
function reviews_init()
{
    $labels = [
        'name' => 'Обзоры',
        'singular_name' => 'Обзор',
        'add_new' => 'Добавить обзор',
        'add_new_item' => 'Добавление обзора',
        'edit_item' => 'Редактирование обзора',
        'new_item' => 'Новый обзор',
        'view_item' => 'Смотреть обзор',
        'search_items' => 'Искать обзор',
        'not_found' => 'Не найдено запрашиваемого обзора',
        // 'not_found_in_trash' => 'В корзине не найдено запрашиваемого обзора',
    ];

    $args = [
        'label' => 'Обзор',
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-welcome-view-site',
        'menu_position' => 6,
        'has_archive' => true,
        'taxonomies' => ['post_tag', 'category'],
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        ]
    ];
    register_post_type('reviews', $args);
}

// Добавление кастомных постов для трансляций

add_action('init', 'translations_init');
function translations_init()
{
    $labels = [
        'name' => 'Трансляции',
        'singular_name' => 'Трансляция',
        'add_new' => 'Добавить трансляцию',
        'add_new_item' => 'Добавление трансляции',
        'edit_item' => 'Редактирование трансляции',
        'new_item' => 'Новая трансляция',
        'view_item' => 'Смотреть трансляцию',
        'search_items' => 'Искать трансляцию',
        'not_found' => 'Не найдено запрашиваемого трансляции',
        // 'not_found_in_trash' => 'В корзине не найдено запрашиваемой трансляции',
    ];

    $args = [
        'label' => 'Трансляция',
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-format-video',
        'menu_position' => 6,
        'has_archive' => true,
        'taxonomies' => ['post_tag', 'category'],
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        ]
    ];
    register_post_type('translations', $args);
}

function sport_paging_nav($query) {
    global  $wp_rewrite;
    $wp_query = $query;
    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 ) {
        return;
    }
    $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );
    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }
    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $wp_query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '&larr; Назад', 'twentyfourteen' ),
        'next_text' => __( 'Вперед &rarr;', 'twentyfourteen' ),
    ) );
    if ( $links ) :
    ?>
    <nav class="pagination">
        <h1 class="screen-reader-text"><?php _e( '', 'twentyfourteen' ); ?></h1>
        <ul class="">
            <li>
                <?php echo $links; ?>
            </li>
        </ul><!-- .pagination -->
    </nav><!-- .navigation -->
    <?php
    endif;
}
function get_parameter_checker($arr)
{

    $custom_field_key_arr = custom_field_key_arr();


    $key_check = [];
    foreach ($arr as $key => $val) {
        if ($check = get_meta_values(esc_sql($key))) {
            $key_check[$key] = array_unique($check);
        }
    }
    $result = array_diff($key_check, []);
    if (!$result) {
        return false;
    }
    $key_val = [];
    $meta_compare = '=';
    foreach ($result as $key => $val) {
        if (array_key_exists($key, $custom_field_key_arr)) {
            $value_arr = [];
            foreach ($val as $v) {
                $value_ch_arr = explode(";", $v);
                foreach ($value_ch_arr as $value_ch) {
                    if (!in_array($value_ch, $value_arr) && $value_ch !='') {
                        $value_arr[] = $value_ch;
                    }
                }


            }
            $val = $value_arr;
            $meta_compare = 'LIKE';
        }
        if (in_array($arr[$key], $val)) {
            $key_val[] = ['key' => $key, 'compare' => $meta_compare, 'value' => $arr[$key]];
        }
    }
    if (!$key_val) {
        return false;
    }
    return $key_val;
}
function getTax($data, $tax)
{
    $arg = [
        'taxonomy' => $tax,
        'slug' => $data
    ];
    return get_terms($arg);
}





/*
 * show flag
 *
 */
function getFlag()
{   $categories= get_categories();
    // var_dump($categories);
    $countries = ['Англия', 'Испания'];
    foreach ($categories as $category) {
        # code...
        if (in_array($category->name,$countries)){
            $link = get_category_link($category->cat_ID);
            $flag = get_term_meta($category->cat_ID, 'cat_meta_cat_logo', true);
            echo "<a href='{$link}'>{$flag}</a>";
        }
    }
}
function getCategoryFlag($catId)
{
    $link = get_category_link($catId);
    $flag = get_term_meta($catId, 'cat_meta_cat_logo', true);
    echo "<a href='{$link}'>{$flag}</a>";
}


// добавляет вызов функции при инициализации административного раздела
add_action('admin_init', 'category_custom_fields', 1);
// функция расширения функционала административного раздела
function category_custom_fields()
    {
        // добавления действия после отображения формы ввода параметров категории
        add_action('edit_category_form_fields', 'category_custom_fields_form');
        // добавления действия при сохранении формы ввода параметров категории
        add_action('edited_category', 'category_custom_fields_save');
    }

function category_custom_fields_form($tag)
    {
        $cat_meta = get_term_meta($tag->term_id,'cat_meta_cat_title', true);
        $cat_meta_logo = get_term_meta($tag->term_id,'cat_meta_cat_logo', true);
        $seo_cat_title = get_term_meta($tag->term_id,'seo_cat_title', true);

?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="extra0"><?php _e('SEO Title'); ?></label></th>
            <td>
                <input name="seo_cat_title" id="seo_cat_title" style="width: 95%" value="<?php echo $seo_cat_title ? $seo_cat_title : ''; ?>"/><br />
            </td>
        </tr>
        <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('Текст для категории'); ?></label></th>
            <td>
                <textarea name="cat_meta_cat_title" id="cat_meta_cat_title" style="height:108px;">
                    <?php echo $cat_meta ? $cat_meta : ''; ?>
                </textarea><br />
                <span class="description"><?php _e('Дополнительное описание категории'); ?></span>
            </td>
        </tr>
         <tr class="form-field">
        <th scope="row" valign="top"><label for="extra2"><?php _e('Код для изображения'); ?></label></th>
         <td>
            <textarea name="cat_meta_cat_logo" id="cat_meta_cat_logo" style="height:108px;">
                <?php echo $cat_meta_logo ? $cat_meta_logo : ''; ?>
            </textarea><br />
                <span class="category_logo"><?php _e('логотип страны в svg'); ?></span>
            </td>
        </tr>
        <?php
    }

function category_custom_fields_save($term_id)
    {
        if (isset($_POST['cat_meta_cat_title'])) {
            update_term_meta($term_id, 'cat_meta_cat_title', $_POST['cat_meta_cat_title']);
        }
         if (isset($_POST['cat_meta_cat_logo'])) {
            update_term_meta($term_id, 'cat_meta_cat_logo', $_POST['cat_meta_cat_logo']);
        }
        if (isset($_POST['seo_cat_title'])) {
            update_term_meta($term_id, 'seo_cat_title', $_POST['seo_cat_title']);
        }
    }


$taxname = 'post_tag';

// Поля при добавлении элемента таксономии
add_action("{$taxname}_add_form_fields", 'add_new_custom_fields');
// Поля при редактировании элемента таксономии
add_action("{$taxname}_edit_form_fields", 'edit_new_custom_fields');

// Сохранение при добавлении элемента таксономии
add_action("create_{$taxname}", 'save_custom_taxonomy_meta');
// Сохранение при редактировании элемента таксономии
add_action("edited_{$taxname}", 'save_custom_taxonomy_meta');

function edit_new_custom_fields( $term ) {
    ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label>Заголовок</label></th>
            <td>
                <input type="text" name="extra[title]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'title', 1 ) ) ?>"><br />
                <span class="description">SEO заголовок (title)</span>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label>Описание</label></th>
            <td>
                <input type="text" name="extra[description]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'description', 1 ) ) ?>"><br />
                <span class="description">SEO описание (description)</span>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label>Ключевые слова</label></th>
            <td>
                <input type="text" name="extra[keywords]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'keywords', 1 ) ) ?>"><br />
                <span class="keywords">SEO ключевые слова (keywords)</span>
            </td>
        </tr>
    <?php

}

function add_new_custom_fields( $taxonomy_slug ){
    ?>
    <div class="form-field">
        <label for="tag-title">Заголовок</label>
        <input name="extra[title]" id="tag-title" type="text" value="" />
        <p>SEO заголовок (title)</p>
    </div>
    <div class="form-field">
        <label for="tag-description">Описание</label>
        <input name="extra[description]" id="tag-description" type="text" value="" />
        <p>SEO описание (description)</p>
    </div>
    <div class="form-field">
        <label for="tag-keywords">Ключевые слова</label>
        <input name="extra[keywords]" id="tag-keywords" type="text" value="" />
        <p>SEO ключевые слова (keywords)</p>
    </div>
    <?php
}

//remove_filter( 'the_content', 'wpautop' );



function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment_item">
                <div class="comment-author vcard">
                    <?php // edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
                    <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
                    <?php printf(__('<cite class="author-name">%s</cite> '), get_comment_author_link()) ?>
                </div>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
                </div>

                <?php if ($comment->comment_approved == '0') : ?>
                    <div class="comment-awaiting-verification">
                        <?php _e('Your comment is awaiting moderation.') ?>
                    </div>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>
                <div class="reply">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>

            <?php
            break;
        case 'pingback'  :
        case 'trackback' :
            ?>
            <li class="post pingback">
            <?php comment_author_link(); ?>
            <?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
            <?php
            break;
    endswitch;
}


function remove_url_from_comments ($fields){
    unset($fields['url']);
    unset($fields['email']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_url_from_comments');
//удаление элементов формы добавления комментариев start
function wph_comments_form($default) {
    $default['logged_in_as'] = '';
    $default['comment_notes_before'] = '';
    return $default;
}
add_filter('comment_form_defaults','wph_comments_form',999);
//удаление элементов формы добавления комментариев end

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 ";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='' || $count < 1){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('просмотров');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

    /* ------------ Настройки -------------- */
    $meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
    $who_count      = 0;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
    $exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

    global $user_ID, $post;
    if(is_singular()) {
        $id = (int)$post->ID;
        static $post_views = false;
        if($post_views) return true; // чтобы 1 раз за поток
        $post_views = (int)get_post_meta($id,$meta_key, true);
        $should_count = false;
        switch( (int)$who_count ) {
            case 0: $should_count = true;
                break;
            case 1:
                if( (int)$user_ID == 0 )
                    $should_count = true;
                break;
            case 2:
                if( (int)$user_ID > 0 )
                    $should_count = true;
                break;
        }
        if( (int)$exclude_bots==1 && $should_count ){
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
            $bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
            if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
                $should_count = false;
        }

        if($should_count)
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
    }
    return true;
}

function new_excerpt_more($more) {
    global $post;
}
add_filter('excerpt_more', 'new_excerpt_more');


function getApi($slug) {
    $roundid = [
        'england' => 274,
        'germany' => 270,
        'russia' => 309,
        'spain' => 311,
        'france' => 297,
        'italy' => 316,
        'champions-league' =>282,
        'europe-league' =>292,
        'eurocups' => 0,

    ];
    $url= "https://api.fantasydata.net/v3/soccer/scores/json/Standings/$roundid[$slug]";
    $api_key = "7c59dfd7f4a44181a6691c5baca090a8";

    $remote_get = wp_remote_get( $url, array(
        'timeout'     => 5,
        'redirection' => 5,
        'httpversion' => '1.0',
        'user-agent'  => 'playmaker.live',
        'blocking'    => true,
        'headers'     => array(
            "Content-Type" => "application/json",
            "Ocp-Apim-Subscription-Key" => $api_key,

        ),
        'cookies'     => array(),
        'body'        => null,
        'compress'    => false,
        'decompress'  => true,
        'sslverify'   => true,
        'stream'      => false,
        'filename'    => null
    ) );

    $result = json_decode($remote_get['body'], true);

    return $result;

}

function getApiByDate() {

    $date =  date('Y-m-d'); //2018-12-17

    $url= "https://api.fantasydata.net/v3/soccer/scores/json/GamesByDate/$date";
    $api_key = "7c59dfd7f4a44181a6691c5baca090a8";

    $remote_get = wp_remote_get( $url, array(
        'timeout'     => 5,
        'redirection' => 5,
        'httpversion' => '1.0',
        'user-agent'  => 'playmaker.live',
        'blocking'    => true,
        'headers'     => array(
            "Content-Type" => "application/json",
            "Ocp-Apim-Subscription-Key" => $api_key,

        ),
        'cookies'     => array(),
        'body'        => null,
        'compress'    => false,
        'decompress'  => true,
        'sslverify'   => true,
        'stream'      => false,
        'filename'    => null
    ) );

    $result = json_decode($remote_get['body'], true);

    return $result;

}


function getCompetitionDetails($slug) {
    $roundid = [
        'england' => 274,
        'germany' => 270,
        'russia' => 309,
        'spain' => 311,
        'france' => 297,
        'italy' => 316,
        'champions-league' =>282,
        'europe-league' =>292,
        'eurocups' => 0,

    ];
    $url= "https://api.fantasydata.net/v3/soccer/scores/json/CompetitionDetails/$roundid[$slug]";
//    $api_key = "7c59dfd7f4a44181a6691c5baca090a8";
    $api_key = "2f6e926a95a54f3da3c3310573bfb797";

    $remote_get = wp_remote_get( $url, array(
        'timeout'     => 5,
        'redirection' => 5,
        'httpversion' => '1.0',
        'user-agent'  => 'playmaker.live',
        'blocking'    => true,
        'headers'     => array(
            "Content-Type" => "application/json",
            "Ocp-Apim-Subscription-Key" => $api_key,

        ),
        'cookies'     => array(),
        'body'        => null,
        'compress'    => false,
        'decompress'  => true,
        'sslverify'   => true,
        'stream'      => false,
        'filename'    => null
    ) );

    $result = json_decode($remote_get['body'], true);

    return $result;

}


function getMatchTime($time){
    $newTime = $time."-02:00";
    return date(" G:i:s ", strtotime($newTime));
}


function getTableByDate ($resultApi) {
        if ($resultApi and count($resultApi) > 0 and $resultApi['statusCode'] == 200):
            ?>
            <select id="days" name="days" style="width: 270px" class="days selectpicker"></select>
            <table id="outside" class="table_slick standings">
                <?php
                foreach ($resultApi as $team):
                    var_dump($team);
                    ?>
                    <?php if($team['Status'] == "Scheduled" || $team['Status'] == "InProgress"  || $team['Status'] == "Canceled"): ?>
                    <tr>
                        <td>
                            <?php
                            echo getMatchTime($team['DateTime']);
                            ?>
                        </td>
                        <td style="text-align:left;">
                            <?php
                                if($team['AwayTeamScore'] &&  $team['HomeTeamScore']):
                                    echo $team['HomeTeamScore']  ." - ". $team['AwayTeamScore']  ;
                                else:
                                    echo $team['HomeTeamName']
                                        ." - ".
                                        $team['AwayTeamName'];
                                endif;
                            ?>
                        </td>
                    </tr>
                    <?php
                endif;
                endforeach;
                ?>
            </table>
            <?php
        endif;
}


// кастомные поля для трансляций (ссылки)

function getSopcastMetaLinks($post_id) {
    $sopcastLinks = [];
    $html = "";
    for($i = 0; $i< 6; $i++) {

        $sopcastLinks[$i] = get_post_meta($post_id, "sopcast[$i]");
    }
    $html .="<div class='sopcast_links'><ul>";
    foreach ($sopcastLinks as $index => $value) {
        if ($value[0] !== '') {
            $html .= "<li><a href='$value[0]'>ссылка $index</a> </li> ";
        }
    }
    $html .="</ul></div> ";
    return $html;
}

function getAcestreamMetaLinks($post_id) {
    $acestreamLinks = [];
    $html = "";
    for($i = 0; $i< 6; $i++) {

        $acestreamLinks[$i] = get_post_meta($post_id, "acestream[$i]");
    }
    $html .="<div class='acestream_links'><ul>";
    foreach ($acestreamLinks as $index => $value) {
        if ($value[0] !== '') {
            $html .="<li><a href='$value[0]'>ссылка $index</a> </li> ";
        }
    }
    $html .="</ul></div> ";
    return $html;
}

function getPlayerMetaLinks($post_id) {
    $playerLinks = [];
    $html = "";
    for($i = 0; $i< 6; $i++) {
        $playerLinks[$i] = get_post_meta($post_id, "player[$i]");
    }
    $html .="<div class='playert_links'><ul>";
    foreach ($playerLinks as $index => $value) {
        if ($value[0] !== '') {
            var_dump($value[0]);
            $html .= "<li><a href='$value[0]'>ссылка $index</a> </li> ";
        }
    }
    $html .="</ul></div> ";
    return $html;
}