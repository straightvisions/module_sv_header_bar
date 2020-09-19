<?php
// General
	echo $_s->build_css(
		'.sv100_sv_header_bar_wrapper',
		array_merge(
			$script->get_parent()->get_setting('max_width')->get_css_data('max-width'),
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color'),
			$script->get_parent()->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner',
		array_merge(
			$script->get_parent()->get_setting('max_width_inner')->get_css_data('max-width'),
			$script->get_parent()->get_setting('font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color')->get_css_data(),
			$script->get_parent()->get_setting('direction')->get_css_data('flex-direction'),
			$script->get_parent()->get_setting('margin')->get_css_data(),
			$script->get_parent()->get_setting('padding')->get_css_data('padding')
		)
	);