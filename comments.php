<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments1" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( 1 === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'twentysixteen' ),' ' );
            } else {
                printf(
                /* translators: 1: number of comments, 2: post title */
                   'Комментарии'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ul class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 42,
                'reply_text'  => 'Ответить на комментарий',
                'callback'    => 'mytheme_comment',

            ) );

            ?>

        </ul><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
    <?php endif; ?>

    <?php
    $args = array(
        // изменяем текст кнопки отправки
        'label_submit'=>'Запостить коммент',
        // удаляем сообщение со списком разрешенных HTML-тегов из-под формы комментирования
        'comment_notes_after' => '',
        // указываем собственный HTML-код для вывода поля комментария
        'comment_field' => '<p class="comment-form-comment"><label for="comment">Твой коммент</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    );
    comment_form( $args );
    ?>

</div><!-- .comments-area -->