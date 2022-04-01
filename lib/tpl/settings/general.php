<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'General', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'max_width' )->form();
				echo $module->get_setting( 'max_width_inner' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Sidebars', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'sidebar' )->form();
				echo $module->get_setting( 'bg_color' )->form();
			?>
		</div>
	</div>
<?php } ?>