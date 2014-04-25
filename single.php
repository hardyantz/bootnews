<?php get_header(); ?>
<div class="row wrap">
<?php get_sidebar( 'left' ); ?>

	<div id="primary" class="content col-sm-6">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="row">
				<div class="col-xs-12">
				  <h2><?php the_title(); ?></h2>
				  <p><?php the_content(); ?></p>
				  
				  <p class="pull-right"><span class="catlist label label-default"><?php the_category('</span> <span class="catlist label label-default">'); ?></span></p>
				  <ul class="list-inline"><li><a href="#"><?php the_time('F j, Y'); ?></a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></a></li></ul>
				  <p>
					<?php comments_template( '', true ); ?>
				  </p>
				</div>
			      </div>
			      <hr>
				
			<?php endwhile; ?>

			<?php bootnews_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<div class="row">
				<div class="col-xs-12">
				  <h2>No post to display</h2>
				  
				</div>
			      </div>
			      <hr>

		<?php endif; // end have_posts() check ?>

		
	</div><!-- #primary -->

<?php get_sidebar('right'); ?>
<hr>
  
</div>
<?php get_footer(); ?>