<?php
// General
	echo $_s->build_css(
		'.sv100_sv_header_bar_wrapper',
		array_merge(
			$module->get_setting('max_width')->get_css_data('max-width'),
			$module->get_setting('bg_color')->get_css_data('background-color'),
			$module->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner',
		array_merge(
			$module->get_setting('max_width_inner')->get_css_data('max-width'),
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data(),
			$module->get_setting('direction')->get_css_data('flex-direction'),
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('padding')->get_css_data('padding')
		)
	);