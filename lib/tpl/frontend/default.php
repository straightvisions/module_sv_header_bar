<div class="<?php echo $this->get_prefix('wrapper'); ?>">
	<div class="<?php echo $this->get_prefix('inner'); ?>">
		<?php
			$sidebar_1		= $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar_1')->get_data() );
			$sidebar_2		= $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar_2')->get_data() );
		?>
		<?php if($sidebar_1){ ?>
		<div class="sv100_sv_sidebar_sv_header_bar_1"><?php echo $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar_1')->get_data() ); ?></div>
		<?php } ?>
		<?php if($sidebar_2){ ?>
		<div class="sv100_sv_sidebar_sv_header_bar_2"><?php echo $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar_2')->get_data() ); ?></div>
		<?php } ?>
	</div>
</div>