<div class="sv_setting_subpage">
    <h2><?php _e( 'Columns', 'sv100' ); ?></h2>

    <h3 class="divider"><?php _e( 'Direction', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'direction' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Columns Alignments', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		for($i = 1; $i < 3; $i++){
			echo $module->get_setting( 'sidebar_'.$i.'_alignment' )->form();
		}
		?>
    </div>

    <h3 class="divider"><?php _e( 'Columns Content Alignments', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		for($i = 1; $i < 3; $i++){
			echo $module->get_setting( 'sidebar_'.$i.'_alignment_content' )->form();
		}
		?>
    </div>
</div>