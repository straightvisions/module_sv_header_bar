<?php
// columns outer ---------------------------------------------------------------------------------------------------
$prepared_properties = array();
for($i = 1; $i < 3; $i++){
	if($module->get_setting('sidebar_' . $i . '_alignment')->get_data()) {
		$prepared_properties[$i] = $_s->prepare_css_property_responsive($module->get_setting('sidebar_' . $i . '_alignment')->get_data());
	}
}
for($i = 1; $i < 3; $i++){
	$properties					= array();

	if($module->get_setting('sidebar_' . $i . '_alignment_content')->get_data()){
		// inner stuff
		$properties['text-align'] 		= $_s->prepare_css_property_responsive($module->get_setting('sidebar_' . $i . '_alignment_content')->get_data());
	}

	if($module->get_setting('sidebar_' . $i . '_alignment')->get_data()){

		// outer stuff
		$properties['justify-self'] = array(); // row
		$properties['align-self'] 	= array(); // column
		$properties['margin-left'] 	= array();
		$properties['margin-right'] = array();

		foreach($prepared_properties[$i] as $key => $value) {
			$properties['margin-left'][$key]	= '15px';
			$properties['margin-right'][$key]	= '15px';
			$properties['justify-self'][$key]	= 'unset';
			$properties['align-self'][$key]		= 'unset';

			// flex hacks to simulate parent justify content and add more options
			if( isset($module->get_setting('direction')->get_data()[$key]) && $module->get_setting('direction')->get_data()[$key] === 'row' ) {

				if( $value === 'flex-start' && isset($prepared_properties[$i+1]) && $prepared_properties[$i+1][$key] != 'flex-start'){
					$properties['margin-right'][$key] = 'auto';
				}

				if( $value === 'flex-end' && isset($prepared_properties[$i+1]) && $prepared_properties[$i-1][$key] != 'flex-end'){
					$properties['margin-left'][$key] = 'auto';
				}

				if( $value === 'center' ){
					$properties['margin-left'][$key] 	= 'auto';
					$properties['margin-right'][$key] 	= 'auto';
				}

				$properties['justify-self'][$key] = $value;
			}

			// column direction doesn't need any hacks ;)
			if( isset($module->get_setting('direction')->get_data()[$key]) && $module->get_setting('direction')->get_data()[$key] === 'column' ) {
				$properties['align-self'][$key] 	= $value;
				$properties['margin-left'][$key] 	= '0';
				$properties['margin-right'][$key] 	= '0';
			}

		}

	}

	echo $_s->build_css(
		'.sv100_sv_header_bar_wrapper .sv100_sv_header_bar_inner > .sv100_sv_sidebar_sv_header_bar_' . $i,
		$properties
	);
}