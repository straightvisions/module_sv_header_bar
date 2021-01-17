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
	
	echo $_s->build_css(
		is_admin() ? '
		.editor-styles-wrapper .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a' : '.sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a',
		array_merge(
			$module->get_setting('text_color_link')->get_css_data()
		)
	);
	
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper p:not(.has-text-color) .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a:hover, .editor-styles-wrapper p:not(.has-text-color) .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a:focus' : '.sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a:hover, .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a:focus',
		array_merge(
			$module->get_setting('text_color_link_hover')->get_css_data()
		)
	);
	
	
	// Text Decoration
	$properties			= array();
	
	$value				= $module->get_setting('text_deco_link')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if(strlen($val) > 0) {
				if($val == 'underline'){
					$imploded['width'][$breakpoint] = '100%';
					$imploded['border-bottom'][$breakpoint] = '1px solid';
				}elseif($val == 'underline_dashed'){
					$imploded['width'][$breakpoint] = '100%';
					$imploded['border-bottom'][$breakpoint] = '1px dashed';
				}
			}
		}
		
		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
		}
	}
	
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a::before, .editor-styles-wrapper .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a:visited::before'
			: '.sv100_sv_content_wrapper .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a::before, .sv100_sv_content_wrapper .sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner a:visited::before',
		array_merge(
			$properties
		)
	);