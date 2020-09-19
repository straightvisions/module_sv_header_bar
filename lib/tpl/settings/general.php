<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'General', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'max_width' )->form();
			?>
			<?php
				echo $module->get_setting( 'max_width_inner' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Font', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'font' )->form();
				echo $module->get_setting( 'font_size' )->form();
				echo $module->get_setting( 'line_height' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_color' )->form();
				echo $module->get_setting( 'bg_color' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Spacing', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'margin' )->form();
				echo $module->get_setting( 'padding' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Border', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php echo $module->get_setting( 'border' )->form(); ?>
		</div>
	</div>
<?php } ?>