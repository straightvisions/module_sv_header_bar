<div class="<?php echo $this->get_prefix('wrapper'); ?>">
	<div class="<?php echo $this->get_prefix('inner'); ?>">
		<?php
			for($i = 1; $i < 3; $i++){
				echo $this->get_module( 'sv_sidebar' )
					? $this->get_module( 'sv_sidebar' )->load( $this->get_prefix($i) )
					: '';
			}
		?>
	</div>
</div>