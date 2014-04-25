<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="panel panel-default comments-area">
	<div class="panel panel-body">
		<?php bootnews_comment_form(); ?>
		
	</div>
	
</div>

<div class="list-group">
		<?php wp_list_comments( array( 'callback' => 'bootnews_comment', 'style' => 'ol' ) ); ?>
		
	</div>