<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
		<div id="secondary" class="col-sm-3" role="complementary">
			<div class="row">
				<div class="col-xs-12">
				<!--<h2>Side right</h2>-->
				
					<?php dynamic_sidebar( 'sidebar-right' ); ?>
				</div>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>
	