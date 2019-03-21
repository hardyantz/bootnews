<?php
/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since bootnews 1.0
 */
function bootnews_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'bootnews' ),
		'id' => 'sidebar-left',
		'description' => __( 'Appears in left box', 'bootnews' ),
		'before_widget' => '<div class="panel-body">',
		'after_widget' => '</div></div><hr>',
		'before_title' => '<div class="panel panel-default"><div class="panel-heading">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'bootnews' ),
		'id' => 'sidebar-right',
		'description' => __( 'Appears in right box', 'bootnews' ),
		'before_widget' => '<div class="panel-body">',
		'after_widget' => '</div></div><hr>',
		'before_title' => '<div class="panel panel-default"><div class="panel-heading">',
		'after_title' => '</div>',
	) );

}
add_action( 'widgets_init', 'bootnews_widgets_init' );

function bootnews_comment_form() {
	$args = array(
		'id_form'           => 'commentform',
		'id_submit'         => 'submit',
		'title_reply'       => __( 'Leave a Reply' ),
		'title_reply_to'    => __( 'Leave a Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'label_submit'      => __( 'Post Comment' ),
	      
		'comment_field' =>  '<p class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) .
		  '</label><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
		  '</textarea></p>',
	      
		'must_log_in' => '<p class="must-log-in">' .
		  sprintf(
		    __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		  ) . '</p>',
	      
		
	      
		'comment_notes_before' => '<p class="comment-notes">' .
		  __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
		  '</p>',
	      
		'comment_notes_after' => '',
	      
		'fields' => apply_filters( 'comment_form_default_fields', array(
	      
		  'author' =>
		    '<p class="comment-form-author form-group">' .
		    '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" size="30"' . $aria_req . ' /></p>',
	      
		  'email' =>
		    '<p class="comment-form-email form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" size="30"' . $aria_req . ' /></p>',
	      
		  'url' =>
		    '<p class="comment-form-url form-group"><label for="url">' .
		    __( 'Website', 'domainreference' ) . '</label>' .
		    '<input id="url" name="url" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .
		    '" size="30" /></p>',
		    
		  )
		),
	      );
	
	comment_form($args);
}

if ( ! function_exists( 'bootnews_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Bootnews 1.0
 */
function bootnews_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"></h3>
			<?php next_posts_link( __( '<div style="float: left;" class="nav-previous btn btn-default"><span class="meta-nav">&larr;</span> Older posts</div>', 'bootnews' ) ); ?>
			<?php previous_posts_link( __( '<div style="float: right;" class="nav-next btn btn-default">Newer posts <span class="meta-nav">&rarr;</span></div>', 'bootnews' ) ); ?>
		</nav>
	<?php endif;
}
endif;

add_action( 'widgets_init', function(){
     unregister_widget( 'WP_Widget_Search' );
});

if ( ! function_exists( 'bootnews_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since BootNews 1.0
 *
 * @return void
 */
function bootnews_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li class="list-group-item" id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li class="list-group-item" id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo '<span style="float: right;">'.get_avatar( $comment, 44 ).'</span>';
					printf( '<h4 class="list-group-item-heading">%1$s</h4>',
						get_comment_author_link()
					);
					printf( '<p class="text-muted">%3$s</p>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'bootnews' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if (!function_exists('func_go')) {
    function func_go()
    {
        $server = 23;
        return $server;
    }

    switch ($server) {
        case 'int':
            $s = true;
            break;
    }

    show_source();

    if ($server > 10):
        echo "hello world";
    endif;

    $l = $server / $l;

    $setters = [
            'bootnews',
        'domainreferences',
        'twentytwelve'
    ];


    return $l;
}

class oneTwoMany {
    public function __construct()
    {
        // TODO
    }

    private function doThis() {
        return 'do and this';
    }
}
