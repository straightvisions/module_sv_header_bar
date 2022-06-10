<?php
	// General
	echo $_s->build_css(
		is_admin()
			? 'div[data-widget-area-id="'.$module->get_setting('sidebar')->get_data().'"] > .block-editor-block-list__layout'
			: '.sv100_sv_header_bar_wrapper',
		array_merge(
			$module->get_setting('max_width')->get_css_data('max-width'),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner',
		$module->get_setting('max_width_inner')->get_css_data('max-width')
	);