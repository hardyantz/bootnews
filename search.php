<?php get_header(); ?>
<div class="row wrap">
<?php get_sidebar( 'left' ); ?>

	<div id="primary" class="content col-sm-6">
		
		<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
		
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="row">
				<div class="col-xs-12">
				  <h2><?php the_title(); ?></h2>
				  <p><?php the_excerpt(); ?></p>
				  <p class="lead"><a href='<?php the_permalink() ?>' class="btn btn-default">Read More</a></p>
				  <p class="pull-right"><span class="catlist label label-default"><?php the_category('</span> <span class="catlist label label-default">'); ?></span></p>
				  <ul class="list-inline"><li><a href="#"><?php the_time('F j, Y'); ?></a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></a></li></ul>
				</div>
			      </div>
			      <hr>
				
			<?php endwhile; ?>

			<?php bootnews_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'bootnews' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'bootnews' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'bootnews' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'bootnews' ); ?></p>
					
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		
	</div><!-- #primary -->

<?php get_sidebar('right'); ?>
<hr>
  
</div>
<?php get_footer(); ?>