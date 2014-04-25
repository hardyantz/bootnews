<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
		<div id="secondary" class="col-sm-3" role="complementary">
			<div class="row">
				<div class="col-xs-12">
				<!--<h2>Side left</h2>-->
				
					<?php dynamic_sidebar( 'sidebar-left' ); ?>
				</div>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>
	